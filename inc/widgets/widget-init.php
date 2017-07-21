<?php 
/**
 * Register widget areas.
 *
 * @package Empress_Lite
 */

/*-----------------------------------------------------------
	Include Widgets
-----------------------------------------------------------*/
// get_template_part( '/inc/widgets/widget', 'featured-articles' );
get_template_part( '/inc/widgets/widget', 'ad-300x250' );
get_template_part( '/inc/widgets/widget', 'ad-728x90' );
get_template_part( '/inc/widgets/widget', 'social-icons' );

function empress_lite_widgets_init() {

	/*-----------------------------------------------------------
		Front Page Widget area
	-----------------------------------------------------------*/
	// Front Page Slider Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'Slider Widget Area', 'empress-lite' ),
		'id'			=> 'front-1',
		'description'	=> esc_html__( 'Widgets in this area will be shown just below the site header. Suitable to display feature slider.', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Front Page Featured Articles Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'Featured Articles Widget Area', 'empress-lite' ),
		'id'			=> 'front-4',
		'description'	=> esc_html__( 'Widgets in this area will appear below Focus, Mission and Vision. Suitable to display featured articles.', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/*-----------------------------------------------------------
		Header Social Widget Area
	-----------------------------------------------------------*/
	register_sidebar( array( 
		'name' 			=> esc_html__( 'Header Social Widget Area', 'empress-lite' ),
		'id'			=> 'header-social-1',
		'description'	=> esc_html__( 'A widget to display social media tool box in the header', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );

	/*-----------------------------------------------------------
		Below Content Widget Area
	-----------------------------------------------------------*/
	register_sidebar( array(
		'name'			=> esc_html__( 'Below Content Advertisement', 'empress-lite' ),
		'id'			=> 'below-content-ad',
		'description'	=> esc_html__( 'A widget to display advertisement below main content area', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );
	

	/*-----------------------------------------------------------
		Default Widget Area
	-----------------------------------------------------------*/
	// Default Widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'empress-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets in this area will be shown on front page and other pages without specific sidebar.', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	/*-----------------------------------------------------------
		Page Widget Area
	-----------------------------------------------------------*/
	// Pages widget area	
	register_sidebar( array(
		'name' 			=> esc_html__( 'Page Widget Area', 'empress-lite' ),
		'id' 			=> 'page-1',
		'description' 	=> esc_html__('Widgets in this area will be shown on all Pages.','empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	/*-----------------------------------------------------------
		Contact Page Widget Area
	-----------------------------------------------------------*/
	// Contact page Widget area	
	register_sidebar( array(
		'name' 			=> esc_html__( 'Contact Page Widget Area', 'empress-lite' ),
		'id'			=> 'contact-1',
		'description' 	=> esc_html__('Widgets in this area will be shown on Contact Pages.','empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    /*-----------------------------------------------------------
		About Page Widget Area
	-----------------------------------------------------------*/
	// About page Widget area	
	register_sidebar( array(
		'name' 			=> esc_html__( 'About Page Widget Area', 'empress-lite' ),
		'id'			=> 'about-1',
		'description' 	=> esc_html__('Widgets in this area will be shown on About Pages.','empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	/*-----------------------------------------------------------
		Footer Widget area
	-----------------------------------------------------------*/
	// Footer Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'First Footer Widget Area', 'empress-lite' ),
		'id' 			=> 'f1-widgets',
		'description' 	=> esc_html__( 'The first footer widget area', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );

	// Second Footer Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'Second Footer Widget Area', 'empress-lite' ),
		'id' 			=> 'f2-widgets',
		'description' 	=> esc_html__( 'The second footer widget area', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );

	// Third Footer Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'Third Footer Widget Area', 'empress-lite' ),
		'id' 			=> 'f3-widgets',
		'description' 	=> esc_html__( 'The Third footer widget area', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );

	// Fourth Footer Widget Area
	register_sidebar( array(
		'name' 			=> esc_html__( 'Fourth Footer Widget Area', 'empress-lite' ),
		'id' 			=> 'f4-widgets',
		'description' 	=> esc_html__( 'The Forth footer widget area', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );

	/*-----------------------------------------------------------
		Footer Social Widget Area
	-----------------------------------------------------------*/
	register_sidebar( array( 
		'name' 			=> esc_html__( 'Footer Social Widget Area', 'empress-lite' ),
		'id'			=> 'footer-social-1',
		'description'	=> esc_html__( 'A widget to display social media tool box in the footer', 'empress-lite' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	) );
}
add_action( 'widgets_init', 'empress_lite_widgets_init' );
?>