<?php
function ocmx_install_options (){
	$ocmx_tabs = array(
						array(
							  "option_header" => "Install OCMX",
							  "use_function" => "ocmx_show_install" ,
							  "function_args" => array("OCMX General Options", "OCMX Social Media Widgets and Links", "Advert Management", "OCMX Like/Unlike", "Advances Comment Functionality and Storage"),
							  "ul_class" => "form-options clearfix"
						  )
					);

	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Welcome to OCMX", $ocmx_tabs);
};

function ocmx_general_options (){	
	$ocmx_tabs = array(
					array(
						  "option_header" => "General Options",
						  "use_function" => "ocmx_fetch_options",
						  "function_args" => "general_site_options",
						  "ul_class" => "admin-block-list clearfix"
					  )
				);
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("General Options", $ocmx_tabs);
};

function ocmx_social_options (){	
	$ocmx_tabs = array(
					array(
						  "option_header" => "Social Media Icons",
						  "use_function" => "ocmx_socials_options",
						  "function_args" => "social_options",
						  "ul_class" => "form-options clearfix"
					  )
					
				);
	
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Social Media", $ocmx_tabs);
};
function ocmx_gallery_options (){
	if(isset($_POST["delete_gallery"])) :
		do_action("ocmx_delete_gallery");
	endif;
		
	if(!isset($_POST["delete_gallery"]) && isset($_GET["delete"])) :
		$ocmx_tabs = array(
						array(
							  	"option_header" => "Remove Gallery",
							  	"use_function" => "ocmx_delete_gallery_prompt",
							  	"function_args" => "delete_gallery",
					 			"ul_class" => "admin-block-list clearfix",
						  		"base_button" => array("href" => "admin.php?page=ocmx-gallery", "html" => "Cancel")
						  )
					);
		$ocmx_container = new OCMX_Container();
		$ocmx_container->load_container("Delete Gallery", $ocmx_tabs, "Delete Gallery");
	elseif(isset($_GET["edit"]) || isset($_GET["new"])) :
		$ocmx_tabs = array(
						array(
							  "option_header" => "Gallery Details",
							  "use_function" => "ocmx_new_gallery_details",
							  "function_args" => null,
							  "ul_class" => "new-gallery form-options clearfix",
						  	  "base_button" => array("href" => "admin.php?page=ocmx-gallery", "html" => "Cancel")
						  )
					);
		if(isset($_GET["edit"])) :			
			$ocmx_tabs[] = array(
								  "option_header" => "Manage Images",
								  "use_function" => "ocmx_manage_gallery",
								  "function_args" => null,
								  "ul_class" => "gallery-image-list sortable clearfix",
						  		  "base_button" => array("href" => "admin.php?page=ocmx-gallery", "html" => "Cancel")
							  );
			$ocmx_container = new OCMX_Container();
			$ocmx_container->load_container("Manage Gallery", $ocmx_tabs, "Save Gallery");
		else :
			$ocmx_container = new OCMX_Container();
			$ocmx_container->load_container("New Gallery", $ocmx_tabs, "Create Gallery");
		endif;
	else :
		$ocmx_tabs = array(
						array(
							  "option_header" => "Gallery List",
							  "use_function" => "ocmx_gallery_list",
							  "function_args" => null,
							  "ul_class" => "gallery-image-list clearfix",
							  "base_button" => array("href" => get_option("siteurl")."/wp-admin/admin.php?page=ocmx-gallery&amp;new=&amp;id=", "html" => "Create New Gallery")
						  )
					);
		$ocmx_container = new OCMX_Container();
		$ocmx_container->load_container("Gallery", $ocmx_tabs, "");
	endif;
};
function ocmx_seo_options(){	
	$ocmx_tabs = array(
					array(
						"option_header" => "Theme SEO",
						"use_function" => "ocmx_fetch_options",
						"function_args" => "seo_options",
						"ul_class" => "admin-block-list clearfix"
					  )
				);

	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("SEO", $ocmx_tabs);
};
function ocmx_more_theme_options(){	
	$ocmx_tabs = array(
					array(
						"option_header" => "More Themes from Obox",
						"use_function" => "obox_theme_list",
						"function_args" => "",
						"ul_class" => "clearfix"
					  )
				);
	
	$ocmx_container = new OCMX_Container();
	$ocmx_container->load_container("Themes", $ocmx_tabs, "");
};
?>