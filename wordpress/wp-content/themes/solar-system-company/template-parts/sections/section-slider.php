<?php 
$solar_system_company_slider = get_theme_mod('solar_system_company_slider_setting', false);

if ($solar_system_company_slider == '1') :
?>

<section id="slider">
    <div id="owl-carousel" class="owl-carousel">
        <?php
        $solar_system_company_slide_pages = array();
        for ($solar_system_company_count = 1; $solar_system_company_count <= 4; $solar_system_company_count++) {
            $solar_system_company_mod = intval(get_theme_mod('solar_system_company_slider_page' . $solar_system_company_count));
            if ('page-none-selected' !== $solar_system_company_mod) {
                $solar_system_company_slide_pages[] = $solar_system_company_mod;
            }
        }
        if (!empty($solar_system_company_slide_pages)) :
            $solar_system_company_args = array(
                'post_type' => 'page',
                'post__in' => $solar_system_company_slide_pages,
                'orderby' => 'post__in'
            );
            $solar_system_company_query = new WP_Query($solar_system_company_args);
            if ($solar_system_company_query->have_posts()) :
                while ($solar_system_company_query->have_posts()) : $solar_system_company_query->the_post(); ?>
                    <div class="item">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                        <?php } else { ?>
                            <div class="slider-color-box"></div>
                        <?php } ?>

                        <div class="container">
                            <div class="carousel-caption">
                                <div class="inner_carousel">
                                    <?php if (get_theme_mod('solar_system_company_slider_short_heading') != '') { ?>
                                        <p class="slidetop-text mb-3"><?php echo esc_html(get_theme_mod('solar_system_company_slider_short_heading', '')); ?></p>
                                    <?php } ?>
                                    <h1 class="custom-title mb-2">
                                      <a href="<?php the_permalink(); ?>" class="title-link">
                                        <?php
                                        $solar_system_company_title = get_the_title();

                                        $solar_system_company_words = explode(' ', $solar_system_company_title);
                                        if (count($solar_system_company_words) >= 4) {
                                            $solar_system_company_words[3] = '<span class="highlight">' . $solar_system_company_words[3] . '</span>';
                                        }

                                        echo implode(' ', $solar_system_company_words);
                                        ?>
                                      </a>
                                    </h1>
                                    <p class="mb-2"><?php echo esc_html(wp_trim_words(get_the_content(), 14)); ?></p>
                                    <div class="more-btn mt-4">
                                        <?php if ( get_theme_mod('solar_system_company_slider_btn_text','true') != "" || get_theme_mod('solar_system_company_slider_btn_link') != '') { ?>
                                            <a target="_blank" class="text-capitalize mb-3 slider-btn1" href="<?php echo esc_url(get_theme_mod('solar_system_company_slider_btn_link')!= '') ? esc_url(get_theme_mod('solar_system_company_slider_btn_link')) : esc_url(get_permalink()); ?>">
                                            <?php echo esc_html(get_theme_mod('solar_system_company_slider_btn_text',__('READ MORE','solar-system-company'))); ?><i class="fas fa-arrow-right ms-3"></i>
                                          </a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="no-postfound"></div>
            <?php endif;
        endif; ?>
    </div>
</section>
<?php endif; ?>
