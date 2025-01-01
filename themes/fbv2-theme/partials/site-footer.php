<?php
/**
 * The partial for the site footer.
 *
 * @package Fbv2Theme
 */

?>

<footer class="site-footer padding-inline">
	<div class="container">
		<nav class="site-footer__nav">
			<?php
				wp_nav_menu(
					[
						'menu'           => 'Footer Navigation',
						'theme_location' => 'footer-navigation',
						'menu_id'        => 'nav-footer',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'link_before'    => '<span data-scroll>',
						'link_after'     => '</span>',
					]
				);
				?>
		</nav>

		<p class="site-footer__credits">
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php esc_html_e( ' All Rights Reserved by ', 'fbv2theme' ); ?><strong><?php esc_html_e( 'Frankie Bordone', 'fbv2theme' ); ?></strong>
		</p>
	</div>
</footer>
