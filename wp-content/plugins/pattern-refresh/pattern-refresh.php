<?php
/**
 * Plugin Name:       Gutenberg Tools
 * Description:       Development tools for building Gutenberg patterns quickly and moving visual edits back into code.
 * Version:           2.5.0
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Author:            Christopher Nathaniel
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       pattern-refresh
 */

defined( 'ABSPATH' ) || exit;

/**
 * Gutenberg Tools plugin.
 *
 * Existing pattern-refresh handles and routes stay unchanged for backward compatibility.
 */
final class Gutenberg_Tools_Plugin {
	private const VERSION = '2.5.0';
	private const REST_NAMESPACE = 'pattern-refresh/v1';

	public static function init(): void {
		add_action( 'init', array( self::class, 'register_block' ) );
		add_action( 'rest_api_init', array( self::class, 'register_rest_routes' ) );
		add_action( 'admin_notices', array( self::class, 'render_disabled_notice' ) );
	}

	/**
	 * Register editor assets and retain the old marker block for 1.x content migration.
	 */
	public static function register_block(): void {
		$script_path  = plugin_dir_path( __FILE__ ) . 'block/editor.js';
		$quality_path = plugin_dir_path( __FILE__ ) . 'block/quality.js';
		$style_path   = plugin_dir_path( __FILE__ ) . 'block/editor.css';

		wp_register_script(
			'gutenberg-tools-quality',
			plugins_url( 'block/quality.js', __FILE__ ),
			array( 'wp-i18n' ),
			file_exists( $quality_path ) ? (string) filemtime( $quality_path ) : self::VERSION,
			true
		);

		wp_register_script(
			'pattern-refresh-editor',
			plugins_url( 'block/editor.js', __FILE__ ),
			array(
				'gutenberg-tools-quality',
				'wp-api-fetch',
				'wp-block-editor',
				'wp-blocks',
				'wp-components',
				'wp-data',
				'wp-edit-post',
				'wp-editor',
				'wp-element',
				'wp-hooks',
				'wp-i18n',
				'wp-notices',
				'wp-plugins',
			),
			file_exists( $script_path ) ? (string) filemtime( $script_path ) : self::VERSION,
			true
		);

		wp_register_style(
			'pattern-refresh-editor',
			plugins_url( 'block/editor.css', __FILE__ ),
			array( 'wp-edit-blocks' ),
			file_exists( $style_path ) ? (string) filemtime( $style_path ) : self::VERSION
		);

		wp_localize_script(
			'pattern-refresh-editor',
			'PatternRefreshSettings',
			array(
				'enabled'          => self::is_enabled(),
				'canWritePatterns' => self::can_write_patterns(),
				'environment'      => wp_get_environment_type(),
				'pollInterval'     => max( 500, (int) apply_filters( 'pattern_refresh_poll_interval', 1000 ) ),
			)
		);

		register_block_type(
			__DIR__ . '/block',
			array(
				'editor_script'   => 'pattern-refresh-editor',
				'editor_style'    => 'pattern-refresh-editor',
				'render_callback' => static function ( array $attributes, string $content ): string {
					return $content;
				},
			)
		);
	}

	/**
	 * Register pattern discovery and development-only file endpoints.
	 */
	public static function register_rest_routes(): void {
		register_rest_route(
			self::REST_NAMESPACE,
			'/patterns',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( self::class, 'get_patterns_response' ),
				'permission_callback' => array( self::class, 'rest_permissions_check' ),
			)
		);

		register_rest_route(
			self::REST_NAMESPACE,
			'/pattern',
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array( self::class, 'get_pattern_response' ),
				'permission_callback' => array( self::class, 'rest_permissions_check' ),
				'args'                => array(
					'slug' => array(
						'required'          => true,
						'type'              => 'string',
						'validate_callback' => static function ( $value ): bool {
							return is_string( $value ) && 1 === preg_match( '/^[a-z0-9_-]+\/[a-z0-9_-]+$/i', $value );
						},
					),
				),
			)
		);

		register_rest_route(
			self::REST_NAMESPACE,
			'/pattern/save',
			array(
				'methods'             => WP_REST_Server::EDITABLE,
				'callback'            => array( self::class, 'save_pattern_response' ),
				'permission_callback' => array( self::class, 'rest_write_permissions_check' ),
				'args'                => array(
					'slug' => array(
						'required'          => true,
						'type'              => 'string',
						'validate_callback' => static function ( $value ): bool {
							return is_string( $value ) && 1 === preg_match( '/^[a-z0-9_-]+\/[a-z0-9_-]+$/i', $value );
						},
					),
					'markup' => array(
						'required' => true,
						'type'     => 'string',
					),
					'fileHash' => array(
						'required' => true,
						'type'     => 'string',
					),
				),
			)
		);

		register_rest_route(
			self::REST_NAMESPACE,
			'/pattern/create',
			array(
				'methods'             => WP_REST_Server::CREATABLE,
				'callback'            => array( self::class, 'create_pattern_response' ),
				'permission_callback' => array( self::class, 'rest_write_permissions_check' ),
				'args'                => array(
					'title' => array(
						'required' => true,
						'type'     => 'string',
					),
					'slug' => array(
						'required' => true,
						'type'     => 'string',
					),
					'categories' => array(
						'default' => 'featured',
						'type'    => 'string',
					),
					'description' => array(
						'default' => '',
						'type'    => 'string',
					),
					'markup' => array(
						'required' => true,
						'type'     => 'string',
					),
				),
			)
		);
	}

	/**
	 * Allow only editors in a development-like environment to read pattern source.
	 *
	 * @return true|WP_Error
	 */
	public static function rest_permissions_check() {
		if ( ! self::is_enabled() ) {
			return new WP_Error(
				'pattern_refresh_disabled',
				__( 'Gutenberg Tools is disabled outside a development environment.', 'pattern-refresh' ),
				array( 'status' => 403 )
			);
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return new WP_Error(
				'pattern_refresh_forbidden',
				__( 'You are not allowed to refresh patterns.', 'pattern-refresh' ),
				array( 'status' => rest_authorization_required_code() )
			);
		}

		return true;
	}

	/**
	 * Restrict theme-file writes to development environments and theme editors.
	 *
	 * @return true|WP_Error
	 */
	public static function rest_write_permissions_check() {
		$read_permission = self::rest_permissions_check();

		if ( is_wp_error( $read_permission ) ) {
			return $read_permission;
		}

		if ( ! self::can_write_patterns() ) {
			return new WP_Error(
				'gutenberg_tools_write_forbidden',
				__( 'You are not allowed to write theme pattern files.', 'pattern-refresh' ),
				array( 'status' => 403 )
			);
		}

		return true;
	}

	/**
	 * Return metadata and source hashes for file-based patterns in the active theme.
	 */
	public static function get_patterns_response(): WP_REST_Response {
		$patterns = array();

		foreach ( self::get_theme_patterns() as $pattern ) {
			$patterns[] = array(
				'name'        => $pattern['name'],
				'title'       => wp_strip_all_tags( $pattern['title'] ),
				'description' => isset( $pattern['description'] ) ? wp_strip_all_tags( $pattern['description'] ) : '',
				'hash'        => self::get_pattern_hash( $pattern ),
				'styles'      => self::get_public_pattern_styles( $pattern ),
				'source'      => self::get_public_pattern_source( $pattern ),
			);
		}

		usort(
			$patterns,
			static function ( array $left, array $right ): int {
				return strcasecmp( $left['title'], $right['title'] );
			}
		);

		return rest_ensure_response( $patterns );
	}

	/**
	 * Return the current rendered source for one active-theme file pattern.
	 *
	 * @return WP_REST_Response|WP_Error
	 */
	public static function get_pattern_response( WP_REST_Request $request ) {
		$slug     = (string) $request->get_param( 'slug' );
		$patterns = self::get_theme_patterns();

		if ( ! isset( $patterns[ $slug ] ) ) {
			return new WP_Error(
				'pattern_refresh_not_found',
				__( 'That active-theme file pattern could not be found.', 'pattern-refresh' ),
				array( 'status' => 404 )
			);
		}

		$pattern = $patterns[ $slug ];

		return rest_ensure_response(
			array(
				'name'    => $pattern['name'],
				'title'   => wp_strip_all_tags( $pattern['title'] ),
				'content' => $pattern['content'],
				'hash'    => self::get_pattern_hash( $pattern ),
				'styles'  => self::get_public_pattern_styles( $pattern ),
				'source'  => self::get_public_pattern_source( $pattern ),
			)
		);
	}

	/**
	 * Replace the literal Gutenberg markup in an existing static pattern file.
	 *
	 * @return WP_REST_Response|WP_Error
	 */
	public static function save_pattern_response( WP_REST_Request $request ) {
		$slug     = (string) $request->get_param( 'slug' );
		$markup   = trim( (string) $request->get_param( 'markup' ) );
		$patterns = self::get_theme_patterns();
		$valid    = self::validate_pattern_markup( $markup );

		if ( is_wp_error( $valid ) ) {
			return $valid;
		}

		if ( ! isset( $patterns[ $slug ] ) ) {
			return new WP_Error(
				'gutenberg_tools_pattern_not_found',
				__( 'That active-theme file pattern could not be found.', 'pattern-refresh' ),
				array( 'status' => 404 )
			);
		}

		$pattern = $patterns[ $slug ];
		$source  = $pattern['_pattern_refresh_source'];

		if ( ! empty( $source['dynamicPhp'] ) ) {
			return new WP_Error(
				'gutenberg_tools_dynamic_pattern',
				__( 'This pattern contains PHP inside its block markup. Automatic write-back is disabled so dynamic code is not replaced with rendered HTML.', 'pattern-refresh' ),
				array( 'status' => 409 )
			);
		}

		$file_path     = $source['_path'];
		$expected_hash = (string) $request->get_param( 'fileHash' );
		$contents      = file_get_contents( $file_path );

		if ( ! is_string( $contents ) ) {
			return new WP_Error(
				'gutenberg_tools_file_read_failed',
				__( 'The pattern file could not be read.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		if ( ! hash_equals( hash( 'sha256', $contents ), $expected_hash ) ) {
			return new WP_Error(
				'gutenberg_tools_file_conflict',
				__( 'The pattern file changed after it was linked. Review or reset the watched blocks before saving again.', 'pattern-refresh' ),
				array( 'status' => 409 )
			);
		}

		$newline = false !== strpos( $contents, "\r\n" ) ? "\r\n" : "\n";
		$markup  = str_replace( "\n", $newline, str_replace( "\r\n", "\n", $markup ) );
		$updated = substr( $contents, 0, $source['_firstByte'] )
			. $markup
			. substr( $contents, $source['_lastByte'] );
		$written = self::write_file_atomically( $file_path, $updated );

		if ( is_wp_error( $written ) ) {
			return $written;
		}

		$theme      = wp_get_theme( $source['_theme'] );
		$new_source = self::get_pattern_source( $theme, $source['_fileName'] );

		if ( empty( $new_source ) ) {
			return new WP_Error(
				'gutenberg_tools_source_refresh_failed',
				__( 'The pattern was saved, but its source location could not be refreshed.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$pattern['content']                 = str_replace( $newline, "\n", $markup );
		$pattern['_pattern_refresh_source'] = $new_source;

		return rest_ensure_response(
			array(
				'name'    => $pattern['name'],
				'title'   => wp_strip_all_tags( $pattern['title'] ),
				'content' => $pattern['content'],
				'hash'    => self::get_pattern_hash( $pattern ),
				'styles'  => self::get_public_pattern_styles( $pattern ),
				'source'  => self::get_public_pattern_source( $pattern ),
			)
		);
	}

	/**
	 * Create a new file-based pattern in the active theme from editor markup.
	 *
	 * @return WP_REST_Response|WP_Error
	 */
	public static function create_pattern_response( WP_REST_Request $request ) {
		$title       = self::sanitize_pattern_header_value( (string) $request->get_param( 'title' ) );
		$slug        = sanitize_title( (string) $request->get_param( 'slug' ) );
		$description = self::sanitize_pattern_header_value( (string) $request->get_param( 'description' ) );
		$markup      = trim( (string) $request->get_param( 'markup' ) );
		$valid       = self::validate_pattern_markup( $markup );

		if ( is_wp_error( $valid ) ) {
			return $valid;
		}

		if ( '' === $title || '' === $slug ) {
			return new WP_Error(
				'gutenberg_tools_invalid_pattern_details',
				__( 'Enter a title and a valid pattern slug.', 'pattern-refresh' ),
				array( 'status' => 400 )
			);
		}

		$categories = array_values(
			array_filter(
				array_map(
					'sanitize_key',
					preg_split( '/\s*,\s*/', (string) $request->get_param( 'categories' ) ) ?: array()
				)
			)
		);

		if ( empty( $categories ) ) {
			$categories = array( 'featured' );
		}

		$theme         = wp_get_theme();
		$theme_path    = realpath( $theme->get_stylesheet_directory() );
		$patterns_path = $theme->get_stylesheet_directory() . '/patterns';

		if ( ! is_string( $theme_path ) ) {
			return new WP_Error(
				'gutenberg_tools_theme_path_failed',
				__( 'The active theme directory could not be resolved.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		if ( ! is_dir( $patterns_path ) && ! wp_mkdir_p( $patterns_path ) ) {
			return new WP_Error(
				'gutenberg_tools_patterns_directory_failed',
				__( 'The active theme patterns directory could not be created.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$patterns_path = realpath( $patterns_path );

		if (
			! is_string( $patterns_path )
			|| 0 !== strpos( wp_normalize_path( $patterns_path ), trailingslashit( wp_normalize_path( $theme_path ) ) )
		) {
			return new WP_Error(
				'gutenberg_tools_patterns_path_invalid',
				__( 'The active theme patterns directory is outside the expected theme path.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$file_name = $slug . '.php';
		$file_path = $patterns_path . '/' . $file_name;

		if ( file_exists( $file_path ) ) {
			return new WP_Error(
				'gutenberg_tools_pattern_exists',
				__( 'A pattern file with that slug already exists.', 'pattern-refresh' ),
				array( 'status' => 409 )
			);
		}

		$pattern_name = $theme->get_stylesheet() . '/' . $slug;
		$header       = "<?php\n/**\n"
			. ' * Title: ' . $title . "\n"
			. ' * Slug: ' . $pattern_name . "\n"
			. ' * Categories: ' . implode( ', ', $categories ) . "\n";

		if ( '' !== $description ) {
			$header .= ' * Description: ' . $description . "\n";
		}

		$contents = $header . " */\n?>\n\n" . $markup . "\n";
		$written  = self::write_file_atomically( $file_path, $contents );

		if ( is_wp_error( $written ) ) {
			return $written;
		}

		$source = self::get_pattern_source( $theme, $file_name );

		if ( empty( $source ) ) {
			return new WP_Error(
				'gutenberg_tools_created_source_failed',
				__( 'The pattern file was created, but its block markup could not be located.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$pattern = array(
			'name'                        => $pattern_name,
			'title'                       => $title,
			'content'                     => $markup,
			'_pattern_refresh_source'     => $source,
			'_pattern_refresh_styles'     => array(),
		);
		$theme->delete_pattern_cache();

		$response = rest_ensure_response(
			array(
				'name'    => $pattern['name'],
				'title'   => $pattern['title'],
				'content' => $pattern['content'],
				'hash'    => self::get_pattern_hash( $pattern ),
				'styles'  => array(),
				'source'  => self::get_public_pattern_source( $pattern ),
			)
		);
		$response->set_status( 201 );

		return $response;
	}

	/**
	 * Resolve only patterns backed by files in the active theme or its parent.
	 *
	 * @return array<string,array<string,mixed>>
	 */
	private static function get_theme_patterns(): array {
		$pattern_names  = array();
		$pattern_themes = array();
		$pattern_files  = array();
		$theme          = wp_get_theme();
		$themes         = array( $theme );

		if ( $theme->parent() ) {
			$themes[] = $theme->parent();
		}

		foreach ( $themes as $current_theme ) {
			foreach ( $current_theme->get_block_patterns() as $file_name => $pattern_data ) {
				if ( ! empty( $pattern_data['slug'] ) && ! isset( $pattern_names[ $pattern_data['slug'] ] ) ) {
					$pattern_names[ $pattern_data['slug'] ]  = true;
					$pattern_themes[ $pattern_data['slug'] ] = $current_theme;
					$pattern_files[ $pattern_data['slug'] ]  = (string) $file_name;
				}
			}
		}

		$registry = WP_Block_Patterns_Registry::get_instance();
		$patterns = array();

		foreach ( array_keys( $pattern_names ) as $pattern_name ) {
			$pattern = $registry->get_registered( $pattern_name );
			$source  = self::get_pattern_source(
				$pattern_themes[ $pattern_name ],
				$pattern_files[ $pattern_name ]
			);

			if ( ! empty( $source ) && is_array( $pattern ) && isset( $pattern['name'], $pattern['title'], $pattern['content'] ) ) {
				$pattern['_pattern_refresh_source'] = $source;
				$pattern['_pattern_refresh_styles'] = self::get_pattern_styles(
					$pattern,
					$pattern_themes[ $pattern_name ]
				);
				$patterns[ $pattern_name ] = $pattern;
			}
		}

		return $patterns;
	}

	/**
	 * Locate the editable block markup inside a file-based theme pattern.
	 *
	 * Only a portable, theme-relative path is returned. Absolute server paths and
	 * the file contents stay private.
	 *
	 * @return array<string,mixed>|array{}
	 */
	private static function get_pattern_source( WP_Theme $theme, string $file_name ): array {
		$theme_path    = realpath( $theme->get_stylesheet_directory() );
		$patterns_path = realpath( $theme->get_stylesheet_directory() . '/patterns' );

		if ( ! is_string( $theme_path ) || ! is_string( $patterns_path ) ) {
			return array();
		}

		$theme_path    = wp_normalize_path( $theme_path );
		$patterns_path = wp_normalize_path( $patterns_path );

		if ( 0 !== strpos( $patterns_path, trailingslashit( $theme_path ) ) ) {
			return array();
		}

		$file_path = realpath( $patterns_path . '/' . ltrim( wp_normalize_path( $file_name ), '/' ) );

		if ( ! is_string( $file_path ) ) {
			return array();
		}

		$file_path = wp_normalize_path( $file_path );

		if (
			0 !== strpos( $file_path, trailingslashit( $patterns_path ) )
			|| 'php' !== strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) )
			|| ! is_file( $file_path )
			|| ! is_readable( $file_path )
		) {
			return array();
		}

		$contents = file_get_contents( $file_path );

		if ( ! is_string( $contents ) ) {
			return array();
		}

		$block_comments = array();
		$file_offset    = 0;

		// Ignore block-comment examples inside PHP strings and comments.
		foreach ( token_get_all( $contents ) as $token ) {
			$token_text = is_array( $token ) ? $token[1] : $token;

			if ( is_array( $token ) && T_INLINE_HTML === $token[0] ) {
				preg_match_all( '/<!--\s*\/?wp:.*?-->/s', $token_text, $matches, PREG_OFFSET_CAPTURE );

				foreach ( $matches[0] as $match ) {
					$block_comments[] = array( $match[0], $file_offset + (int) $match[1] );
				}
			}

			$file_offset += strlen( $token_text );
		}

		if ( empty( $block_comments ) ) {
			return array();
		}

		$first_match = $block_comments[0];
		$last_match  = $block_comments[ count( $block_comments ) - 1 ];
		$first_byte  = (int) $first_match[1];
		$last_byte   = (int) $last_match[1] + strlen( $last_match[0] );
		$markup      = substr( $contents, $first_byte, $last_byte - $first_byte );
		$theme_file  = ltrim( substr( $file_path, strlen( $theme_path ) ), '/' );
		$wp_path     = realpath( ABSPATH );
		$public_file = $theme->get_stylesheet() . '/' . $theme_file;

		if ( is_string( $wp_path ) ) {
			$wp_path = wp_normalize_path( $wp_path );

			if ( 0 === strpos( $file_path, trailingslashit( $wp_path ) ) ) {
				$public_file = ltrim( substr( $file_path, strlen( $wp_path ) ), '/' );
			}
		}

		return array(
			'theme'       => $theme->get_stylesheet(),
			'file'        => $public_file,
			'startLine'   => self::get_line_number( $contents, $first_byte ),
			'endLine'     => self::get_line_number( $contents, $last_byte ),
			'dynamicPhp'  => false !== strpos( $markup, '<?' ),
			'fileHash'    => hash( 'sha256', $contents ),
			'_path'       => $file_path,
			'_firstByte'  => $first_byte,
			'_lastByte'   => $last_byte,
			'_theme'      => $theme->get_stylesheet(),
			'_fileName'   => $file_name,
		);
	}

	/**
	 * Convert a byte offset to a one-based line number for any common newline style.
	 */
	private static function get_line_number( string $contents, int $byte_offset ): int {
		preg_match_all( '/\R/', substr( $contents, 0, $byte_offset ), $line_breaks );

		return count( $line_breaks[0] ) + 1;
	}

	/**
	 * Accept editor-generated block markup, but never executable PHP or unbounded input.
	 *
	 * @return true|WP_Error
	 */
	private static function validate_pattern_markup( string $markup ) {
		if ( '' === $markup || strlen( $markup ) > 2 * MB_IN_BYTES ) {
			return new WP_Error(
				'gutenberg_tools_invalid_markup_size',
				__( 'Pattern markup must not be empty or larger than 2 MB.', 'pattern-refresh' ),
				array( 'status' => 400 )
			);
		}

		if ( false !== strpos( $markup, '<?' ) || false !== strpos( $markup, "\0" ) ) {
			return new WP_Error(
				'gutenberg_tools_unsafe_markup',
				__( 'Pattern markup cannot contain PHP tags or null bytes.', 'pattern-refresh' ),
				array( 'status' => 400 )
			);
		}

		$blocks = parse_blocks( $markup );
		$valid  = array_filter(
			$blocks,
			static function ( array $block ): bool {
				return is_string( $block['blockName'] ?? null ) && '' !== $block['blockName'];
			}
		);

		if ( empty( $valid ) ) {
			return new WP_Error(
				'gutenberg_tools_invalid_markup',
				__( 'The selection did not contain valid Gutenberg blocks.', 'pattern-refresh' ),
				array( 'status' => 400 )
			);
		}

		return true;
	}

	/**
	 * Keep one pattern header value on one inert PHP-comment line.
	 */
	private static function sanitize_pattern_header_value( string $value ): string {
		$value = sanitize_text_field( $value );
		return trim( str_replace( array( '*/', '<?', '?>' ), '', $value ) );
	}

	/**
	 * Write through a temporary file so a failed save cannot truncate a pattern.
	 *
	 * @return true|WP_Error
	 */
	private static function write_file_atomically( string $file_path, string $contents ) {
		$directory = dirname( $file_path );

		if ( ! is_dir( $directory ) || ! is_writable( $directory ) ) {
			return new WP_Error(
				'gutenberg_tools_directory_not_writable',
				__( 'The theme patterns directory is not writable.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$temp_path = tempnam( $directory, '.gutenberg-tools-' );

		if ( false === $temp_path ) {
			return new WP_Error(
				'gutenberg_tools_temp_file_failed',
				__( 'A temporary pattern file could not be created.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$bytes = file_put_contents( $temp_path, $contents, LOCK_EX );

		if ( strlen( $contents ) !== $bytes ) {
			@unlink( $temp_path );

			return new WP_Error(
				'gutenberg_tools_file_write_failed',
				__( 'The complete pattern file could not be written.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		$file_permissions = file_exists( $file_path ) ? fileperms( $file_path ) : false;
		$permissions      = is_int( $file_permissions ) ? $file_permissions & 0777 : 0644;
		chmod( $temp_path, $permissions );

		if ( ! rename( $temp_path, $file_path ) ) {
			@unlink( $temp_path );

			return new WP_Error(
				'gutenberg_tools_file_replace_failed',
				__( 'The pattern file could not be replaced.', 'pattern-refresh' ),
				array( 'status' => 500 )
			);
		}

		clearstatcache( true, $file_path );
		return true;
	}

	/**
	 * Return source metadata safe to show in the editor.
	 *
	 * @param array<string,mixed> $pattern Registered pattern data.
	 * @return array{theme:string,file:string,startLine:int,endLine:int,dynamicPhp:bool,fileHash:string}|array{}
	 */
	private static function get_public_pattern_source( array $pattern ): array {
		$source = $pattern['_pattern_refresh_source'] ?? array();

		if ( empty( $source ) ) {
			return array();
		}

		return array(
			'theme'      => $source['theme'],
			'file'       => $source['file'],
			'startLine'  => $source['startLine'],
			'endLine'    => $source['endLine'],
			'dynamicPhp' => $source['dynamicPhp'],
			'fileHash'   => $source['fileHash'],
		);
	}

	/**
	 * Include matching theme stylesheet contents in change detection.
	 *
	 * @param array<string,mixed> $pattern Registered pattern data.
	 */
	private static function get_pattern_hash( array $pattern ): string {
		// Pattern files include harmless whitespace around their inline markup.
		$parts = array( trim( (string) $pattern['content'] ) );

		foreach ( $pattern['_pattern_refresh_styles'] ?? array() as $style ) {
			$parts[] = $style['hash'];
		}

		return hash( 'sha256', implode( "\0", $parts ) );
	}

	/**
	 * Remove server-only paths before returning stylesheet metadata to the editor.
	 *
	 * @param array<string,mixed> $pattern Registered pattern data.
	 * @return array<int,array{url:string,hash:string}>
	 */
	private static function get_public_pattern_styles( array $pattern ): array {
		return array_map(
			static function ( array $style ): array {
				return array(
					'url'  => $style['url'],
					'hash' => $style['hash'],
				);
			},
			$pattern['_pattern_refresh_styles'] ?? array()
		);
	}

	/**
	 * Resolve convention-based stylesheets belonging to one file pattern.
	 *
	 * @param array<string,mixed> $pattern Registered pattern data.
	 * @return array<int,array{path:string,url:string,hash:string}>
	 */
	private static function get_pattern_styles( array $pattern, WP_Theme $theme ): array {
		$pattern_slug = basename( (string) $pattern['name'] );
		$theme_path   = wp_normalize_path( $theme->get_stylesheet_directory() );
		$theme_uri    = $theme->get_stylesheet_directory_uri();
		$candidates   = array(
			$theme_path . '/assets/patterns/' . $pattern_slug . '.css',
			$theme_path . '/assets/css/patterns/' . $pattern_slug . '.css',
			$theme_path . '/patterns/' . $pattern_slug . '.css',
			$theme_path . '/assets/css/' . $pattern_slug . '.css',
		);

		/**
		 * Filters absolute stylesheet paths watched alongside a theme pattern.
		 *
		 * Paths must resolve inside the theme that owns the pattern.
		 *
		 * @param string[]           $candidates Candidate absolute paths.
		 * @param array<string,mixed> $pattern    Registered pattern data.
		 * @param WP_Theme            $theme      Theme that owns the pattern.
		 */
		$candidates = (array) apply_filters(
			'pattern_refresh_pattern_stylesheets',
			$candidates,
			$pattern,
			$theme
		);

		$styles = array();

		foreach ( array_unique( $candidates ) as $candidate ) {
			$real_path = realpath( (string) $candidate );

			if ( ! is_string( $real_path ) ) {
				continue;
			}

			$real_path = wp_normalize_path( $real_path );

			if (
				0 !== strpos( $real_path, trailingslashit( $theme_path ) )
				|| 'css' !== strtolower( pathinfo( $real_path, PATHINFO_EXTENSION ) )
				|| ! is_readable( $real_path )
			) {
				continue;
			}

			$relative_path = ltrim( substr( $real_path, strlen( $theme_path ) ), '/' );
			$styles[]      = array(
				'path' => $real_path,
				'url'  => add_query_arg(
					'ver',
					(string) filemtime( $real_path ),
					trailingslashit( $theme_uri ) . $relative_path
				),
				'hash' => hash_file( 'sha256', $real_path ),
			);
		}

		return $styles;
	}

	/**
	 * Enable editor mutation only in an explicitly development-like runtime.
	 */
	private static function is_enabled(): bool {
		$environment = wp_get_environment_type();
		if ( ! in_array( $environment, array( 'local', 'development' ), true ) ) {
			return false;
		}

		return (bool) apply_filters( 'pattern_refresh_enabled', true );
	}

	/**
	 * Theme writes are opt-in in the editor and unavailable when WordPress forbids file changes.
	 */
	private static function can_write_patterns(): bool {
		$file_changes_blocked = ( defined( 'DISALLOW_FILE_MODS' ) && DISALLOW_FILE_MODS )
			|| ( defined( 'DISALLOW_FILE_EDIT' ) && DISALLOW_FILE_EDIT );

		return self::is_enabled()
			&& ! $file_changes_blocked
			&& current_user_can( 'edit_themes' );
	}

	/**
	 * Explain why the editor controls are intentionally inactive.
	 */
	public static function render_disabled_notice(): void {
		if ( self::is_enabled() || ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		?>
		<div class="notice notice-info">
			<p>
				<?php esc_html_e( 'Gutenberg Tools is inactive. It requires a local/development environment and the pattern_refresh_enabled filter must allow it.', 'pattern-refresh' ); ?>
			</p>
		</div>
		<?php
	}
}

Gutenberg_Tools_Plugin::init();
