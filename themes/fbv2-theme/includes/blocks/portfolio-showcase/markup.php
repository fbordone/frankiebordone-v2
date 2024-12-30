<?php
/**
 * Portfolio Showcase block markup
 *
 * @package Fbv2Theme\Blocks\PortfolioShowcase
 */

use Fbv2Plugin\PostTypes\{ Project };
use Fbv2Plugin\Metabox\{ ProjectMetabox };

$args = [
	'fields'                 => 'ids',
	'posts_per_page'         => 20,
	'post_type'              => Project::get_name(),
	'orderby'                => 'title',
	'order'                  => 'ASC',
	'no_found_rows'          => true,
	'update_post_term_cache' => false,
];

$query = new \WP_Query( $args );

if ( $query->have_posts() ) : ?>
	<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<div class="wp-block-fbv2-theme-portfolio-showcase__grid">
			<?php
			foreach ( $query->posts as $post_id ) :
				$title        = get_the_title( $post_id );
				$excerpt      = get_the_excerpt( $post_id );
				$image_id     = get_post_thumbnail_id( $post_id );
				$external_url = ProjectMetabox::get_setting_value( $post_id, 'PROJECT_EXTERNAL_LINK' );
				?>

				<div class="wp-block-fbv2-theme-portfolio-showcase__grid-item">
					<a href="<?php echo esc_url( $external_url ); ?>" class="wp-block-fbv2-theme-portfolio-showcase__grid-item-link" target="_blank" rel="noopener noreferrer">
						<div class="wp-block-fbv2-theme-portfolio-showcase__grid-item-image">
							<?php echo wp_get_attachment_image( $image_id, 'large', false, [ 'alt' => esc_attr( $title ) ] ); ?>
						</div>
					</a>
					<div class="wp-block-fbv2-theme-portfolio-showcase__grid-item-content">
						<a href="<?php echo esc_url( $external_url ); ?>" class="wp-block-fbv2-theme-portfolio-showcase__grid-item-link" target="_blank" rel="noopener noreferrer">
							<h3 class="wp-block-fbv2-theme-portfolio-showcase__grid-item-title"><?php echo esc_html( $title ); ?></h3>
						</a>
						<p class="wp-block-fbv2-theme-portfolio-showcase__grid-item-excerpt"><?php echo esc_html( $excerpt ); ?></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	wp_reset_postdata();
endif;
