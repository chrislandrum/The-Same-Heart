<?php

/**

 * @package Akismet

 */

/*

Plugin Name: !Share

Plugin URI: http://cunjo.com/share

Description: Cunjo's !Share Social Plugin is a free, pretty, flexible and mobile ready Social Share Plugin. Way Better than most famous similar providers.

Version: 1.0.0

Author: Cunjo

Author URI: http://cunjo.com/

License: GPLv2 or later

*/



/*

This program is free software; you can redistribute it and/or

modify it under the terms of the GNU General Public License

as published by the Free Software Foundation; either version 2

of the License, or (at your option) any later version.



This program is distributed in the hope that it will be useful,

but WITHOUT ANY WARRANTY; without even the implied warranty of

MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the

GNU General Public License for more details.



You should have received a copy of the GNU General Public License

along with this program; 

License URI: http://www.gnu.org/licenses/gpl.html

*/


// Make sure we don't expose any info if called directly

if ( !function_exists( 'add_action' ) ) {

	echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';

	exit;

}



define('CUNJO_SHARE_VERSION', '1.0.0');

define('CUNJO_SHARE_URL', plugin_dir_url( __FILE__ ));

include_once dirname( __FILE__ ) . '/output.php';
include_once dirname( __FILE__ ) . '/ajaxify.php';

add_action( 'admin_menu', 'cunjo_share_menu' );
add_action( 'admin_init', 'cunjo_share_admin_init' );

function cunjo_share_admin_init() {
       wp_register_style( 'cunjo_share_css', CUNJO_SHARE_URL.'/css/form.css', __FILE__ );
}
function cunjo_share_menu() {
	$share_form = add_options_page( '!Share', '!Share', 'manage_options', 'cunjo-share-plugin', 'cunjo_share_options' );
	
	add_action( 'admin_print_styles-' . $share_form, 'cunjo_share_admin_styles' );
	add_action( 'admin_print_scripts-' . $share_form, 'cunjo_share_admin_scripts' );
}
function cunjo_share_admin_styles() {
       wp_enqueue_style( 'cunjo_share_css' );
}
function cunjo_share_admin_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-effects-core');
		wp_enqueue_script('jquery-effects-slide');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-slider');
		//wp_enqueue_script('sortable', CUNJO_SHARE_URL. '/js/jquery.sortable.js', __FILE__);
		wp_register_script( 'cunjo_share_js', CUNJO_SHARE_URL.'/js/form.js', __FILE__, '1.2.4', TRUE );
       	wp_enqueue_script( 'cunjo_share_js');
			$themeUrl   = get_bloginfo('template_url');
			$pluginUrl = CUNJO_SHARE_URL;
			$ajaxUrl = admin_url( 'admin-ajax.php' );
			$wpUrl = get_site_url();
			wp_localize_script( 'cunjo_share_js', 'blogVars', array(
				'themeUrl'   => $themeUrl,
				'pluginUrl'   => $pluginUrl,
				'ajaxUrl'   => $ajaxUrl,
				'wpUrl' => $wpUrl,
				)
			);
}

function cunjo_share_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap" style="min-height: 500px; position: relative;">';
	echo 	'<div class="shareform-header"><img class="alignnone size-full wp-image-310" alt="header" src="'.CUNJO_SHARE_URL.'/images/header.jpg" width="1000" height="153" /></div>';
	echo 		'<div class="cunjo_share">';
	$shareID = get_option('shareID');
	if(empty($shareID)) {
		echo get_license();
	}
	else {
		echo get_main();
	}
	echo 		'</div>';
	echo '</div>';
	echo	 '<div class="cunjo-footer">';
	echo	 	'<a href="http://cunjo.com/share" class="useful-links">Support, Feedback & Version Releases</a>';
	echo	 	'<a href="http://cunjo.com" class="cunjo-credits"></a>';
	echo	 '</div>';
}
function cunjo_displaybar() {
	$barCheck = get_option('ShareBarActive');
	if($barCheck == 1) {
		$ShareID = get_option('shareID');
		$ShareBarSocials = get_option('ShareBarSocials');
		$ShareBarSocials = implode(',', $ShareBarSocials);
		$ShareBarSettings = get_option('ShareBarSettings');
		//json_decode($ShareBarSettings, true);
		$ShareBarMessage = get_option('ShareBarMessage');
		foreach($ShareBarSettings as $key => $value) {
			$barsettings .= $key.'="'.$value.'" ';
		}
		if(isset($ShareBarMessage) && !empty($ShareBarMessage)) {
			$ShareBarLink = get_option('ShareBarLink');
			$ShareBarIcon = get_option('ShareBarIcon');
			$barmessage .= ' message="'.$ShareBarMessage.'"';
			$barmessage .= ' messageicon="'.$ShareBarIcon.'"';
			$barmessage .= ' messagelink="'.$ShareBarLink.'"';
		}
		echo '<div id="!Share" socials="'.$ShareBarSocials.'" shareID="'.$ShareID.'" '.$barsettings.$barmessage.'></div>';
		if ( is_user_logged_in() && $ShareBarSettings['layout'] == 'top_tab') {
			echo '<style>#Share-bar{top: 28px !important;}</style>';
		}
	}
}
add_action("wp_head", 'cunjo_displaybar');
function cunjo_sharescript() {
	$barCheck = get_option('ShareBarActive');
	if($barCheck == 1) {
		wp_enqueue_script('cunjo_share', 'http://cunjo.com/!Share/js/!Share.js');   
	}
}    
 
add_action('wp_enqueue_scripts', 'cunjo_sharescript'); // For use on the Front end (ie. Theme)

function cunjo_displayline( $content ) {
	$lineCheck = get_option('ShareLineActive');
	if($lineCheck == 1) {
		if(is_single() || is_page()) {
			$ShareLineSettings = get_option('ShareLineSettings');
			if($ShareLineSettings['showing'] == 'above') {
				$custom_content .= show_shareline($ShareLineSettings, get_the_ID());
				$custom_content .= $content;
			}
			else {
				$custom_content .= $content;
				$custom_content .= show_shareline($ShareLineSettings, get_the_ID());
			}
			return $custom_content;
		}
	}
	else {
		return $content;
	}
}
add_filter( 'the_content', 'cunjo_displayline' );
function cunjoshare_action_links($links, $file) {
    static $this_plugin;
 
    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }
     if ($file == $this_plugin) {
        $settings_link = '<a href="admin.php?page=cunjo-share-plugin">Settings</a>';
        array_unshift($links, $settings_link);
    }
    return $links;
}
add_filter('plugin_action_links', 'cunjoshare_action_links', 10, 2);
?>