<?php
function solar_system_company_upper_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	/*=========================================
	top header
	=========================================*/
	$wp_customize->add_section(
        'solar_system_company_topbar',
        array(
        	'priority'      => 3,
            'title' 		=> __('Header Information','solar-system-company'),
			'panel'  		=> 'solar_system_company_header_section',
		)
    );

	$wp_customize->add_setting('solar_system_company_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('solar_system_company_mail',array(
		'label'	=> __('Add Mail Address','solar-system-company'),
		'section'=> 'solar_system_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('solar_system_company_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('solar_system_company_location',array(
		'label'	=> __('Add location','solar-system-company'),
		'section'=> 'solar_system_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('solar_system_company_phone_no',array(
		'default'=> '',
		'sanitize_callback'	=> 'solar_system_company_sanitize_phone_number'
	));
	$wp_customize->add_control('solar_system_company_phone_no',array(
		'label'	=> __('Add Phone No','solar-system-company'),
		'section'=> 'solar_system_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('solar_system_company_header_button',array(
		'default'=> 'GET A QUOTE',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('solar_system_company_header_button',array(
		'label'	=> __('Header Button Text','solar-system-company'),
		'section'=> 'solar_system_company_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('solar_system_company_header_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('solar_system_company_header_link',array(
		'label'	=> __('Header Button Link','solar-system-company'),
		'section'=> 'solar_system_company_topbar',
		'type'=> 'url'
	));

		// Social Link
	$wp_customize->add_section( 'solar_system_company_social_media', array(
    	'title'      => __( 'Social Media Links', 'solar-system-company' ),
    	'description' => __( 'Add your Social Links', 'solar-system-company' ),
		'panel' => 'solar_system_company_header_section',
      'priority' => 4,
	) );

	$wp_customize->add_setting('solar_system_company_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('solar_system_company_facebook_url',array(
		'label'	=> __('Facebook Link','solar-system-company'),
		'section'=> 'solar_system_company_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('solar_system_company_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('solar_system_company_instagram_url',array(
		'label'	=> __('Instagram Link','solar-system-company'),
		'section'=> 'solar_system_company_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('solar_system_company_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('solar_system_company_twitter_url',array(
		'label'	=> __('Twitter Link','solar-system-company'),
		'section'=> 'solar_system_company_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('solar_system_company_linkedin_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('solar_system_company_linkedin_url',array(
		'label'	=> __('Linkedin Link','solar-system-company'),
		'section'=> 'solar_system_company_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_13',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_13',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_social_media',
                'settings'      => 'solar_system_company_upgrade_page_settings_13',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    );
}
add_action( 'customize_register', 'solar_system_company_upper_header_settings' );