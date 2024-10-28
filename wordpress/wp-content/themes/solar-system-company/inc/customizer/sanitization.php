<?php
/**
 * Customizer: Sanitization Callbacks
 *
 * This file demonstrates how to define sanitization callback functions for various data types.
 * 
 * @package   Solar System Company
 * @copyright Copyright (c) 2015, WordPress Theme Review Team
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

function solar_system_company_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function solar_system_company_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}

/* Sanitization Text*/
function solar_system_company_sanitize_text( $text ) {
	return wp_filter_post_kses( $text );
}

function solar_system_company_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function solar_system_company_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}