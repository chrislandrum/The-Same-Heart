<?php
global $obox_meta, $theme_options;

/* Setup Post Image Sizes */
add_image_size("post", 590, 350, true);

$theme_options = array();

$theme_options["general_site_options"] =
		array(
				array("label" => "Custom Logo", "description" => "Full URL or folder path to your custom logo.", "name" => "ocmx_custom_logo", "default" => "", "id" => "upload_button", "input_type" => "file", "args" => array("width" => 90, "height" => 75)),		
				array("label" => "Favicon", "description" => "Select a favicon for your site", "name" => "ocmx_custom_favicon", "default" => "", "id" => "upload_button_favicon", "input_type" => "file", "sub_title" => "favicon", "args" => array("width" => 16, "height" => 16)),		
				array("label" => "Color Options", "description" => "Select your desired colour option.", "name" => "ocmx_theme_style", "default" => "light", "id" => "", "input_type" => "select", "options" => array("Light (Default)" => "light", "Dark" => "dark")),
				array("label" => "Purchase Options", "description" => "", "name" => "ocmx_buttons_option", "default" => "", "id" => "ocmx_buttons_option", "zero_wording" => "", "input_type" => "select", "options" => array("Button Slide" => "slide", "Price Visible" => "visible")),
				array(
						"main_section" => "Post Meta",
						"main_description" => "These settings control which post meta is displayed in posts,pages and some widgets.",
						"sub_elements" => 
							array(
								array("label" => "Date", "description" => "Uncheck to turn off date. Does not affect events.","name" => "ocmx_meta_date", "", "default" => "true", "id" => "ocmx_meta_date", "input_type" => "checkbox"),
								array("label" => "Tags", "description" => "Check to show tags on single posts", "name" => "ocmx_meta_tags", "default" => "false", "id" => "ocmx_meta_tags", "input_type" => "checkbox"),
								array("label" => "Comment Link", "description" => "Uncheck to hide the comment link on archives.", "name" => "ocmx_meta_comments", "default" => "true", "id" => "ocmx_meta_comments", "input_type" => "checkbox"),
								array("label" => "Short URL", "description" => "Uncheck to hide the Sharing Short-URL on posts and products.", "name" => "ocmx_short_url", "default" => "true", "id" => "ocmx_short_url", "input_type" => "checkbox"),
							)
						),
				array("label" => "Custom CSS", "description" => "Enter changed classes from the theme stylesheet, or custom CSS here.", "name" => "ocmx_custom_css", "default" => "", "id" => "ocmx_custom_css", "input_type" => "memo"),
				array("label" => "Custom RSS URL", "description" => "", "name" => "ocmx_rss_url", "default" => "", "id" => "", "input_type" => "text"),
				array("label" => "Custom Footer Text", "description" => "", "name" => "ocmx_custom_footer", "default" => "Copyright 2012. Kiosk was created in WordPress by Obox Themes."	, "id" => "ocmx_custom_footer", "input_type" => "memo"),
				array("label" => "Hide Obox Logo", "description" => "Hide the Obox Logo from the footer.", "name" => "ocmx_logo_hide", "default" => "false", "id" => "ocmx_logo_hide", "input_type" => "checkbox"),
				array("label" => "Site Analytics", "description" => "Enter in the Google Analytics Script here.","name" => "ocmx_googleAnalytics", "default" => "", "id" => "","input_type" => "memo")
		);
$theme_options["seo_options"] = array(
							array("label" => "Use OCMX SEO", "description" => "Select \"No\" if you are using an SEO plugin.", "name" => "ocmx_seo", "default" => "yes", "input_type" => "select", "options" => array("Yes" => "yes", "No" => "no")),
							array("label" => "Separator", "description" => "Define a new seperator character for your page titles.", "name" => "ocmx_seperator", "default" => "|", "input_type" => "text"),
							array("label" => "Site Wide Title", "description" => "Set your site's meta title.", "name" => "ocmx_meta_title", "default" =>  get_bloginfo("title"), "input_type" => "text"),
							array("label" => "Site Keywords", "description" => "", "name" => "ocmx_meta_keywords", "default" => "", "input_type" => "text"),
							array("label" => "Site Description", "description" => "Use a custom meta description.", "name" => "ocmx_meta_description", "default" => get_bloginfo("description"), "input_type" => "memo")
						
						);
	
/***************************************************************************/
/* Setup Defaults for this theme for optiosn which aren't set in this page */

update_option("ocmx_general_font_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_navigation_font_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_sub_navigation_font_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_post_font_titles_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_post_font_meta_style_default", "'Droid Serif', Georgia, 'Times New Roman', Times, serif");
update_option("ocmx_post_font_copy_font_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_widget_font_titles_font_style_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");
update_option("ocmx_widget_footer_titles_font_size_default", "'Helvetica Neue', Helvetica, Arial, sans-serif");


update_option("ocmx_general_font_color_default", "#595959");
update_option("ocmx_navigation_font_color_default", "#777");
update_option("ocmx_sub_navigation_font_color_default", "#fff");
update_option("ocmx_post_titles_font_color_default", "#6684BF");
update_option("ocmx_post_meta_font_color_default", "#878787");
update_option("ocmx_post_copy_font_color_default", "#595959");
update_option("ocmx_widget_titles_font_color_default", "#333");
update_option("ocmx_widget_footer_titles_font_color_default", "#333");

update_option("ocmx_general_font_size_default", "13");
update_option("ocmx_navigation_font_size_default", "12");
update_option("ocmx_sub_navigation_font_size_default", "12");
update_option("ocmx_post_titles_font_size_default", "25");
update_option("ocmx_post_meta_font_size_default", "11");
update_option("ocmx_post_copy_font_size_default", "13");
update_option("ocmx_widget_titles_font_size_default", "13");
update_option("ocmx_widget_footer_titles_font_size_default", "13");

update_option("allow_gallery_effect", "1");

add_action("switch_theme", "remove_ocmx_gallery_effects"); 
function remove_ocmx_gallery_effects(){delete_option("allow_gallery_effect");};
?>