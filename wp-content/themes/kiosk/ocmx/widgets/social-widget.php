<?php
class ocmx_social_widget extends WP_Widget {
    /** constructor */
    function ocmx_social_widget() {
        parent::WP_Widget(false, $name = __('(Obox) Social Links', 'ocmx'), $widget_options = 'Link people up to your social Profiles.');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        
		$rss = $instance["rss"];
		$cargo = $instance["cargo"];
		$behance = $instance["behance"];
		$twitter = $instance["twitter"];
		$twitpic = $instance["twitpic"];
		$facebook = $instance["facebook"];
		$myspace = $instance["myspace"];
		$googleplus = $instance["googleplus"];
		$redux = $instance["redux"];
		$delicious = $instance["delicious"];
		$digg = $instance["digg"];
		$tumblr = $instance["tumblr"];
		$posterous = $instance["posterous"];
		$blogger = $instance["blogger"];
		$flickr = $instance["flickr"];
		$deviant = $instance["deviant"];
		$yahoo = $instance["yahoo"];
		$stumble = $instance["stumble"];
		$reddit = $instance["reddit"];
		$linkedin = $instance["linkedin"];
		$friendfeed = $instance["friendfeed"];
		$lastfm = $instance["lastfm"];
		$polyvore = $instance["polyvore"];
		$evernote = $instance["evernote"];
		$backtype = $instance["backtype"];
		$pinterest = $instance["pinterest"];
		$ffffound = $instance["ffffound"];
        $vimeo = $instance["vimeo"];
		$youtube = $instance["youtube"];
		$forrst = $instance["backtype"];
		$dribbble = $instance["dribbble"];
		$instagram = $instance["instagram"];
		$soundcloud = $instance["soundcloud"];
		$reverbnation = $instance["reverbnation"];
       ?>
			<?php echo $before_widget; ?>
				<?php echo $before_title;
                	_e('Social Links', 'ocmx');
				echo $after_title; ?>
                <ul class="social-bookmarks clearfix">
                    <?php if ($twitter !== "") : ?><li><a href="<?php echo $twitter; ?>" class="twitter"></a></li><?php endif; ?>
                    <?php if ($twitpic !== "") : ?><li><a href="<?php echo $twitpic; ?>" class="twitpic"></a></li><?php endif; ?>
                    <?php if ($facebook !== "") : ?><li><a href="<?php echo $facebook; ?>" class="facebook"></a></li><?php endif; ?>
                    <?php if ($myspace !== "") : ?><li><a href="<?php echo $myspace; ?>" class="myspace"></a></li><?php endif; ?>
                    <?php if ($googleplus !== "") : ?><li><a href="<?php echo $googleplus; ?>" class="googleplus"></a></li><?php endif; ?>
                    <?php if ($tumblr !== "") : ?><li><a href="<?php echo $tumblr; ?>" class="tumblr"></a></li><?php endif; ?>
                    <?php if ($posterous !== "") : ?><li><a href="<?php echo $posterous; ?>" class="posterous"></a></li><?php endif; ?>
                    <?php if ($blogger !== "") : ?><li><a href="<?php echo $blogger; ?>" class="blogger"></a></li><?php endif; ?>
                    <?php if ($flickr !== "") : ?><li><a href="<?php echo $flickr; ?>" class="flickr"></a></li><?php endif; ?>
                    <?php if ($deviant !== "") : ?><li><a href="<?php echo $deviant; ?>" class="deviant"></a></li><?php endif; ?>
                    <?php if ($forrst !== "") : ?><li><a href="<?php echo $forrst; ?>" class="forrst"></a></li><?php endif; ?>
                    <?php if ($dribbble !== "") : ?><li><a href="<?php echo $dribbble; ?>" class="dribbble"></a></li><?php endif; ?>
                    <?php if ($behance !== "") : ?><li><a href="<?php echo $behance; ?>" class="behance"></a></li><?php endif; ?>
                    <?php if ($pinterest !== "") : ?><li><a href="<?php echo $pinterest; ?>" class="pinterest"></a></li><?php endif; ?>
                    <?php if ($instagram !== "") : ?><li><a href="<?php echo $instagram; ?>" class="instagram"></a></li><?php endif; ?>
                    <?php if ($yahoo !== "") : ?><li><a href="<?php echo $yahoo; ?>" class="yahoo"></a></li><?php endif; ?>
                    <?php if ($delicious !== "") : ?><li><a href="<?php echo $delicious; ?>" class="delicious"></a></li><?php endif; ?>
                    <?php if ($ffffound !== "") : ?><li><a href="<?php echo $ffffound; ?>" class="ffffound"></a></li><?php endif; ?>
                    <?php if ($polyvore !== "") : ?><li><a href="<?php echo $polyvore; ?>" class="polyvore"></a></li><?php endif; ?>
                    <?php if ($linkedin !== "") : ?><li><a href="<?php echo $linkedin; ?>" class="linkedin"></a></li><?php endif; ?>
                    <?php if ($stumble !== "") : ?><li><a href="<?php echo $stumble; ?>" class="stumble"></a></li><?php endif; ?>
                    <?php if ($friendfeed !== "") : ?><li><a href="<?php echo $friendfeed; ?>" class="friendfeed"></a></li><?php endif; ?>
                    <?php if ($cargo !== "") : ?><li><a href="<?php echo $cargo; ?>" class="cargo"></a></li><?php endif; ?>
                    <?php if ($redux !== "") : ?><li><a href="<?php echo $redux; ?>" class="redux"></a></li><?php endif; ?>
                    <?php if ($digg !== "") : ?><li><a href="<?php echo $digg; ?>" class="digg"></a></li><?php endif; ?>
                    <?php if ($reddit !== "") : ?><li><a href="<?php echo $reddit; ?>" class="reddit"></a></li><?php endif; ?>
                    <?php if ($evernote !== "") : ?><li><a href="<?php echo $evernote; ?>" class="evernote"></a></li><?php endif; ?>
                    <?php if ($backtype !== "") : ?><li><a href="<?php echo $backtype; ?>" class="backtype"></a></li><?php endif; ?>
                    <?php if ($lastfm !== "") : ?><li><a href="<?php echo $lastfm; ?>" class="lastfm"></a></li><?php endif; ?>
                    <?php if ($soundcloud !== "") : ?><li><a href="<?php echo $soundcloud; ?>" class="soundcloud"></a></li><?php endif; ?>
                    <?php if ($reverbnation !== "") : ?><li><a href="<?php echo $reverbnation; ?>" class="reverbnation"></a></li><?php endif; ?>  
                    <?php if ($vimeo !== "") : ?><li><a href="<?php echo $vimeo; ?>" class="vimeo"></a></li><?php endif; ?>
                    <?php if ($youtube !== "") : ?><li><a href="<?php echo $youtube; ?>" class="youtube"></a></li><?php endif; ?>
                    <?php if ($feedburner_id) : ?><li><a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=<?php echo $feedburner_id;?>" class="social-rss-email" target="_blank">RSS via e-mail</a></li><?php endif; ?>
                </ul>
			<?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance["title"]);
        $twitter_id = esc_attr($instance["twitter_id"]); ?>
            <p><label for="<?php echo $this->get_field_id('twitter'); ?>">Twitter<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $instance["twitter"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('twitpic'); ?>">Twitpic<input class="widefat" id="<?php echo $this->get_field_id('twitpic'); ?>" name="<?php echo $this->get_field_name('twitpic'); ?>" type="text" value="<?php echo $instance["twitpic"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('facebook'); ?>">Facebook<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $instance["facebook"]; ?>" /></label></p>
              <p><label for="<?php echo $this->get_field_id('myspace'); ?>">MySpace<input class="widefat" id="<?php echo $this->get_field_id('myspace'); ?>" name="<?php echo $this->get_field_name('myspace'); ?>" type="text" value="<?php echo $instance["myspace"]; ?>" /></label></p>
              <p><label for="<?php echo $this->get_field_id('googleplus'); ?>">Google+<input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo $instance["googleplus"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('tumblr'); ?>">Tumblr<input class="widefat" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" type="text" value="<?php echo $instance["tumblr"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('posterous'); ?>">Posterous<input class="widefat" id="<?php echo $this->get_field_id('posterous'); ?>" name="<?php echo $this->get_field_name('posterous'); ?>" type="text" value="<?php echo $instance["posterous"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('blogger'); ?>">Blogger<input class="widefat" id="<?php echo $this->get_field_id('blogger'); ?>" name="<?php echo $this->get_field_name('blogger'); ?>" type="text" value="<?php echo $instance["blogger"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('flickr'); ?>">Flickr<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo $instance["flickr"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('deviant'); ?>">DeviantArt<input class="widefat" id="<?php echo $this->get_field_id('deviant'); ?>" name="<?php echo $this->get_field_name('deviant'); ?>" type="text" value="<?php echo $instance["deviant"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('forrst'); ?>">Forrst<input class="widefat" id="<?php echo $this->get_field_id('forrst'); ?>" name="<?php echo $this->get_field_name('forrst'); ?>" type="text" value="<?php echo $instance["forrst"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('dribbble'); ?>">Dribbble<input class="widefat" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" type="text" value="<?php echo $instance["dribbble"]; ?>" /></label></p>
            	<p><label for="<?php echo $this->get_field_id('behance'); ?>">Behance<input class="widefat" id="<?php echo $this->get_field_id('behance'); ?>" name="<?php echo $this->get_field_name('behance'); ?>" type="text" value="<?php echo $instance["behance"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('yahoo'); ?>">Yahoo<input class="widefat" id="<?php echo $this->get_field_id('yahoo'); ?>" name="<?php echo $this->get_field_name('yahoo'); ?>" type="text" value="<?php echo $instance["yahoo"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('delicious'); ?>">Delicious<input class="widefat" id="<?php echo $this->get_field_id('delicious'); ?>" name="<?php echo $this->get_field_name('delicious'); ?>" type="text" value="<?php echo $instance["delicious"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('linkedin'); ?>">LinkedIn<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $instance["linkedin"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('stumble'); ?>">Stumble<input class="widefat" id="<?php echo $this->get_field_id('stumble'); ?>" name="<?php echo $this->get_field_name('stumble'); ?>" type="text" value="<?php echo $instance["stumble"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('friendfeed'); ?>">FriendFeed<input class="widefat" id="<?php echo $this->get_field_id('friendfeed'); ?>" name="<?php echo $this->get_field_name('friendfeed'); ?>" type="text" value="<?php echo $instance["friendfeed"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('ffffound'); ?>">FFFFound<input class="widefat" id="<?php echo $this->get_field_id('ffffound'); ?>" name="<?php echo $this->get_field_name('ffffound'); ?>" type="text" value="<?php echo $instance["ffffound"]; ?>" /></label></p>
           	<p><label for="<?php echo $this->get_field_id('cargo'); ?>">Cargo<input class="widefat" id="<?php echo $this->get_field_id('cargo'); ?>" name="<?php echo $this->get_field_name('cargo'); ?>" type="text" value="<?php echo $instance["cargo"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('redux'); ?>">redux<input class="widefat" id="<?php echo $this->get_field_id('redux'); ?>" name="<?php echo $this->get_field_name('redux'); ?>" type="text" value="<?php echo $instance["redux"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('digg'); ?>">Digg<input class="widefat" id="<?php echo $this->get_field_id('digg'); ?>" name="<?php echo $this->get_field_name('digg'); ?>" type="text" value="<?php echo $instance["digg"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('reddit'); ?>">Reddit<input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" type="text" value="<?php echo $instance["reddit"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('lastfm'); ?>">Last.fm<input class="widefat" id="<?php echo $this->get_field_id('lastfm'); ?>" name="<?php echo $this->get_field_name('lastfm'); ?>" type="text" value="<?php echo $instance["lastfm"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('soundcloud'); ?>">Soundcloud<input class="widefat" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" type="text" value="<?php echo $instance["soundcloud"]; ?>" /></label></p>
               <p><label for="<?php echo $this->get_field_id('reverbnation'); ?>">Reverbnation<input class="widefat" id="<?php echo $this->get_field_id('reverbnation'); ?>" name="<?php echo $this->get_field_name('reverbnation'); ?>" type="text" value="<?php echo $instance["reverbnation"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('polyvore'); ?>">polyvore<input class="widefat" id="<?php echo $this->get_field_id('polyvore'); ?>" name="<?php echo $this->get_field_name('polyvore'); ?>" type="text" value="<?php echo $instance["polyvore"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('evernote'); ?>">Evernote<input class="widefat" id="<?php echo $this->get_field_id('evernote'); ?>" name="<?php echo $this->get_field_name('evernote'); ?>" type="text" value="<?php echo $instance["evernote"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('backtype'); ?>">Backtype<input class="widefat" id="<?php echo $this->get_field_id('backtype'); ?>" name="<?php echo $this->get_field_name('backtype'); ?>" type="text" value="<?php echo $instance["backtype"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('pinterest'); ?>">pinterest<input class="widefat" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" type="text" value="<?php echo $instance["pinterest"]; ?>" /></label></p>
             <p><label for="<?php echo $this->get_field_id('instagram'); ?>">Instagram<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo $instance["instagram"]; ?>" /></label></p>
            	<p><label for="<?php echo $this->get_field_id('vimeo'); ?>">Vimeo<input class="widefat" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" type="text" value="<?php echo $instance["vimeo"]; ?>" /></label></p>
                	<p><label for="<?php echo $this->get_field_id('youtube'); ?>">YouTube<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo $instance["youtube"]; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('$feedburner_id'); ?>">Feedburner ID<input class="widefat" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('social-rss-email'); ?>" type="text" value="<?php echo $instance["social-rss-email"]; ?>" /></label></p>
        <?php 
    }

} // class FooWidget

//This sample widget can then be registered in the widgets_init hook:

// register FooWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ocmx_social_widget");'));

?>