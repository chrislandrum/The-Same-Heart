<?php  global $woocommerce; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<!--
<script type="text/javascript" src="//use.typekit.net/ddk2cup.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

-->

<?php 
	ocmx_site_title();
	ocmx_meta_keywords();
	ocmx_meta_description();
?>
<?php if(get_option("ocmx_custom_favicon") != "") : ?>
<link href="<?php echo get_option("ocmx_custom_favicon"); ?>" rel="icon" type="image/png" />
<?php endif; ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<?php echo theme_colour_styles(); ?>
<link href="<?php echo get_template_directory_uri(); ?>/responsive.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo home_url('/'); ?>?stylesheet=custom" rel="stylesheet" type="text/css" />
<link href="<?php echo get_template_directory_uri(); ?>/custom.css" rel="stylesheet" type="text/css" />

<?php if(get_option("ocmx_rss_url")) : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo get_option("ocmx_rss_url"); ?>" />
<?php else : ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!--[if lt IE 9]>
       <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ie.css" media="screen" />
<![endif]-->

<?php wp_head(); ?>

</head>

<body <?php body_class(''); ?>>
<div id="wrapper">

<div id="header-container">
	<div id="header" class="clearfix">
        
    	<div class="logo">
            <h1>
                <a href="<?php home_url(); ?>">
                    <?php if(get_option("ocmx_custom_logo")) : ?>
                        <img src="<?php echo get_option("ocmx_custom_logo"); ?>" alt="<?php bloginfo('name'); ?>" />
                    <?php else : ?>
                        <?php echo strip_tags(bloginfo('name')); ?>
                    <?php endif; ?>
                </a>
            </h1>
            <p class="tagline">
				<?php echo strip_tags(bloginfo('description')); ?>
            </p>
        </div>
        
        <?php 

        if (function_exists("wp_nav_menu")) :	
            wp_nav_menu(array(
                    'menu' => 'Kiosk Nav',
                    'menu_id' => 'nav',
                    'menu_class' => 'clearfix',
                    'sort_column' 	=> 'menu_order',
                    'theme_location' => 'primary',
                    'container' => 'ul',
					'fallback_cb' => 'ocmx_fallback')
        );
    	endif; ?>
        
    </div>

	<?php if(get_header_image() != "") : ?>    
    	<div id="header-banner">
            <img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" />
	    </div>
	<?php endif; ?>
    
</div>

    <div id="content-container" class="clearfix">