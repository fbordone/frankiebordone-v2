<?php
/**
 * Gutenberg Blocks setup
 *
 * @package Fbv2Theme
 */

namespace Fbv2Theme\Blocks;

use Fbv2Theme\Utility;

/**
 * Set up blocks
 *
 * @return void
 */
function setup() {
	$n = function ( $function ) {
		return __NAMESPACE__ . "\\$function";
	};

	add_action( 'enqueue_block_editor_assets', $n( 'blocks_editor_styles' ) );
	add_action( 'init', $n( 'enqueue_block_specific_styles' ) );
	add_action( 'init', $n( 'register_theme_blocks' ) );
	add_action( 'init', $n( 'register_block_pattern_categories' ) );
}

/**
 * Automatically registers all blocks that are located within the includes/blocks directory
 *
 * @return void
 */
function register_theme_blocks() {
	// Register all the blocks in the theme
	if ( file_exists( FBV2_THEME_BLOCK_DIST_DIR ) ) {
		$block_json_files = glob( FBV2_THEME_BLOCK_DIST_DIR . '*/block.json' );

		// auto register all blocks that were found.
		foreach ( $block_json_files as $filename ) {

			$block_folder = dirname( $filename );

			$block_options = [];

			$markup_file_path = $block_folder . '/markup.php';
			if ( file_exists( $markup_file_path ) ) {

				// only add the render callback if the block has a file called markup.php in it's directory
				$block_options['render_callback'] = function ( $attributes, $content, $block ) use ( $block_folder ) {

					// create helpful variables that will be accessible in markup.php file
					$context = $block->context;

					// get the actual markup from the markup.php file
					ob_start();
					include $block_folder . '/markup.php';
					return ob_get_clean();
				};
			}

			register_block_type_from_metadata( $block_folder, $block_options );
		}
	}
}

/**
 * Enqueue editor-only JavaScript/CSS for blocks.
 *
 * @return void
 */
function blocks_editor_styles() {
	wp_enqueue_style(
		'editor-style-overrides',
		FBV2_THEME_TEMPLATE_URL . '/dist/css/editor-style-overrides.css',
		[],
		Utility\get_asset_info( 'editor-style-overrides', 'version' )
	);

	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		wp_enqueue_script(
			'editor-style-overrides',
			FBV2_THEME_TEMPLATE_URL . '/dist/js/editor-style-overrides.js',
			Utility\get_asset_info( 'editor-style-overrides', 'dependencies' ),
			Utility\get_asset_info( 'editor-style-overrides', 'version' ),
			true
		);
	}
}


/**
 * Enqueue block specific styles.
 *
 * This function is used to enqueue styles that are specific to a block. It
 * first gets all the CSS files in the 'blocks/autoenqueue' directory. Then
 * for each stylesheet, it determines the block type by removing the directory
 * path and '.css' from the stylesheet path. It then tries to get the asset
 * file for the block type. If the asset file doesn't exist, it creates a new
 * one with the version set to the file modification time of the stylesheet
 * and no dependencies. Finally, it enqueues the block style using the block
 * type, the URL to the stylesheet, the path to the stylesheet, the version
 * from the asset file, and the dependencies from the asset file.
 *
 * @return void
 */
function enqueue_block_specific_styles() {
	$stylesheets = glob( FBV2_THEME_DIST_PATH . 'blocks/autoenqueue/**/*.css' );

	foreach ( $stylesheets as $stylesheet_path ) {
		$block_type = str_replace( FBV2_THEME_DIST_PATH . 'blocks/autoenqueue/', '', $stylesheet_path );
		$block_type = str_replace( '.css', '', $block_type );
		$asset_file = FBV2_THEME_DIST_PATH . 'blocks/autoenqueue/' . $block_type . '.asset.php';

		if ( ! file_exists( $asset_file ) ) {
			$asset_file = require $asset_file;
		} else {
			$asset_file = [
				'version'      => filemtime( $stylesheet_path ),
				'dependencies' => [],
			];
		}

		[$block_namespace, $block_name] = explode( '/', $block_type );

		wp_register_style(
			"fbv2-theme-{$block_namespace}-{$block_name}",
			FBV2_THEME_DIST_URL . 'blocks/autoenqueue/' . $block_type . '.css',
			$asset_file['version'],
			$asset_file['dependencies'],
		);

		wp_enqueue_block_style(
			$block_type,
			[
				'handle' => "fbv2-theme-{$block_namespace}-{$block_name}",
				'path'   => $stylesheet_path,
			]
		);
	}
}

/**
 * Register block pattern categories
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/
 *
 * @return void
 */
function register_block_pattern_categories() {

	// Register a block pattern category
	register_block_pattern_category(
		'fbv2-theme',
		[ 'label' => __( 'Fbv2 Theme', 'fbv2-theme' ) ]
	);
}
