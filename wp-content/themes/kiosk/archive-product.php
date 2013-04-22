<?php get_header();

do_action('woocommerce_before_single_product', $post, isset($_product)); 
// Fetch Posts

$args = array( 'post_type' => 'product');
$loop = new WP_Query($args);

?>

<ul class="double-cloumn clearfix">
    <li id="left-column">	

	    <ul class="products-shop">
	        <?php while ( $loop->have_posts() ) : $loop->the_post(); $_product =&new WC_Product(isset($post->ID));
	            global $post;
	            $link = get_permalink($post->ID); 
	       		$args  = array('postid' => $post->ID, 'width' => 247, 'height' => 165, 'hide_href' => false, 'exclude_video' => $post_thumb, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => '247x165');
				$image = get_obox_media($args); ?>
	            
	            <li>
	          
	            	<div class="post-image fitvid"> 
	          			<?php echo $image; ?>
	                </div>
	          
	                <?php 
	                	$content = get_the_content();
	                    $contenttext = strip_tags($content);
	                    $excerpt = get_the_excerpt();
	                    $excerpttext = strip_tags($excerpt);
	                ?>
	               
	                <h4 class="post-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h4>
	
					<?php if($post->post_excerpt != "") :
						echo '<p>';
							echo substr($excerpttext, 0, 80 );
						echo ' ...</p>';
					else :
						echo '<p>';
							echo substr($contenttext, 0, 80 );
						echo ' ...</p>';
					endif; ?>
	              
	               <a href="<?php echo $link; ?>" class="more-info">More Info</a>
	            </li>				
	        <?php endwhile; ?>
	    </ul>
	</li>
	
	<?php get_sidebar(); ?>
 
</ul>
<?php get_footer(); ?>