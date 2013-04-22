<?php $link = get_permalink($post->ID); 
$args  = array('postid' => $post->ID, 'width' => 520, 'height' => 347, 'hide_href' => false, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => '520x347');
$image = get_obox_media($args);?>
<li class="post clearfix">		
    <div class="content clearfix">
    	
        <div class="post-title-block">
          <?php if(get_option("ocmx_meta_date") != "false"): ?>  
            <h5 class="date post-date"><?php echo date('d M Y', strtotime($post->post_date)); ?> <?php _e("by",'ocmx'); ?> <?php the_author_posts_link(); ?> <?php _e("in",'ocmx'); ?> <?php the_category(", ",'ocmx'); ?> </h5>
          <?php endif; ?>
            <h2 class="post-title typography-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>
        </div>
        
		<?php if($image != "") : ?> 
	    	<div class="post-image fitvid"> 
	  			<?php echo $image; ?>
	        </div>
	    <?php endif; ?>
        
        <div class="copy <?php echo $image_class; ?>">
             <?php if($post->post_excerpt !== "") :
                the_excerpt();
            else :
                the_content("");
            endif; ?>
        </div>    
            
         <ul class="post-meta">
            <li class="meta-block">
            <?php if($post->post_excerpt !== ""): ?>
                <a href="<?php echo $link; ?>" class="action-link"><?php _e("Continue Reading",'ocmx'); ?></a>
            <?php endif; ?>
            <?php if(get_option("ocmx_meta_comments") != "false"): ?>
                <a href="<?php echo $link; ?>#comments" class="comment-count"><?php comments_number(__('0 Comments','ocmx'),__('1 Comment','ocmx'),__('% Comments','ocmx')); ?></a>
            <?php endif; ?>
            </li>
         </ul>
	</div>
</li>