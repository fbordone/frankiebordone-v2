<?php
/**
 * The template for displaying the header.
 *
 * @package Fbv2Theme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<nav aria-label="Skip links">
			<a href="#main" class="skip-to-content-link visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'fbv2-theme' ); ?></a>
		</nav>

		<?php get_template_part( 'partials/site-header' ); ?>

		<main id="main" role="main" tabindex="-1">
