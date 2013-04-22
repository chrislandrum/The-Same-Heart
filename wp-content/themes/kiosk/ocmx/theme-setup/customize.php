<?php //OCMX Custom logo and Favicon

function ocmx_logo_register($wp_customize){
    
    $wp_customize->add_section('ocmx_general', array(
        'title'    => __('General Theme Settings', 'ocmx'),
        'priority' => 30,
    ));
 
    $wp_customize->add_setting('ocmx_custom_logo', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ocmx_custom_logo', array(
        'label'    => __('Custom Logo', 'ocmx'),
        'section'  => 'ocmx_general',
        'settings' => 'ocmx_custom_logo',
    )));
    
    $wp_customize->add_setting('ocmx_custom_favicon', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',

    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'ocmx_custom_favicon', array(
        'label'    => __('Custom Favicon', 'ocmx'),
        'section'  => 'ocmx_general',
        'settings' => 'ocmx_custom_favicon',
    )));
    
}

add_action('customize_register', 'ocmx_logo_register');

// OCMX Color Options 

function ocmx_customize_register($wp_customize) {

	$wp_customize->add_section(
		'color_scheme', array(
		'title' => __( 'Theme Color Scheme', 'ocmx' ),
		'priority' => 35,
		)
	);
	
	//Custom Colors
	
	$wp_customize->add_setting('ocmx_ignore_colours', array(
        'default'        => 'no',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));

    $wp_customize->add_control('color_scheme', array(
        'label'      => __('Use Theme Defaults', 'ocmx'),
        'section'    => 'color_scheme',
        'settings'   => 'ocmx_ignore_colours',
        'type'       => 'radio',
        'priority' => 0,
        'choices'    => array(
            'yes' => 'Yes',
            'no' => 'No'
        ),
    ));
	
	$wp_customize->add_setting( 'ocmx_wrapper_background', array(
		'default' => '#f9f9f9',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_wrapper_background', array(
		'label' => __( 'Wrapper Background', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_wrapper_background',
		'priority' => 1,
		)
	));
	
	$wp_customize->add_setting( 'ocmx_navigation_links', array(
		'default' => '#747474',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_navigation_links', array(
		'label' => __( 'Navigation Links', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_navigation_links',
		'priority' => 4,
	)));
	
	$wp_customize->add_setting( 'ocmx_navigation_hover', array(
		'default' => '#0000000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_navigation_hover', array(
		'label' => __( 'Navigation Hover', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_navigation_hover',
		'priority' => 5,
	)));
	
	$wp_customize->add_setting( 'ocmx_border_color', array(
		'default' => '#CCCCCC',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_border_color', array(
		'label' => __( 'Border Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_border_color',
		'priority' => 6,
	)));
	
	$wp_customize->add_setting( 'ocmx_body_text', array(
		'default' => '#595959',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_body_text', array(
		'label' => __( 'General body text color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_body_text',
		'priority' => 7,
	)));
	
	$wp_customize->add_setting( 'ocmx_content_links', array(
		'default' => '#43C2F1',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_content_links', array(
		'label' => __( 'Content & Widget Link Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_content_links',
		'priority' => 8,
	)));
	
	$wp_customize->add_setting( 'ocmx_content_links_hover', array(
		'default' => '#000000',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_content_links_hover', array(
		'label' => __( 'Content & Widget Link Hover Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_content_links_hover',
		'priority' => 9,
	)));
	
	$wp_customize->add_setting( 'ocmx_buttons', array(
		'default' => '#CC3C24',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_buttons', array(
		'label' => __( 'Buttons', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_buttons',
		'priority' => 10,
	)));
	
	$wp_customize->add_setting( 'ocmx_buttons_shadow', array(
		'default' => '#9C2D1C',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_buttons_shadow', array(
		'label' => __( 'Buttons Shadow', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_buttons_shadow',
		'priority' => 11,
	)));
	
	$wp_customize->add_setting( 'ocmx_buttons_text', array(
		'default' => '#FFFFFF',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_buttons_text', array(
		'label' => __( 'Buttons Text', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_buttons_text',
		'priority' => 12,
	)));
	
	$wp_customize->add_setting( 'ocmx_buttons_hover', array(
		'default' => '#EE462C',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_buttons_hover', array(
		'label' => __( 'Buttons Hover Background Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_buttons_hover',
		'priority' => 13,
	)));
	
	$wp_customize->add_setting( 'ocmx_section_title', array(
		'default' => '#333333',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_section_title', array(
		'label' => __( 'Section Titles', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_section_title',
		'priority' => 14,
	)));
	
	$wp_customize->add_setting( 'ocmx_post_titles', array(
		'default' => '#3E3E3E',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_post_titles', array(
		'label' => __( 'Post Titles Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_post_titles',
		'priority' => 16,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_links', array(
		'default' => '#595959',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_links', array(
		'label' => __( 'Footer Links Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_footer_links',
		'priority' => 21,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_links_hover', array(
		'default' => '#43C2F1',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_links_hover', array(
		'label' => __( 'Footer Links Hover Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_footer_links_hover',
		'priority' => 22,
	)));
	
	$wp_customize->add_setting( 'ocmx_footer_text', array(
		'default' => '#595959',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_footer_text', array(
		'label' => __( 'Footer Text Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_footer_text',
		'priority' => 23,
	)));
	
	$wp_customize->add_setting( 'ocmx_copyright_text', array(
		'default' => '#595959',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ocmx_copyright_text', array(
		'label' => __( 'Footer Copyright Text Color', 'ocmx' ),
		'section' => 'color_scheme',
		'settings' => 'ocmx_copyright_text',
		'priority' => 24,
	)));
	
	wp_reset_query();

//ADD JQUERY

if ( $wp_customize->is_preview() && ! is_admin() )
	add_action( 'wp_footer', 'ocmx_customize_preview', 21);
	
	function ocmx_customize_preview() {
	?>
	<script type="text/javascript">

	( function( $ ){
		wp.customize('ocmx_wrapper_background',function( value ) {
			value.bind(function(to) {
				jQuery('#wrapper, .overlay h3 a, .content-widget .widgettitle a').css({'backgroundColor': to});
			});
		});

		wp.customize('ocmx_navigation_links',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav li a, .tabs-nav li a').css({'color': to});
			});
		});

		wp.customize('ocmx_navigation_hover',function( value ) {
			value.bind(function(to) {
				jQuery('ul#nav li a:hover').css({'color': to});
			});
		});
		
		wp.customize('ocmx_border_color',function( value ) {
			value.bind(function(to) {
				jQuery('#header, #footer, .widget_shopping_cart .total, #wrapper').css({'border-color': to});
			});
		});
		
		wp.customize('ocmx_body_text',function( value ) {
			value.bind(function(to) {
				jQuery('body, .logo .tagline').css({'color': to});
			});
		});
		
		wp.customize('ocmx_content_links',function( value ) {
			value.bind(function(to) {
				jQuery('.post-content a').css({'color': to});
			});
		});
		
			wp.customize('ocmx_content_links_hover',function( value ) {
			value.bind(function(to) {
				jQuery('.post-content a:hover, .post-title a:hover').css({'color': to});
			});
		});
		
		wp.customize('ocmx_buttons',function( value ) {
			value.bind(function(to) {
				jQuery('.more-info, .overlay .more-info-combo .text, .button, #submit').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_buttons_hover',function( value ) {
			value.bind(function(to) {
				jQuery('.more-info:hover, .overlay .more-info-combo .text:hover, .button:hover, #submit:hover').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_buttons_text',function( value ) {
			value.bind(function(to) {
				jQuery('.more-info, .overlay .more-info-combo .text, .button, #submit').css({'color': to});
			});
		});
		
		wp.customize('ocmx_section_title',function( value ) {
			value.bind(function(to) {
				jQuery('h3.widgettitle, .contact-details .details h4, #footer h4, h5, .about-me .post-title ').css({'color': to});
			});
		});
		
		wp.customize('ocmx_post_titles',function( value ) {
			value.bind(function(to) {
				jQuery('h2.post-title, .latest-news .post-title a, .post-title a, h3.post-title, .page-title, .overlay h3 a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_content_background',function( value ) {
			value.bind(function(to) {
				jQuery('.content-widget ul, .tab-content .tab-event, .sponsors ul, .audio-meta, .latest-video .video-meta, .latest-news li, .contact-details .details, .post-content, .latest-news .copy, .latest-news .copy, .dater .date-to').css({'backgroundColor': to});
			});
		});
		
		wp.customize('ocmx_footer_links',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container a, #footer a, .popular_posts a, ul#twitter_update_list li span a, ul#twitter_update_list li a, .obox-credit a').css({'color': to});
			});
		});
		
		wp.customize('ocmx_footer_links_hover',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container a:hover, #footer a:hover, .popular_posts a:hover, ul#twitter_update_list li span a:hover, ul#twitter_update_list li a:hover, .obox-credit a:hover').css({'color': to});
			});
		});
		
		wp.customize('ocmx_footer_text',function( value ) {
			value.bind(function(to) {
				jQuery('#footer-container, #footer, #footer ul li.column ul li, #footer .byline').css({'color': to});
			});
		});
		
		wp.customize('ocmx_copyright_text',function( value ) {
			value.bind(function(to) {
				jQuery('.footer-text p').css({'color': to});
			});
		});
	} )( jQuery );
	</script>
<?php } 

//ADD POST MESSAGE

$wp_customize->get_setting('ocmx_wrapper_background')->transport='postMessage';
$wp_customize->get_setting('ocmx_navigation_links')->transport='postMessage';
$wp_customize->get_setting('ocmx_navigation_hover')->transport='postMessage';
$wp_customize->get_setting('ocmx_border_color')->transport='postMessage';
$wp_customize->get_setting('ocmx_body_text')->transport='postMessage';
$wp_customize->get_setting('ocmx_content_links')->transport='postMessage';
$wp_customize->get_setting('ocmx_content_links_hover')->transport='postMessage';
$wp_customize->get_setting('ocmx_buttons')->transport='postMessage';
$wp_customize->get_setting('ocmx_buttons_shadow')->transport='postMessage';
$wp_customize->get_setting('ocmx_buttons_hover')->transport='postMessage';
$wp_customize->get_setting('ocmx_buttons_text')->transport='postMessage';
$wp_customize->get_setting('ocmx_section_title')->transport='postMessage';
$wp_customize->get_setting('ocmx_post_titles')->transport='postMessage';
$wp_customize->get_setting('ocmx_content_background')->transport='postMessage';
$wp_customize->get_setting('ocmx_footer_links')->transport='postMessage';
$wp_customize->get_setting('ocmx_footer_links_hover')->transport='postMessage';
$wp_customize->get_setting('ocmx_footer_text')->transport='postMessage';
$wp_customize->get_setting('ocmx_copyright_text')->transport='postMessage';
}
add_action( 'customize_register', 'ocmx_customize_register' );

function ocmx_add_query_vars($query_vars) {
	$query_vars[] = 'stylesheet';
	return $query_vars;
}
add_filter( 'query_vars', 'ocmx_add_query_vars' );
function ocmx_takeover_css() {
	    $style = get_query_var('stylesheet');
	    if($style == "custom") {
		    include_once(get_template_directory() . '/style.php');
	        exit;
	    }
	}
add_action( 'template_redirect', 'ocmx_takeover_css');