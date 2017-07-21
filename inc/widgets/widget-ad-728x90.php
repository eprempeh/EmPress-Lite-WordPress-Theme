<?php

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'return register_widget( "EmPress_Lite_Ad_728x90" );') );

class EmPress_Lite_Ad_728x90 extends WP_Widget{
	
	public function __construct(){
		$widget_ops = array( /* Basically takes class name and description */
			'classname' => 'ad_728x90',
			'description' => __( 'Widget that displays 728x90 advertisement in the header or below main content section.', 'empress-lite' )
			);

		$control_ops = array( // Optional parameters
			'width' => 200, // width for control box in wp-admin on widget page
			'height' => 250 // height for control box in wp-admin on widget page
			);
		parent::__construct( 'ad_728x90_ID' /* Widget ID */, __( 'EmPress Lite - 728x90 Advertisement', 'empress-lite' ) /* Name of Widget */, $widget_ops, $control_ops );

		// Enqueue needed script
		add_action( 'admin_enqueue_scripts', array($this, 'upload_scripts') );
    }

	/**
	* Upload the Javascripts for the media uploader
	*/
	function upload_scripts(){
		wp_enqueue_script( 'media-upload' );
		wp_enqueue_script( 'thickbox' );
		wp_enqueue_style( 'thickbox' );
	}

	/**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/

	public function widget( $args, $instance ){
		// Add any html to output the image in the $instance array
        extract( $args );
        extract( $instance );

        $title      = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $imageLink  = isset( $instance[ 'imageLink' ] ) ? $instance[ 'imageLink' ] : '';
        $imageUrl   = isset( $instance[ 'imageUrl' ] ) ? $instance[ 'imageUrl' ] : '';

        echo $before_widget; ?>
        
        <div class="advertisement_728x90">
            <?php if ( !empty( $title ) ) { ?>
                <div class="advertisement_title">
                    <?php echo $before_title . esc_html( $title ) . $after_title; ?>
                </div>
            <?php }

                $output = '';
                if ( !empty( $imageUrl ) ) {
                    $output .= '<div class="advertisement_content">';
                    if ( !empty( $imageLink ) ) {
                        $output .= '<a href="'. $imageLink .'" target="_blank" style="display: block;"><img src="'. $imageUrl .'" alt="'. $imageLink .'" /></a>';
                    } else {
                        $output .= '<img src="'. $imageUrl .'" />';
                    }

                    $output .= '</div>';
                    echo $output;
                }
            ?>
            
        </div>
      <?php
      echo $after_widget;
	}

	/**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/

	public function update( $new_instance, $old_instance ){
        // update logic goes here
        $instance = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['imageLink'] = esc_url_raw( $new_instance['imageLink'] );
        $instance['imageUrl']  = esc_url_raw( $new_instance['imageUrl'] );

        return $instance;
	}

	/**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/

	public function form( $instance ){
        // Array that serves as the defaults
        $empress_defaults[ 'title' ]        = '';
        $empress_defaults[ 'imageLink' ]    = '';
        $empress_defaults[ 'imageUrl' ]     = '';

        // Merge user defined arguments into defaults array
        $instance = wp_parse_args( (array) $instance, $empress_defaults );
        
        $title      = esc_attr( $instance[ 'title' ] );
        $imageLink  = esc_url( $instance[ 'imageLink' ] );
        $imageUrl   = esc_url( $instance[ 'imageUrl' ] );        

        ?> <!-- End php tag for above php codes -->

        <!-- Begin raw HTML codes -->
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php echo _e( 'Title:', 'empress-lite' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $title; ?>" />
        </p>
        <label><?php _e( 'Add your Advertisement 728x90 image here', 'empress-lite' ); ?></label>
        <p>
            <label for="<?php echo $this->get_field_id( 'imageLink' ); ?>"><?php echo _e( 'Enter Advertisement Image Link:' ); ?></label>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id( 'imageLink' ); ?>" name="<?php echo $this->get_field_name( 'imageLink' ); ?>" value="<?php echo $imageLink; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'imageUrl' ); ?>"><?php _e( 'Advertisement Image:', 'empress-lite' ); ?></label>

            <?php if ( $instance[ 'imageUrl' ] != '') {
                echo '<img id="' . $this->get_field_id( $instance[ 'imageUrl' ] . 'preview') . '" src="' . $instance[ 'imageUrl' ] . '" style="max-width: 250px;" /><br />';
            }
            ?>

            <input class="widefat" type="text" size="36" id="<?php echo $this->get_field_id( 'imageUrl' ); ?>" name="<?php echo $this->get_field_name( 'imageUrl' ); ?>" value="<?php echo $imageUrl; ?>" />
            <input type="button" class="custom_media_button button button-primary" id="custom_media_button" value="<?php echo _e( 'Upload Image', 'empress-lite' ); ?>" onclick="imageWidget.uploader( '<?php echo $this->get_field_id( 'imageUrl' ); ?>' ); return false;" />
        </p>
        <!-- End HTML codes -->

        <?php /* Begin php tag for php codes */
	}
}