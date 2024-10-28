<?php
/**
 * Solar System Company Theme Customizer.
 *
 * @package Solar System Company
 */

 if ( ! class_exists( 'Solar_System_Company_Customizer' ) ) {

	/**
	 * Customizer Loader
	 *
	 * @since 1.0.0
	 */
	class Solar_System_Company_Customizer {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			/**
			 * Customizer
			 */
			add_action( 'customize_preview_init',                  array( $this, 'Solar_System_Company_Customize_preview_js' ) );
			add_action( 'customize_controls_enqueue_scripts', 	   array( $this, 'Solar_System_Company_Customizer_script' ) );
			add_action( 'customize_register',                      array( $this, 'Solar_System_Company_Customizer_register' ) );
			add_action( 'after_setup_theme',                       array( $this, 'Solar_System_Company_Customizer_settings' ) );
		}
		
		/**
		 * Add postMessage support for site title and description for the Theme Customizer.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function Solar_System_Company_Customizer_register( $wp_customize ) {
			
			$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
			$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
			$wp_customize->get_setting('custom_logo')->transport = 'refresh';			
			
			/**
			 * Helper files
			 */
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/sanitization.php';
		} 
		
		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 */
		function Solar_System_Company_Customize_preview_js() {
			wp_enqueue_script( 'solar-system-company-customizer', SOLAR_SYSTEM_COMPANY_PARENT_INC_URI . '/customizer/assets/js/customizer-preview.js', array( 'customize-preview' ), '20151215', true );
		}		
		
		function Solar_System_Company_Customizer_script() {
			 wp_enqueue_script( 'solar-system-company-customizer-section', SOLAR_SYSTEM_COMPANY_PARENT_INC_URI .'/customizer/assets/js/customizer-section.js', array("jquery"),'', true  );
		}

		// Include customizer customizer settings.
			
		function Solar_System_Company_Customizer_settings() {
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/header.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/upper-header.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/frontpage.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/footer.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/post.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/typography.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-options/general.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-pro/class-customize.php';
			require SOLAR_SYSTEM_COMPANY_PARENT_INC_DIR . '/customizer/customizer-pro/customizer-upgrade-class.php';
		}

	}
}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Solar_System_Company_Customizer::get_instance();