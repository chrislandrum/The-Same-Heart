<?php function ocmx_welcome_page(){
	global $wp_version;
	$themes = get_themes();
	$current_theme = get_current_theme();
	$theme_title = $themes[$current_theme]['Title'];
	$theme_version = $themes[$current_theme]['Version']; ?>
	<div id="welcome-panel" class="welcome-panel">
		<div class="wp-badge obox"><?php echo $theme_title." ".$theme_version; ?></div>
		<div class="welcome-panel-content">
			<h3>Welcome to 'Kiosk' by Obox Themes!</h3>
			<p class="about-description">If you need help getting started, check out our <a href="http://www.obox-design.com/documentation_item.cfm/productId/1560" target="_blank">the Kiosk Theme documentation</a>. If you would rather just get going, here are a few things you should do first to set up your new theme. If you need help, use our <a href="http://obox-design.com/get-support.cfm" target="_blank">support forum</a>.</p>
			<div class="welcome-panel-column-container">
				<div class="welcome-panel-column">
					<h4><span class="icon16 icon-settings"></span>Install WooCommerce</h4>
					<p>Kiosk uses the <a href="http://woocommerce.com" target="_blank">WooCommerce plugin</a> to power its eCommerce functionality. You can download WooCommerce <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=woocommerce&TB_iframe=true&width=600&height=550'); ?>">here</a>. Once it has been uploaded to the plugin directory and activated you should then move on to Step 2 where you may start adding products to Kiosk.</p>
					<ul>
						<li>Search for the <a href="<?php echo admin_url('plugin-install.php?tab=plugin-information&plugin=woocommerce&TB_iframe=true&width=600&height=550'); ?>">WooCommerce Plugin</a>.</li>
						<li>Click the Install Button.</li>
						<li>Click Activate.</li>
					</ul>
				</div>
				<div class="welcome-panel-column">
					<h4><span class="icon16 icon-page"></span> Add Your Products</h4>
					<p>Now that you have installed and activated the WooCommerce plugin, you can start adding your products. Kiosk works great with a small number of products, once you're done,  you may add your menus and do some final customization.</p>
					<ul>
						<li>Go to the <a href="<?php echo admin_url('widgets.php'); ?>" target="_blank">Widgets section</a>.</li>
						<li>View an example of the suggested 'look' of Kiosk.</li>
						<li>Read our <a href="http://www.obox-design.com/documentation_item.cfm/productId/1560" target="_blank">documentation</a> on each widget setting.</li>
					</ul>
				</div>
				<div class="welcome-panel-column welcome-panel-last">
					<h4><span class="icon16 icon-appearance"></span> Menus and Styling</h4>
					<p>Now that you have added your products, it's time to customize your theme. You can add your own menus as well as the logo and color scheme.</p>
					<ul>
						<li>Add / Amend Your <a href="<?php echo admin_url('nav-menus.php'); ?>" target="_blank">Menus</a></li>
						<li><a href="<?php echo admin_url('customize.php'); ?>" target="_blank">Customize</a> your theme</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php }
function ocmx_check_welcome(){
	global $pagenow, $themeid;
	if(!get_option($themeid."_welcome") && isset($_GET["activated"]) && $pagenow == "themes.php") :
		update_option($themeid."_welcome", 1);
	    wp_redirect(admin_url('admin.php?page=obox-help'));
	endif; 
}
add_action("init", "ocmx_check_welcome");