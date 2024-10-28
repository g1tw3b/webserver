<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solar System Company
 */

get_header(); ?>

<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 postsec-list">
				<?php if( have_posts() ): ?>
					<?php while( have_posts() ) : the_post(); ?>
						<?php get_template_part('template-parts/content/content-post', get_post_format() ); ?>
					<?php endwhile; ?>
				<?php else: ?>
					<?php get_template_part('template-parts/content/content','none'); ?>
				<?php endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>