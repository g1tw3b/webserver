<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Solar System Company
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>
	<?php
		// Check if the post has the "video" post format
		if (has_post_format('video')) {
		    // Get the post content
		    $post_content = apply_filters('the_content', get_the_content());

		    // Find and display the first <video> or <iframe> tag in the post content
		    preg_match('/(<video[^>]+>.*<\/video>)|(<iframe[^>]+src=[\'"]([^\'"]+)[\'"][^>]*><\/iframe>)/i', $post_content, $matches);

		    // Check if a matching tag is found
		    if (!empty($matches[0])) {
		        // Output the matched tag
		        echo '<div class="custom-video-container">' . $matches[0] . '</div>';
		    } else {
		        // Output a message if no matching tag is found
		        echo 'No embedded video found in the post content.';
		    }
		}
	?>

	<h6 class="theme-button"><?php echo esc_html(get_the_date('j')); ?>, <?php echo esc_html(get_the_date('M'));  echo esc_html(get_the_date(' Y')); ?></h6>
	<div class="blog-content">
		<?php 
			if ( is_single() ) :
				
			the_title('<h5 class="post-title">', '</h5>' );
			
			else:
			
			the_title( sprintf( '<h5 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
			
			endif; 
			
			the_excerpt();
		?>
	</div>
	<ul class="comment-timing">
		<li class="pe-lg-3 pe-2">
          <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
            <i class="fa fa-user pe-1"></i> <?php the_author(); ?>
          </a>
        </li>
		<li class="pe-lg-3 pe-2">
          <a href="<?php echo esc_url(get_permalink()); ?>#comments">
            <i class="fa fa-comment pe-1"></i> <?php echo esc_html(get_comments_number($post->ID)); ?>
          </a>
        </li>
		<li>
          <i class="fas fa-clock pe-1"></i> <?php echo esc_html(get_the_time('H:i')); ?> <?php esc_html_e('HOURS', 'solar-system-company'); ?>
        </li>
	</ul>
</div>