<?php
/**
 * Template Name: Full-Width Browser, No sidebar
 * Description: A full-browser-width template without sidebar
 *
 * @package WordPress
 * @subpackage Invictus
 */

get_header(); ?>
<?php
// get the password protected login template part
if ( post_password_required() ) {
	get_template_part( 'includes/page', 'password.inc' );
} else {
?>
<div id="single-page" class="clearfix full-browser-width">

		<div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

</div>
<?php } ?>
<?php get_footer(); ?>