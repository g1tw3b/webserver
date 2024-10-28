<?php
function solar_system_company_typography_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'solar_system_company_typography', array(
			'priority' => 31,
			'title' => esc_html__( 'Typography', 'solar-system-company' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'solar_system_company_typography_settings', array(
			'title' => esc_html__( 'Typography Option', 'solar-system-company' ),
			'priority' => 1,
			'panel' => 'solar_system_company_typography',
		)
	);
	$solar_system_company_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);

	$wp_customize->add_setting( 'solar_system_company_headings_text', array(
		'sanitize_callback' => 'solar_system_company_sanitize_fonts',
	));

	$wp_customize->add_control( 'solar_system_company_headings_text', array(
		'type' => 'select',
		'description' => __('Select your appropriate font for the headings.', 'solar-system-company'),
		'section' => 'solar_system_company_typography_settings',
		'choices' => $solar_system_company_font_choices

	));

	$wp_customize->add_setting( 'solar_system_company_body_text', array(
		'sanitize_callback' => 'solar_system_company_sanitize_fonts'
	));

	$wp_customize->add_control( 'solar_system_company_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your appropriate font for the body.', 'solar-system-company' ),
		'section' => 'solar_system_company_typography_settings',
		'choices' => $solar_system_company_font_choices
	) );
	
	$wp_customize->add_section(
	'solar_system_company_dynamic_color_settings', array(
		'title' => esc_html__( 'Dynamic Color Options', 'solar-system-company' ),
		'priority' => 1,
		'panel' => 'solar_system_company_typography',
		)
	);

	$wp_customize->add_setting('solar_system_company_dynamic_color_one', array(
        'default'           => '#0cd4ff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'solar_system_company_dynamic_color_one', array(
        'label'    => __('First Dynamic Color', 'solar-system-company'),
        'section'  => 'solar_system_company_dynamic_color_settings',
    )));

    $wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_12',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_12',
            array(
                'priority'      => 200,
                'section'       => 'solar_system_company_dynamic_color_settings',
                'settings'      => 'solar_system_company_upgrade_page_settings_12',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    );
}

add_action( 'customize_register', 'solar_system_company_typography_setting' );