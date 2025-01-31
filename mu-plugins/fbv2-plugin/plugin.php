<?php
/**
 * Plugin Name:       10up Plugin Scaffold
 * Description:       A brief description of the plugin.
 * Version:           0.1.0
 * Requires at least: 4.9
 * Requires PHP:      7.2
 * Author:            10up
 * Author URI:        https://frankiebordone.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fbv2-plugin
 * Domain Path:       /languages
 * Update URI:        https://github.com/10up/wp-scaffold
 *
 * @package           Fbv2Plugin
 */

// Useful global constants.
define( 'FBV2_PLUGIN_VERSION', '0.1.0' );
define( 'FBV2_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'FBV2_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'FBV2_PLUGIN_INC', FBV2_PLUGIN_PATH . 'includes/' );
define( 'FBV2_PLUGIN_DIST_URL', FBV2_PLUGIN_URL . 'dist/' );
define( 'FBV2_PLUGIN_DIST_PATH', FBV2_PLUGIN_PATH . 'dist/' );

$is_local_env = in_array( wp_get_environment_type(), [ 'local', 'development' ], true );
$is_local_url = strpos( home_url(), '.test' ) || strpos( home_url(), '.local' );
$is_local     = $is_local_env || $is_local_url;

if ( $is_local && file_exists( __DIR__ . '/dist/fast-refresh.php' ) ) {
	require_once __DIR__ . '/dist/fast-refresh.php';
	TenUpToolkit\set_dist_url_path( basename( __DIR__ ), FBV2_PLUGIN_DIST_URL, FBV2_PLUGIN_DIST_PATH );
}

// Require Composer autoloader if it exists.
if ( file_exists( FBV2_PLUGIN_PATH . 'vendor/autoload.php' ) ) {
	require_once FBV2_PLUGIN_PATH . 'vendor/autoload.php';
}

// Include files.
require_once FBV2_PLUGIN_INC . '/utility.php';
require_once FBV2_PLUGIN_INC . '/core.php';

// Activation/Deactivation.
register_activation_hook( __FILE__, '\Fbv2Plugin\Core\activate' );
register_deactivation_hook( __FILE__, '\Fbv2Plugin\Core\deactivate' );

// Bootstrap.
Fbv2Plugin\Core\setup();
