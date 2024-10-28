<?php

function solar_system_company_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'solar_system_company_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'solar-system-company'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'footer_top',
        array(
            'title' 		=> __('Footer Widgets','solar-system-company'),
			'panel'  		=> 'footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'solar-system-company' ),
			'section'     => 'footer_top',
			'settings'    => 'solar_system_company_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_1',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_1',
            array(
                'priority'      => 200,
                'section'       => 'footer_top',
                'settings'      => 'solar_system_company_upgrade_page_settings_1',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	// Footer Bottom // 
	$wp_customize->add_section(
        'solar_system_company_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','solar-system-company'),
			'panel'  		=> 'solar_system_company_footer_section',
			'priority'      => 3,
		)
    );
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'solar_system_company_footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'solar_system_company_sanitize_text',
			'priority'  => 3,
		)
	);

	// Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'solar-system-company' ),
			'section'     => 'solar_system_company_footer_bottom',
			'settings'    => 'solar_system_company_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright 
	$wp_customize->add_setting(
    	'solar_system_company_footer_copyright',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'solar_system_company_footer_copyright',
		array(
		    'label'   		=> __('Copyright','solar-system-company'),
		    'section'		=> 'solar_system_company_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_2',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_2',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_footer_bottom',
                'settings'      => 'solar_system_company_upgrade_page_settings_2',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 
}
add_action( 'customize_register', 'solar_system_company_footer' );

// Footer selective refresh
function solar_system_company_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'solar_system_company_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'solar_system_company_footer_partials' );

// copyright_content
function solar_system_company_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}