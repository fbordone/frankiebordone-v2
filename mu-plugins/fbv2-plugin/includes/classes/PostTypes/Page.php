<?php
/**
 * Page Post Type
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\PostTypes;

/**
 * Page Post Type
 *
 * This class is a placeholder for the core Page post type.
 * It's here to allow engineers to extend the core Page post type in the same way as custom post types.
 */
class Page extends AbstractCorePostType {

	/**
	 * The CPT name.
	 *
	 * @var mixed
	 */
	const CPT_NAME = 'page';

	/**
	 * Returns the default supported taxonomies. The subclass should declare the
	 * Taxonomies that it supports here if required.
	 *
	 * @return array
	 */
	public function get_supported_taxonomies() {
		return [];
	}

	/**
	 * Run any code after the post type has been registered.
	 *
	 * @return void
	 */
	public function after_register() {
		// Do nothing.
	}
}
