    </div>
         
    <div id="footer-container">
        <div id="footer">
            <ul class="footer-widgets">
                <?php if (function_exists('dynamic_sidebar')) :
                    dynamic_sidebar('footersidebar');
                endif; ?>
            </ul>
            <div class="footer-text">
                <p class="copyright"><?php echo stripslashes(get_option("ocmx_custom_footer")); ?></p>
                <?php if(get_option("ocmx_logo_hide") != "true") : ?>
                    <div class="obox-credit">
                        <p><a href="http://www.obox-design.com/wordpress-themes/ecommerce.cfm">eCommerce WordPress Themes</a> by <a href="http://www.obox-design.com"><img src="<?php bloginfo("template_directory"); ?>/images/obox-logo.png" alt="Theme created by Obox" /></a></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
<?php 
	if(get_option("ocmx_googleAnalytics")) :
		echo stripslashes(get_option("ocmx_googleAnalytics"));
	endif;
?>
<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</body>
</html>