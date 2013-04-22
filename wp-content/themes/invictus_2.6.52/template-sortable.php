<?php
/**
 * Template Name: Portfolio Sortable Grid
 *
 * @package WordPress
 * @subpackage Invictus
 * @since Invictus 1.0
 */

global $meta, $itemCaption;

wp_reset_query();

$meta = max_get_cutom_meta_array();
$itemCaption = true;
$hideExcerpt = true;

get_header();

// set the image dimensions for this portfolio template
$imgWidth  = 640;
$imgHeight = 480;

$_sort_columns = !empty($meta[MAX_SHORTNAME."_page_sortable_columns"]) ? $meta[MAX_SHORTNAME."_page_sortable_columns"] : 3;
$_aspect_ratio = !empty($meta[MAX_SHORTNAME."_page_sortable_aspect_ratio"]) ? $meta[MAX_SHORTNAME."_page_sortable_aspect_ratio"] : 'default';

if( $_aspect_ratio == 'squared' ) $imgHeight = 640;
if( $_aspect_ratio == 'portrait' ) $imgHeight = 853;

if( 'one' == $_sort_columns ){
	$imgWidth  = 640;
	$imgHeight = 480;
}

$numbers = array( 'one' => '1', 'two' => '2', 'three' => '3', 'four' => '4' );
$col_divider = $numbers[$meta[MAX_SHORTNAME."_page_sortable_columns"]] ? $numbers[$meta[MAX_SHORTNAME."_page_sortable_columns"]] : 3;

$imgDimensions = array( 'width' => $imgWidth, 'height' => $imgHeight );

// use smaller images if it's not a fullwidth sortable
if($meta[MAX_SHORTNAME."_page_gallery_fullwidth"] != 'true'){
	$imgDimensions = array( 'width' => $imgWidth / $col_divider, 'height' => $imgHeight / $col_divider );
}

?>

<div id="single-page" class="clearfix left-sidebar portfolio-sortable">

		<div id="primary" class="portfolio-<?php echo $meta[MAX_SHORTNAME."_page_sortable_columns"] ?>-columns">
			<div id="content" role="main">

				<header class="clearfix entry-header">

				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php
				// check if there is a excerpt
				if( max_get_the_excerpt() ){
					$hasExcerpt = true;
				?>
				<h2 class="page-description"><?php max_get_the_excerpt(true) ?></h2>
				<?php } ?>

				</header><!-- .entry-header -->

				<?php if($post->post_content != "") : ?>
				<div class="clearfix">
				<?php the_content() ?>
				</div>
				<br />
				<?php endif; ?>

				<?php if ( !post_password_required() && ( !empty($meta['max_select_gallery']) || !empty($meta['max_sortable_galleries']) ) ) { ?>
				<ul class="clearfix splitter <?php if( !$hasExcerpt ) { echo ("splitter-top"); } ?>">
					<li>
						<ul id="portfolioSort" class="clearfix content-sort">
							<?php if(get_post_meta($post->ID, MAX_SHORTNAME."_page_sortable_show_all", true) == 'true' || !get_post_meta($post->ID, MAX_SHORTNAME."_page_sortable_show_all", true) ) { ?>
							<li class="segment-0 current"><a href="#" data-filter="item"><?php _e('All','invictus') ?></a></li>
							<?php } ?>
							<?php
								// Get the taxonomies for galleries
								$output = "";
								$parent = "";
								$i = 1;

								$gal_array = get_post_meta($post->ID, 'max_sortable_galleries', false);

								foreach( $gal_array[0] as $index => $value ) {
									$_the_term = get_term_by('id', $index, GALLERY_TAXONOMY );
									$output .= '<li class="segment-'.$i.'"><a href="#" data-filter="' . urldecode($_the_term->slug) . '">'.$_the_term->name.'</a></li>';
									$i++;
								};
								echo $output;
							?>
						</ul>
					</li>
				</ul>
				<?php } ?>

				<div class="clearfix">
				<?php
					// including the loop template gallery-loop.php
					get_template_part( 'includes/gallery', 'loop.inc' );
				?>

				<?php
				// the post content when password is required
				if ( post_password_required() ) :
				  the_content();
				endif;
				?>

				</div>

				<?php if ( !post_password_required() ) : comments_template( '', true ); endif; ?>

			</div><!-- #content -->
		</div><!-- #container -->

		<div id="sidebar">
			 <?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-gallery-sortable') ) ?>
		</div>

</div>

<script>

  jQuery(document).ready(function($) {

		/* Isotope -------------------------------------*/
		if( jQuery().isotope ) {

			var $container = jQuery('#portfolioList'),
				$optionFilterLinks = jQuery('#portfolioSort a');

			$optionFilterLinks.attr('href', '#');

			<?php
				// get the inital filter link, if all is not set
				$start_filter = "item";
				if( get_post_meta($post->ID, MAX_SHORTNAME."_page_sortable_show_all", true) == 'false' ):
					$_the_term = get_term_by('id', reset(reset($gal_array)), GALLERY_TAXONOMY );
					$start_filter = $_the_term->slug;

				?>
				$optionFilterLinks.filter('[data-filter="<?php echo urldecode($start_filter) ?>"]').parent().addClass('current');
				$container.find('.<?php echo urldecode($start_filter) ?> a[data-rel]').attr('data-rel', 'prettyPhoto[<?php echo urldecode($start_filter) ?>]');
				<?php
				endif;
			?>

			// initialize Isotope
			$container.find('img').imagesLoaded(function(){ // init isotope when all images are loaded

  			jQuery.when(

  				$container.isotope({
  					// options...
  					filter: '.<?php echo urldecode($start_filter) ?>',
  					// set columnWidth to a percentage of container width
  					getSortData : {
  						title : function ( $elem ) {
  							return $elem.find('.title').text();
  						},
  						id : function ( $elem ) {
  							return $elem.attr('data-id');
  						},
  						date: function ($elem) {
  							return $elem.attr('data-time');
  						},
  						modified : function ( $elem ) {
  							return $elem.attr('data-modified');
  						}
  					},
  					sortBy: '<?php if($meta['max_gallery_order'] == 'rand') : echo 'random'; else : echo $meta['max_gallery_order']; endif; ?>',
  					sortAscending : <?php if($meta['max_gallery_sort'] == 'ASC') : echo 'true'; else : echo 'false'; endif; ?>
  				})

  			).then(function(){

  				$container.removeClass('loading');
  				jQuery('li', $container).css({ visibility: 'visible' });

  			});

  			// update columnWidth on window resize
  			jQuery(window).smartresize(function(){
  				$container.isotope({
  					// update columnWidth to a percentage of container width
  					gutterWidth: 1
  				});
  			});

  		})

			// filter action
			$optionFilterLinks.click(function(){

				var selector = jQuery(this).attr('data-filter');

				$container.isotope({
					filter : '.' + selector,
					itemSelector : '.isotope-item',
					animationEngine : 'best-available',
					gutterWidth: 1
				}, function($items){
					// set the prettyPhoto gallery container data-rel to only show the selected images in the lightbox gallery
					this.find('.'+selector+' a[data-rel]').attr('data-rel', 'prettyPhoto['+selector+']');
				});

				// Highlight the correct filter
				$optionFilterLinks.each(function(){ jQuery(this).parent().removeClass('current') });
				jQuery(this).parent().addClass('current');
				return false;

			});

		}

  })

</script>
<?php get_footer(); ?>
