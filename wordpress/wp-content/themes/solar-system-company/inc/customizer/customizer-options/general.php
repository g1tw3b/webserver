<?php
function solar_system_company_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'solar_system_company_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'solar-system-company' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Section', 'solar-system-company' ),
			'priority' => 1,
			'panel' => 'solar_system_company_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'solar_system_company_breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'solar_system_company_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'solar_system_company_breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Settings','solar-system-company'),
			'section' => 'solar_system_company_breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'solar-system-company' ),
			'section'     => 'solar_system_company_breadcrumb_setting',
			'settings'    => 'solar_system_company_hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_5',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_5',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_breadcrumb_setting',
                'settings'      => 'solar_system_company_upgrade_page_settings_5',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_preloader_section_setting', array(
			'title' => esc_html__( 'Preloader', 'solar-system-company' ),
			'priority' => 3,
			'panel' => 'solar_system_company_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_preloader_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'solar-system-company' ),
			'section'     => 'solar_system_company_preloader_section_setting',
			'settings'    => 'solar_system_company_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_6',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_6',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_preloader_section_setting',
                'settings'      => 'solar_system_company_upgrade_page_settings_6',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top', 'solar-system-company' ),
			'priority' => 3,
			'panel' => 'solar_system_company_general',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'solar-system-company' ),
			'section'     => 'solar_system_company_scroll_to_top_section_setting',
			'settings'    => 'solar_system_company_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_7',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_7',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_scroll_to_top_section_setting',
                'settings'      => 'solar_system_company_upgrade_page_settings_7',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'solar-system-company' ),
			'priority' => 3,
			'panel' => 'solar_system_company_general',
		)
	);

	$wp_customize->add_setting(
    	'solar_system_company_custom_shop_per_columns',
    	array(
			'default' => '3',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'solar_system_company_custom_shop_per_columns',
		array(
		    'label'   		=> __('Product Per Columns','solar-system-company'),
		    'section'		=> 'solar_system_company_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'solar_system_company_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'absint',
		)
	);	
	$wp_customize->add_control( 
		'solar_system_company_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','solar-system-company'),
		    'section'		=> 'solar_system_company_woocommerce_section_setting',
			'type' 			=> 'number',
			'transport'         => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'solar-system-company' ),
			'section'     => 'solar_system_company_woocommerce_section_setting',
			'settings'    => 'solar_system_company_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		)
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_8',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_8',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_woocommerce_section_setting',
                'settings'      => 'solar_system_company_upgrade_page_settings_8',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

}

add_action( 'customize_register', 'solar_system_company_general_setting' );