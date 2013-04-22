<?php header('Content-type: text/css'); ?>
<?php if(get_option("ocmx_ignore_colours") != "yes"): ?>
	<?php if(get_option("ocmx_body_text")) : ?>
		body, .logo .tagline{color: <?php echo get_option('ocmx_body_text');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_wrapper_background")) : ?>
		#wrapper, .overlay h3 a, .content-widget .widgettitle a{background-color: <?php echo get_option('ocmx_wrapper_background');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_navigation_background")) : ?>
		#navigation-container{background-color: <?php echo get_option('ocmx_navigation_background');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_navigation_links")) : ?>
		ul#nav li a{color: <?php echo get_option('ocmx_navigation_links');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_navigation_hover")) : ?>
		ul#nav li a:hover,.dater .date-to{color: <?php echo get_option('ocmx_navigation_hover');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_border_color")) : ?>
		#header, #footer, .section-title-404, .widget_shopping_cart .total, #wrapper{border-color: <?php echo get_option('ocmx_border_color');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_buttons")) : ?>
		.next-prev-post-nav a, .portfolio-category-list a, .more-info, .overlay .more-info-combo .text, .button, #submit{background-color: <?php echo get_option('ocmx_buttons');?>; color: <?php echo get_option('ocmx_buttons_text');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_buttons_shadow")) : ?>
		.next-prev-post-nav a:hover, .portfolio-category-list a:hover, .more-info, .overlay .more-info-combo .text, .button, #submit{box-shadow: 0px 3px 0px <?php echo get_option('ocmx_buttons_shadow');?>; }
	<?php endif; ?>
	<?php if(get_option("ocmx_buttons_hover")) : ?>
		.more-info:hover, .overlay .more-info-combo .text:hover, .button:hover, #submit:hover{background-color: <?php echo get_option('ocmx_buttons_hover');?>; border-color: <?php echo get_option('ocmx_buttons_hover');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_post_titles")) : ?>
		h2.post-title, .latest-news .post-title a, .post-title a, h3.post-title, .page-title, .overlay h3 a{color: <?php echo get_option('ocmx_post_titles');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_section_title")) : ?>
		h3.widgettitle, .contact-details .details h4, #footer h4, .comments .section-title, h4, .comment-form-content label, h5, .about-me .post-title {color: <?php echo get_option('ocmx_section_title');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_content_background")) : ?>
		.content-widget ul, .tab-content .tab-event, .sponsors ul, .audio-meta, .latest-video .video-meta, .latest-news li, .contact-details .details, .post-content, .latest-news .copy, .dater .date-to {background-color: <?php echo get_option('ocmx_content_background');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_content_background")) : ?>
		.latest-gallery .masonry a{border-color: <?php echo get_option('ocmx_content_background');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_content_links")) : ?>
		.details a, .meta, .meta a, .byline, .post-content a, .tab-event a, .post-content .copy a{color: <?php echo get_option('ocmx_content_links');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_content_links_hover")) : ?>
		.latest-news .post-title a:hover, .post-title a:hover, .details a:hover, .meta a:hover, .post-content a:hover, .tab-event a:hover, .post-content .copy a:hover{color: <?php echo get_option('ocmx_content_links_hover');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_footer_background")) : ?>
		#footer-container, #footer, input[type="text"], input[type="password"], textarea, .copy pre{background-color: <?php echo get_option('ocmx_footer_background');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_footer_links")) : ?>
		#footer-container a, #footer a, .popular_posts a, ul#twitter_update_list li span a, ul#twitter_update_list li a, .obox-credit a{color: <?php echo get_option('ocmx_footer_links');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_footer_links_hover")) : ?>
		#footer-container a:hover, #footer a:hover, .popular_posts a:hover, ul#twitter_update_list li span a:hover, ul#twitter_update_list li a:hover, .obox-credit a:hover{color: <?php echo get_option('ocmx_footer_links_hover');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_footer_text")) : ?>
		#footer-container, #footer, #footer ul li.column ul li, #footer .byline{color: <?php echo get_option('ocmx_footer_text');?>;}
	<?php endif; ?>
	<?php if(get_option("ocmx_copyright_text")) : ?>
		.footer-text p{color: <?php echo get_option('ocmx_copyright_text');?>;}
	<?php endif; ?>
<?php endif; ?>
<?php if(get_header_image() != "" && is_home()) : ?>
	#header-banner{background: url('<?php header_image(); ?>') center no-repeat;}
<?php endif; ?>
<?php if(get_option("ocmx_custom_css") != ""): ?>
	<?php echo get_option("ocmx_custom_css"); ?>
<?php endif; ?>