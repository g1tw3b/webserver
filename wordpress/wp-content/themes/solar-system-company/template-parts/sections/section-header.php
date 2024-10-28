<header class="main-header">
    <div class="container">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-3 align-self-center">
                        <?php if (get_theme_mod('solar_system_company_mail')) : ?>
                            <p class="mb-0 email-text">
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('solar_system_company_mail')); ?>">
                                    <i class="fas fa-envelope px-2"></i>
                                    <?php echo esc_html(get_theme_mod('solar_system_company_mail')); ?>
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-5 col-sm-6 align-self-center">
                        <?php if (get_theme_mod('solar_system_company_location')) : ?>
                            <p class="my-md-0 my-2">
                                <i class="fas fa-map-marker-alt px-2"></i>
                                <?php echo esc_html(get_theme_mod('solar_system_company_location')); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-3 align-self-center text-lg-end">
                        <div class="social-media pe-lg-4">
                            <?php if (get_theme_mod('solar_system_company_facebook_url')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('solar_system_company_facebook_url')); ?>">
                                    <i class="fab fa-facebook-f me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('solar_system_company_instagram_url')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('solar_system_company_instagram_url')); ?>">
                                    <i class="fab fa-instagram me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('solar_system_company_twitter_url')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('solar_system_company_twitter_url')); ?>">
                                    <i class="fab fa-twitter me-2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (get_theme_mod('solar_system_company_linkedin_url')) : ?>
                                <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url(get_theme_mod('solar_system_company_linkedin_url')); ?>">
                                    <i class="fab fa-linkedin me-2"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="middle-header-area mx-md-5">
            <div class="row">
                <div class="col-lg-3 col-md-12 logo-col text-md-start text-center align-self-center">
                    <div class="logo mb-3 mb-md-0 text-center">
                        <?php 
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            $solar_system_company_site_title = get_theme_mod('solar_system_company_site_title_setting', '1');
                            if ($solar_system_company_site_title == '1') {
                                if (is_front_page() && is_home()) { ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php bloginfo('name'); ?>
                                        </a>
                                    </h1>
                                <?php } else { ?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>">
                                            <?php bloginfo('name'); ?>
                                        </a>
                                    </p>
                                <?php }
                            }
                            $solar_system_company_tagline = get_theme_mod('solar_system_company_tagline_setting');
                            if ($solar_system_company_tagline) {
                                $solar_system_company_site_desc = get_bloginfo('description'); ?>
                                <p class="site-description"><?php echo esc_html($solar_system_company_site_desc); ?></p>
                            <?php }
                        } ?>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 menu-col align-self-center menu-col">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="menubox">
                                <nav class="navbar navbar-expand-lg navbaroffcanvas">
                                    <div class="navbar-menubar responsive-menu">
                                        <button class="navbar-toggler align-self-center" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-label="<?php esc_attr_e('Toggle navigation', 'solar-system-company'); ?>">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <div class="collapse navbar-collapse navbar-menu">
                                            <button class="navbar-toggler navbar-toggler-close" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-menu" aria-label="<?php esc_attr_e('Close navigation', 'solar-system-company'); ?>">
                                                <i class="fa fa-times"></i>
                                            </button>
                                            <?php
                                            wp_nav_menu(array(
                                                'theme_location' => 'primary',
                                                'container_class' => 'main-menu clearfix',
                                                'menu_class' => 'clearfix',
                                                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                                                'fallback_cb' => false, // Disable fallback callback
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0 bottom-head">
                        <div class="col-lg-5 col-md-4 text-center text-md-start align-self-center phone-col">
                            <?php if (get_theme_mod('solar_system_company_phone_no')) : ?>
                                <p class="mb-0 phone-box">
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('solar_system_company_phone_no')); ?>">
                                        <i class="fas fa-phone-volume me-2"></i>
                                        <?php esc_html_e('Emergency Contact No ', 'solar-system-company'); ?>
                                        <?php echo esc_html(get_theme_mod('solar_system_company_phone_no')); ?>
                                    </a>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-md-4 p-0 text-md-end text-center align-self-center">
                            <div class="search-block">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                        <?php 
                            $solar_system_company_header_button = get_theme_mod('solar_system_company_header_button', 'GET A QUOTE');
                            $solar_system_company_header_link = get_theme_mod('solar_system_company_header_link', '');

                            if (!empty($solar_system_company_header_button) || !empty($solar_system_company_header_link)) : ?>
                            <div class="col-lg-3 col-md-4 head-btn-col text-center align-self-center">
                                <span class="header-btn text-center">
                                    <a target="_blank" rel="noopener noreferrer" href="<?php echo esc_url($solar_system_company_header_link); ?>" class="offer-text">
                                        <?php echo esc_html($solar_system_company_header_button); ?>
                                    </a>
                                </span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>