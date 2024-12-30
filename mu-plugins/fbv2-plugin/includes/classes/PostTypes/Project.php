<?php
/**
 * Project Post Type
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\PostTypes;

/**
 * Project post type.
 */
class Project extends AbstractPostType {

	/**
	 * The CPT name.
	 *
	 * @var mixed
	 */
	const CPT_NAME = 'fbv2_project';

	/**
	 * Get the singular post type label.
	 *
	 * @return string
	 */
	public function get_singular_label() {
		return esc_html__( 'Project', 'fbv2-plugin' );
	}

	/**
	 * Get the plural post type label.
	 *
	 * @return string
	 */
	public function get_plural_label() {
		return esc_html__( 'Projects', 'fbv2-plugin' );
	}

	/**
	 * Get the menu icon for the post type.
	 *
	 * This can be a base64 encoded SVG, a dashicons class or 'none' to leave it empty so it can be filled with CSS.
	 *
	 * @see https://developer.wordpress.org/resource/dashicons/
	 *
	 * @return string
	 */
	public function get_menu_icon() {
		return 'dashicons-portfolio';
	}

	/**
	 * Can the class be registered?
	 *
	 * @return bool
	 */
	public function can_register() {
		return true;
	}

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
	 * Default post type supported feature names.
	 *
	 * @return array
	 */
	public function get_editor_supports() {
		$supports = [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
		];

		return $supports;
	}

	/**
	 * Get the options for the post type.
	 *
	 * @return array
	 */
	public function get_options() {
		$cpt_options = [
			'has_archive'        => false,
			'publicly_queryable' => false,
			'rewrite'            => false,
		];

		return array_merge( parent::get_options(), $cpt_options );
	}

	/**
	 * Run any code after the post type has been registered.
	 *
	 * @return void
	 */
	public function after_register() {
		// Register any hooks/filters you need.
	}
}
