
		
jQuery(document).ready(function()
	{		
		_sections = new Array();
		nav = jQuery('.documentation-menu')
		navanchors = nav.find('h5'),
		
		jQuery('h5').each(function(i,e){
			var _this = jQuery(this);
			var p = {
				id: _this.parent().id,
				pos: _this.offset().top
			};
			_sections.push(p);
			sectionscount = _sections.length;
		});
			
		function activateNav(pos){
			var offset = 100;
			for(i=sectionscount;i>0;i--){
				if(_sections[i-1].pos <= pos+offset){
					navanchors.removeClass('active');
					navanchors.eq(i-1).addClass('active');
					break;
				};
			}	
		}

		if(jQuery.browser.msie || jQuery.browser.mozilla)
			{Screen = jQuery("html");}
		else
			{Screen = jQuery("body");}
			
		jQuery(".documentation-menu ul li h5").click(function(){
			jQuery(".active").slideUp().removeClass("active");
			jQuery(this).next().slideDown().addClass("active");
			activeli = jQuery(this).parent();
			return false;
		});
		
		jQuery(".documentation-menu ul li ul li a").click(function(){
			scroll_to = jQuery(this).attr("rel");
			header = jQuery(".documentation-header").height();
			commentScroll = ((jQuery("a[name='"+scroll_to+"']").offset().top)-156);
			Screen.animate({scrollTop: commentScroll});
			return false;
		});
		
		/* jQuery(window).bind('scroll',function(event){
			timeout = setTimeout(function(){
				var current = 'wrap';
				if(window.pageYOffset){
					pos = window.pageYOffset;
				}else if(document.documentElement){
					pos = document.documentElement.scrollTop;
				}else if(document.body){
					pos = document.body.scrollTop;
				}
				activateNav(pos);
			},50);
		}).trigger('scroll'); */
		
		jQuery(".search-box").live("submit", function(){
			window.find(jQuery("#search").val());
			return false;
		});
	});