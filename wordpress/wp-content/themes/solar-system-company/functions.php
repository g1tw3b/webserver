<?php
if ( ! function_exists( 'solar_system_company_setup' ) ) :
function solar_system_company_setup() {

// Root path/URI.
define( 'SOLAR_SYSTEM_COMPANY_PARENT_DIR', get_template_directory() );
define( 'SOLAR_SYSTEM_COMPANY_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR', SOLAR_SYSTEM_COMPANY_PARENT_DIR . '/inc');
define( 'SOLAR_SYSTEM_COMPANY_PARENT_INC_URI', SOLAR_SYSTEM_COMPANY_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */

	load_theme_textdomain( 'solar-system-company', get_stylesheet_directory() . '/languages' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary Menu', 'solar-system-company' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
		
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'solar_system_company_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', solar_system_company_google_font_url() ) );

}
endif;
add_action( 'after_setup_theme', 'solar_system_company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function solar_system_company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'solar_system_company_content_width', 1170 );
}
add_action( 'after_setup_theme', 'solar_system_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function solar_system_company_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'solar-system-company' ),
		'id' => 'solar-system-company-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'solar-system-company' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'solar-system-company' ),
		'id' => 'solar-system-company-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'solar-system-company' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'solar_system_company_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/fonts.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

add_filter( 'nav_menu_link_attributes', 'solar_system_company_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function solar_system_company_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function solar_system_company_remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'solar_system_company_remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting


// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'solar_system_company_custom_shop_loop_columns');

if (!function_exists('solar_system_company_custom_shop_loop_columns')) {
    function solar_system_company_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $solar_system_company_columns = get_theme_mod('solar_system_company_custom_shop_per_columns', 3);
        return $solar_system_company_columns;
    }
}

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'solar_system_company_custom_shop_per_page', 20);

if (!function_exists('solar_system_company_custom_shop_per_page')) {
    function solar_system_company_custom_shop_per_page($solar_system_company_products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $solar_system_company_products_per_page = get_theme_mod('solar_system_company_custom_shop_product_per_page', 9);
        return $solar_system_company_products_per_page;
    }
}

function solar_system_company_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('solar_system_company_notice_dismissed')) {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="solar-system-company-getting-started-notice clearfix">
            <div class="solar-system-company-theme-notice-content">
                <h2 class="solar-system-company-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'solar-system-company'), '<strong>' . wp_get_theme()->get('Name') . '</strong>');
                    ?>
                </h2>
            
                <a class="solar-system-company-btn-get-started button button-primary button-hero solar-system-company-button-padding" href="<?php echo esc_url(admin_url('themes.php?page=solar-system-company-about')); ?>"><?php esc_html_e('Get started', 'solar-system-company') ?></a><span class="solar-system-company-push-down">
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'solar_system_company_activation_notice');

// Add Ajax action to handle dismiss
add_action('solar_system_company_wp_ajax_dismiss_notice', 'solar_system_company_dismiss_notice');

// Reset the dismissed status when the theme is activated
function solar_system_company_notice_status() {
    delete_option('solar_system_company_notice_dismissed');
}
add_action('after_switch_theme', 'solar_system_company_notice_status');

function solar_system_company_dismiss_notice() {
    update_option('solar_system_company_notice_dismissed', true);
    wp_die('Notice dismissed');
}

/**
 * Generate Google fonts URL.
 */
function solar_system_company_google_font_url() {
    $font_family = array(
        'Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
        'Roboto+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900'
    );

    $query_args = array(
        'family' => rawurlencode(implode('|', $font_family)),
    );

    return add_query_arg($query_args, 'https://fonts.googleapis.com/css');
}

/**
 * Enqueue theme styles and scripts.
 */
function solar_system_company_scripts_styles() {
    // Enqueue Google Fonts
    wp_enqueue_style('solar-system-company-google-fonts', solar_system_company_google_font_url(), array(), null);
    
    // Enqueue other styles and scripts as needed
    wp_enqueue_style('solar-system-company-main-style', get_stylesheet_uri(), array(), '1.0.0');
    // Add more enqueuing here if needed
}
add_action('wp_enqueue_scripts', 'solar_system_company_scripts_styles');

function solar_system_company_fonts_scripts() {
	$solar_system_company_headings_font = esc_html(get_theme_mod('solar_system_company_headings_text'));
	$solar_system_company_body_font = esc_html(get_theme_mod('solar_system_company_body_text'));

	if( $solar_system_company_headings_font ) {
		wp_enqueue_style( 'solar-system-company-headings-fonts', '//fonts.googleapis.com/css?family='. $solar_system_company_headings_font );
	} else {
		wp_enqueue_style( 'solar-system-company-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $solar_system_company_body_font ) {
		wp_enqueue_style( 'solar-system-company-body-fonts', '//fonts.googleapis.com/css?family='. $solar_system_company_body_font );
	} else {
		wp_enqueue_style( 'solar-system-company-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'solar_system_company_fonts_scripts' );

/**
 * Enqueue theme color style.
 */
function solar_system_company_theme_color_option() {

    $solar_system_company_dynamic_color_one = get_theme_mod('solar_system_company_dynamic_color_one');

    // Start building the CSS string
    $solar_system_company_theme_color_css = '
        .theme-button,.theme-button:hover,.theme-button:focus,.blog-item.sticky:before,.loader span::before,.navbar a.contactus:hover,.lower-header-area,.upper-header-area a.myaccount-icon i,.main-header .navbar .navbar-menu ul li.dropdown .sub-menu,.main-header .navbar-menubar ul ul,#slider-section .read-btn a,.blog-item::after,.sidebar>.widget form button,.footer-area .widget form button,.sidebar>.widget form button:hover, .footer-area .widget form button:hover,.wp-block-calendar table th,.calendar_wrap table th,.sidebar .wp-block-calendar table td#today,.sidebar .calendar_wrap table td#today,.widget .wp-block-calendar .wp-calendar-nav span.wp-calendar-nav-prev a:hover,
        .widget .wp-block-calendar .wp-calendar-nav span.wp-calendar-nav-prev a:focus,.widget .calendar_wrap .wp-calendar-nav span.wp-calendar-nav-prev a:hover,.widget .calendar_wrap .wp-calendar-nav span.wp-calendar-nav-prev a:focus,.comment-body::after,.comment-edit-link,.comment-reply-link,.comment-edit-link:hover, .comment-edit-link:focus,.comment-reply-link:hover,.error-area .error-item .back-btn,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links .page-numbers.current,.sidebar>.widget form button, .footer-area .widget form button,.comment-form input[type="submit"],.topbar,.product .product-single .sale-ribbon,#slider .owl-prev, #slider .owl-next,#slider .slider-btn1,#service-section .owl-prev, #service-section .owl-next,.woocommerce-MyAccount-navigation ul li a {
            background: ' . esc_attr($solar_system_company_dynamic_color_one) . ';
        	}
            .loader,.product-content h4 a:hover, .slider-post a:hover, .product-content a:hover, .header-details i:hover, .upper-header-area a i:hover, button.category-btn:hover, .upper-header-area a:hover,.main-header .navbar .navbar-nav > li:hover a,.main-header .navbar .navbar-nav > li.focus a,.main-header .navbar .navbar-nav > li.active a,.main-header .navbar .navbar-nav > li a.active,.main-header .navbar .navbar-menu ul li.dropdown>a::after,.sidebar .widget li a::after,.sidebar .widget:not(.widget_social_widget):not(.widget_tag_cloud):not(.widget_shopping_cart) li a:hover,.sidebar .widget:not(.widget_social_widget):not(.widget_tag_cloud):not(.widget_shopping_cart) li a:focus,.sidebar .widget:not(.widget_social_widget):not(.widget_tag_cloud):not(.widget_shopping_cart) li a:hover:after,.sidebar .widget:not(.widget_social_widget):not(.widget_tag_cloud):not(.widget_shopping_cart) li a:focus:after,.sidebar .wp-block-calendar table td a, .sidebar .calendar_wrap table td a,.comment-metadata a:hover,.comment-metadata a:focus,.comment-author a:hover,.comment-author a:focus,.product-single .product-content h3 a,.woocommerce div.product p.price, .woocommerce div.product span.price,.footer-area .footer-widget .widget:not(.widget_social_widget):not(.widget_tag_cloud) li:before,.footer-area .footer-widget .widget:not(.widget_social_widget):not(.widget_tag_cloud) li a:hover,.woocommerce ul.products li.product .price,ol.breadcrumb-list a,.woocommerce table.shop_table th,tr.woocommerce-cart-form__cart-item.cart_item td a,ul.page-numbers li a,a.add_to_wishlist,.blog-item .comment-timing li a i,#comments a,.woocommerce-account .addresses .title .edit, .woocommerce table.my_account_orders td.woocommerce-orders-table__cell-order-number a, .woocommerce-account .woocommerce-MyAccount-content p a,.post-content a,span.feedback a,span.posted_in a,span.feedback a,.comment-timing i,#slider .slider-btn1 i,#slider .highlight,#service-section p.amount{
            	color: ' . esc_attr($solar_system_company_dynamic_color_one) . ';
            }
            .blog-item .blog-content h5.post-title:hover,.blog-item .blog-content h5.post-title a:hover,.blog-item .blog-content .heding:hover{
            	color: ' . esc_attr($solar_system_company_dynamic_color_one) . '!important;
            }

            .loader,.loader::before,blockquote:after, blockquote:before,input[type="text"]:not(.adminbar-input), input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea, .form-control,.blog-item,.blog-item .blog-content::before,.blog-item .blog-content::after,.sidebar .widget,.comments-area,.comment-body,.comment-body .comment-content::after,.comment-body .comment-meta::before,.comment-form textarea,.sidebar .widget, .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-MyAccount-navigation ul li a:focus,p.woocommerce-notice.woocommerce-notice--success, div.woocommerce-info, p.woocommerce-info, li.woocommerce-info,.main-header .navbar .navbar-menu ul li.current-menu-item a,#slider .owl-prev, #slider .owl-next,#slider .owl-dots .owl-dot.active,#service-section .owl-prev, #service-section .owl-next,#service-section .read-btn a,#service-section .read-btn a,#service-section .owl-dots .owl-dot.active,#service-section .read-btn a:hover{ 
            	border-color: ' . esc_attr($solar_system_company_dynamic_color_one) . ';
        	}
        	.sidebar .widget,.comments-area{ 
            	box-shadow: 3px 5px '. esc_attr($solar_system_company_dynamic_color_one) .';
        	}
        	#scrolltop,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce table.shop_table a.remove,.woocommerce p.woocommerce-result-count,.woocommerce ul.products li.product .product-action .button.add_to_cart_button, .woocommerce ul.products li.product a.wc-forward,.woocommerce nav.woocommerce-pagination ul li a.page-numbers:focus, .woocommerce nav.woocommerce-pagination ul li a.page-numbers:hover, .woocommerce nav.woocommerce-pagination ul li span.page-numbers.current,.search_inner button[type="submit"],.woocommerce span.onsale,.middle-header-area .head-btn-col:hover,#slider .inner_carousel p.slidetop-text, #service-section .small-title,#slider .owl-dots .owl-dot.active,#service-section .read-btn a:hover,#service-section .owl-dots .owl-dot.active,.comment-respond .form-submit input#submit{
            background-color: ' . esc_attr($solar_system_company_dynamic_color_one) . ';
        	}

        	.progress-bar.bg-secondary{
            background-color: ' . esc_attr($solar_system_company_dynamic_color_one) . '!important;
        	}
    ';

    wp_add_inline_style('solar-system-company-style', $solar_system_company_theme_color_css);
}

add_action('wp_enqueue_scripts', 'solar_system_company_theme_color_option');