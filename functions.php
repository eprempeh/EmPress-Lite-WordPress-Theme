<?php
/**
 * EmPress Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EmPress_Lite
 */

if ( ! function_exists( 'empress_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function empress_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on EmPress Lite, use a find and replace
	 * to change 'empress-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'empress-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location initially *secondary later*.
	function register_my_menus() {
		register_nav_menus( array(
			'primary' => esc_html__( 'Header Menu', 'empress-lite' ),
			'secondary' => esc_html__( 'Footer Menu', 'empress-lite' )
		) );
	}

	add_action( 'init', 'register_my_menus' );
	wp_create_nav_menu( 'Header Menu', array( 'slug' => 'primary', ) );
	wp_create_nav_menu( 'Footer Menu', array( 'slug' => 'secondary' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'empress_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // empress_lite_setup
add_action( 'after_setup_theme', 'empress_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function empress_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'empress_lite_content_width', 718 );
}
add_action( 'after_setup_theme', 'empress_lite_content_width', 0 );

/**
 * Custom functions to link to resources
 * ------------------------------------
 * Link scripts, styles and images
 */
function get_theme_uri( $add_path = '' ) {
	return get_stylesheet_directory_uri() . $add_path;
}

function theme_uri( $add_path = '' ) {
	echo get_stylesheet_directory_uri() . $add_path;
}

function get_parent_theme_uri( $add_path = '' ) {
	return get_template_directory_uri() . $add_path;
}

function parent_theme_uri( $add_path = '' ) {
	echo get_template_directory_uri() . $add_path;
}

/**
 * Excerpt length
 */
function empress_lite_excerpt_length($length) {
	return 50;
}
add_filter( 'excerpt_length', 'empress_lite_excerpt_length', 999 );

/**
* Exerpt More Filter
* Replace [...] with more
*/
function empress_lite_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'empress-lite' ) . '</a>';
}
add_filter( 'excerpt_more', 'empress_lite_excerpt_more' );

/**
 * Include Theme specific functionality
 * ------------------------------------
 * Enqueue scripts and styles
 */
if ( !function_exists('empress_lite_initiate_files') ) {
	function empress_lite_initiate_files() {
		// Initiate all widgets
		include_once( get_template_directory() . '/inc/widgets/widget-init.php' );
		// Include header data
		include_once( get_template_directory() . '/inc/headerdata.php' );
	}
	add_action( 'after_setup_theme', 'empress_lite_initiate_files');
}

/**
* Include Bootstrap Nav Walker
*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
* Include EmPress Lite Helper Fuctions
*/
require_once get_template_directory() . '/inc/empress-lite-helper-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
