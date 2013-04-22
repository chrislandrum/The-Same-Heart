<?php function get_obox_image($width = 590, $height = '', $href_class = 'thumbnail', $wrap = '', $wrap_class = '', $hide_href = false, $exclude_video = false, $zc = 1, $imglink = false, $imgnocontainer = false, $resizer = ''){
	global $post, $blog_id;
	$args = array(
		'postid' => $post->ID,
		'width' => $width,
		'height' => $height,
		'href_class' => $href_class,
		'wrap' => $wrap,
		'wrap_class' => $wrap_class,
		'hide_href' => $hide_href,
		'exclude_video' => $exclude_video,
		'zc' => $zc,
		'imglink' => $imglink,
		'imgnocontainer' => $imgnocontainer,
		'resizer' => $resizer
	);
	return get_obox_media($args);
};
function get_obox_media($args){
	global $blog_id;
	$defaults = array (
 		'postid' => 0,
 		'width' => 590,
 		'height' => '',
 		'href_class' => '',
 		'wrap' => '',
 		'wrap_class' => '',
 		'hide_href' => false,
 		'exclude_video' => false,
 		'zc' => 1,
 		'imglink' => false,
 		'imgnocontainer' => false,
 		'resizer' => 'medium',
 		'imagefallback' => false
	);
	
	$args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );
	
	//Set image HTML to nothing
	$img_html = "";
	
	//Set up which meta value we're using for the post
	if(!get_option("ocmx_thumbnail_usage")) :
		$meta = "wordpress";
	elseif(get_option("ocmx_thumbnail_usage") == "none") :
		return false;
	elseif(get_option("ocmx_thumbnail_usage") != "0") :
		$meta = get_option("ocmx_thumbnail_usage");
	elseif(!get_option("ocmx_thumbnail_custom") !== "") :
		$meta = get_option("ocmx_thumbnail_custom");
	else :
		$meta = "other_media";
	endif;	//Check for a thumbnail using the meta
	
	$get_thumbnail = get_post_meta($postid, $meta, true);
	$soundcloud = get_post_meta($postid, "soundcloud", true);
	$get_post_video = get_post_meta($postid, "main_video", true);
	$video_embed_link = get_post_meta($postid, "video_link", true);
	$video_hosted = get_post_meta($postid, "video_hosted", true);
	if ($soundcloud != "" && $exclude_video == false) :
		$post_image =  $soundcloud;
		$hide_href = true;
	elseif ($video_hosted != "" && $exclude_video == false) :
		if($height == '') :
			$height = round($width/1.77, 0);
		endif;
		$post_image = obox_player($post, $width, $height);
		$hide_href = true;
				
	elseif ($video_embed_link != "" && $exclude_video == false) :
	    $hasvideo = 1;
        
        if($height == '')
	        $height = round($width/1.77, 0);
        
        $embed_code = '[embed width="'.$width.'" height="'.$height.'"]'.$video_embed_link.'[/embed]';
		
		$wp_embed = new WP_Embed();
		$post_image = $wp_embed->run_shortcode($embed_code);
		$hide_href = true;
	elseif ($get_post_video !== "" && $exclude_video == false) :
	    $link = "";
		$post_image = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $width \" wmode=\"transparent\"", $get_post_video);
		if($height == '')
			$height = round($width/1.77, 0);
		
		$post_image = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $height $2", $post_image);
		$hide_href = true;
	//Begin the thumbnail check
	elseif (function_exists("has_post_thumbnail") && has_post_thumbnail($postid)) :
		// Set the height to a huge number so that WP only sizes to the width
		if($height == "")
			$height = 9999; 
		//Set the post Image Path
		$post_image = get_the_post_thumbnail($postid, $resizer); 
	elseif ($get_thumbnail !== "") :
		$get_effect = get_post_meta($postid, "other_media_effect", true);
		if($get_effect != "") :
			$effect = "&amp;f=".$get_effect;
		else  :
			$effect = "";
		endif;
		if(is_multisite()) :					
			$get_thumbnail = str_replace(get_site_url($blog_id), "", $get_thumbnail);
			$get_thumbnail = str_replace("/files/", "/wp-content/blogs.dir/$blog_id/files/", $get_thumbnail); 
		endif;			
		$post_image = "<img src=\"".get_bloginfo('template_directory')."/functions/timthumb.php?src=$get_thumbnail&amp;w=$width&amp;h=$height&amp;zc=$zc".$effect."\" alt=\"$post->post_title\" />";
	elseif ($imagefallback == true) :	
		$attachmentargs = array("post_type" => "attachment", "post_parent" => $postid, "numberposts" => "1", "orderby" => "menu_order", "order" => "ASC");
		$attachments = get_posts($attachmentargs);
		$post_image = wp_get_attachment_image($attachments[0]->ID, $resizer);
	else :
		//There is no image, lets quit
		return false;
	endif;
	
	//Create the image HTML with the link around it	
	if($imglink != true) :
		$link = get_permalink($postid);
	elseif($meta == "wordpress" && function_exists("has_post_thumbnail") && has_post_thumbnail()) :
		$link = wp_get_attachment_url( get_post_thumbnail_id($postid), "full" );
	else :
		$link = $get_thumbnail;
	endif;
	
	$href_class = "class=\"$href_class\"";
	if($hide_href == false && !isset($hasvideo)) :
		$img_html = "<a href=\"$link\">$post_image</a>";
	else :
		$img_html = $post_image;
	endif;
	
	//Class for the surrounding divs
	if($wrap_class != "") :
    	$class = " class=\"$wrap_class\"";
	else :
		$class = "";
    endif;
    
	if(($wrap !== "" && isset($hasvideo)) || (!isset($hasvideo) && $wrap != "" && $imgnocontainer !== true)) :
    	$img_html = "<$wrap".$class.">".$img_html."</$wrap>";
	else :
		$img_html;
	endif;
	
	return $img_html;
}

function obox_has_video($post_id = 0){
	$get_post_video = get_post_meta($post_id, "main_video", true);
	$video_embed_link = get_post_meta($post_id, "video_link", true);
	$video_hosted = get_post_meta($post_id, "video_hosted", true);
	if($get_post_video != "" || $video_embed_link != "" || $video_hosted != "") :
		return true;
	else :
		return false;
	endif;
} ?>