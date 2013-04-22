<?php get_header(); ?>

<ul class="double-cloumn clearfix">
    <li id="left-column">	
        <ul class="blog-main-post-container">
			<?php if (have_posts()) :
                while (have_posts()) :	the_post(); setup_postdata($post);
					get_template_part("/functions/fetch-post");
                endwhile;
            else :
                ocmx_no_posts();
            endif; ?>
            <?php comments_template(); ?>
        </ul>
	</li>
	<?php get_sidebar(); ?>
</ul>
<?php get_footer(); ?>