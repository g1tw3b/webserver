<?php 
	$solar_system_company_hs_breadcrumb = get_theme_mod('solar_system_company_hs_breadcrumb','1');
?>
<?php if ( get_header_image() ) : ?>
	<section class="slider-area breadcrumb-section">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
		</a>
        <div class="about-banner-text">
        	<?php if($solar_system_company_hs_breadcrumb == '1') { ?>
	        	<ol class="breadcrumb-list">
					<?php solar_system_company_breadcrumbs(); ?>
				</ol>
			<?php } ?>
			<h1><?php solar_system_company_breadcrumb_title(); ?></h1>
        </div>
    </section>
<?php endif; ?>