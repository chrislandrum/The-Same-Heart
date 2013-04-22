<?php  global $themename, $input_prefix;

/*****************/
/* Theme Details */

$themename = "Kiosk";
$themeid = "kiosk";
$productid = "1560";

/**********************/
/* Include OCMX files */
$include_folders = array("/ocmx/includes/", "/ocmx/theme-setup/", "/ocmx/widgets/", "/ocmx/front-end/", "/ajax/");

// This is a hack, to avoid the "headers already sent by...." error which pops up when you call pages directly from wp-admin/ like edit.php for example	
if(check_allow_ocmx() == true) :
	$include_folders[] = "/ocmx/interface/";
endif;
include_once (get_template_directory()."/ocmx/folder-class.php");
include_once (get_template_directory()."/ocmx/load-includes.php");
include_once (get_template_directory()."/ocmx/custom.php");
include_once (get_template_directory()."/ocmx/seo-post-custom.php");

/**********************/
/* "Hook" up the OCMX */

add_theme_support( 'post-thumbnails' );
add_custom_background();
update_option("ocmx_font_support", true);
add_action('init', 'ocmx_add_scripts');
add_action('after_setup_theme', 'ocmx_setup');

/************************/
/* Add WP Custom Header */
function header_style() { $do = "nothing"; }
function admin_header_style() { $do = "nothing"; }
define('HEADER_TEXTCOLOR', 'ffffff');
define('NO_HEADER_TEXT', true );
//define('HEADER_IMAGE', ''); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 800); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 150);
add_custom_image_header('header_style', 'admin_header_style');


function add_widgetized_pages(){
	global $wpdb;
	$get_widget_pages = $wpdb->get_results("SELECT * FROM ".$wpdb->postmeta." WHERE `meta_key` = '_wp_page_template' AND  `meta_value` = 'widget-page.php'");
	foreach($get_widget_pages as $pages) :
		$post = get_post($pages->post_id);
		register_sidebar(array("name" => $post->post_title." Slider Widget", "description" => "Place all 'Home Page Widgets' here."));
		register_sidebar(array("name" => $post->post_title." Body", "description" => "Place all 'Home Page Widgets' here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4><div class="content">', 'before_widget' => '<li id="%1$s" class="widget %2$s">', 'after_widget' => '</div></li>'));
	endforeach;
}
add_action("init", "add_widgetized_pages");

/*********************/
/* Load Localization */
load_theme_textdomain('ocmx', get_template_directory() . '/lang');

/***********************/
/* Add OCMX Menu Items */

add_action('admin_menu', 'ocmx_add_admin');
function ocmx_add_admin() {
	global $wpdb;
	
	add_object_page("Theme Options", "Theme Options", 'edit_themes', basename(__FILE__), '', 'http://obox-design.com/images/ocmx-favicon.png');
	
	//Check if we need to upgrade the Gallery Table
	check_gallery_table();
	
	add_submenu_page(basename(__FILE__), "General Options", "General", "administrator", basename(__FILE__), 'ocmx_general_options');
	add_submenu_page(basename(__FILE__), "Typography", "Typography", "administrator", "ocmx-fonts", 'ocmx_font_options');
	add_submenu_page(basename(__FILE__), "Customize", "Customize", "edit_theme_options", "customize.php");
	add_submenu_page(basename(__FILE__), "Help", "Help", "manage_options", "obox-help", 'ocmx_welcome_page');

	
};

/*****************/
/* Add Nav Menus */

if (function_exists('register_nav_menus')) :
	register_nav_menus( array(
		'primary' => __('Primary Navigation', '$themename')
	) );
endif;

/************************************************/
/* Fallback Function for WordPress Custom Menus */

function ocmx_fallback() {
	echo '<ul id="nav" class="clearfix">';
	wp_list_pages('title_li=&');
	echo '</ul>';
}

/***********************************************************************/
/* Set the parameters which allow the /interface/ folder to be included*/

function check_allow_ocmx(){
	return true;
}

/*******************************/
/* Integrate goo.gl Shortlinks */

function googl_shortlink($url, $post_id) {
	global $post;
	if (!$post_id && $post) $post_id = $post->ID;

	if ($post->post_status != 'publish')
		return "";

	$shortlink = get_post_meta($post_id, '_googl_shortlink', true);
	if ($shortlink)
		return $shortlink;

	$permalink = get_permalink($post_id);

	$http = new WP_Http();
	$headers = array('Content-Type' => 'application/json');
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 'method' => 'POST', 'body' => '{"longUrl": "' . $permalink . '"}', 'headers' => $headers));
	if(is_array($result))
		$result = json_decode($result['body']);
	$shortlink = isset($result->id);

	if ($shortlink) {
		add_post_meta($post_id, '_googl_shortlink', $shortlink, true);
		return $shortlink;
	}
	else {
		return $url;
	}
}

add_filter('get_shortlink', 'googl_shortlink', 9, 2);

/**************************/
/* WP 3.4 Support         */
global $wp_version;
if ( version_compare( $wp_version, '3.4', '>=' ) ) 
	add_theme_support( 'custom-background' ); 
	add_theme_support( 'post-thumbnails' ); 
	add_theme_support( 'automatic-feed-links' ); 

if ( ! isset( $content_width ) ) $content_width = 800;

/******************************************************************************/
/* Each theme has their own "No Posts" styling, so it's kept in functions.php */

function ocmx_no_posts(){ ?>
<li class="post transparent-container">					
    <div class="content clearfix">
        <h3 class="post-title"><a href="#"><?php _e("Page Not Found", "ocmx"); ?></a></h3>
        <div class="post-meta clearfix"></div>
        <div class="copy <?php echo $image_class; ?>">
             <?php _e("The page you are looking for does not exist", "ocmx"); ?>
        </div>
	</div>
</li>
<?php 
}
/**************************/
/* Set the Excerpt Length */
function new_excerpt_length($length) {
	return 35;
}
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', 'new_excerpt_more');

function my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
}

function my_admin_styles() {
	wp_enqueue_style('thickbox');
}

add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');

function ocmx_setup_image_sizes() {
	//image info: (name, width, height, force-crop)
	add_image_size('800x533', 800, 533, true);
	add_image_size('520x347', 520, 347, true);
	add_image_size('440x330', 440, 330, true);
	add_image_size('380x587', 380, 587, true);
  	add_image_size('247x165', 247, 165, true); 
  	add_image_size('240x160', 240, 160, true);
  	add_image_size('520', 520, 9999);
} 

add_action( 'after_setup_theme', 'ocmx_setup_image_sizes' );

?>