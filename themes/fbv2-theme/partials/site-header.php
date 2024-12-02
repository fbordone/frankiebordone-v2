<?php
/**
 * The partial for the site header.
 *
 * @package Fbv2Theme
 */

?>

<header class="site-header">
	<div class="site-header__container padding-inline">
		<div class="container">
			<div class="site-header__main">
				<h2 class="site-header__logo">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
						<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
					</a>
				</h2>

				<button class="site-header__navigation-toggle">
					<?php esc_html_e( 'Menu', 'fbv2-theme' ); ?>
				</button>
			</div>

			<div class="site-header__navigation">
				<nav class="site-header__nav">
					<?php
						wp_nav_menu(
							[
								'menu'           => 'Header Navigation',
								'theme_location' => 'header-navigation',
								'menu_id'        => 'header-navigation',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]
						);
						?>

					<a href="#" class="wp-element-button site-header__see-my-resume" target="_blank">
						<?php esc_html_e( 'See My Resume', 'fbv2-theme' ); ?>
					</a>
				</nav>
			</div>
		</div>
	</div>
</header>
