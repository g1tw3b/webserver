<?php

// In your theme's functions.php or equivalent
add_action('customize_controls_enqueue_scripts', function() {
    $version = wp_get_theme()->get('Version');
    
    // Define parameters
    $customizer_params = array(
        'some_key' => 'some_value', // Add your parameters here
    );
    
    wp_enqueue_script(
        'solar-system-company-customize-section-button',
        get_theme_file_uri('assets/js/customize-controls.js'),
        ['customize-controls'],
        $version,
        true
    );

    wp_enqueue_style(
        'solar-system-company-customize-section-button',
        get_theme_file_uri('assets/css/customize-controls.css'),
        ['customize-controls'],
        $version
    );

    wp_localize_script(
        'solar-system-company-customize-section-button',
        'solar_system_company_customizer_params',
        $customizer_params
    );
});

//Admin Enqueue for Admin
function solar_system_company_admin_enqueue_scripts(){
	wp_enqueue_style('solar-system-company-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'solar_system_company_admin_enqueue_scripts' );



 /**
 * Enqueue scripts and styles.
 */
function solar_system_company_scripts() {
	// Styles	 

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );
		
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome-all.css' );
	
	wp_enqueue_style('solar-system-company-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');

	wp_enqueue_style('solar-system-company-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('solar-system-company-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'solar-system-company-style', get_stylesheet_uri() );


	wp_enqueue_style('solar-system-company-main', get_stylesheet_uri(), array() );
		wp_style_add_data('solar-system-company-main', 'rtl', 'replace');
	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('solar-system-company-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'jquery-superfish', get_theme_file_uri( '/assets/js/jquery.superfish.js' ), array( 'jquery' ), '2.1.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// inlin css
	$solar_system_company_inline_style = '';

	$solar_system_company_slider_setting = get_theme_mod( 'solar_system_company_slider_setting', false);
	if($solar_system_company_slider_setting == false) {
	    $solar_system_company_inline_style .= '.page-template-template-frontpage header.main-header{';
	    $solar_system_company_inline_style .= 'position:static;';
	    $solar_system_company_inline_style .= '}';
	}

	wp_add_inline_style( 'solar-system-company-style', $solar_system_company_inline_style );

}
add_action( 'wp_enqueue_scripts', 'solar_system_company_scripts' );