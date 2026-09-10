( function ( wp, settings ) {
	'use strict';

	if ( ! wp || ! settings ) {
		return;
	}

	const { createElement: el, Fragment, useEffect, useRef, useState } = wp.element;
	const { parse, registerBlockType, serialize } = wp.blocks;
	const { useSelect } = wp.data;
	const {
		BlockControls,
		InnerBlocks,
		InspectorControls,
		useBlockProps,
	} = wp.blockEditor;
	const {
		Button,
		Dropdown,
		Modal,
		Notice,
		PanelBody,
		SelectControl,
		Spinner,
		TextControl,
		TextareaControl,
		ToggleControl,
		ToolbarButton,
		ToolbarGroup,
	} = wp.components;
	const { addFilter } = wp.hooks;
	const { __, sprintf } = wp.i18n;
	const { registerPlugin } = wp.plugins;
	const PluginSidebar = ( wp.editor && wp.editor.PluginSidebar ) || ( wp.editPost && wp.editPost.PluginSidebar );

	const LEGACY_BLOCK_NAME = 'pattern-refresh/instance';
	const LIST_PATH = '/pattern-refresh/v1/patterns';
	const PATTERN_PATH = '/pattern-refresh/v1/pattern';
	const SAVE_PATH = '/pattern-refresh/v1/pattern/save';
	const CREATE_PATH = '/pattern-refresh/v1/pattern/create';
	const STORAGE_PREFIX = 'pattern-refresh:watched:';
	const PREFERENCES_KEY = 'gutenberg-tools:preferences';
	const isEnabled = Boolean( settings.enabled );
	let nextTargetId = 1;
	let lastPatternSlug = readPreferences().selectedPattern || '';
	let quickWatchHandler = null;

	function notice( status, message ) {
		const notices = wp.data.dispatch( 'core/notices' );
		const method = status === 'error' ? 'createErrorNotice' : 'createSuccessNotice';

		if ( notices && notices[ method ] ) {
			notices[ method ]( message, { type: 'snackbar' } );
		}
	}

	function errorMessage( error ) {
		return error && error.message
			? error.message
			: __( 'Gutenberg Tools could not complete the request.', 'pattern-refresh' );
	}

	function fetchPatterns() {
		return wp.apiFetch( { path: LIST_PATH } );
	}

	function fetchPattern( slug ) {
		return wp.apiFetch( {
			path: PATTERN_PATH + '?slug=' + encodeURIComponent( slug ),
		} );
	}

	function savePattern( target, markup ) {
		return wp.apiFetch( {
			path: SAVE_PATH,
			method: 'POST',
			data: {
				slug: target.slug,
				markup: markup,
				fileHash: target.source && target.source.fileHash,
			},
		} );
	}

	function createPattern( details ) {
		return wp.apiFetch( {
			path: CREATE_PATH,
			method: 'POST',
			data: details,
		} );
	}

	function readPreferences() {
		try {
			const stored = window.localStorage.getItem( PREFERENCES_KEY );
			const preferences = stored ? JSON.parse( stored ) : {};
			return preferences && typeof preferences === 'object' ? preferences : {};
		} catch ( error ) {
			return {};
		}
	}

	function savePreference( name, value ) {
		try {
			const preferences = readPreferences();
			preferences[ name ] = value;
			window.localStorage.setItem( PREFERENCES_KEY, JSON.stringify( preferences ) );
		} catch ( error ) {
			// The current editor still works when persistent browser storage is unavailable.
		}
	}

	function storageKey( postId ) {
		return STORAGE_PREFIX + String( postId );
	}

	function readStoredTargets( key ) {
		try {
			let stored = window.localStorage.getItem( key );

			// Move existing 2.x session watches into persistent browser storage once.
			if ( ! stored ) {
				stored = window.sessionStorage.getItem( key );

				if ( stored ) {
					window.localStorage.setItem( key, stored );
					window.sessionStorage.removeItem( key );
				}
			}

			const targets = stored ? JSON.parse( stored ) : [];

			return Array.isArray( targets ) ? targets : [];
		} catch ( error ) {
			return [];
		}
	}

	function topLevelPosition( clientIds ) {
		const rootBlocks = wp.data.select( 'core/block-editor' ).getBlocks();
		const indexes = clientIds.map( function ( clientId ) {
			return rootBlocks.findIndex( function ( block ) {
				return block.clientId === clientId;
			} );
		} ).sort( function ( left, right ) {
			return left - right;
		} );

		if ( ! indexes.length || indexes.some( function ( index ) {
			return index < 0;
		} ) ) {
			return null;
		}

		const contiguous = indexes.every( function ( index, offset ) {
			return index === indexes[ 0 ] + offset;
		} );

		return contiguous ? {
			startIndex: indexes[ 0 ],
			blockCount: indexes.length,
		} : null;
	}

	function persistTargets( key, targets ) {
		const rootBlocks = wp.data.select( 'core/block-editor' ).getBlocks();
		const storedTargets = targets.map( function ( target ) {
			const position = topLevelPosition( target.clientIds );
			const blockNames = position
				? rootBlocks.slice( position.startIndex, position.startIndex + position.blockCount ).map( function ( block ) {
					return block.name;
				} )
				: [];

				return position ? {
				slug: target.slug,
				title: target.title,
				sourceHash: target.sourceHash,
				startIndex: position.startIndex,
				blockCount: position.blockCount,
					blockNames: blockNames,
					source: target.source || {},
				} : null;
		} ).filter( Boolean );

		try {
			if ( storedTargets.length ) {
				window.localStorage.setItem( key, JSON.stringify( storedTargets ) );
			} else {
				window.localStorage.removeItem( key );
			}
		} catch ( error ) {
			// Watching still works for the current page load if browser storage is unavailable.
		}
	}

	function restoreTargets( key ) {
		const rootBlocks = wp.data.select( 'core/block-editor' ).getBlocks();

		return readStoredTargets( key ).map( function ( stored ) {
			const startIndex = Number( stored.startIndex );
			const blockCount = Number( stored.blockCount );

			if (
				typeof stored.slug !== 'string'
				|| typeof stored.title !== 'string'
				|| ! Number.isInteger( startIndex )
				|| ! Number.isInteger( blockCount )
				|| startIndex < 0
				|| blockCount < 1
				|| ! Array.isArray( stored.blockNames )
				|| stored.blockNames.length !== blockCount
				|| stored.blockNames.some( function ( blockName ) {
					return typeof blockName !== 'string' || ! blockName;
				} )
			) {
				return null;
			}

			const blocks = rootBlocks.slice( startIndex, startIndex + blockCount );

			if (
				blocks.length !== blockCount
				|| blocks.some( function ( block, index ) {
					return block.name !== stored.blockNames[ index ];
				} )
			) {
				return null;
			}

			return {
				id: nextTargetId++,
				slug: stored.slug,
				title: stored.title,
					sourceHash: typeof stored.sourceHash === 'string' ? stored.sourceHash : '',
					source: stored.source && typeof stored.source === 'object' ? stored.source : {},
				clientIds: blocks.map( function ( block ) {
					return block.clientId;
				} ),
			};
		} ).filter( Boolean );
	}

	function editorDocuments() {
		const documents = [];
		const seen = [];

		function addDocument( currentDocument ) {
			if ( ! currentDocument || seen.includes( currentDocument ) ) {
				return;
			}

			seen.push( currentDocument );
			documents.push( currentDocument );

			Array.from( currentDocument.querySelectorAll( 'iframe' ) ).forEach( function ( frame ) {
				try {
					addDocument( frame.contentDocument );
				} catch ( error ) {
					// Ignore cross-origin frames; theme editor canvases are same-origin.
				}
			} );
		}

		addDocument( window.document );
		return documents;
	}

	function urlPath( url, baseUrl ) {
		try {
			return new window.URL( url, baseUrl ).pathname;
		} catch ( error ) {
			return '';
		}
	}

	function refreshedStyleUrl( style ) {
		const url = new window.URL( style.url, window.location.href );
		url.searchParams.set( 'pattern-refresh', String( style.hash ).slice( 0, 16 ) );
		return url.toString();
	}

	function refreshPatternStyles( styles ) {
		if ( ! Array.isArray( styles ) || ! styles.length ) {
			return;
		}

		const documents = editorDocuments();

		styles.forEach( function ( style ) {
			if ( ! style || ! style.url || ! style.hash ) {
				return;
			}

			const nextUrl = refreshedStyleUrl( style );
			const expectedPath = urlPath( style.url, window.location.href );
			let matches = 0;

			documents.forEach( function ( currentDocument ) {
				Array.from( currentDocument.querySelectorAll( 'link[rel~="stylesheet"][href]' ) ).forEach( function ( link ) {
					if ( urlPath( link.href, currentDocument.baseURI ) === expectedPath ) {
						matches++;
						if ( link.href !== nextUrl ) {
							link.href = nextUrl;
						}
					}
				} );
			} );

			if ( ! matches ) {
				const canvasDocument = documents[ 1 ] || documents[ 0 ];

				if ( ! canvasDocument || ! canvasDocument.head ) {
					return;
				}

				const link = canvasDocument.createElement( 'link' );
				link.rel = 'stylesheet';
				link.href = nextUrl;
				link.setAttribute( 'data-pattern-refresh-style', expectedPath );
				canvasDocument.head.appendChild( link );
			}
		} );
	}

	function sourceBlocks( source ) {
		const blocks = parse( source.content );

		if ( ! blocks.length ) {
			throw new Error( __( 'The selected theme pattern did not contain any valid blocks.', 'pattern-refresh' ) );
		}

		return blocks;
	}

	function sourceFilePath( source ) {
		if ( ! source || ! source.file ) {
			return '';
		}

		return source.file;
	}

	function sourceLocation( source ) {
		const file = sourceFilePath( source );

		if ( ! file ) {
			return __( 'Source location unavailable', 'pattern-refresh' );
		}

		if ( source.startLine && source.endLine ) {
			return sprintf(
				/* translators: 1: source file, 2: first markup line, 3: last markup line. */
				__( '%1$s, lines %2$d–%3$d', 'pattern-refresh' ),
				file,
				source.startLine,
				source.endLine
			);
		}

		return file;
	}

	function topLevelBlocks( clientIds ) {
		const position = topLevelPosition( clientIds );

		if ( ! position ) {
			throw new Error( __( 'Select one or more adjacent top-level blocks from the pattern.', 'pattern-refresh' ) );
		}

		return wp.data.select( 'core/block-editor' ).getBlocks().slice(
			position.startIndex,
			position.startIndex + position.blockCount
		);
	}

	function indentMarkup( markup, depth ) {
		const indentation = '    '.repeat( depth );

		return markup.split( /(<!--\s*\/?wp:.*?-->)/gs ).map( function ( part ) {
			return part.trim();
		} ).filter( Boolean ).map( function ( part ) {
			return indentation + part;
		} ).join( '\n' );
	}

	function formatBlockMarkup( block, depth ) {
		const markup = serialize( [ block ] ).trim();
		const innerBlocks = Array.isArray( block.innerBlocks ) ? block.innerBlocks : [];

		if ( ! innerBlocks.length ) {
			return indentMarkup( markup, depth );
		}

		const innerMarkup = serialize( innerBlocks ).trim();
		const innerPosition = markup.indexOf( innerMarkup );

		// Some dynamic blocks do not serialize their inner blocks in the usual place.
		if ( ! innerMarkup || innerPosition < 0 ) {
			return indentMarkup( markup, depth );
		}

		const before = indentMarkup( markup.slice( 0, innerPosition ), depth );
		const children = innerBlocks.map( function ( innerBlock ) {
			return formatBlockMarkup( innerBlock, depth + 1 );
		} ).join( '\n\n' );
		const after = indentMarkup( markup.slice( innerPosition + innerMarkup.length ), depth );

		return [ before, children, after ].filter( Boolean ).join( '\n\n' );
	}

	function serializeBlocks( blocks ) {
		return blocks.map( function ( block ) {
			return formatBlockMarkup( block, 0 );
		} ).join( '\n\n' );
	}

	function simpleLineOperations( before, after ) {
		let firstDifferent = 0;
		let beforeEnd = before.length - 1;
		let afterEnd = after.length - 1;

		while ( firstDifferent <= beforeEnd && firstDifferent <= afterEnd && before[ firstDifferent ] === after[ firstDifferent ] ) {
			firstDifferent++;
		}

		while ( beforeEnd >= firstDifferent && afterEnd >= firstDifferent && before[ beforeEnd ] === after[ afterEnd ] ) {
			beforeEnd--;
			afterEnd--;
		}

		return before.slice( 0, firstDifferent ).map( function ( line ) {
			return { type: 'same', line: line };
		} ).concat(
			before.slice( firstDifferent, beforeEnd + 1 ).map( function ( line ) {
				return { type: 'remove', line: line };
			} ),
			after.slice( firstDifferent, afterEnd + 1 ).map( function ( line ) {
				return { type: 'add', line: line };
			} ),
			before.slice( beforeEnd + 1 ).map( function ( line ) {
				return { type: 'same', line: line };
			} )
		);
	}

	/**
	 * Build a small line diff without adding a package or build step.
	 */
	function lineOperations( beforeCode, afterCode ) {
		const before = beforeCode.replace( /\r\n?/g, '\n' ).split( '\n' );
		const after = afterCode.replace( /\r\n?/g, '\n' ).split( '\n' );

		// Avoid a large in-browser matrix for unusually big patterns.
		if ( before.length * after.length > 2000000 ) {
			return simpleLineOperations( before, after );
		}

		const lengths = Array.from( { length: before.length + 1 }, function () {
			return new Uint32Array( after.length + 1 );
		} );

		for ( let beforeIndex = before.length - 1; beforeIndex >= 0; beforeIndex-- ) {
			for ( let afterIndex = after.length - 1; afterIndex >= 0; afterIndex-- ) {
				lengths[ beforeIndex ][ afterIndex ] = before[ beforeIndex ] === after[ afterIndex ]
					? lengths[ beforeIndex + 1 ][ afterIndex + 1 ] + 1
					: Math.max( lengths[ beforeIndex + 1 ][ afterIndex ], lengths[ beforeIndex ][ afterIndex + 1 ] );
			}
		}

		const operations = [];
		let beforeIndex = 0;
		let afterIndex = 0;

		while ( beforeIndex < before.length && afterIndex < after.length ) {
			if ( before[ beforeIndex ] === after[ afterIndex ] ) {
				operations.push( { type: 'same', line: before[ beforeIndex ] } );
				beforeIndex++;
				afterIndex++;
			} else if ( lengths[ beforeIndex + 1 ][ afterIndex ] >= lengths[ beforeIndex ][ afterIndex + 1 ] ) {
				operations.push( { type: 'remove', line: before[ beforeIndex++ ] } );
			} else {
				operations.push( { type: 'add', line: after[ afterIndex++ ] } );
			}
		}

		while ( beforeIndex < before.length ) {
			operations.push( { type: 'remove', line: before[ beforeIndex++ ] } );
		}

		while ( afterIndex < after.length ) {
			operations.push( { type: 'add', line: after[ afterIndex++ ] } );
		}

		return operations;
	}

	function makeChangeReport( source, beforeCode, afterCode ) {
		if ( beforeCode === afterCode ) {
			return '';
		}

		let oldLine = 1;
		let newLine = 1;
		const operations = lineOperations( beforeCode, afterCode ).map( function ( operation ) {
			const numbered = {
				...operation,
				oldLine: oldLine,
				newLine: newLine,
			};

			if ( operation.type !== 'add' ) {
				oldLine++;
			}

			if ( operation.type !== 'remove' ) {
				newLine++;
			}

			return numbered;
		} );
		const context = 3;
		const hunks = [];
		let searchFrom = 0;

		while ( searchFrom < operations.length ) {
			const firstChange = operations.findIndex( function ( operation, index ) {
				return index >= searchFrom && operation.type !== 'same';
			} );

			if ( firstChange < 0 ) {
				break;
			}

			let lastChange = firstChange;

			for ( let index = firstChange + 1; index < operations.length; index++ ) {
				if ( operations[ index ].type !== 'same' ) {
					if ( index - lastChange > context * 2 + 1 ) {
						break;
					}

					lastChange = index;
				}
			}

			const start = Math.max( 0, firstChange - context );
			const end = Math.min( operations.length, lastChange + context + 1 );
			hunks.push( operations.slice( start, end ) );
			searchFrom = end;
		}

		const report = [
			sprintf( __( 'Pattern: %s', 'pattern-refresh' ), source.name ),
			sprintf( __( 'Source: %s', 'pattern-refresh' ), sourceLocation( source.source ) ),
			__( 'Note: this is a normalised Gutenberg change report for manual review, not an automatic patch.', 'pattern-refresh' ),
			'',
			'--- ' + source.name + ' (theme source)',
			'+++ ' + source.name + ' (CMS edits)',
		];

		hunks.forEach( function ( hunk ) {
			const oldCount = hunk.filter( function ( operation ) {
				return operation.type !== 'add';
			} ).length;
			const newCount = hunk.filter( function ( operation ) {
				return operation.type !== 'remove';
			} ).length;

			report.push(
				'@@ -' + hunk[ 0 ].oldLine + ',' + oldCount + ' +' + hunk[ 0 ].newLine + ',' + newCount + ' @@'
			);

			hunk.forEach( function ( operation ) {
				const marker = operation.type === 'add' ? '+' : operation.type === 'remove' ? '-' : ' ';
				report.push( marker + operation.line );
			} );
		} );

		return report.join( '\n' );
	}

	async function copyText( value ) {
		if ( window.navigator.clipboard && window.isSecureContext ) {
			try {
				await window.navigator.clipboard.writeText( value );
				return;
			} catch ( error ) {
				// Fall through to the browser-compatible textarea method.
			}
		}

		const textarea = window.document.createElement( 'textarea' );
		const previousFocus = window.document.activeElement;
		textarea.value = value;
		textarea.setAttribute( 'readonly', '' );
		textarea.style.position = 'fixed';
		textarea.style.opacity = '0';
		window.document.body.appendChild( textarea );
		textarea.select();

		try {
			if ( ! window.document.execCommand( 'copy' ) ) {
				throw new Error( __( 'The browser did not allow clipboard access.', 'pattern-refresh' ) );
			}
		} finally {
			textarea.remove();

			if ( previousFocus && typeof previousFocus.focus === 'function' ) {
				previousFocus.focus();
			}
		}
	}

	function buildExport( source, blocks ) {
		const originalCode = serializeBlocks( sourceBlocks( source ) );
		const currentCode = serializeBlocks( blocks );

		return {
			source: source,
			currentCode: currentCode,
			changeReport: makeChangeReport( source, originalCode, currentCode ),
		};
	}

	function ExportModal( props ) {
		const { exportData, onClose } = props;
		const source = exportData.source;

		async function copy( value, message ) {
			try {
				await copyText( value );
				notice( 'success', message );
			} catch ( error ) {
				notice( 'error', errorMessage( error ) );
			}
		}

		return el(
			Modal,
			{
				title: sprintf( __( 'Review edits for %s', 'pattern-refresh' ), source.title ),
				onRequestClose: onClose,
				className: 'pattern-refresh-export-modal',
			},
			el(
				'p',
				{ className: 'pattern-refresh-export-modal__source' },
				el( 'strong', null, __( 'Source: ', 'pattern-refresh' ) ),
				el( 'code', null, sourceLocation( source.source ) )
			),
			source.source && source.source.dynamicPhp && el(
				Notice,
				{ status: 'warning', isDismissible: false },
				__( 'This pattern contains PHP. WordPress can only export its rendered block markup, so retain translation calls, dynamic URLs, and other PHP when merging the edits.', 'pattern-refresh' )
			),
			el(
				Notice,
				{ status: 'info', isDismissible: false },
				__( 'The file and pattern line range are exact. Change-report hunk numbers refer to normalised Gutenberg markup.', 'pattern-refresh' )
			),
			el( 'h3', null, __( 'Complete block markup', 'pattern-refresh' ) ),
			el(
				'p',
				null,
				__( 'Copy the complete current pattern. It contains Gutenberg block comments and generated HTML, but not the PHP file header.', 'pattern-refresh' )
			),
			el(
				Button,
				{
					variant: 'primary',
					onClick: function () {
						copy(
							exportData.currentCode,
							__( 'Copied the complete block markup.', 'pattern-refresh' )
						);
					},
				},
				__( 'Copy complete block markup', 'pattern-refresh' )
			),
			el( TextareaControl, {
				label: __( 'Complete block markup preview', 'pattern-refresh' ),
				value: exportData.currentCode,
				rows: 10,
				readOnly: true,
				onChange: function () {},
			} ),
			el( 'h3', null, __( 'Only the changes', 'pattern-refresh' ) ),
			exportData.changeReport
				? el(
					Fragment,
					null,
					el(
						'p',
						null,
						__( 'Copy a human-readable comparison with only the changed areas and three lines of context.', 'pattern-refresh' )
					),
					el(
						Button,
						{
							variant: 'secondary',
							onClick: function () {
								copy(
									exportData.changeReport,
									__( 'Copied the change report.', 'pattern-refresh' )
								);
							},
						},
						__( 'Copy change report', 'pattern-refresh' )
					),
					el( TextareaControl, {
						label: __( 'Change report preview', 'pattern-refresh' ),
						value: exportData.changeReport,
						rows: 12,
						readOnly: true,
						onChange: function () {},
					} )
				)
				: el(
					Notice,
					{ status: 'success', isDismissible: false },
					__( 'The selected blocks match the current theme pattern markup.', 'pattern-refresh' )
				)
		);
	}

	function slugify( value ) {
		return String( value || '' )
			.toLowerCase()
			.trim()
			.replace( /[^a-z0-9]+/g, '-' )
			.replace( /^-+|-+$/g, '' );
	}

	function CreatePatternModal( props ) {
		const { blocks, onClose, onCreated } = props;
		const [ title, setTitle ] = useState( '' );
		const [ slug, setSlug ] = useState( '' );
		const [ slugEdited, setSlugEdited ] = useState( false );
		const [ categories, setCategories ] = useState( 'featured' );
		const [ description, setDescription ] = useState( '' );
		const [ working, setWorking ] = useState( false );

		async function submit( event ) {
			event.preventDefault();

			if ( ! title.trim() || ! slug.trim() ) {
				notice( 'error', __( 'Enter a pattern title and slug.', 'pattern-refresh' ) );
				return;
			}

			setWorking( true );

			try {
				const source = await createPattern( {
					title: title.trim(),
					slug: slugify( slug ),
					categories: categories,
					description: description.trim(),
					markup: serializeBlocks( blocks ),
				} );

				onCreated( source );
				onClose();
			} catch ( error ) {
				notice( 'error', errorMessage( error ) );
			} finally {
				setWorking( false );
			}
		}

		return el(
			Modal,
			{
				title: __( 'Create pattern from selection', 'pattern-refresh' ),
				onRequestClose: onClose,
				className: 'gutenberg-tools-create-modal',
			},
			el(
				'form',
				{ onSubmit: submit },
				el( TextControl, {
					label: __( 'Pattern title', 'pattern-refresh' ),
					value: title,
					onChange: function ( value ) {
						setTitle( value );

						if ( ! slugEdited ) {
							setSlug( slugify( value ) );
						}
					},
					required: true,
				} ),
				el( TextControl, {
					label: __( 'File slug', 'pattern-refresh' ),
					help: __( 'Creates patterns/{slug}.php in the active theme.', 'pattern-refresh' ),
					value: slug,
					onChange: function ( value ) {
						setSlugEdited( true );
						setSlug( slugify( value ) );
					},
					required: true,
				} ),
				el( TextControl, {
					label: __( 'Categories', 'pattern-refresh' ),
					help: __( 'Comma-separated WordPress pattern categories.', 'pattern-refresh' ),
					value: categories,
					onChange: setCategories,
				} ),
				el( TextareaControl, {
					label: __( 'Description', 'pattern-refresh' ),
					help: __( 'Recommended: WordPress exposes the pattern description to screen-reader users.', 'pattern-refresh' ),
					value: description,
					onChange: setDescription,
					rows: 3,
				} ),
				el(
					Notice,
					{ status: 'info', isDismissible: false },
					__( 'The new file uses the active theme namespace and is linked to the selected blocks. Reload the editor to also show it in the core pattern inserter.', 'pattern-refresh' )
				),
				el(
					Button,
					{
						variant: 'primary',
						type: 'submit',
						disabled: working || ! title.trim() || ! slug.trim(),
					},
					working ? __( 'Creating…', 'pattern-refresh' ) : __( 'Create and link pattern', 'pattern-refresh' )
				)
			)
		);
	}

	function QualityChecks( props ) {
		const { selectedBlocks, allBlocks } = props;
		const inspector = window.GutenbergToolsQuality;

		if ( ! inspector || typeof inspector.inspect !== 'function' ) {
			return null;
		}

		const report = selectedBlocks.length
			? inspector.inspect( selectedBlocks, allBlocks )
			: null;
		const title = report
			? sprintf(
				/* translators: 1: error count, 2: warning count. */
				__( 'Quality checks: %1$d errors, %2$d warnings', 'pattern-refresh' ),
				report.errors,
				report.warnings
			)
			: __( 'Pattern quality checks', 'pattern-refresh' );

		return el(
			PanelBody,
			{ title: title, initialOpen: Boolean( report && report.issues.length ) },
			report && el(
				'p',
				{ className: 'screen-reader-text', role: 'status', 'aria-live': 'polite' },
				sprintf(
					/* translators: 1: error count, 2: warning count. */
					__( 'Pattern quality results: %1$d errors and %2$d warnings.', 'pattern-refresh' ),
					report.errors,
					report.warnings
				)
			),
			! report && el(
				'p',
				null,
				__( 'Select one or more blocks to run WordPress and WCAG 2.2 AA checks.', 'pattern-refresh' )
			),
			report && ! report.issues.length && el(
				Notice,
				{ status: 'success', isDismissible: false },
				__( 'No automated issues were found in this selection.', 'pattern-refresh' )
			),
			report && Boolean( report.issues.length ) && el(
				'ul',
				{ className: 'gutenberg-tools-quality__issues' },
				report.issues.map( function ( issue, index ) {
					return el(
						'li',
						{
							className: 'gutenberg-tools-quality__issue is-' + issue.severity,
							key: issue.clientId + '-' + issue.criterion + '-' + index,
						},
						el(
							'strong',
							null,
							issue.severity === 'error'
								? __( 'Error', 'pattern-refresh' )
								: __( 'Warning', 'pattern-refresh' ),
							': ',
							issue.block
						),
						el( 'span', { className: 'gutenberg-tools-quality__criterion' }, issue.criterion ),
						el( 'p', null, issue.message ),
						issue.clientId && el(
							Button,
							{
								variant: 'link',
								onClick: function () {
									wp.data.dispatch( 'core/block-editor' ).selectBlock( issue.clientId );
								},
							},
							__( 'Select block', 'pattern-refresh' )
						)
					);
				} )
			),
			report && el(
				'details',
				{ className: 'gutenberg-tools-quality__manual' },
				el( 'summary', null, __( 'Required manual accessibility checks', 'pattern-refresh' ) ),
				el(
					'p',
					null,
					__( 'Automated checks cannot certify WCAG conformance. Complete these checks on the rendered front end:', 'pattern-refresh' )
				),
				el(
					'ul',
					null,
					report.manualChecks.map( function ( check ) {
						return el( 'li', { key: check }, check );
					} )
				)
			)
		);
	}

	function findLegacyInstances( blocks ) {
		const instances = [];

		function walk( currentBlocks ) {
			currentBlocks.forEach( function ( block ) {
				if ( block.name === LEGACY_BLOCK_NAME ) {
					instances.push( block );
				}

				if ( block.innerBlocks && block.innerBlocks.length ) {
					walk( block.innerBlocks );
				}
			} );
		}

		walk( blocks );
		return instances;
	}

	function currentLegacyInstances() {
		return findLegacyInstances( wp.data.select( 'core/block-editor' ).getBlocks() );
	}

	function detachLegacyInstance( clientId ) {
		const editor = wp.data.select( 'core/block-editor' );
		const block = editor.getBlock( clientId );

		if ( block ) {
			wp.data.dispatch( 'core/block-editor' ).replaceBlocks( clientId, block.innerBlocks );
		}
	}

	function LegacyLinkedPatternEdit( props ) {
		const { attributes, clientId } = props;
		const label = attributes.slug
			? sprintf( __( 'Old link: %s', 'pattern-refresh' ), attributes.slug )
			: __( 'Old Pattern Refresh link', 'pattern-refresh' );
		const blockProps = useBlockProps( {
			'data-pattern-refresh-label': label,
		} );

		return el(
			Fragment,
			null,
			el(
				BlockControls,
				null,
				el(
					ToolbarGroup,
					null,
					el( ToolbarButton, {
						icon: 'editor-unlink',
						label: __( 'Convert to ordinary blocks', 'pattern-refresh' ),
						onClick: function () {
							detachLegacyInstance( clientId );
						},
					} )
				)
			),
			el(
				InspectorControls,
				null,
				el(
					PanelBody,
					{
						title: __( 'Old Pattern Refresh link', 'pattern-refresh' ),
						initialOpen: true,
					},
					el(
						Notice,
						{ status: 'info', isDismissible: false },
						__( 'This wrapper came from Pattern Refresh 1.x. Convert it to keep the current content as ordinary blocks.', 'pattern-refresh' )
					),
					el(
						Button,
						{
							variant: 'primary',
							onClick: function () {
								detachLegacyInstance( clientId );
							},
						},
						__( 'Convert to ordinary blocks', 'pattern-refresh' )
					)
				)
			),
			el( 'div', blockProps, el( InnerBlocks, { renderAppender: false } ) )
		);
	}

	// Version 2 never creates this block. It remains registered only so 1.x content can be unwrapped safely.
	registerBlockType( LEGACY_BLOCK_NAME, {
		apiVersion: 3,
		title: __( 'Legacy Linked Pattern', 'pattern-refresh' ),
		category: 'design',
		icon: 'editor-unlink',
		description: __( 'A Pattern Refresh 1.x wrapper retained for content migration.', 'pattern-refresh' ),
		attributes: {
			slug: { type: 'string', default: '' },
			sourceHash: { type: 'string', default: '' },
			autoRefresh: { type: 'boolean', default: true },
		},
		supports: {
			html: false,
			inserter: false,
			reusable: false,
		},
		edit: LegacyLinkedPatternEdit,
		save: function () {
			return el( InnerBlocks.Content );
		},
	} );

	function targetExists( target ) {
		return Boolean( topLevelPosition( target.clientIds ) );
	}

	function blocksExist( blocks ) {
		const editor = wp.data.select( 'core/block-editor' );
		return blocks.length && blocks.every( function ( block ) {
			return Boolean( editor.getBlock( block.clientId ) );
		} );
	}

	function targetFromSource( source, blocks ) {
		const clientIds = blocks.map( function ( block ) {
			return block.clientId;
		} );
		const position = topLevelPosition( clientIds );

		if ( ! position ) {
			throw new Error( __( 'Gutenberg Tools could not locate those blocks at the top level of the page.', 'pattern-refresh' ) );
		}

		return {
			id: nextTargetId++,
			slug: source.name,
			title: source.title,
			sourceHash: source.hash,
			source: source.source || {},
			clientIds: clientIds,
		};
	}

	function addWatchTarget( setTargets, source, blocks, replacedClientIds ) {
		const nextTarget = targetFromSource( source, blocks );

		setTargets( function ( currentTargets ) {
			return currentTargets.filter( function ( target ) {
				return ! target.clientIds.some( function ( clientId ) {
					return replacedClientIds.includes( clientId );
				} );
			} ).concat( nextTarget );
		} );
	}

	async function resetTargets( targets, setTargets, showNotice ) {
		const activeTargets = targets.filter( targetExists );
		const slugs = [ ...new Set( activeTargets.map( function ( target ) {
			return target.slug;
		} ) ) ];
		const sources = await Promise.all( slugs.map( fetchPattern ) );
		const sourceBySlug = {};
		const replacements = {};

		sources.forEach( function ( source ) {
			sourceBySlug[ source.name ] = source;
			refreshPatternStyles( source.styles );
		} );

		activeTargets.forEach( function ( target ) {
			const source = sourceBySlug[ target.slug ];

			if ( ! source ) {
				return;
			}

			const nextBlocks = sourceBlocks( source );
			wp.data.dispatch( 'core/block-editor' ).replaceBlocks( target.clientIds, nextBlocks );

			if ( ! blocksExist( nextBlocks ) ) {
				throw new Error( __( 'WordPress could not replace that watched selection at its current location.', 'pattern-refresh' ) );
			}

				replacements[ target.id ] = {
					...target,
					sourceHash: source.hash,
					source: source.source || {},
				clientIds: nextBlocks.map( function ( block ) {
					return block.clientId;
				} ),
			};
		} );

		setTargets( function ( currentTargets ) {
			return currentTargets.map( function ( target ) {
				return replacements[ target.id ] || target;
			} );
		} );

		const refreshed = Object.keys( replacements ).length;

		if ( showNotice && refreshed ) {
			notice(
				'success',
				sprintf(
					/* translators: %d: number of watched selections reset. */
					__( 'Reset %d watched selection(s) from the theme.', 'pattern-refresh' ),
					refreshed
				)
			);
		}

		return refreshed;
	}

	function QuickWatchMenu( props ) {
		const { clientId, onClose } = props;
		const [ patterns, setPatterns ] = useState( [] );
		const [ selectedSlug, setSelectedSlug ] = useState( lastPatternSlug );
		const [ loading, setLoading ] = useState( true );
		const [ working, setWorking ] = useState( false );

		useEffect( function () {
			let mounted = true;

			fetchPatterns()
				.then( function ( nextPatterns ) {
					if ( ! mounted ) {
						return;
					}

					const preferredSlug = nextPatterns.some( function ( pattern ) {
						return pattern.name === lastPatternSlug;
					} )
						? lastPatternSlug
						: ( nextPatterns[ 0 ] && nextPatterns[ 0 ].name ) || '';

					lastPatternSlug = preferredSlug;
					savePreference( 'selectedPattern', preferredSlug );
					setPatterns( nextPatterns );
					setSelectedSlug( preferredSlug );
				} )
				.catch( function ( error ) {
					notice( 'error', errorMessage( error ) );
				} )
				.finally( function () {
					if ( mounted ) {
						setLoading( false );
					}
				} );

			return function () {
				mounted = false;
			};
		}, [] );

		async function watchBlock() {
			if ( ! selectedSlug || ! quickWatchHandler ) {
				return;
			}

			setWorking( true );

			try {
				await quickWatchHandler( clientId, selectedSlug );
				onClose();
			} catch ( error ) {
				notice( 'error', errorMessage( error ) );
			} finally {
				setWorking( false );
			}
		}

		const selectedPattern = patterns.find( function ( pattern ) {
			return pattern.name === selectedSlug;
		} );
		const options = patterns.map( function ( pattern ) {
			return { label: pattern.title, value: pattern.name };
		} );

		return el(
			'div',
			{ className: 'pattern-refresh-quick-watch__menu' },
			el( 'h3', null, __( 'Watch this block', 'pattern-refresh' ) ),
			el(
				'p',
				null,
				__( 'Choose the matching theme pattern. The current CMS block will not be reset.', 'pattern-refresh' )
			),
			loading && el( Spinner ),
			! loading && ! patterns.length && el(
				Notice,
				{ status: 'info', isDismissible: false },
				__( 'No file-based theme patterns were found.', 'pattern-refresh' )
			),
			! loading && Boolean( patterns.length ) && el(
				Fragment,
				null,
				el( SelectControl, {
					label: __( 'Watch block as', 'pattern-refresh' ),
					value: selectedSlug,
					options: options,
					onChange: function ( nextSlug ) {
						lastPatternSlug = nextSlug;
						savePreference( 'selectedPattern', nextSlug );
						setSelectedSlug( nextSlug );
					},
				} ),
				selectedPattern && el(
					'code',
					{ className: 'pattern-refresh-quick-watch__source' },
					sourceLocation( selectedPattern.source )
				),
				el(
					'p',
					{ className: 'pattern-refresh-quick-watch__help' },
					__( 'A later change to the pattern file or its CSS will reset this watched block.', 'pattern-refresh' )
				),
				el(
					Button,
					{
						variant: 'primary',
						disabled: working || ! selectedSlug,
						onClick: watchBlock,
					},
					working ? __( 'Watching…', 'pattern-refresh' ) : __( 'Watch this block', 'pattern-refresh' )
				)
			)
		);
	}

	function withQuickWatch( BlockEdit ) {
		return function QuickWatchBlockEdit( props ) {
			const isTopLevel = useSelect( function ( select ) {
				return ! select( 'core/block-editor' ).getBlockRootClientId( props.clientId );
			}, [ props.clientId ] );

			return el(
				Fragment,
				null,
				el( BlockEdit, props ),
				isEnabled && isTopLevel && props.isSelected && props.name !== LEGACY_BLOCK_NAME && el(
					BlockControls,
					null,
					el(
						ToolbarGroup,
						null,
						el( Dropdown, {
							className: 'pattern-refresh-quick-watch',
							contentClassName: 'pattern-refresh-quick-watch__popover',
							popoverProps: { placement: 'bottom-start' },
							renderToggle: function ( toggleProps ) {
								return el( ToolbarButton, {
									icon: 'update',
									label: __( 'Watch with Gutenberg Tools', 'pattern-refresh' ),
									isPressed: toggleProps.isOpen,
									onClick: toggleProps.onToggle,
								} );
							},
							renderContent: function ( contentProps ) {
								return el( QuickWatchMenu, {
									clientId: props.clientId,
									onClose: contentProps.onClose,
								} );
							},
						} )
					)
				)
			);
		};
	}

	function PatternRefreshSidebar( props ) {
		const { targets, setTargets, writeBackEnabled, setWriteBackEnabled } = props;
		const [ patterns, setPatterns ] = useState( [] );
		const [ selectedSlug, setSelectedSlug ] = useState( '' );
		const [ loading, setLoading ] = useState( isEnabled );
		const [ working, setWorking ] = useState( false );
		const [ exportData, setExportData ] = useState( null );
		const [ createBlocks, setCreateBlocks ] = useState( null );
		const selectedBlocks = useSelect( function ( select ) {
			const editor = select( 'core/block-editor' );
			const multiple = editor.getMultiSelectedBlockClientIds();
			const clientIds = multiple.length
				? multiple
				: [ editor.getSelectedBlockClientId() ].filter( Boolean );

			return clientIds.map( function ( clientId ) {
				return editor.getBlock( clientId );
			} ).filter( Boolean );
		}, [] );
		const allBlocks = useSelect( function ( select ) {
			return select( 'core/block-editor' ).getBlocks();
		}, [] );
		const selectedClientIds = selectedBlocks.map( function ( block ) {
			return block.clientId;
		} );
		const legacyCount = useSelect( function ( select ) {
			return findLegacyInstances( select( 'core/block-editor' ).getBlocks() ).length;
		}, [] );

		useEffect( function () {
			if ( ! isEnabled ) {
				return undefined;
			}

			let mounted = true;

			fetchPatterns()
				.then( function ( nextPatterns ) {
					if ( ! mounted ) {
						return;
					}

					setPatterns( nextPatterns );
					setSelectedSlug( function ( current ) {
						const preferred = nextPatterns.find( function ( pattern ) {
							return pattern.name === ( current || lastPatternSlug );
						} );
						const nextSlug = ( preferred && preferred.name )
							|| ( nextPatterns[ 0 ] && nextPatterns[ 0 ].name )
							|| '';

						lastPatternSlug = nextSlug;
						savePreference( 'selectedPattern', nextSlug );
						return nextSlug;
					} );
				} )
				.catch( function ( error ) {
					notice( 'error', errorMessage( error ) );
				} )
				.finally( function () {
					if ( mounted ) {
						setLoading( false );
					}
				} );

			return function () {
				mounted = false;
			};
		}, [] );

		async function run( callback ) {
			setWorking( true );

			try {
				await callback();
			} catch ( error ) {
				notice( 'error', errorMessage( error ) );
			} finally {
				setWorking( false );
			}
		}

		function reviewBlocks( slug, clientIds ) {
			return run( async function () {
				if ( ! clientIds.length ) {
					throw new Error( __( 'Select one or more blocks on the page first.', 'pattern-refresh' ) );
				}

				const source = await fetchPattern( slug );
				setExportData( buildExport( source, topLevelBlocks( clientIds ) ) );
			} );
		}

		function reviewSelection() {
			return reviewBlocks( selectedSlug, selectedClientIds );
		}

		function reviewTarget( target ) {
			if ( ! targetExists( target ) ) {
				setTargets( function ( currentTargets ) {
					return currentTargets.filter( function ( current ) {
						return current.id !== target.id;
					} );
				} );
				notice( 'error', __( 'That watched selection no longer exists in the document. Reselect its current top-level blocks to review them.', 'pattern-refresh' ) );
				return;
			}

			return reviewBlocks( target.slug, target.clientIds );
		}

		function watchSelection() {
			return run( async function () {
				if ( ! selectedClientIds.length ) {
					throw new Error( __( 'Select one or more blocks on the page first.', 'pattern-refresh' ) );
				}

				const selectedBlocks = topLevelBlocks( selectedClientIds );
				const replaceClientIds = selectedBlocks.map( function ( block ) {
					return block.clientId;
				} );

				const source = await fetchPattern( selectedSlug );
				refreshPatternStyles( source.styles );
				const nextBlocks = sourceBlocks( source );
				wp.data.dispatch( 'core/block-editor' ).replaceBlocks( replaceClientIds, nextBlocks );

				if ( ! blocksExist( nextBlocks ) ) {
					throw new Error( __( 'WordPress could not replace the selected blocks.', 'pattern-refresh' ) );
				}

				addWatchTarget( setTargets, source, nextBlocks, replaceClientIds );
				notice( 'success', __( 'Selection reset and watched. This browser will remember the watch until you stop it.', 'pattern-refresh' ) );
			} );
		}

		function insertAndWatch() {
			return run( async function () {
				const source = await fetchPattern( selectedSlug );
				refreshPatternStyles( source.styles );
				const nextBlocks = sourceBlocks( source );
				wp.data.dispatch( 'core/block-editor' ).insertBlocks( nextBlocks );

				if ( ! blocksExist( nextBlocks ) ) {
					throw new Error( __( 'WordPress could not insert that pattern at the current location.', 'pattern-refresh' ) );
				}

				addWatchTarget( setTargets, source, nextBlocks, [] );
				notice( 'success', __( 'Inserted ordinary blocks and started a persistent browser watch.', 'pattern-refresh' ) );
			} );
		}

		function openCreatePattern() {
			try {
				if ( ! selectedClientIds.length ) {
					throw new Error( __( 'Select one or more blocks on the page first.', 'pattern-refresh' ) );
				}

				setCreateBlocks( topLevelBlocks( selectedClientIds ) );
			} catch ( error ) {
				notice( 'error', errorMessage( error ) );
			}
		}

		function patternCreated( source ) {
			const clientIds = createBlocks.map( function ( block ) {
				return block.clientId;
			} );
			let linked = true;

			try {
				addWatchTarget( setTargets, source, createBlocks, clientIds );
			} catch ( error ) {
				linked = false;
				notice(
					'error',
					sprintf(
						/* translators: 1: created file, 2: linking error. */
						__( 'Created %1$s, but the selection could not be linked: %2$s', 'pattern-refresh' ),
						source.source.file,
						errorMessage( error )
					)
				);
			}
			setPatterns( function ( currentPatterns ) {
				return currentPatterns.filter( function ( pattern ) {
					return pattern.name !== source.name;
				} ).concat( source ).sort( function ( left, right ) {
					return left.title.localeCompare( right.title );
				} );
			} );
			setSelectedSlug( source.name );
			lastPatternSlug = source.name;
			savePreference( 'selectedPattern', source.name );
			if ( linked ) {
				notice(
					'success',
					sprintf(
						/* translators: %s: theme-relative pattern file. */
						__( 'Created and linked %s. Reload the editor to add it to the core pattern inserter.', 'pattern-refresh' ),
						source.source.file
					)
				);
			}
		}

		function resetTarget( target ) {
			return run( async function () {
				if ( ! targetExists( target ) ) {
					setTargets( function ( currentTargets ) {
						return currentTargets.filter( function ( current ) {
							return current.id !== target.id;
						} );
					} );
					throw new Error( __( 'That watched selection no longer exists in the document.', 'pattern-refresh' ) );
				}

				await resetTargets( [ target ], setTargets, true );
			} );
		}

		function stopWatching( target ) {
			setTargets( function ( currentTargets ) {
				return currentTargets.filter( function ( current ) {
					return current.id !== target.id;
				} );
			} );
			notice( 'success', __( 'Stopped watching. The ordinary page blocks were not changed.', 'pattern-refresh' ) );
		}

		function detachAllLegacy() {
			const instances = currentLegacyInstances().reverse();

			instances.forEach( function ( instance ) {
				detachLegacyInstance( instance.clientId );
			} );

			notice(
				'success',
				sprintf(
					/* translators: %d: number of old wrappers removed. */
					__( 'Converted %d old linked instance(s) to ordinary blocks. Update the page to save this migration.', 'pattern-refresh' ),
					instances.length
				)
			);
		}

		const options = patterns.map( function ( pattern ) {
			return { label: pattern.title, value: pattern.name };
		} );
		const selectedPattern = patterns.find( function ( pattern ) {
			return pattern.name === selectedSlug;
		} );

		return el(
			PluginSidebar,
			{
				name: 'pattern-refresh-sidebar',
				title: __( 'Gutenberg Tools', 'pattern-refresh' ),
				icon: 'update',
			},
			el(
				'div',
				{ className: 'pattern-refresh-sidebar' },
				! isEnabled && el(
					Notice,
					{ status: 'warning', isDismissible: false },
					sprintf(
						/* translators: %s: WordPress environment type. */
						__( 'Gutenberg Tools is disabled in the %s environment.', 'pattern-refresh' ),
						settings.environment
					)
				),
				Boolean( legacyCount ) && el(
					Notice,
					{ status: 'warning', isDismissible: false },
					el(
						'p',
						null,
						sprintf(
							/* translators: %d: number of old Pattern Refresh wrappers. */
							__( 'This page contains %d old Pattern Refresh wrapper(s).', 'pattern-refresh' ),
							legacyCount
						)
					),
					el(
						Button,
						{ variant: 'secondary', onClick: detachAllLegacy },
						__( 'Convert old linked instances to ordinary blocks', 'pattern-refresh' )
					)
				),
				isEnabled && loading && el( Spinner ),
				isEnabled && ! loading && ! patterns.length && el(
					Notice,
					{ status: 'info', isDismissible: false },
					__( 'The active theme and its parent have no file-based patterns.', 'pattern-refresh' )
				),
				isEnabled && Boolean( patterns.length ) && el(
					Fragment,
					null,
					el( SelectControl, {
						label: __( 'Compare selection with', 'pattern-refresh' ),
						value: selectedSlug,
						options: options,
						onChange: function ( nextSlug ) {
							lastPatternSlug = nextSlug;
							savePreference( 'selectedPattern', nextSlug );
							setSelectedSlug( nextSlug );
						},
					} ),
					selectedPattern && el(
						'p',
						{ className: 'pattern-refresh-sidebar__source' },
						el( 'strong', null, __( 'Source', 'pattern-refresh' ) ),
						el( 'code', null, sourceLocation( selectedPattern.source ) )
					),
					el(
						Notice,
						{ status: 'info', isDismissible: false },
						__( 'Watches are stored in this browser until you stop them or clear local site data. A pattern or related CSS change completely resets the watched selection.', 'pattern-refresh' )
					),
					el(
						'div',
						{ className: 'pattern-refresh-sidebar__actions' },
						el(
							Button,
							{
								variant: 'primary',
								disabled: working || ! selectedSlug || ! selectedClientIds.length,
								onClick: reviewSelection,
							},
							working
								? __( 'Working…', 'pattern-refresh' )
								: __( 'Compare selected blocks', 'pattern-refresh' )
						),
						el(
							Button,
							{
								variant: 'secondary',
								disabled: working || ! selectedSlug || ! selectedClientIds.length,
								onClick: watchSelection,
							},
							__( 'Watch and reset selection', 'pattern-refresh' )
						),
						el(
							Button,
							{
								variant: 'tertiary',
								disabled: working || ! selectedSlug,
								onClick: insertAndWatch,
							},
							__( 'Insert and watch pattern', 'pattern-refresh' )
						)
					),
					Boolean( targets.length ) && el(
						'div',
						{ className: 'pattern-refresh-sidebar__watched' },
						el( 'h3', null, __( 'Watched in this browser', 'pattern-refresh' ) ),
						targets.map( function ( target ) {
							return el(
								'div',
								{ className: 'pattern-refresh-sidebar__watch', key: target.id },
								el( 'strong', null, target.title ),
								el(
									'span',
									null,
									sprintf(
										/* translators: %d: number of ordinary root blocks watched. */
										__( '%d ordinary block(s)', 'pattern-refresh' ),
										target.clientIds.length
									)
								),
								target.source && target.source.file && el(
									'code',
									{ className: 'pattern-refresh-sidebar__watch-source' },
									target.source.file
								),
								writeBackEnabled && target.source && target.source.dynamicPhp && el(
									'span',
									{ className: 'pattern-refresh-sidebar__write-protected' },
									__( 'Write-back protected: this pattern contains PHP.', 'pattern-refresh' )
								),
								writeBackEnabled && target.lastSavedAt && el(
									'span',
									{ className: 'pattern-refresh-sidebar__write-saved', role: 'status' },
									__( 'Saved to the theme file.', 'pattern-refresh' )
								),
								el(
									'div',
									{ className: 'pattern-refresh-sidebar__watch-actions' },
									el(
										Button,
										{ variant: 'secondary', disabled: working, onClick: function () {
											reviewTarget( target );
										} },
										__( 'Review edits', 'pattern-refresh' )
									),
									el(
										Button,
										{ variant: 'secondary', disabled: working, onClick: function () {
											resetTarget( target );
										} },
										__( 'Reset now', 'pattern-refresh' )
									),
									el(
										Button,
										{ variant: 'tertiary', onClick: function () {
											stopWatching( target );
										} },
										__( 'Stop watching', 'pattern-refresh' )
									)
								)
							);
						} ),
						el(
							Button,
							{ variant: 'link', onClick: function () {
								setTargets( [] );
							} },
							__( 'Stop watching all', 'pattern-refresh' )
						)
					),
					el(
						'p',
						{ className: 'pattern-refresh-sidebar__summary' },
						sprintf(
							/* translators: 1: environment, 2: polling interval in milliseconds. */
							__( 'Environment: %1$s. Watched files are checked every %2$d ms.', 'pattern-refresh' ),
							settings.environment,
							settings.pollInterval
						)
					),
					exportData && el( ExportModal, {
						exportData: exportData,
						onClose: function () {
							setExportData( null );
						},
					} )
				),
				isEnabled && el(
					PanelBody,
					{ title: __( 'Theme file tools', 'pattern-refresh' ), initialOpen: true },
					el( ToggleControl, {
						label: __( 'Save watched changes to theme files', 'pattern-refresh' ),
						help: writeBackEnabled
							? __( 'On: edits to static watched patterns are written after a short pause. Patterns containing PHP remain protected.', 'pattern-refresh' )
							: __( 'Off: watching remains read-only.', 'pattern-refresh' ),
						checked: writeBackEnabled,
						disabled: ! settings.canWritePatterns,
						onChange: setWriteBackEnabled,
					} ),
					! settings.canWritePatterns && el(
						Notice,
						{ status: 'warning', isDismissible: false },
						__( 'Theme-file writing requires a development environment, the edit_themes capability, and WordPress file modifications to be enabled.', 'pattern-refresh' )
					),
					writeBackEnabled && targets.some( function ( target ) {
						return target.source && target.source.dynamicPhp;
					} ) && el(
						Notice,
						{ status: 'warning', isDismissible: false },
						__( 'At least one watched pattern contains PHP. Gutenberg Tools will not overwrite its dynamic expressions with rendered editor HTML.', 'pattern-refresh' )
					),
					el(
						Button,
						{
							variant: 'secondary',
							disabled: ! settings.canWritePatterns || ! selectedClientIds.length,
							onClick: openCreatePattern,
						},
						__( 'Create pattern from selection', 'pattern-refresh' )
					)
				),
				isEnabled && el( QualityChecks, {
					selectedBlocks: selectedBlocks,
					allBlocks: allBlocks,
				} ),
				createBlocks && el( CreatePatternModal, {
					blocks: createBlocks,
					onClose: function () {
						setCreateBlocks( null );
					},
					onCreated: patternCreated,
				} )
			)
		);
	}

	function AutomaticRefresh( props ) {
		const { targets, setTargets } = props;
		const running = useRef( false );
		const targetsRef = useRef( targets );

		useEffect( function () {
			targetsRef.current = targets;
		}, [ targets ] );

		useEffect( function () {
			if ( ! isEnabled ) {
				return undefined;
			}

			let disposed = false;
			let errorShown = false;

			async function check() {
				const currentTargets = targetsRef.current;

				if ( disposed || running.current || ! currentTargets.length ) {
					return;
				}

				running.current = true;

				try {
					const missingIds = currentTargets.filter( function ( target ) {
						return ! targetExists( target );
					} ).map( function ( target ) {
						return target.id;
					} );

					if ( missingIds.length ) {
						setTargets( function ( latestTargets ) {
							return latestTargets.filter( function ( target ) {
								return ! missingIds.includes( target.id );
							} );
						} );
					}

					const availableTargets = currentTargets.filter( targetExists );
					const patterns = await fetchPatterns();
					const hashes = {};
					const patternBySlug = {};
					patterns.forEach( function ( pattern ) {
						hashes[ pattern.name ] = pattern.hash;
						patternBySlug[ pattern.name ] = pattern;
					} );
					const missingSourceHashes = availableTargets.filter( function ( target ) {
						return ( ! target.sourceHash || ! target.source || ! target.source.fileHash )
							&& Boolean( hashes[ target.slug ] );
					} );

					if ( missingSourceHashes.length ) {
						setTargets( function ( latestTargets ) {
							return latestTargets.map( function ( target ) {
								return patternBySlug[ target.slug ]
									? {
										...target,
										sourceHash: patternBySlug[ target.slug ].hash,
										source: patternBySlug[ target.slug ].source || {},
									}
									: target;
							} );
						} );
					}

					const changed = availableTargets.filter( function ( target ) {
						return Boolean( target.sourceHash )
							&& Boolean( hashes[ target.slug ] )
							&& target.sourceHash !== hashes[ target.slug ];
					} );

					if ( changed.length && ! disposed ) {
						const refreshed = await resetTargets( changed, setTargets, false );

						if ( refreshed ) {
							notice(
								'success',
								sprintf(
									/* translators: %d: number of watched selections reset. */
									__( 'Theme changed: reset %d watched selection(s).', 'pattern-refresh' ),
									refreshed
								)
							);
						}
					}

					errorShown = false;
				} catch ( error ) {
					if ( ! disposed && ! errorShown ) {
						notice( 'error', errorMessage( error ) );
						errorShown = true;
					}
				} finally {
					running.current = false;
				}
			}

			const timer = window.setInterval( check, Number( settings.pollInterval ) || 1000 );

			return function () {
				disposed = true;
				window.clearInterval( timer );
			};
		}, [] );

		return null;
	}

	function AutomaticWriteBack( props ) {
		const { targets, setTargets, enabled } = props;
		const running = useRef( false );
		const targetsRef = useRef( targets );
		const lastMarkup = useRef( {} );

		useEffect( function () {
			targetsRef.current = targets;
		}, [ targets ] );

		useEffect( function () {
			if ( ! isEnabled || ! settings.canWritePatterns || ! enabled ) {
				return undefined;
			}

			let disposed = false;
			const reportedErrors = {};
			lastMarkup.current = {};

			async function check() {
				if ( disposed || running.current ) {
					return;
				}

				running.current = true;

				try {
					for ( const target of targetsRef.current.filter( targetExists ) ) {
						const blocks = topLevelBlocks( target.clientIds );
						const markup = serializeBlocks( blocks );
						const previousMarkup = lastMarkup.current[ target.id ];

						if ( typeof previousMarkup === 'undefined' ) {
							lastMarkup.current[ target.id ] = markup;
							continue;
						}

						if ( previousMarkup === markup ) {
							continue;
						}

						if ( ! target.source || ! target.source.fileHash ) {
							const hydrated = await fetchPattern( target.slug );
							lastMarkup.current[ target.id ] = markup;
							setTargets( function ( currentTargets ) {
								return currentTargets.map( function ( current ) {
									return current.id === target.id
										? { ...current, sourceHash: hydrated.hash, source: hydrated.source || {} }
										: current;
								} );
							} );
							continue;
						}

						if ( target.source.dynamicPhp ) {
							lastMarkup.current[ target.id ] = markup;
							continue;
						}

						try {
							const saved = await savePattern( target, markup );
							lastMarkup.current[ target.id ] = markup;
							delete reportedErrors[ target.id ];
							setTargets( function ( currentTargets ) {
								return currentTargets.map( function ( current ) {
									return current.id === target.id
										? {
											...current,
											sourceHash: saved.hash,
											source: saved.source || {},
											lastSavedAt: Date.now(),
										}
										: current;
								} );
							} );
						} catch ( error ) {
							lastMarkup.current[ target.id ] = markup;

							if ( ! reportedErrors[ target.id ] ) {
								reportedErrors[ target.id ] = true;
								notice( 'error', errorMessage( error ) );
							}
						}
					}
				} finally {
					running.current = false;
				}
			}

			const timer = window.setInterval( check, Math.max( 750, Number( settings.pollInterval ) || 1000 ) );

			return function () {
				disposed = true;
				window.clearInterval( timer );
			};
		}, [ enabled ] );

		return null;
	}

	function PatternRefreshPlugin() {
		const [ targets, setTargets ] = useState( [] );
		const [ hydratedKey, setHydratedKey ] = useState( '' );
		const [ writeBackEnabled, setWriteBackEnabled ] = useState(
			Boolean( settings.canWritePatterns && readPreferences().writeBackEnabled )
		);
		const postId = useSelect( function ( select ) {
			const editor = select( 'core/editor' );
			return editor && editor.getCurrentPostId ? editor.getCurrentPostId() : 0;
		}, [] );
		const rootSignature = useSelect( function ( select ) {
			return select( 'core/block-editor' ).getBlocks().map( function ( block ) {
				return block.clientId;
			} ).join( '|' );
		}, [] );
		const currentStorageKey = postId ? storageKey( postId ) : '';

		useEffect( function () {
			if ( ! currentStorageKey || hydratedKey === currentStorageKey ) {
				return;
			}

			const storedTargets = readStoredTargets( currentStorageKey );

			// A non-empty stored watch must wait until WordPress has populated the block editor.
			if ( storedTargets.length && ! rootSignature ) {
				return;
			}

			setTargets( restoreTargets( currentStorageKey ) );
			setHydratedKey( currentStorageKey );
		}, [ currentStorageKey, hydratedKey, rootSignature ] );

		useEffect( function () {
			if ( currentStorageKey && hydratedKey === currentStorageKey ) {
				persistTargets( currentStorageKey, targets );
			}
		}, [ currentStorageKey, hydratedKey, rootSignature, targets ] );

		useEffect( function () {
			savePreference( 'writeBackEnabled', writeBackEnabled );
		}, [ writeBackEnabled ] );

		useEffect( function () {
			async function watchBlockFromToolbar( clientId, slug ) {
				const editor = wp.data.select( 'core/block-editor' );
				const block = editor.getBlock( clientId );

				if ( ! block || editor.getBlockRootClientId( clientId ) ) {
					throw new Error( __( 'Gutenberg Tools can only quick-watch a top-level block.', 'pattern-refresh' ) );
				}

				const source = await fetchPattern( slug );
				refreshPatternStyles( source.styles );
				addWatchTarget( setTargets, source, [ block ], [ clientId ] );
				lastPatternSlug = source.name;
				savePreference( 'selectedPattern', source.name );
				notice(
					'success',
					sprintf(
						/* translators: %s: pattern title. */
						__( 'Watching this block as “%s”. Its current CMS edits were kept.', 'pattern-refresh' ),
						source.title
					)
				);
			}

			quickWatchHandler = watchBlockFromToolbar;

			return function () {
				if ( quickWatchHandler === watchBlockFromToolbar ) {
					quickWatchHandler = null;
				}
			};
		}, [] );

		return el(
			Fragment,
			null,
			PluginSidebar && el( PatternRefreshSidebar, {
				targets: targets,
				setTargets: setTargets,
				writeBackEnabled: writeBackEnabled,
				setWriteBackEnabled: setWriteBackEnabled,
			} ),
			el( AutomaticRefresh, { targets: targets, setTargets: setTargets } ),
			el( AutomaticWriteBack, {
				targets: targets,
				setTargets: setTargets,
				enabled: writeBackEnabled,
			} )
		);
	}

	addFilter( 'editor.BlockEdit', 'pattern-refresh/quick-watch', withQuickWatch );

	registerPlugin( 'pattern-refresh', {
		render: PatternRefreshPlugin,
	} );
} )( window.wp, window.PatternRefreshSettings );
