<?php
function solar_system_company_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'solar_system_company_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 2000, 
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'default-image'          => get_template_directory_uri() . '/assets/images/custom-header.png',
	) ) );
}
add_action( 'after_setup_theme', 'solar_system_company_custom_header_setup' );

register_default_headers( array(
	'default-image' => array(
		'url'           => get_template_directory_uri() . '/assets/images/custom-header.png',
		'thumbnail_url' => get_template_directory_uri() . '/assets/images/custom-header.png',
		'description'   => __( 'Default Header Image', 'solar-system-company' ),
	),
) );