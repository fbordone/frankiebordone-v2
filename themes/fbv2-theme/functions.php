<?php
/**
 * WP Theme constants and setup functions
 *
 * @package Fbv2Theme
 */

// Useful global constants.
define( 'FBV2_THEME_VERSION', '0.1.0' );
define( 'FBV2_THEME_TEMPLATE_URL', get_template_directory_uri() );
define( 'FBV2_THEME_PATH', get_template_directory() . '/' );
define( 'FBV2_THEME_DIST_PATH', FBV2_THEME_PATH . 'dist/' );
define( 'FBV2_THEME_DIST_URL', FBV2_THEME_TEMPLATE_URL . '/dist/' );
define( 'FBV2_THEME_INC', FBV2_THEME_PATH . 'includes/' );
define( 'FBV2_THEME_BLOCK_DIR', FBV2_THEME_INC . 'blocks/' );
define( 'FBV2_THEME_BLOCK_DIST_DIR', FBV2_THEME_PATH . 'dist/blocks/' );

$is_local_env = in_array( wp_get_environment_type(), [ 'local', 'development' ], true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), FBV2_THEME_DIST_URL, FBV2_THEME_DIST_PATH );
}

require_once FBV2_THEME_INC . 'core.php';
require_once FBV2_THEME_INC . 'overrides.php';
require_once FBV2_THEME_INC . 'template-tags.php';
require_once FBV2_THEME_INC . 'utility.php';
require_once FBV2_THEME_INC . 'blocks.php';
require_once FBV2_THEME_INC . 'helpers.php';

// Run the setup functions.
Fbv2Theme\Core\setup();
Fbv2Theme\Blocks\setup();

// Require Composer autoloader if it exists.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}
