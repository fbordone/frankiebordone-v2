<?php
/**
 * AbstractTaxonomy
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\Taxonomies;

use Fbv2Plugin\Module;

/**
 * Abstract Base Class for Taxonomies.
 *
 * Usage:
 *
 * class FooTaxonomy extends AbstractTaxonomy {
 *
 *     public function get_name() {
 *         return 'tag';
 *     }
 *
 *     public function get_singular_label() {
 *         return 'Tag'
 *     }
 *
 *     public function get_plural_label() {
 *         return 'Tags';
 *     }
 *
 *     public function can_register() {
 *         return true;
 *     }
 * }
 */
abstract class AbstractTaxonomy extends Module {

	/**
	 * Used to alter the order in which clases are initialized.
	 *
	 * Lower number will be initialized first.
	 *
	 * @var int The priority of the module.
	 */
	public $load_order = 9;

	/**
	 * Get the taxonomy name.
	 *
	 * @return string
	 */
	abstract public function get_name();

	/**
	 * Get the singular taxonomy label.
	 *
	 * @return string
	 */
	abstract public function get_singular_label();

	/**
	 * Get the plural taxonomy label.
	 *
	 * @return string
	 */
	abstract public function get_plural_label();

	/**
	 * Is the taxonomy hierarchical?
	 *
	 * @return bool
	 */
	public function is_hierarchical() {
		return false;
	}

	/**
	 * Register hooks and actions.
	 *
	 * @uses $this->get_name() to get the taxonomy's slug.
	 * @return bool
	 */
	public function register() {
		\register_taxonomy(
			$this->get_name(),
			$this->get_post_types(),
			$this->get_options()
		);

		$this->after_register();

		return true;
	}

	/**
	 * Get the options for the taxonomy.
	 *
	 * @return array
	 */
	public function get_options() {
		return [
			'labels'            => $this->get_labels(),
			'hierarchical'      => $this->is_hierarchical(),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'      => true,
			'public'            => true,
		];
	}

	/**
	 * Get the labels for the taxonomy.
	 *
	 * @return array
	 */
	public function get_labels() {
		$plural_label   = $this->get_plural_label();
		$singular_label = $this->get_singular_label();

		// phpcs:disable
		$labels = [
			'name'                       => $plural_label, // Already translated via get_plural_label().
			'singular_name'              => $singular_label, // Already translated via get_singular_label().
			'search_items'               => sprintf( __( 'Search %s', 'fbv2-plugin' ), $plural_label ),
			'popular_items'              => sprintf( __( 'Popular %s', 'fbv2-plugin' ), $plural_label ),
			'all_items'                  => sprintf( __( 'All %s', 'fbv2-plugin' ), $plural_label ),
			'edit_item'                  => sprintf( __( 'Edit %s', 'fbv2-plugin' ), $singular_label ),
			'update_item'                => sprintf( __( 'Update %s', 'fbv2-plugin' ), $singular_label ),
			'add_new_item'               => sprintf( __( 'Add %s', 'fbv2-plugin' ), $singular_label ),
			'new_item_name'              => sprintf( __( 'New %s Name', 'fbv2-plugin' ), $singular_label ),
			'separate_items_with_commas' => sprintf( __( 'Separate %s with commas', 'fbv2-plugin' ), strtolower( $plural_label ) ),
			'add_or_remove_items'        => sprintf( __( 'Add or remove %s', 'fbv2-plugin' ), strtolower( $plural_label ) ),
			'choose_from_most_used'      => sprintf( __( 'Choose from the most used %s', 'fbv2-plugin' ), strtolower( $plural_label ) ),
			'not_found'                  => sprintf( __( 'No %s found.', 'fbv2-plugin' ), strtolower( $plural_label ) ),
			'not_found_in_trash'         => sprintf( __( 'No %s found in Trash.', 'fbv2-plugin' ), strtolower( $plural_label ) ),
			'view_item'                  => sprintf( __( 'View %s', 'fbv2-plugin' ), $singular_label ),
		];
		// phpcs:enable

		return $labels;
	}

	/**
	 * Setting the post types to null to ensure no post type is registered with
	 * this taxonomy. Post Type classes declare their supported taxonomies.
	 *
	 * @return array|null
	 */
	public function get_post_types() {
		return null;
	}

	/**
	 * Run any code after the taxonomy has been registered.
	 *
	 * @return void
	 */
	public function after_register() {
		// Do nothing.
	}
}
