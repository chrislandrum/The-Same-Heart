<?php


//show all thumbnails function
function show_all_thumbs() {
	global $post;
	$post = get_post($post);
	$images =& get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&orderby=menu_order&order=ASC&post_parent='.$post->post_parent);
	if($images){
		foreach( $images as $imageID => $imagePost ){
			if($imageID==$post->ID){
			} else {
				$thumblist .= '<li class="item">';
				unset($the_b_img);
				$the_b_img = wp_get_attachment_image_src($imageID, 'full', false);

				$thumblist .= '<a href="'.get_attachment_link($imageID).'"><img src="'. get_template_directory_uri() .'/timthumb.php?src='. $the_b_img[0] .'&amp;w=148&&amp;h=98" /></a>';
				$thumblist .= '</li>';
			}
		}
	}
	return $thumblist;
}

?>