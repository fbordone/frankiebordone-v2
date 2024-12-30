<?php
/**
 * ProjectMetabox
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\Metabox;

use Fbv2Plugin\Metabox\AbstractMetaBox;
use Fbv2Plugin\PostTypes\Project;
use Fbv2Plugin\Types\MetaKey;

/**
 * ProjectMetabox class.
 */
final class ProjectMetabox extends AbstractMetaBox {

	/**
	 * Get the meta box title.
	 *
	 * @return string
	 */
	public static function get_title(): string {
		return __( 'Project Settings', 'fbv2-plugin' );
	}

	/**
	 * Get the meta box fields array.
	 *
	 * @return array
	 */
	public function meta_box_fields(): array {
		$fields = [
			MetaKey::PROJECT_EXTERNAL_LINK => new \Fieldmanager_Link(
				[
					'label' => esc_html__( 'External Link', 'fbv2-plugin' ),
				]
			),
		];

		return $fields;
	}

	/**
	 * Post types to add the metabox.
	 *
	 * @return array
	 */
	public function get_supported_post_types(): array {
		return [
			Project::get_name(),
		];
	}
}
