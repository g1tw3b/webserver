<?php
function solar_system_company_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_site_title_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'solar-system-company' ),
			'section'     => 'title_tagline',
			'settings'    => 'solar_system_company_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'solar_system_company_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'solar_system_company_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'solar_system_company_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'solar-system-company' ),
			'section'     => 'title_tagline',
			'settings'    => 'solar_system_company_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting( 'solar_system_company_upgrade_page_settings_9',
        array(
            'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new Solar_System_Company_Control_Upgrade(
        $wp_customize, 'solar_system_company_upgrade_page_settings_9',
            array(
                'priority'      => 200,
                'section'       => 'title_tagline',
                'settings'      => 'solar_system_company_upgrade_page_settings_9',
                'label'         => __( 'Solar System Company Pro comes with additional features.', 'solar-system-company' ),
                'choices'       => array( __( '12+ Sections', 'solar-system-company' ), __( 'One Click Demo Importer', 'solar-system-company' ), __( 'Section Reordering Facility', 'solar-system-company' ),__( 'Advance Typography', 'solar-system-company' ),__( 'Easy Customization', 'solar-system-company' ),__( '24x7 Support', 'solar-system-company' ), )
            )
        )
    ); 

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'solar_system_company_header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'solar-system-company'),
		) 
	);

	/*=========================================
	Solar System Company Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','solar-system-company'),
			'panel'  		=> 'solar_system_company_header_section',
		)
    );

	$wp_customize->register_panel_type( 'Solar_System_Company_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Solar_System_Company_WP_Customize_Section' );

}
add_action( 'customize_register', 'solar_system_company_header_settings' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Solar_System_Company_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'solar_system_company_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Solar_System_Company_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'solar_system_company_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}