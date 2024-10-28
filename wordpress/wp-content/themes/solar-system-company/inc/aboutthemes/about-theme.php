<?php
/**
 * Theme Page
 *
 * @package Solar System Company
 */

if ( ! defined( 'SOLAR_SYSTEM_COMPANY_FREE_THEME_URL' ) ) {
	define( 'SOLAR_SYSTEM_COMPANY_FREE_THEME_URL', 'https://www.seothemesexpert.com/products/free-solar-wordpress-theme' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_PRO_THEME_URL' ) ) {
	define( 'SOLAR_SYSTEM_COMPANY_PRO_THEME_URL', 'https://www.seothemesexpert.com/products/solar-website-template' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_FREE_DOCS_THEME_URL' ) ) {
    define( 'SOLAR_SYSTEM_COMPANY_FREE_DOCS_THEME_URL', 'https://demo.seothemesexpert.com/documentation/solar-system-company/' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_DEMO_THEME_URL' ) ) {
	define( 'SOLAR_SYSTEM_COMPANY_DEMO_THEME_URL', 'https://demo.seothemesexpert.com/solar-system-company/' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_RATE_THEME_URL' ) ) {
    define( 'SOLAR_SYSTEM_COMPANY_RATE_THEME_URL', 'https://wordpress.org/support/theme/solar-system-company/reviews/#new-post' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_SUPPORT_THEME_URL' ) ) {
    define( 'SOLAR_SYSTEM_COMPANY_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/solar-system-company/' );
}
if ( ! defined( 'SOLAR_SYSTEM_COMPANY_THEME_BUNDLE_URL' ) ) {
    define( 'SOLAR_SYSTEM_COMPANY_THEME_BUNDLE_URL', 'https://www.seothemesexpert.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function solar_system_company_menu() {
	add_theme_page( esc_html__( 'About Theme', 'solar-system-company' ), esc_html__( 'About Theme', 'solar-system-company' ), 'edit_theme_options', 'solar-system-company-about', 'solar_system_company_about_display' );
}
add_action( 'admin_menu', 'solar_system_company_menu' );

/**
 * Display About page
 */
function solar_system_company_about_display() { ?>
	<div class="wrap about-wrap full-width-layout">		
		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'solar-system-company' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'solar-system-company-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'solar-system-company-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'solar-system-company' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'solar-system-company-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'solar-system-company' ); ?></a>
		</nav>

		<?php
			solar_system_company_main_screen();

			solar_system_company_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'solar-system-company' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'solar-system-company' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'solar-system-company' ) : esc_html_e( 'Go to Dashboard', 'solar-system-company' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function solar_system_company_main_screen() {
	if ( isset( $_GET['page'] ) && 'solar-system-company-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="main-col-box">
			<div class="feature-section two-col">
				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Upgrade To Pro', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'Take a step towards excellence, try our premium theme. Use Code', 'solar-system-company' ) ?><span class="usecode">" STEPro10 "</span></p>
					<p><a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_PRO_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade Pro', 'solar-system-company' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Lite Documentation', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'The free theme documentation can help you set up the theme.', 'solar-system-company' ) ?></p>
					<p><a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_FREE_DOCS_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Lite Documentation', 'solar-system-company' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Info', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'Know more about Solar System Company.', 'solar-system-company' ) ?></p>
					<p><a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_FREE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Info', 'solar-system-company' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'You can get all theme options in customizer.', 'solar-system-company' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'solar-system-company' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Need Support?', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'If you are having some issues with the theme or you want to tweak some thing, you can contact us our expert team will help you.', 'solar-system-company' ) ?></p>
					<p><a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'solar-system-company' ); ?></a></p>
				</div>

				<div class="card">
					<h2 class="title"><?php esc_html_e( 'Review', 'solar-system-company' ); ?></h2>
					<p><?php esc_html_e( 'If you have loved our theme please show your support with the review.', 'solar-system-company' ) ?></p>
					<p><a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_RATE_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Rate Us', 'solar-system-company' ); ?></a></p>
				</div>		
			</div>
			<div class="about-theme">
				<?php $solar_system_company_theme = wp_get_theme(); ?>

				<h1><?php echo esc_html( $solar_system_company_theme ); ?></h1>
				<p class="version"><?php esc_html_e( 'Version', 'solar-system-company' ); ?>: <?php echo esc_html($solar_system_company_theme['Version']);?></p>
				<div class="theme-description">
					<p class="actions">
						<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'solar-system-company' ); ?></a>

						<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'solar-system-company' ); ?></a>

						<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_THEME_BUNDLE_URL ); ?>" class="bundle button button-secondary" target="_blank"><?php esc_html_e( 'Buy All Themes', 'solar-system-company' ); ?></a>

						<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'solar-system-company' ); ?></a>
					</p>
				</div>
				<div class="theme-screenshot">
					<img src="<?php echo esc_url( $solar_system_company_theme->get_screenshot() ); ?>" />
				</div>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function solar_system_company_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<div class="theme-description">
				<p class="actions">
					<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_PRO_THEME_URL ); ?>" class="protheme button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'solar-system-company' ); ?></a>

					<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_DEMO_THEME_URL ); ?>" class="demo button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'solar-system-company' ); ?></a>

					<a href="<?php echo esc_url( SOLAR_SYSTEM_COMPANY_FREE_DOCS_THEME_URL ); ?>" class="docs button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'solar-system-company' ); ?></a>
				</p>
			</div>
			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'solar-system-company' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'solar-system-company' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'solar-system-company' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'One click demo import', 'solar-system-company' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Color pallete and font options', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Demo Content has 8 to 10 sections', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Rearrange sections as per your need', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Internal Pages', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Plugin Integration', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Ultimate technical support', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access our Support Forums', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Get regular updates', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Install theme on unlimited domains', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Mobile Responsive', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Easy Customization', 'solar-system-company' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn protheme button button-secondary" href="<?php echo esc_url(SOLAR_SYSTEM_COMPANY_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'solar-system-company' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
