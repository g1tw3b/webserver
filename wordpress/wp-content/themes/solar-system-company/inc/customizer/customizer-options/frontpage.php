<?php
function solar_system_company_blog_setting( $wp_customize ) {

$wp_customize->register_control_type( 'Solar_System_Company_Control_Upgrade' );

$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'solar_system_company_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'solar-system-company' ),
		)
	);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_slider_section', array(
			'title' => esc_html__( 'Slider Section', 'solar-system-company' ),
			'priority' => 13,
			'panel' => 'solar_system_company_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_slider_setting' , 
			array(
			'default' => false,
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'solar-system-company' ),
			'section'     => 'solar_system_company_slider_section',
			'settings'    => 'solar_system_company_slider_setting',
			'type'        => 'checkbox'
		) 
	);
	
	for ( $solar_system_company_count = 1; $solar_system_company_count <= 4; $solar_system_company_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'solar_system_company_slider_page' . $solar_system_company_count, array(
		'default'           => '',
		'sanitize_callback' => 'solar_system_company_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'solar_system_company_slider_page' . $solar_system_company_count, array(
		'label'    => __( 'Select Slide Image Page', 'solar-system-company' ),
		'section'  => 'solar_system_company_slider_section',
		'type'     => 'dropdown-pages'
	) );
	}

	// Slider Text
	$wp_customize->add_setting( 
    	'solar_system_company_slider_short_heading',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'solar_system_company_slider_short_heading',
		array(
		    'label'   		=> __('Slider Top Text','solar-system-company'),
		    'section'		=> 'solar_system_company_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'solar_system_company_slider_btn_text',
    	array(
			'default' => 'READ MORE',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'solar_system_company_slider_btn_text',
		array(
		    'label'   		=> __('Slider Button Text','solar-system-company'),
		    'section'		=> 'solar_system_company_slider_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'solar_system_company_slider_btn_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control( 
		'solar_system_company_slider_btn_link',
		array(
		    'label'   		=> __('Slider Button Link','solar-system-company'),
		    'section'		=> 'solar_system_company_slider_section',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_3',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_3',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_slider_section',
                'settings'      => 'solar_system_company_upgrade_page_settings_3',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	service Section
	=========================================*/

	$wp_customize->add_section(
		'solar_system_company_service_section', array(
			'title' => esc_html__( 'Our Services Section', 'solar-system-company' ),
			'priority' => 14,
			'panel' => 'solar_system_company_frontpage_sections',
		)
	);

	// Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_service_show_hide' , 
			array(
			'default' => false,
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_service_show_hide', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'solar-system-company' ),
			'section'     => 'solar_system_company_service_section',
			'settings'    => 'solar_system_company_service_show_hide',
			'type'        => 'checkbox'
		) 
	);

	// Button Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_serv_button_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_serv_button_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Button', 'solar-system-company' ),
			'section'     => 'solar_system_company_service_section',
			'settings'    => 'solar_system_company_serv_button_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
    	'solar_system_company_section_small_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'solar_system_company_section_small_text',
		array(
		    'label'   		=> __('Add Small Title','solar-system-company'),
		    'section'		=> 'solar_system_company_service_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'solar_system_company_section_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'solar_system_company_section_title',
		array(
		    'label'   		=> __('Add Heading','solar-system-company'),
		    'section'		=> 'solar_system_company_service_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$categories = get_categories();
    $cats = array();
    $i = 0;
    $offer_cat[]= 'select';
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $offer_cat[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
    	'solar_system_company_offer_section_category',
    	array(
	        'default'   => 'select',
	        'sanitize_callback' => 'solar_system_company_sanitize_choices',
    	)
    );
    $wp_customize->add_control(
    	'solar_system_company_offer_section_category',
    	array(
	        'type'    => 'select',
	        'choices' => $offer_cat,
	        'label' => __('Select Category','solar-system-company'),
	        'section' => 'solar_system_company_service_section',
    	)
    );

    // Setting for number of posts to show
    $wp_customize->add_setting('solar_system_company_posts_to_show', array(
        'default'           => 4, // Default number of posts to show
        'sanitize_callback' => 'absint', // Sanitization callback
    ));

    // Add control for number of posts to show
    $wp_customize->add_control('solar_system_company_posts_to_show', array(
        'label'       => __('Number of Popular Online Courses to Show', 'solar-system-company'),
        'section'     => 'solar_system_company_service_section',
        'priority'    => 10,
        'type'        => 'number',
        'input_attrs' => array(
            'step' => 1,
            'min'  => 0,
            'max'  => 50,
        ),
    ));

    // Get the number of posts to show
    $solar_system_company_posts_to_show = get_theme_mod('solar_system_company_posts_to_show', 4);
    
    // Loop to create settings and controls for each post's price and star rating
    for ($solar_system_company_i = 1; $solar_system_company_i <= $solar_system_company_posts_to_show; $solar_system_company_i++) {
        $wp_customize->add_setting('solar_system_company_global_amount' . $solar_system_company_i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('solar_system_company_global_amount' . $solar_system_company_i, array(
            'label'    => __('Add Goal Amount ', 'solar-system-company') . $solar_system_company_i,
            'section'  => 'solar_system_company_service_section',
            'type'     => 'text',
            'priority' => 998,
        ));

        $wp_customize->add_setting('solar_system_company_raised_amount' . $solar_system_company_i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));

        $wp_customize->add_control('solar_system_company_raised_amount' . $solar_system_company_i, array(
            'label'    => __('Add Raised Amount ', 'solar-system-company') . $solar_system_company_i,
            'section'  => 'solar_system_company_service_section',
            'type'     => 'text',
            'priority' => 998,
        ));

        $wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_4',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_4',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_service_section',
                'settings'      => 'solar_system_company_upgrade_page_settings_4',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

    }
}

add_action( 'customize_register', 'solar_system_company_blog_setting' );

// service selective refresh
function solar_system_company_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'solar_system_company_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'solar_system_company_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'solar_system_company_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'solar_system_company_blog_section_partials' );

// blog_title
function solar_system_company_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function solar_system_company_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function solar_system_company_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}