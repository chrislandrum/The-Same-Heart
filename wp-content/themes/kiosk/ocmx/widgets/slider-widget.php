<?php
class ocmx_slider_widget extends WP_Widget {
    /** constructor */
    function ocmx_slider_widget() {
        parent::WP_Widget(false, $name = "(Obox) Slider Widget", array("description" => "Display various kinds of content in a slider layout on your home page."));	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        global $woocommerce;
        
		if(isset($instance["post_count"]))
			$post_count = esc_attr($instance["post_count"]);
		if(isset($instance["post_thumb"]))
			$post_thumb = esc_attr($instance["post_thumb"]);
		if($post_thumb == "true"):
			$post_thumb = 1;
		else :
			$post_thumb = 0;		
		endif;
		
		if(isset($instance["posttype"]))
			$posttype = esc_attr($instance["posttype"]); 
		if(isset($instance["postfilter"]))
	        $postfilter = esc_attr($instance["postfilter"]); 
		if(isset($instance[$postfilter]))
	        $filterval = esc_attr($instance[$postfilter]); 
		if(isset($instance["post_category"]))
			$use_category = $instance["post_category"];
		
		if(isset($postfilter) && $postfilter != "" && $filterval != "0") :
			$args = array(
				"post_type" => $posttype,
				"posts_per_page" => $post_count,
				"tax_query" => array(
					array(
						"taxonomy" => $postfilter,
						"field" => "slug",
						"terms" => $filterval
					)
				)		
			);
		else :
			$args = array(
				"post_type" => $posttype,
				"posts_per_page" => $post_count
			);
		endif;

		$loop = new WP_Query($args); 
		$count = 1; ?>
		 
		<div class="slider clearfix">
            <ul class="gallery-container">
            	<?php
					while ( $loop->have_posts() ) : $loop->the_post(); $_product = &new WC_Product( $loop->post->ID ); 
		            	$args  = array('postid' => $post->ID, 'width' => 800, 'height' => 533, 'hide_href' => false, 'exclude_video' => true, 'imglink' => false, 'imgnocontainer' => true, 'resizer' => '800x533');
						$image = get_obox_media($args); 
						$link = get_permalink($post->ID); ?>
						
		                <li>
		                	<?php echo $image; ?>
		                    <div class="overlay">
		                        <h3><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h3>
		                        <p><a href="<?php echo $link; ?>" class="more-info-combo"><span class="price"><?php echo $_product->get_price_html(); ?></span><span class="text">More Info</span></a></p>
		                    </div>
		                </li>
		                
		           	<?php 
		           	$count++;
		           	endwhile; ?>
            </ul>
            
	        <div class="controls"> <a href="#" class="next">Next</a> <a href="#" class="previous">Previous</a>
	            <div class="slider-dots"> 
	            	<?php for($i=1; $i < $count; $i++) : ?>
	                    <a href="#" rel="<?php echo ($i-1); ?>"class="dot <?php if($i == 1) : ?>dot-selected<?php endif; ?>"><?php echo $i; ?></a>
	                <?php endfor; ?> 
	            </div>
	        </div>
	        
        </div>
    
<?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
		$title = esc_attr($instance["title"]);

		if(isset($instance["post_count"]))
			$post_count = esc_attr($instance["post_count"]);
		if(isset($instance["posttype"]))
        	$posttype = esc_attr($instance["posttype"]); 
        if(isset($instance["postfilter"]))
        	$postfilter = esc_attr($instance["postfilter"]); 
        if(isset($instance[$postfilter]))
        	$filterval = esc_attr($instance[$postfilter]); 
    	if(isset($instance["post_category"]))
			$post_category = esc_attr($instance["post_category"]);

		$post_type_args = array("public" => true, "exclude_from_search" => false, "show_ui" => true);
		$post_types = get_post_types( $post_type_args, "objects");
?>

	<p><em>Each time you select an item from a dropdown, press "Save" to load the next set of settings.</em></p>

    <p>
		<label for="<?php echo $this->get_field_id('posttype'); ?>">Display</label>
       	<select size="1" class="widefat" id="<?php echo $this->get_field_id("posttype"); ?>" name="<?php echo $this->get_field_name("posttype"); ?>">
       		<option <?php if($posttype == ""){echo "selected=\"selected\"";} ?> value="">--- Select a Content Type ---</option>
				<?php foreach($post_types as $post_type => $details) : ?>
                <option <?php if($posttype == $post_type){echo "selected=\"selected\"";} ?> value="<?php echo $post_type; ?>"><?php echo $details->labels->name; ?></option>
				<?php endforeach; ?>
        </select>
    </p>

    <?php if($posttype != "") :
    	if($posttype != "page") : ?>
			<?php $taxonomyargs = array('post_type' => $posttype, "public" => true, "exclude_from_search" => false, "show_ui" => true); 
			$taxonomies = get_object_taxonomies($taxonomyargs,'objects');
			if(!empty($taxonomies)) : ?>
				<p>
					<label for="<?php echo $this->get_field_id('postfilter'); ?>">Filter by</label>
		           	<select size="1" class="widefat" id="<?php echo $this->get_field_id("postfilter"); ?>" name="<?php echo $this->get_field_name("postfilter"); ?>">
		           		<option <?php if($postfilter == ""){echo "selected=\"selected\"";} ?> value="">--- Select a Filter ---</option>
		 				<?php foreach($taxonomies as $taxonomy => $details) : ?>
			                <option <?php if($postfilter == $taxonomy){echo "selected=\"selected\"";} ?> value="<?php echo $taxonomy; ?>"><?php echo $details->labels->name; ?></option>
		 				<?php $validtaxes[] = $taxonomy;
		 				endforeach; ?>
		            </select>
		        </p>
	        <?php endif;
	        if($postfilter != "" && ( (is_array($validtaxes) && in_array($postfilter, $validtaxes)) || !is_array($validtaxes) ) ) :
				$tax = get_taxonomy($postfilter);
				$terms = get_terms($postfilter, "orderby=count&hide_empty=0"); ?>
				<p><label for="<?php echo $this->get_field_id($postfilter); ?>"><?php echo $tax->labels->name; ?></label>
		           <select size="1" class="widefat" id="<?php echo $this->get_field_id($postfilter); ?>" name="<?php echo $this->get_field_name($postfilter); ?>">
		                <option <?php if($filterval == 0){echo "selected=\"selected\"";} ?> value="0">All</option>
		                <?php foreach($terms as $term => $details) :?>
							<option  <?php if($filterval == $details->slug){echo "selected=\"selected\"";} ?> value="<?php echo $details->slug; ?>"><?php echo $details->name; ?></option>
		                <?php endforeach;?>
		            </select>
		        </p>
		    <?php endif; ?>
			<?php if(isset($instance["postfilter"])) : ?>
			
			    <p>
			        <label for="<?php echo $this->get_field_id('post_count'); ?>">Post Count</label>
			        <select size="1" class="widefat" id="<?php echo $this->get_field_id('comment_count'); ?>" name="<?php echo $this->get_field_name('post_count'); ?>">
			            <?php $i = 1;
						while($i < 13) :?>
							<option <?php if($post_count == $i) : ?>selected="selected"<?php endif; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
						<?php if($i < 1) :
								$i++;
							else: 
								$i=($i+1);
							endif;
						endwhile; ?>
			        </select>
			    </p>
		    <?php endif; ?>
	    <?php endif; ?>
	    <?php
	endif; ?>
    
   
<?php 
	} // form

}// class

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_slider_widget");'));

?>