</div>
<footer class="footer-area">  
   <div class="container"> 
		<?php $solar_system_company_footer_widgets_setting = get_theme_mod('solar_system_company_footer_widgets_setting','1');
		do_action('solar_system_company_footer_above'); 
			if ( is_active_sidebar( 'solar-system-company-footer-widget-area' ) ) { 
				if( $solar_system_company_footer_widgets_setting != ''){?> ?>
				<div class="row footer-row"> 
					<?php dynamic_sidebar( 'solar-system-company-footer-widget-area' ); ?>
				</div>  
			<?php } ?>
		<?php }?>
	</div>
	
	<?php 
		$solar_system_company_footer_copyright = get_theme_mod('solar_system_company_footer_copyright','');
	?>
	<?php $solar_system_company_footer_copyright_setting = get_theme_mod('solar_system_company_footer_copyright_setting','1');
	 if( $solar_system_company_footer_copyright_setting != ''){?> 
	<div class="copy-right"> 
		<div class="container">
			<p class="copyright-text">
				<?php
					echo esc_html( apply_filters('solar_system_company_footer_copyright',($solar_system_company_footer_copyright)));
			    ?>
				<?php if (empty($solar_system_company_footer_copyright)) { ?>
				    <?php echo esc_html__('Copyright &copy; 2024,', 'solar-system-company'); ?>
				    <a href="<?php echo esc_url('https://www.seothemesexpert.com/products/free-solar-wordpress-theme'); ?>" target="_blank">
				        <?php echo esc_html__('Solar System Company', 'solar-system-company'); ?>
				    </a>
				    <span> | </span>
				    <a href="<?php echo esc_url('https://wordpress.org/'); ?>" target="_blank">
				        <?php echo esc_html__('WordPress Theme', 'solar-system-company'); ?>
				    </a>
				<?php } ?>
			</p>
		</div>
	</div>
	<?php }?>
	<?php $solar_system_company_scroll_top = get_theme_mod('solar_system_company_scroll_top_setting','1');
      if($solar_system_company_scroll_top == '1') { ?>
		<a id="scrolltop"><span><?php esc_html_e('TOP','solar-system-company'); ?><span></a>
	<?php } ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>