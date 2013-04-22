<?php global $layout;
	if($layout == "one-column") :
		$width = 940;
		$resizer = '800x533';
	elseif($layout == "two-column") :
		$width = 460;
		$resizer = '520x347';
	elseif($layout == "three-column") :
		$width = 300;
		$resizer = '240x160';
	else :
		$width = 300;
		$resizer = '240x160';
	endif;
	$link = get_permalink($post->ID); 
    $args  = array('postid' => $post->ID, 'width' => $width, 'height' => '', 'hide_href' => false, 'exclude_video' => $post_thumb, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => $resizer);
	$image = get_obox_media($args); 
?>
<li>
    <?php if($image != "") : ?> 
    	<div class="post-image fitvid"> 
  			<?php echo $image; ?>
        </div>
    <?php endif; ?>
   
    <?php 
        $excerpt = get_the_excerpt();
        $excerpttext = strip_tags($excerpt);
    ?>
   
    <h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
    <?php the_excerpt(); ?>
   <a href="<?php echo $link; ?>" class="more-info">View</a>
</li>