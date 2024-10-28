<?php
function solar_system_company_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'solar_system_company_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'solar-system-company' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'solar-system-company' ),
			'priority' => 1,
			'panel' => 'solar_system_company_post',
		)
	);
		
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
		'solar_system_company_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'solar-system-company' ),
			'section'     => 'solar_system_company_archive_post_setting',
			'settings'    => 'solar_system_company_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_10',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_10',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_archive_post_setting',
                'settings'      => 'solar_system_company_upgrade_page_settings_10',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_single_post', array(
			'title' => esc_html__( 'Single Post', 'solar-system-company' ),
			'priority' => 3,
			'panel' => 'solar_system_company_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);
	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'solar-system-company' ),
			'section'     => 'solar_system_company_single_post',
			'settings'    => 'solar_system_company_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_11',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_11',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_single_post',
                'settings'      => 'solar_system_company_upgrade_page_settings_11',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    );
}

add_action( 'customize_register', 'solar_system_company_post_setting' );