<?php

/**
* Register the widget
*/
add_action( 'widgets_init', create_function( '', 'return register_widget( "EmPress_Lite_Social_Icons" );' ) );

class EmPress_Lite_Social_Icons extends WP_Widget {

    public function __construct() {
        $widget_ops = array(
            'classname' => 'empress_lite_social',
            'description' => __( 'A widget that displays social media icons in the header and footer.', 'empress-lite' )
            );

        $control_ops = array(
            'width' => 300,
            'height' => 350,
            'id_base' => 'empress_lite_footer_social'
            );
        parent::__construct( 'empress_lite_footer_social', __( 'EmPress Lite - Social Icons', 'empress-lite' ), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        // outputs the content of the widget
        extract( $args );
        $title      = apply_filters( 'widget_title', $instance['title'] );
        $facebook 	= apply_filters( 'widget_facebook', $instance['facebook'] );
        $twitter 	= apply_filters( 'widget_twitter', $instance['twitter'] );
        $googleplus	= apply_filters( 'widget_googleplus', $instance['plus'] );
        $pinterest	= apply_filters( 'widget_pinterest', $instance['pinterest'] );
        $youtube 	= apply_filters( 'widget_youtube', $instance['youtube'] );
        $soundcloud	= apply_filters( 'widget_soundcloud', $instance['soundcloud'] );
        $tumblr 	= apply_filters( 'widget_tumblr', $instance['tumblr'] );
        $flickr 	= apply_filters( 'widget_flickr', $instance['flickr'] );
        $linkedin 	= apply_filters( 'widget_linkedin', $instance['linkedin'] );
        $instagram 	= apply_filters( 'widget_instagram', $instance['instagram'] );
        $rss     	= apply_filters( 'widget_rss', $instance['rss'] );
        $mailto     = apply_filters( 'widget_mailto', $instance['mailto'] );

        echo $before_widget;

        if ( $title )
            echo $before_title . $title . $after_title;

        echo '<ul>';

        // Facebook
        if ($facebook != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Facebook', 'empress-lite') . '"href="'.esc_url( $facebook ).'"><i class="fa fa-facebook"></i>' . '</a></li>';
        }
        // Twitter
        if ($twitter != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Twitter', 'empress-lite') . '"href="'.esc_url( $twitter ).'"><i class="fa fa-twitter"></i>' . '</a></li>';
        }
        // Google Plus
        if ($googleplus != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Google Plus', 'empress-lite') . '"href="'.esc_url( $googleplus ).'"><i class="fa fa-google-plus"></i>' . '</a></li>';
        }
        // Pinterst
        if ($pinterest != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Pinterest', 'empress-lite') . '"href="'.esc_url( $pinterest ).'"><i class="fa fa-pinterest"></i>' . '</a></li>';
        }
        // YouTube
        if ($youtube != ""){
            echo '<li><a class="social" target="_blank" title="' . __('YouTube', 'empress-lite') . '"href="'.esc_url( $youtube ).'"><i class="fa fa-youtube"></i>' . '</a></li>';
        }
        // Sound Cloud
        if ($soundcloud != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Sound Cloud', 'empress-lite') . '"href="'.esc_url( $soundcloud ).'"><i class="fa fa-soundcloud"></i>' . '</a></li>';
        }
        // Tumblr
        if ($tumblr != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Tumblr', 'empress-lite') . '"href="'.esc_url( $tumblr ).'"><i class="fa fa-tumblr"></i>' . '</a></li>';
        }
        // Flickr
        if ($flickr != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Flickr', 'empress-lite') . '"href="'.esc_url( $flickr ).'"><i class="fa fa-flickr"></i>' . '</a></li>';
        }
        // LinkedIn
        if ($linkedin != ""){
            echo '<li><a class="social" target="_blank" title="' . __('LinkedIn', 'empress-lite') . '"href="'.esc_url( $linkedin ).'"><i class="fa fa-linkedin"></i>' . '</a></li>';
        }
        // Instagram
        if ($instagram != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Instagram', 'empress-lite') . '"href="'.esc_url( $instagram ).'"><i class="fa fa-instagram"></i>' . '</a></li>';
        }
        // RSS
        if ($rss != ""){
            echo '<li><a class="social" target="_blank" title="' . __('RSS', 'empress-lite') . '"href="'.esc_url( $rss ).'"><i class="fa fa-rss"></i>' . '</a></li>';
        }
        // Mail
        if ($mailto != ""){
            echo '<li><a class="social" target="_blank" title="' . __('Mail', 'empress-lite') . '"href="mailto:'.esc_html( $mailto ).'"><i class="fa fa-envelope"></i>' . '</a></li>';
        }

        echo '</div>';

        echo $after_widget;
    }


    function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        $instance = $old_instance;

        $instance['title'] 		= esc_html( $new_instance['title'] );
        $instance['facebook'] 	= esc_url( $new_instance['facebook'] );
        $instance['twitter'] 	= esc_url( $new_instance['twitter'] );
        $instance['googleplus'] = esc_url( $new_instance['googleplus'] );
        $instance['pinterest'] 	= esc_url( $new_instance['pinterest'] );
        $instance['youtube'] 	= esc_url( $new_instance['youtube'] );
        $instance['soundcloud'] = esc_url( $new_instance['soundcloud'] );
        $instance['tumblr'] 	= esc_url( $new_instance['tumblr'] );
        $instance['flickr']     = esc_url( $new_instance['flickr'] );
		$instance['linkedin']   = esc_url( $new_instance['linkedin'] );
        $instance['instagram'] 	= esc_url( $new_instance['instagram'] );
        $instance['rss']        = esc_url( $new_instance['rss'] );
        $instance['mailto']     = esc_html( $new_instance['mailto'] );

        return $instance;
    }


    function form( $instance ) {
        $defaults = array(
            'title'           => null,
            'facebook'        => null,
            'twitter'         => null,
            'googleplus'      => null,
            'pinterest'       => null,
            'youtube'         => null,
            'soundcloud'      => null,
            'tumblr'          => null,
            'flickr'          => null,
            'linkedin'        => null,
            'instagram'       => null,
            'rss'             => null,
            'mailto'          => null
        );
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <div class="ewf-meta">
            <!-- Title-->
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_html( $instance['title'] ); ?>" style="width:100%;" />
            </p>

            <!-- Facebook-->
            <p>
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e('Facebook:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_url( $instance['facebook'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Facebook profile, page or group.', 'charitas'); ?>
                </p>
            </p>

            <!-- Twitter-->
            <p>
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e('Twitter:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_url( $instance['twitter'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Twitter profile.', 'empress-lite'); ?>
                </p>
            </p>

            <!-- Google Plus -->
            <p>
                <label for="<?php echo $this->get_field_id( 'plus' ); ?>"><?php _e('Google Plus:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'plus' ); ?>" name="<?php echo $this->get_field_name( 'plus' ); ?>" value="<?php echo esc_url( $instance['plus'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Google Plus profile', 'charitas'); ?>
                </p>
            </p>

            <!-- Pinterest -->
            <p>
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e('Pinterest:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_url( $instance['pinterest'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Pinterest profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- YouTube -->
            <p>
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e('YouTube:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_url( $instance['youtube'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your YouTube profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- Soundcloud -->
            <p>
                <label for="<?php echo $this->get_field_id( 'soundcloud' ); ?>"><?php _e('Soundcloud:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'soundcloud' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud' ); ?>" value="<?php echo esc_url( $instance['soundcloud'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Soundcloud profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- Tumblr -->
            <p>
                <label for="<?php echo $this->get_field_id( 'tumblr' ); ?>"><?php _e('Tumblr:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'tumblr' ); ?>" name="<?php echo $this->get_field_name( 'tumblr' ); ?>" value="<?php echo esc_url( $instance['tumblr'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Tumblr profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- Flickr -->
            <p>
                <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e('Flickr:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_url( $instance['flickr'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Flickr profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- LinkedIn -->
            <p>
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e('LinkedIn:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_url( $instance['linkedin'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your LinkedIn profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- Instagram -->
            <p>
                <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e('Instagram:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_url( $instance['instagram'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the full URL of your Instagram profile.', 'charitas'); ?>
                </p>
            </p>

            <!-- RSS -->
            <p>
                <label for="<?php echo $this->get_field_id( 'rss' ); ?>"><?php _e('RSS:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo esc_url( $instance['rss'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the Url of your RSS. You may include your RSS from Feedburner.', 'charitas'); ?>
                </p>
            </p>

            <!-- Mailto -->
            <p>
                <label for="<?php echo $this->get_field_id( 'mailto' ); ?>"><?php _e('Email:', 'empress-lite'); ?></label>
                <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'mailto' ); ?>" name="<?php echo $this->get_field_name( 'mailto' ); ?>" value="<?php echo esc_html( $instance['mailto'] ); ?>" style="width:100%;" />
                <p style="font-size: 10px; color: #999; margin: -10px 0 0 0px; padding: 0px;">
				<?php _e('Insert the email here.', 'charitas'); ?>
                </p>
            </p>

        </div>

    <?php /* Begin php tag for php codes */
    }
}
