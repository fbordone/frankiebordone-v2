<?php
/**
 * Fbv2 meta key types
 *
 * @package Fbv2Plugin
 */

namespace Fbv2Plugin\Types;

/**
 * Fbv2 MetaKey names
 *
 * @package Fbv2Plugin
 */
final class MetaKey {

	/**
	 * The Project external link meta key.
	 *
	 * @var string
	 */
	const PROJECT_EXTERNAL_LINK = 'project_external_link';

	/**
	 * Prefix meta key
	 *
	 * @param  string $metakey Constant name
	 * @return string
	 */
	public static function prefix_meta_key( string $metakey ): string {
		return 'fbv2_' . constant( "self::{$metakey}" );
	}
}
