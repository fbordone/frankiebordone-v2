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
			<h1 class="site-header__logo site-header__logo-mobile">
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
					<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
				</a>
			</h1>

			<button class="site-header__navigation-toggle"></button>

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

			<nav class="site-header__nav-desktop">
				<h1 class="site-header__logo site-header__logo-desktop">
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?> Home">
						<?php esc_html_e( 'Frankie Bordone', 'fbv2-theme' ); ?>
					</a>
				</h1>

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
