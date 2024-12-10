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
			<div class="site-header__left">
				<h2 class="site-header__logo">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
						<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
					</a>
				</h2>
			</div>

			<div class="site-header__right">
				<nav class="site-header__desktop-nav">
					<?php
						wp_nav_menu(
							[
								'menu'           => 'Header Navigation',
								'theme_location' => 'header-navigation',
								'menu_id'        => 'header-navigation-desktop',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
							]
						);
						?>

						<div class="wp-block-button site-header__desktop-cta">
							<a class="wp-block-button__link wp-element-button">
								<?php esc_html_e( 'See My Resume', 'fbv2-theme' ); ?>
							</a>
						</div>
				</nav>

				<button class="site-header__navigation-toggle"></button>
			</div>
		</div>
	</div>

	<div class="site-header__mobile-overlay">
		<nav class="site-header__mobile-nav">
			<?php
				wp_nav_menu(
					[
						'menu'           => 'Header Navigation',
						'theme_location' => 'header-navigation',
						'menu_id'        => 'header-navigation-mobile',
						'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					]
				);
				?>

				<div class="wp-block-button site-header__mobile-cta">
					<a class="wp-block-button__link wp-element-button">
						<?php esc_html_e( 'See My Resume', 'fbv2-theme' ); ?>
					</a>
				</div>
		</nav>
	</div>
</header>
