<?php get_header();
	
do_action('woocommerce_before_single_product', $post, isset($_product)); 
// Fetch Posts
$count = 0;
$slider = get_option("ocmx_slider_option");
$button = get_option("ocmx_buttons_option"); 
$auto_interval = get_option("ocmx_slider_timer");?>
<div id="left-column">
	<div class="slider clearfix">
        <ul class="gallery-container gallery-image clearfix">
        	 <?php while ( have_posts() ) : the_post();
				$attachmentargs = array("post_type" => "attachment", "post_parent" => $post->ID, "numberposts" => "-1", "orderby" => "menu_order", "order" => "ASC");
				$attachments = get_posts($attachmentargs);
				if (!empty($attachments)) :
					foreach ($attachments as $attachment) :
						$image = wp_get_attachment_image($attachment->ID, "520");
						$thumbs = wp_get_attachment_url($attachment->ID, "full");  ?>
						<li>
							<a rel="thumbnails" class="zoom" href="<?php echo $thumbs; ?>"><?php echo $image; ?></a>
						</li>
					<?php endforeach;
				endif; ?>
			<?php endwhile; ?>
        </ul>
        <?php 
        $counter = count($attachments);
        if($counter !='1') : ?>
	        <div class="controls"> <a href="#" class="next">Next</a> <a href="#" class="previous">Previous</a>
	            <div class="slider-dots"> 
	            	<?php for($i=1; $i <= ($count+count($attachments)); $i++) : ?>
	                    <a href="#" rel="<?php echo ($i-1); ?>"class="dot <?php if($i == 1) : ?>dot-selected<?php endif; ?>"><?php echo $i; ?></a>
	                <?php endfor; ?> 
	            </div>
	        </div>
	    <?php endif; ?>
        
    </div>
    
</div>

<div id="right-column">
	<?php while ( have_posts() ) : the_post();
		$_product = &new WC_Product( $post->ID );  ?> 
	    <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	    <div class="product-meta">
	    	<?php if($button =='slide') : ?>
		        <div class="purchase-options-container">
		        	<a class="button show_hide" href="#">Purchase Options</a>
		        </div>
			<?php endif; ?>
	        <div id="myContent" class="product-price <?php if($button =='slide') : echo 'slidingDiv'; endif; ?>">	
	            <?php do_action('woocommerce_single_product_summary'); ?> 
	        </div>
	  	</div>     
	   	<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>	
			<div class="woocommerce_tabs clearfix">
				<?php $withcomments = "1"; ?>
				<ul class="tabs">
					<?php do_action('woocommerce_product_tabs'); ?>
				</ul>
				<?php do_action('woocommerce_product_tab_panels'); ?>
			</div>
		</div>
    <?php endwhile; ?>
</div>
       
<?php get_footer(); ?>