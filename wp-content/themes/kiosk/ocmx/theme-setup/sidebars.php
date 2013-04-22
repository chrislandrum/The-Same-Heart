<?php 
// Create Dynamic Sidebars
if (function_exists('register_sidebar')) :
	register_sidebar(array("name" => "Home Page", "id" => "homepage", "description" => "Place the ORANGE (Obox) widgets here."));
	register_sidebar(array("name" => "Shop Sidebar", "id" => "sidebarshop", "description" => "Place the GREEN (WooCommerce) widgets here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4>', 'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="content">', 'after_widget' => '</div></li>'));
	register_sidebar(array("name" => "Blog Sidebar", "id" => "sidebarblog", "description" => "Place the PURPLE (Obox) widgets here.", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4>', 'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="content">', 'after_widget' => '</div></li>'));
	register_sidebar(array("name" => "Footer", "id" => "footersidebar", "before_title" => '<h4 class="widgettitle">', "after_title" => '</h4>', 'before_widget' => '<li id="%1$s" class="widget column %2$s"><div class="content">', 'after_widget' => '</div></li>'));
endif;
?>