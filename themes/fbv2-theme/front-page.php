<?php
/**
 * The template file for the front page
 *
 * @package Fbv2Theme
 */

get_header(); ?>

<article class="page__article">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="page__content content-flow padding-inline">
				<?php the_content(); ?>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</article>

<?php
get_footer();
