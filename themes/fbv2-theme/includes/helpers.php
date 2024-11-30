<?php
/**
 * Theme specific helpers.
 *
 * @package Fbv2Theme
 */

namespace Fbv2Theme;

/**
 * Get an initialized class by its full class name, including namespace.
 *
 * @param string $class_name The class name including the namespace.
 *
 * @return false|Module
 */
function get_module( $class_name ) {
	return \Fbv2Theme\ModuleInitialization::instance()->get_class( $class_name );
}
