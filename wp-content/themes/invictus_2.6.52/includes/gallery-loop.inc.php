<?php
/**
 * The loop that displays portfolio items.
 *
 *
 * @package WordPress
 * @subpackage invictus
 * @since invictus 1.0
 */

global $wp_query, $imgDimensions, $substrExcerpt, $itemCaption, $shortname, $paged, $meta, $the_term, $hideExcerpt, $isLightboxGallery, $p_tpl, $infiniteScroll, $portfolio_posts;

//Get the page meta informations and store them in an array
$meta = max_get_cutom_meta_array();

// store some variables
$infiniteScroll = false; // set infiniteScroll to false by defaults
$pageInfo = get_post_meta($post->ID, 'max_show_gallery_info', true); // show additional page info or not?
$categories = get_post_meta($post->ID, 'max_select_gallery', true); // get the portfolio categories
$per_page_meta = get_post_meta($post->ID, 'max_gallery_per_page', true); // get the per page meta value
$per_page = !empty($per_page_meta) ? $per_page_meta : PER_PAGE_DEFAULT; // Get posts per page (new since 3.0)

// get page template
$custom_fields = get_post_custom_values('_wp_page_template', $post->ID);
$p_tpl = $custom_fields[0];

// If template is a standard portfolio template
if ($p_tpl == "template-one-column.php" ||
	$p_tpl == "template-two-column.php" ||
	$p_tpl == "template-three-column.php" ||
	$p_tpl == "template-four-column.php"||
	$p_tpl == "template-lightbox.php" ||
	$p_tpl == "template-grid-fullsize.php" ||
	$p_tpl == "template-scroller.php" ){
	$infiniteScroll = true;
}

// Template is the Fullsize Scroller Template
if( $p_tpl == "template-scroller.php" ){
	$per_page = 9999;
	$pageInfo = false;
	$infiniteScroll = false;
}

// Template is the Fullsize Grid Template
if( $p_tpl == "template-grid-fullsize.php" ) :
  $pageInfo = false;
endif;

// Template is the Sortable Grid Template
if( $p_tpl == "template-sortable.php"){
  $pageInfo = false;
	$categories = get_post_meta($post->ID, 'max_sortable_galleries', true);
	$per_page = 9999;
}

if(!is_tax()):

  // get the portfolio posts
  $portfolio_args = array(
  	'post_type'   => 'gallery',
  	'orderby'     => get_post_meta($post->ID, 'max_gallery_order', true),
  	'order'       => get_post_meta($post->ID, 'max_gallery_sort', true),
  	'showposts'   => $per_page,
  	'paged'       => $paged,
  	'tax_query'   => array(
  		array(
  			'taxonomy'  => GALLERY_TAXONOMY,
  			'terms'     => max_set_term_order($categories),
  			'field'     => 'term_id',
  		)
  	)
  );

  // query posts with arguments from above ($portfolio_args)
  $portfolio_posts = new WP_Query($portfolio_args);

endif;


if ( !post_password_required() ){ ?>

	<?php if ($portfolio_posts->have_posts()) : ?>

		<ul id="portfolioList" class="clearfix portfolio-list loading">

			<?php while ($portfolio_posts->have_posts()) : $portfolio_posts->the_post(); ?>

			<?php
			$_term_classes = "";

			// check if the template is a quicksand sortable template
			if( $p_tpl == "template-sortable.php" ){

				// get the term slug and display it as class list
				foreach( @get_the_terms( get_the_ID(), GALLERY_TAXONOMY) as $term ) {
					$_term_classes .= urldecode($term->slug." ");
				}

			}
			?>

			<li data-time="<?php the_time('m/d/Y H:i') ?>" data-modified="<?php the_modified_time('Y-m-d H:i') ?>" data-id="id-<?php echo get_the_ID() ?>" class="item <?php echo max_get_post_lightbox_class() . " "; ?><?php echo $_term_classes . " "; ?><?php if( get_option_max( 'image_show_caption' ) == "always") { echo("show-title"); } ?><?php if( get_option_max('image_show_fade') != "true") { echo("no-hover"); } ?>">
				<div class="shadow">
				<?php

					// get the gallery item
					max_get_post_custom_image(get_post_thumbnail_id());

					if($itemCaption === true) {

						// check if caption option is selected
						if ( get_option_max( 'image_show_caption' ) == 'true' || get_option_max( 'image_show_caption' ) == 'always'  ) {
						?>

						<div class="item-caption">
							<strong class="title"><?php echo get_the_title() ?></strong><br />
							<?php
								if(!$hideExcerpt) {
									echo strip_tags(get_the_excerpt());
								}
							?>
						</div>

					<?php
						}
					}
				?>
				</div>

				<?php
				// check if additional options is selected
				if ( $pageInfo == 'true' ) : ?>
				<div class="item-information">
					<ul>
						<?php if( get_post_meta(get_the_ID(), $shortname.'_photo_copyright_link_value', true) != "" ){ ?>

						<li><?php _e('Copyright','invictus') ?>: <a href="<?php echo get_post_meta(get_the_ID(), $shortname.'_photo_copyright_link_value', true) ?>" title="<?php echo get_post_meta(get_the_ID(), $shortname.'_photo_copyright_information_value', true) ?>" target="_blank"><?php echo get_post_meta(get_the_ID(), $shortname.'_photo_copyright_information_value', true) ?></a></li>

						<?php } else { ?>

						<li><?php _e('Copyright','invictus') ?>: <?php echo get_post_meta(get_the_ID(), $shortname.'_photo_copyright_information_value', true) ?></li>

						<?php } ?>

						<li><?php _e('Location','invictus') ?>: <span><?php echo get_post_meta(get_the_ID(), $shortname.'_photo_location_value', true) ?></span></li>
						<?php if(get_post_meta(get_the_ID(), $shortname.'_photo_date_value',true) != "" && max_is_valid_timestamp(get_post_meta(get_the_ID(), $shortname.'_photo_date_value',true)) === true ){ ?>
						<li><?php _e('Date','invictus') ?>: <span><?php echo date(get_option('date_format'), get_post_meta(get_the_ID(), $shortname.'_photo_date_value', true)) ?></span></li>
						<?php }else{ ?>
						<li><?php _e('Date','invictus') ?>: <span>-</span></li>
						<?php } ?>
					</ul>
				</div>
				<?php endif;	?>

			</li>

			<?php endwhile; ?>
		</ul>

		<?php
		/* Display navigation to next/previous pages when applicable */
		if (function_exists("max_pagination")) :
			max_pagination($portfolio_posts);
		endif;
		?>

		<?php else : ?>

		<?php if($post->post_content == "") : ?>
		<h2><?php _e("Whoops! Can't seem to find any galleries!", MAX_SHORTNAME) ?></h2>
		<p><?php _e('It seems you have not selected any galleries to show on this template. Please select at least one gallery to show some photo posts on this page template.', MAX_SHORTNAME); ?></p>
		<?php endif; ?>

	<?php endif; ?>

<?php } ?>
<?php wp_reset_query(); ?>