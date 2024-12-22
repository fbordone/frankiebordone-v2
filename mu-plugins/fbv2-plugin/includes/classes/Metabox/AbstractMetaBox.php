<?php
/**
 * AbstractMetaBox
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\Metabox;

use Fbv2Plugin\Module;

/**
 * Abstract class for meta boxes.
 */
abstract class AbstractMetaBox extends Module {

	/**
	 * The prefix for metaboxes.
	 * Used to prefix meta keys.
	 *
	 * @var string
	 */
	const META_BOX_PREFIX = 'fbv2';

	/**
	 * Metabox context position
	 * One of normal, advanced, or side
	 *
	 * @var boolean
	 */
	protected $context_position = 'normal';

	/**
	 * Get the meta box title.
	 *
	 * @return string
	 */
	abstract public static function get_title(): string;

	/**
	 * Get the meta box fields array.
	 *
	 * @return array
	 */
	abstract public function meta_box_fields(): array;

	/**
	 * Registers the metabox hooks.
	 *
	 * @return void
	 */
	public function register(): void {
		// Register the meta box for post types.
		foreach ( $this->get_supported_post_types() as $post_type ) {
			add_action( "fm_post_{$post_type}", [ $this, 'register_fm_meta_box' ] );
		}

		foreach ( $this->get_supported_taxonomies() as $taxonomy ) {
			add_action( "fm_term_{$taxonomy}", [ $this, 'register_fm_meta_box' ] );
		}
	}

	/**
	 * Returns the metabox name.
	 *
	 * @return string The name for the meta box.
	 */
	public static function get_meta_box_slug(): string {
		return static::META_BOX_PREFIX;
	}

	/**
	 * Register the meta box.
	 *
	 * @return void
	 */
	public function register_fm_meta_box(): void {
		$fm = new \Fieldmanager_Group(
			array_merge(
				[
					'name'           => self::get_meta_box_slug(),
					'children'       => $this->meta_box_fields(),
					'serialize_data' => false,
				],
				$this->metabox_options()
			)
		);

		$hook = \current_action();

		if ( stripos( $hook, 'fm_post_' ) === 0 ) {
			$fm->add_meta_box( $this->get_title(), $this->get_supported_post_types(), $this->context_position );
		} elseif ( stripos( $hook, 'fm_term_' ) === 0 ) {
			$fm->add_term_meta_box( $this->get_title(), $this->get_supported_taxonomies() );
		}
	}

	/**
	 * Custom options for the meta box.
	 *
	 * @return array
	 */
	public function metabox_options(): array {
		return [];
	}

	/**
	 * Determines if this metabox can be registered.
	 *
	 * @return bool True if metabox should be registered, false otherwise.
	 */
	public function can_register(): bool {
		return class_exists( '\Fieldmanager_Group' );
	}

	/**
	 * Taxonomies to add the metabox.
	 *
	 * @return array
	 */
	public function get_supported_taxonomies(): array {
		return [];
	}

	/**
	 * Post types to add the metabox.
	 *
	 * @return array
	 */
	public function get_supported_post_types(): array {
		return [];
	}

	/**
	 * Getter for fields
	 *
	 * Usage:
	 * -- $value = \Fbv2Plugin\Metabox\TeamMemberMetabox::get_setting_value( $post_id, 'JOB_TITLE_URL_META_KEY' )
	 *
	 * @param int    $post_id       Post ID
	 * @param string $field_key     Field meta key
	 * @return string|array
	 */
	public static function get_setting_value( int $post_id, string $field_key ): string|array {

		// Do nothing if no key
		if ( empty( $field_key ) ) {
			return '';
		}

		$reflect   = new \ReflectionClass( '\Fbv2Plugin\Types\MetaKey' );
		$constants = $reflect->getConstants();
		// Do nothing if the key is not registered / defined in MetaKey class
		if ( ! in_array( $field_key, array_keys( $constants ), true ) ) {
			return '';
		}
		$meta_key = self::get_meta_box_slug() . '_' . $constants[ $field_key ];
		return get_post_meta( $post_id, $meta_key, true );
	}

	/**
	 * Returns the current post ID being edited.
	 *
	 * @return int The current post ID.
	 */
	protected function get_current_post_id(): int {
		// Try getting the ID from GET data.
		$post_id = filter_input( INPUT_GET, 'post', FILTER_SANITIZE_NUMBER_INT );

		// Fallback to post data.
		if ( empty( $post_id ) ) {
			$post_id = filter_input( INPUT_POST, 'post', FILTER_SANITIZE_NUMBER_INT );
		}

		return absint( $post_id );
	}

	/**
	 * Returns the current post type being edited.
	 *
	 * @return string|null The current post type.
	 */
	protected function get_current_post_type(): string|null {
		global $pagenow;

		// Bail early if isn't an edit post page.
		if ( ! in_array( $pagenow, [ 'post.php', 'post-new.php' ], true ) ) {
			return null;
		}

		// Get the post ID.
		$post_id = $this->get_current_post_id();

		// If there's a post ID, return the post type.
		if ( ! empty( $post_id ) ) {
			return get_post_type( $post_id );
		}

		// Get the post type from query string.
		$post_type = filter_input( INPUT_GET, 'post_type', FILTER_SANITIZE_ENCODED );

		return $post_type ?? 'post';
	}
}
