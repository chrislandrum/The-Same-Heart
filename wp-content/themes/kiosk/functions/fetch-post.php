<?php $link = get_permalink($post->ID);

$args  = array('postid' => $post->ID, 'width' => 520, 'height' => 347, 'hide_href' => false, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => '520x347');
$image = get_obox_media($args);?>
<li class="post">		
	<?php if(!is_page() && get_post_type() != "portfolio") : ?>
       <?php if(get_option("ocmx_meta_date") != "false"): ?>  
    	<h5 class="date">
    		<?php echo date_i18n('d F Y', strtotime($post->post_date)); ?>, <?php _e("written by", "ocmx"); ?> <?php the_author_posts_link(); ?>
    	</h5>
        <?php endif; ?>
    <?php endif; ?>
    <h2 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>

	<?php if($image != "") : ?> 
    	<div class="post-image fitvid"> 
  			<?php echo $image; ?>
        </div>
    <?php endif; ?>

    <div class="copy clearfix">
        <?php the_content(); ?>
    </div>
    
    <?php if(!is_page()) : ?>
    <ul class="post-meta"> 
       <?php if(get_option("ocmx_meta_tags") != "false"): ?>
		<li class="meta-block">
			<ul class="tags">
				<?php the_tags('<li>','</li><li>','</li>'); ?>
			</ul>
		</li>
       <?php endif; ?>
       <?php if(get_option("ocmx_short_url") != "false"): ?>
		<li class="meta-block">
			<div class="short-url">
			   <strong><?php _e("Short Url",'ocmx'); ?></strong>
			   <input type="text" value="<?php echo wp_get_shortlink($post->ID); ?>" />
			</div>
		</li>  
       <?php endif; ?>         
	</ul>   
	<?php endif; ?>
</li>                        
