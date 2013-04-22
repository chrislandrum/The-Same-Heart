<?php get_header(); ?>
		
		<div id="widget-block" class="clearfix">
			<?php if(!is_active_sidebar("homepage")) :
			   $ocmx_slider_widget = new ocmx_slider_widget();
			   $args = array("name" => "(Obox) Slider Widget", "id" => "slider-widget");
			   $ocmx_slider_widget->widget($args, $instance);
			else :
			   dynamic_sidebar("homepage");
			endif; ?>
		</div>
    
<?php get_footer(); ?>