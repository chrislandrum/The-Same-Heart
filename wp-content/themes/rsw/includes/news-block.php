<!-- Quotation saying -->

<div class="mcycletextwrap">
<iframe src="http://www.kickstarter.com/projects/theshadoweffectfilm/the-shadow-effect-congo/widget/card.html" name="" width="220px" height="380px"></iframe>

	<h3><?php echo of_get_option('newsbox_title'); ?></h3>
	<div class="newsnav">
		<div class="newsnext">next</div><div class="newsprev">prev</div>
	</div>
	<div class="newsslides">
	<?php
	global $post;	

	$thecategory=of_get_option( 'options_newsbox_category' );
	$newsbox_type=of_get_option( 'newsbox_type' );
	$newsbox_portfolio= of_get_option('options_newsbox_portfolio');
	$carosel_limit=of_get_option( 'newsbox_limit' );
	
	function news_excerpt_length( $length ) {
		return 26;
	}
	add_filter( 'excerpt_length', 'news_excerpt_length', 999 );
	
	if ($newsbox_type=="portfolio") {
	
		$newquery = array(
			'post_type' => 'mtheme_portfolio',
			'types' => $newsbox_portfolio,
			'orderby' => 'menu_order',
			'order' => 'DESC',
			'posts_per_page' => $carosel_limit,
			);
		query_posts($newquery);
	
	} else {

		query_posts(array(
				'cat' => $thecategory,
				'showposts' => $carosel_limit,
				'post_status' => 'publish',
				'order' => 'DESC'
		));
	
	}
	
	if ( have_posts() ) : while (have_posts()) : the_post();
?>	
	<div class="newswrap">
		<div class="news-text">
		<?php
		
		echo display_post_image (
			$post->ID,
			$have_image_url=false,
			$link=true,
			$type="news-thumbnail",
			$post->post_title,
			$class="news-image"
		);
		?>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<?php
		if ($newsbox_type=="portfolio") {
			$custom = get_post_custom(get_the_ID());
			echo $custom["description"][0];
		} else {
			echo the_excerpt();
		}
		?>
		</div>						
	</div>
	
	<?php
	endwhile; else:
	echo '<div class="newswrap"><div class="news-text">';
	echo _e('<h3><a href="#">News not found</a></h3>No news content feeds found! Please select a category from theme options','mthemelocal');
	echo '</div></div>';
	endif;
	wp_reset_query();		
	?>
	</div>
</div>