<?php
/**
 * Template part for displaying posts
 *
 * @package Online Pharmacy
 * @subpackage online_pharmacy
 */

?>
<?php $online_pharmacy_column_layout = get_theme_mod( 'online_pharmacy_sidebar_post_layout');
if($online_pharmacy_column_layout == 'four-column' || $online_pharmacy_column_layout == 'three-column' ){ ?>
  <div id="category-post">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="page-box box-image">
         <?php
            // Get the post content
            $online_pharmacy_post_content = apply_filters('the_content', get_the_content());

            // Create a DOMDocument to parse the HTML content
            $dom = new DOMDocument();
            @$dom->loadHTML($online_pharmacy_post_content);

            // Find and display the first image in the post content
            $images = $dom->getElementsByTagName('img');

            echo ($images->length > 0)
                ? '<img src="' . esc_url($images->item(0)->getAttribute('src')) . '">'
                : '';
          ?>
          <div class="box-content mt-2 text-center">
              <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
            <div class="box-info">
              <?php $online_pharmacy_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
              foreach ($online_pharmacy_blog_archive_ordering as $online_pharmacy_blog_data_order) : 
                if ('date' === $online_pharmacy_blog_data_order) : ?>
                  <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
                <?php elseif ('author' === $online_pharmacy_blog_data_order) : ?>
                  <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
                <?php elseif ('comment' === $online_pharmacy_blog_data_order) : ?>
                  <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'online-pharmacy'), __('0 Comments', 'online-pharmacy'), __('% Comments', 'online-pharmacy')); ?></span>
                <?php elseif ('category' === $online_pharmacy_blog_data_order) :?>
                  <i class="fas fa-list mb-1"></i><span class="entry-category"><?php online_pharmacy_display_post_category_count(); ?></span>
                <?php endif;
              endforeach; ?>
            </div>
            <p><?php echo esc_html(online_pharmacy_excerpt_function());?></p>
            <?php if(get_theme_mod('online_pharmacy_remove_read_button',true) != ''){ ?>
              <div class="readmore-btn">
                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'online-pharmacy' ); ?>"><?php echo esc_html(get_theme_mod('online_pharmacy_read_more_text',__('Read More','online-pharmacy')));?></a>
              </div>
            <?php }?>
          </div>
          <div class="clearfix"></div>
      </div>
    </article>
  </div>
<?php } else{ ?>
<div id="category-post">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="page-box row">
      <?php $online_pharmacy_post_layout = get_theme_mod( 'online_pharmacy_post_layout','image-content');
      if($online_pharmacy_post_layout == 'image-content'){ ?>
        <div class="box-image col-lg-6 col-md-12 align-self-center">
          <?php
            // Get the post content
            $online_pharmacy_post_content = apply_filters('the_content', get_the_content());

            // Create a DOMDocument to parse the HTML content
            $dom = new DOMDocument();
            @$dom->loadHTML($online_pharmacy_post_content);

            // Find and display the first image in the post content
            $images = $dom->getElementsByTagName('img');

            echo ($images->length > 0)
                ? '<img src="' . esc_url($images->item(0)->getAttribute('src')) . '">'
                : '';
            ?>
        </div>
        <div class="box-content col-lg-6 col-md-12">
          <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
            <?php $online_pharmacy_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
            foreach ($online_pharmacy_blog_archive_ordering as $online_pharmacy_blog_data_order) : 
              if ('date' === $online_pharmacy_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
              <?php elseif ('author' === $online_pharmacy_blog_data_order) : ?>
                <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
              <?php elseif ('comment' === $online_pharmacy_blog_data_order) : ?>
                <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'online-pharmacy'), __('0 Comments', 'online-pharmacy'), __('% Comments', 'online-pharmacy')); ?></span>
              <?php elseif ('category' === $online_pharmacy_blog_data_order) :?>
                <i class="fas fa-list mb-1"></i><span class="entry-category"><?php online_pharmacy_display_post_category_count(); ?></span>
              <?php endif;
            endforeach; ?>
          </div>
          <p><?php echo esc_html(online_pharmacy_excerpt_function());?></p>
          <?php if(get_theme_mod('online_pharmacy_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'online-pharmacy' ); ?>"><?php echo esc_html(get_theme_mod('online_pharmacy_read_more_text',__('Read More','online-pharmacy')));?></a>
            </div>
          <?php }?>
        </div>
      <?php }
      else if($online_pharmacy_post_layout == 'content-image'){ ?>
        <div class="box-content col-lg-6 col-md-12">
          <h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
          <div class="box-info">
            <?php $online_pharmacy_blog_archive_ordering = get_theme_mod('blog_meta_order', array('date', 'author', 'comment', 'category'));
            foreach ($online_pharmacy_blog_archive_ordering as $online_pharmacy_blog_data_order) : 
              if ('date' === $online_pharmacy_blog_data_order) : ?>
                <i class="far fa-calendar-alt mb-1"></i><span class="entry-date"><?php echo get_the_date('j F, Y'); ?></span>
              <?php elseif ('author' === $online_pharmacy_blog_data_order) : ?>
                <i class="fas fa-user mb-1"></i><span class="entry-author"><?php the_author(); ?></span>
              <?php elseif ('comment' === $online_pharmacy_blog_data_order) : ?>
                <i class="fas fa-comments mb-1"></i><span class="entry-comments"><?php comments_number(__('0 Comments', 'online-pharmacy'), __('0 Comments', 'online-pharmacy'), __('% Comments', 'online-pharmacy')); ?></span>
              <?php elseif ('category' === $online_pharmacy_blog_data_order) :?>
                <i class="fas fa-list mb-1"></i><span class="entry-category"><?php online_pharmacy_display_post_category_count(); ?></span>
              <?php endif;
            endforeach; ?>
          </div>
          <p><?php echo esc_html(online_pharmacy_excerpt_function());?></p>
          <?php if(get_theme_mod('online_pharmacy_remove_read_button',true) != ''){ ?>
            <div class="readmore-btn">
              <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'online-pharmacy' ); ?>"><?php echo esc_html(get_theme_mod('online_pharmacy_read_more_text',__('Read More','online-pharmacy')));?></a>
            </div>
          <?php }?>
        </div>
        <div class="box-image col-lg-6 col-md-12 align-self-center pt-lg-0 pt-3">
          <?php
            // Get the post content
            $online_pharmacy_post_content = apply_filters('the_content', get_the_content());

            // Create a DOMDocument to parse the HTML content
            $dom = new DOMDocument();
            @$dom->loadHTML($online_pharmacy_post_content);

            // Find and display the first image in the post content
            $images = $dom->getElementsByTagName('img');

            echo ($images->length > 0)
                ? '<img src="' . esc_url($images->item(0)->getAttribute('src')) . '">'
                : '';
            ?>
        </div>
      <?php }?>
      <div class="clearfix"></div>
    </div>
  </article>
</div>
<?php } ?>