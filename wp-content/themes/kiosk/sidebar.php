<li id="right-column">
	<ul class="widget-list">
		<?php if(is_post_type_archive( 'product' ) || ( get_post_type() == "product")) :
            //Shop Sidebar
            dynamic_sidebar('sidebarshop');
        else :
            //Blog Sidebar
            dynamic_sidebar('sidebarblog');
        endif; ?>
     </ul>
</li>