<?php
/**
 * Header Data
 *
 * @package WordPress
 * @subpackage EmPress_Lite
 * @since EmPress_Lite 1.0
 */

/*-----------------------------------------------------------------------------------*/
/*	Include CSS
/*-----------------------------------------------------------------------------------*/

if ( ! function_exists( 'empress_lite_css_include' ) ) {

	function empress_lite_css_include () {

		/*-----------------------------------------------------------
			Loads our main stylesheet.
		-----------------------------------------------------------*/
		wp_enqueue_style( 'empress-lite-style', get_stylesheet_uri(), array( 'bootstrap', 'font-awesome', 'empress-lite-google-fonts' ), '20172207' );


		/*-----------------------------------------------------------
			Bootstrap
		-----------------------------------------------------------*/
		wp_register_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '3.3.5' );
		wp_enqueue_style( 'bootstrap' );


		/*-----------------------------------------------------------
			FontAwesome
		-----------------------------------------------------------*/
		wp_register_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css', array( 'bootstrap' ), '4.4.0' );
		wp_enqueue_style( 'font-awesome' );


		/*-----------------------------------------------------------
			Google Fonts
		-----------------------------------------------------------*/
		wp_register_style( 'empress-lite-google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700', array( 'bootstrap' ), true );
		wp_enqueue_style( 'empress-lite-google-fonts' );

	}

	add_action( 'wp_enqueue_scripts', 'empress_lite_css_include' );
}


/* ----------------------------------------------------------------------------------- */
/*	Include JavaScripts
/ /*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'empress_lite_scripts_include' ) ) {

	function empress_lite_scripts_include() {

		/*-----------------------------------------------------------
			Include jQuery
		-----------------------------------------------------------*/
		wp_enqueue_script('jquery');

		/*-----------------------------------------------------------
			Adds JavaScript to pages with the comment form to support
			sites with threaded comments (when in use), wp navigation
			and skip link focus for screen readers
		-----------------------------------------------------------*/

		wp_enqueue_script( 'empress-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		/*-----------------------------------------------------------
	    	Bootstrap Script
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array( 'jquery' ), '3.3.5', 'footer' );

		/*-----------------------------------------------------------
	    	Base custom scripts
	    -----------------------------------------------------------*/
		wp_enqueue_script( 'base', get_template_directory_uri().'/js/base.js', array( 'jquery' ), '20151015', 'footer' );

		/*-----------------------------------------------------------
			This part loads a JavaScript file that enables old versions of Internet Explorer to recognize the new HTML5 element
		-----------------------------------------------------------*/
		global $is_IE;
		if ($is_IE) {
			wp_enqueue_script( 'html5', 'http://html5shim.googlecode.com/svn/trunk/html5.js', '', '', '' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'empress_lite_scripts_include' );
}

/**
* Enqueue JavaScript in WP-Admin for uploading media with Widget
*/
add_action( 'admin_enqueue_scripts', 'empress_lite_image_uploader' );

function empress_lite_image_uploader() {
    wp_enqueue_media();
    wp_enqueue_script('empress-lite-widget-image-upload', get_template_directory_uri() . '/js/upload-media.js', false, '20151015', true);
}

/*-----------------------------------------------------------
	HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
-----------------------------------------------------------*/
global $is_IE;
$empress_lite_user_agent = $_SERVER['HTTP_USER_AGENT'];

if ( $is_IE && preg_match('/(?i)msie [1-8]/', $empress_lite_user_agent) ) {

	function empress_lite_ie_version() {
		wp_enqueue_script( 'html5shiv', 'http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '',  true );
		wp_enqueue_script( 'respondjs', 'http://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', true );
	}

add_action( 'wp_enqueue_scripts', 'empress_lite_ie_version' );

}

?>
