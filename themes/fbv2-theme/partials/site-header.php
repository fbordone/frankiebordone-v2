<?php
/**
 * The partial for the site header.
 *
 * @package Cpl
 */

?>

<header class="site-header">
	<div class="site-header__container padding-inline">
		<div class="container">
			<!-- Mobile logo -->
			<h2 class="site-header__logo site-header__logo-mobile">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
					<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
				</a>
			</h2>

			<!-- Hamburger button (mobile) -->
			<button class="site-header__navigation-toggle"></button>

			<!-- Mobile nav -->
			<nav class="site-header__nav-mobile">
				<?php
					wp_nav_menu(
						[
							'menu'           => 'Header Navigation',
							'theme_location' => 'header-navigation',
							'menu_id'        => 'nav-header-mobile',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						]
					);
					?>
			</nav>

			<!-- Desktop nav -->
			<nav class="site-header__nav-desktop">
				<!-- Desktop logo -->
				<h2 class="site-header__logo site-header__logo-desktop">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
						<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
					</a>
				</h2>

				<!-- Desktop nav -->
				<?php
					wp_nav_menu(
						[
							'menu'           => 'Header Navigation',
							'theme_location' => 'header-navigation',
							'menu_id'        => 'nav-header-desktop',
							'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						]
					);
					?>
			</nav>
		</div>
	</div>
</header>
