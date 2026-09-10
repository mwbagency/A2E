( function ( window, wp ) {
	'use strict';

	if ( ! wp || ! wp.i18n ) {
		return;
	}

	const { __, sprintf } = wp.i18n;
	const vagueLinkText = [ 'click here', 'here', 'learn more', 'more', 'read more' ];

	function plainText( value ) {
		const container = window.document.createElement( 'div' );
		container.innerHTML = String( value || '' );
		return ( container.textContent || '' ).replace( /\s+/g, ' ' ).trim();
	}

	function blockLabel( block ) {
		return String( block.name || __( 'Unknown block', 'pattern-refresh' ) )
			.replace( /^core\//, '' )
			.replace( /-/g, ' ' );
	}

	function walkBlocks( blocks, callback ) {
		( blocks || [] ).forEach( function ( block ) {
			callback( block );
			walkBlocks( block.innerBlocks, callback );
		} );
	}

	function anchorCounts( blocks ) {
		const counts = {};

		walkBlocks( blocks, function ( block ) {
			const anchor = block.attributes && block.attributes.anchor;

			if ( anchor ) {
				counts[ anchor ] = ( counts[ anchor ] || 0 ) + 1;
			}
		} );

		return counts;
	}

	function contentLinks( value ) {
		const container = window.document.createElement( 'div' );
		container.innerHTML = String( value || '' );

		return Array.from( container.querySelectorAll( 'a' ) ).map( function ( link ) {
			return {
				label: ( link.getAttribute( 'aria-label' ) || link.textContent || '' ).replace( /\s+/g, ' ' ).trim(),
				target: link.getAttribute( 'target' ) || '',
			};
		} );
	}

	function hasLiteralColour( value ) {
		return typeof value === 'string' && /^(#|rgb|hsl)/i.test( value.trim() );
	}

	function inspect( selectedBlocks, allBlocks ) {
		const issues = [];
		const documentAnchors = anchorCounts( allBlocks );
		let previousHeading = null;

		function add( severity, block, criterion, message ) {
			issues.push( {
				severity: severity,
				block: blockLabel( block ),
				clientId: block.clientId || '',
				criterion: criterion,
				message: message,
			} );
		}

		walkBlocks( selectedBlocks, function ( block ) {
			const attributes = block.attributes || {};
			const label = blockLabel( block );

			if ( block.isValid === false ) {
				add(
					'error',
					block,
					__( 'WordPress block validity', 'pattern-refresh' ),
					__( 'WordPress reports that this block does not match its saved markup.', 'pattern-refresh' )
				);
			}

			if ( attributes.anchor && documentAnchors[ attributes.anchor ] > 1 ) {
				add(
					'error',
					block,
					__( 'WordPress HTML integrity / WCAG 2.2 AA 4.1.2', 'pattern-refresh' ),
					sprintf( __( 'The anchor ID “%s” is used more than once in this document.', 'pattern-refresh' ), attributes.anchor )
				);
			}

			if ( block.name === 'core/heading' ) {
				const level = Number( attributes.level ) || 2;

				if ( ! plainText( attributes.content ) ) {
					add(
						'error',
						block,
						__( 'WCAG 2.2 AA 1.3.1 and 2.4.6', 'pattern-refresh' ),
						__( 'The heading is empty and has no meaningful label.', 'pattern-refresh' )
					);
				}

				if ( previousHeading && level > previousHeading + 1 ) {
					add(
						'warning',
						block,
						__( 'WCAG 2.2 AA 1.3.1', 'pattern-refresh' ),
						sprintf(
							__( 'Heading level jumps from H%d to H%d. Confirm that the hierarchy describes the content.', 'pattern-refresh' ),
							previousHeading,
							level
						)
					);
				}

				previousHeading = level;
			}

			if ( block.name === 'core/image' ) {
				if ( ! Object.prototype.hasOwnProperty.call( attributes, 'alt' ) || attributes.alt === '' ) {
					add(
						'warning',
						block,
						__( 'WCAG 2.2 AA 1.1.1', 'pattern-refresh' ),
						__( 'Alternative text is empty. Keep it empty only when the image is decorative; otherwise describe its purpose.', 'pattern-refresh' )
					);
				}

				if ( ! attributes.url && ! attributes.id ) {
					add(
						'error',
						block,
						__( 'WordPress media integrity', 'pattern-refresh' ),
						__( 'The image has no media ID or URL.', 'pattern-refresh' )
					);
				}
			}

			if ( block.name === 'core/button' ) {
				const text = plainText( attributes.text );

				if ( ! text ) {
					add(
						'error',
						block,
						__( 'WCAG 2.2 AA 2.4.4 and 4.1.2', 'pattern-refresh' ),
						__( 'The button link has no accessible name.', 'pattern-refresh' )
					);
				} else if ( vagueLinkText.includes( text.toLowerCase() ) ) {
					add(
						'warning',
						block,
						__( 'WCAG 2.2 AA 2.4.4', 'pattern-refresh' ),
						sprintf( __( '“%s” may not explain the link destination when read out of context.', 'pattern-refresh' ), text )
					);
				}

				if ( ! attributes.url ) {
					add(
						'warning',
						block,
						__( 'WordPress link integrity', 'pattern-refresh' ),
						__( 'The button has no destination URL.', 'pattern-refresh' )
					);
				}
			}

			if ( block.name === 'core/table' && ! ( attributes.head || [] ).length ) {
				add(
					'warning',
					block,
					__( 'WCAG 2.2 AA 1.3.1', 'pattern-refresh' ),
					__( 'The table has no header row. Add headers when it represents tabular data.', 'pattern-refresh' )
				);
			}

			if ( block.name === 'core/video' ) {
				const tracks = Array.isArray( attributes.tracks ) ? attributes.tracks : [];
				const hasCaptions = tracks.some( function ( track ) {
					return track.kind === 'captions' || track.kind === 'subtitles';
				} );

				if ( ! hasCaptions ) {
					add(
						'warning',
						block,
						__( 'WCAG 2.2 AA 1.2.2', 'pattern-refresh' ),
						__( 'No caption or subtitle track is attached. Confirm that equivalent media alternatives are provided.', 'pattern-refresh' )
					);
				}
			}

			if ( block.name === 'core/html' ) {
				add(
					'warning',
					block,
					__( 'WCAG 2.2 AA 4.1.2', 'pattern-refresh' ),
					__( 'Custom HTML requires a manual semantics, keyboard and accessible-name review.', 'pattern-refresh' )
				);
			}

			if ( block.name !== 'core/button' && typeof attributes.content === 'string' ) {
				contentLinks( attributes.content ).forEach( function ( link ) {
					if ( ! link.label ) {
						add(
							'error',
							block,
							__( 'WCAG 2.2 AA 2.4.4 and 4.1.2', 'pattern-refresh' ),
							__( 'A link has no accessible name.', 'pattern-refresh' )
						);
					} else if ( vagueLinkText.includes( link.label.toLowerCase() ) ) {
						add(
							'warning',
							block,
							__( 'WCAG 2.2 AA 2.4.4', 'pattern-refresh' ),
							sprintf( __( '“%s” may not explain the link destination when read out of context.', 'pattern-refresh' ), link.label )
						);
					}

					if ( link.target === '_blank' && ! /new (window|tab)/i.test( link.label ) ) {
						add(
							'warning',
							block,
							__( 'WCAG 2.2 AA 3.2.5 advisory', 'pattern-refresh' ),
							__( 'A link opens a new tab without warning in its accessible name or nearby text.', 'pattern-refresh' )
						);
					}
				} );
			}

			const colour = attributes.style && attributes.style.color;

			if ( colour && ( hasLiteralColour( colour.text ) || hasLiteralColour( colour.background ) ) ) {
				add(
					'warning',
					block,
					__( 'WCAG 2.2 AA 1.4.3', 'pattern-refresh' ),
					sprintf( __( 'The %s block uses a custom colour. Check contrast in every state and prefer a tested theme preset.', 'pattern-refresh' ), label )
				);
			}
		} );

		issues.sort( function ( left, right ) {
			return ( left.severity === 'error' ? 0 : 1 ) - ( right.severity === 'error' ? 0 : 1 );
		} );

		return {
			issues: issues,
			errors: issues.filter( function ( issue ) {
				return issue.severity === 'error';
			} ).length,
			warnings: issues.filter( function ( issue ) {
				return issue.severity === 'warning';
			} ).length,
			manualChecks: [
				__( 'Use only a keyboard: confirm logical focus order, visible focus and no keyboard trap.', 'pattern-refresh' ),
				__( 'Test computed text, component and focus-state contrast against WCAG 2.2 AA.', 'pattern-refresh' ),
				__( 'Test zoom and reflow at 400% and a 320 CSS-pixel-wide viewport.', 'pattern-refresh' ),
				__( 'Test the rendered pattern with a screen reader, including landmarks, headings and link purpose.', 'pattern-refresh' ),
				__( 'Check animation, autoplay, captions, transcripts and reduced-motion behavior.', 'pattern-refresh' ),
				__( 'Confirm pointer targets and spacing meet WCAG 2.2 target-size requirements.', 'pattern-refresh' ),
			],
		};
	}

	window.GutenbergToolsQuality = { inspect: inspect };
} )( window, window.wp );
