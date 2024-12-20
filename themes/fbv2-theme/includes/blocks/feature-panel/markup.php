<?php
/**
 * Feature Panel block markup
 *
 * @package Fbv2Theme\Blocks\FeaturePanel
 */

// Set defaults.
$attributes = wp_parse_args(
	$attributes,
	[
		'numberPanel' => '',
		'title'       => '',
		'description' => '',
	]
);
?>

<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="wp-block-fbv2-theme-feature-panel__header">
		<span class="wp-block-fbv2-theme-feature-panel__number">
			<?php echo wp_kses_post( $attributes['numberPanel'] ); ?>
		</span>

		<h3 class="wp-block-fbv2-theme-feature-panel__title">
			<?php echo wp_kses_post( $attributes['title'] ); ?>
		</h3>
	</div>

	<p class="wp-block-fbv2-theme-feature-panel__description">
		<?php echo wp_kses_post( $attributes['description'] ); ?>
	</p>
</div>
