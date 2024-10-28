<?php 
$solar_system_company_servicesec = get_theme_mod('solar_system_company_service_show_hide', false);
$solar_system_company_servicesec_button = get_theme_mod('solar_system_company_serv_button_setting', '1');

if ($solar_system_company_servicesec == '1') : 
?>
<section id="service-section">
  <div class="container"> 
    <?php if (get_theme_mod('solar_system_company_section_title') || get_theme_mod('solar_system_company_section_small_text')) : ?>
      <div class="serv-head text-center mb-5 position-relative"> 
        <?php if (get_theme_mod('solar_system_company_section_small_text')) : ?>
          <p class="small-title"><?php echo esc_html(get_theme_mod('solar_system_company_section_small_text')); ?></p>
        <?php endif; ?>
        <?php if (get_theme_mod('solar_system_company_section_title')) : ?>
          <h2 class="text-capitalize my-2" id="section-title"><?php echo esc_html(get_theme_mod('solar_system_company_section_title')); ?></h2>
        <?php endif; ?> 
      </div>
    <?php endif; ?>

    <div class="owl-carousel owl-theme">
      <?php
      $solar_system_company_post_category = get_theme_mod('solar_system_company_offer_section_category');
      if ($solar_system_company_post_category) :
        $solar_system_company_category_id = term_exists($solar_system_company_post_category, 'category');
        if ($solar_system_company_category_id !== 0 && $solar_system_company_category_id !== null) :
          $solar_system_company_posts_to_show = get_theme_mod('solar_system_company_posts_to_show', 4);
          $solar_system_company_page_query = new WP_Query(array(
            'category_name' => esc_attr($solar_system_company_post_category),
            'posts_per_page' => $solar_system_company_posts_to_show,
          ));

          $solar_system_company_post_count = 0;
          if ($solar_system_company_page_query->have_posts()) :
            while ($solar_system_company_page_query->have_posts()) : $solar_system_company_page_query->the_post(); 
              $solar_system_company_post_count++;
      ?>
              <div class="item">
                <div class="row serv-box">
                  <div class="col-lg-6 col-md-12 align-self-center pe-lg-0">
                    <div class="inner-box-image">
                      <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>" />
                      <?php else : ?>
                        <div class="serv-color"></div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 align-self-center ps-lg-0">
                    <div class="inner-box text-start p-lg-3 px-md-5 py-md-4 px-5 py-3">
                      <h3 class="mb-3 text-capitalize"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                      <?php
                      // Define variables with default values if they are not set
                      $solar_system_company_global_price_raw = get_theme_mod('solar_system_company_global_amount' . $solar_system_company_post_count, '');
                      $solar_system_company_raised_price_raw = get_theme_mod('solar_system_company_raised_amount' . $solar_system_company_post_count, '');

                      // Remove non-numeric characters (except for periods) for calculations
                      $solar_system_company_global_price = preg_replace('/[^\d.]/', '', $solar_system_company_global_price_raw);
                      $solar_system_company_raised_price = preg_replace('/[^\d.]/', '', $solar_system_company_raised_price_raw);

                      // Define prefixes
                      $solar_system_company_global_prefix = __('Goal ', 'solar-system-company');
                      $solar_system_company_raised_prefix = __('Raised ', 'solar-system-company');

                      // Convert prices to float for calculations
                      $solar_system_company_global_amount = floatval($solar_system_company_global_price);
                      $solar_system_company_raised_amount = floatval($solar_system_company_raised_price);

                      // Calculate percentages
                      $solar_system_company_raised_percentage = ($solar_system_company_global_amount > 0) ? ($solar_system_company_raised_amount / $solar_system_company_global_amount) * 100 : 0;
                      ?>

                      <div class="row">
                        <!-- First Row: Global and Raised Labels -->
                        <div class="col-lg-7 col-md-6 col-6 align-self-center">
                          <?php if (!empty($solar_system_company_global_price_raw)) : ?>
                            <span class="text-start global-text"><?php echo esc_html($solar_system_company_global_prefix); ?></span>
                          <?php endif; ?>
                        </div>
                        <div class="col-lg-5 col-md-6 col-6 align-self-center">
                          <?php if (!empty($solar_system_company_raised_price_raw)) : ?>
                            <span class="d-flex justify-content-start raised-text"><?php echo esc_html($solar_system_company_raised_prefix); ?></span>
                          <?php endif; ?>
                        </div>
                      </div>

                      <?php if ($solar_system_company_global_amount > 0) : ?>
                        <div class="row">
                          <div class="col-12">
                            <div class="progress">
                              <!-- Full-width goal bar -->
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                              <!-- Raised amount bar -->
                              <?php if ($solar_system_company_raised_amount > 0) : ?>
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo esc_attr($solar_system_company_raised_percentage); ?>%;" aria-valuenow="<?php echo esc_attr($solar_system_company_raised_percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>

                      <!-- Third Row: Global and Raised Amounts -->
                      <div class="row">
                        <div class="col-lg-7 col-md-6 col-6 align-self-center">
                          <?php if (!empty($solar_system_company_global_price_raw)) : ?>
                            <p class="amount text-start mb-2">
                              <?php echo esc_html($solar_system_company_global_price_raw); ?>
                            </p>
                          <?php endif; ?>
                        </div>
                        <div class="col-lg-5 col-md-6 col-6 align-self-center">
                          <?php if (!empty($solar_system_company_raised_price_raw)) : ?>
                            <p class="amount mb-2 d-flex justify-content-start">
                              <?php echo esc_html($solar_system_company_raised_price_raw); ?>
                            </p>
                          <?php endif; ?>
                        </div>
                      </div>

                      <?php if ($solar_system_company_servicesec_button == '1') : ?>
                        <div class="read-btn mt-lg-3 mt-2">
                          <a href="<?php the_permalink(); ?>"><?php esc_html_e('Donate Now', 'solar-system-company'); ?></a>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>