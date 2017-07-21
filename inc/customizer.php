<?php
/**
 * EmPress Lite Theme Customizer.
 *
 * @package EmPress_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function empress_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    // Remove color section from customizer front-view
	$wp_customize->remove_section('colors');
    
    // Remove header image section from customizer front-view
	$wp_customize->remove_section('header_image');
    
    // Change panel for Site Title & Tagline Section
    $site_title        = $wp_customize->get_section( 'title_tagline' );
    $site_title->panel = 'empress_lite_panel_general';

    // Change panel for Background Image
    $site_title        = $wp_customize->get_section( 'background_image' );
    $site_title->panel = 'empress_lite_panel_general';
    
    /***********************************************/
	/************** THEME OPTIONS  ***************/
	/***********************************************/
    $wp_customize->add_panel( 'empress_lite_panel_general', array(
        'priority'        => 20,
        'capability'      => 'edit_theme_options',
        'theme_supports'  => '',
        'title'           => __( 'Theme Options', 'empress-lite' )
    ) );
    
    //================================= LOGO
    $wp_customize->add_section( 'empress_lite_logo_section' , array(
	    'title'        => __( 'Logo', 'empress_lite' ),
	    'priority'     => 30,
	    'description'  => __( 'Upload a logo to replace the default site name and description in the header' ),
        'panel'        => 'empress_lite_panel_general'
	) );
	$wp_customize->add_setting( 'empress_lite_logo' );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'empress_lite_logo', array(
	    'label'    => __( 'Logo Upload', 'empress_lite' ),
	    'section'  => 'empress_lite_logo_section',
	    'settings' => 'empress_lite_logo'
	) ) );

    //================================= LOGIN AND REGISTER
    $wp_customize->add_section( 'empress_lite_account_section', array(
        'title'       => __( 'Journal Account Links', 'empress-lite' ),
        'priority'    => 35,
        'description' => __( 'Enter URL to Journal Registration' ),
        'panel'       => 'empress_lite_panel_general'
    ) );
    // REGISTER TEXT
    $wp_customize->add_setting( 'empress_lite_account_register_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'      => 'Register'
        ) );
    $wp_customize->add_control( 'empress_lite_account_register_text_control', array(
        'label'     => __( 'Registration Text', 'empress-lite' ),
        'section'   => 'empress_lite_account_section',
        'settings'  => 'empress_lite_account_register_text'
    ) );
    // REGISTER URL
    $wp_customize->add_setting( 'empress_lite_account_register',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'      => 'http://myjournal.afrijcmr.org/register'
        ) );
    $wp_customize->add_control( 'empress_lite_account_register_control', array(
        'label'     => __( 'Registration URL', 'empress-lite' ),
        'section'   => 'empress_lite_account_section',
        'settings'  => 'empress_lite_account_register'
    ) );
    // LOGIN TEXT
    $wp_customize->add_setting( 'empress_lite_account_login_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'      => 'Login'
        ) );
    $wp_customize->add_control( 'empress_lite_account_login_text_control', array(
        'label'     => __( 'Login Text', 'empress-lite' ),
        'section'   => 'empress_lite_account_section',
        'settings'  => 'empress_lite_account_login_text'
    ) );
    // LOGIN URL
    $wp_customize->add_setting( 'empress_lite_account_login',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'      => 'http://myjournal.afrijcmr.org/login'
        ) );
    $wp_customize->add_control( 'empress_lite_account_login_control', array(
        'label'     => __( 'Login URL', 'empress-lite' ),
        'section'   => 'empress_lite_account_section',
        'settings'  => 'empress_lite_account_login'
    ) );

    //================================= COPYRIGHT
    $wp_customize->add_section( 'empress_lite_copyright_section', array(
        'title'       => __( 'Copyright', 'empress-lite'),
        'priority'    => 100,
        'description' => __( 'Enter Copyright Information' ),
        'panel'       => 'empress_lite_panel_general'
    ) );
    $wp_customize->add_setting( 'empress_lite_copyright_setting',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => sprintf('&copy; %s', __('20', 'empress-lite') . sprintf("%s", date('y') ) . __(' African Medical Journal of Current Research. All Rights Reserved.', 'empress-lite') ),
        ) );
    $wp_customize->add_control( 'empress_lite_copyright_control', array(
        'type'      => 'textarea',
        'label'     => __( 'Copyright Text', 'empress-lite' ),
        'section'   => 'empress_lite_copyright_section',
        'settings'  => 'empress_lite_copyright_setting'
    ) );
    
}
add_action( 'customize_register', 'empress_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function empress_lite_customize_preview_js() {
	wp_enqueue_script( 'empress_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'empress_lite_customize_preview_js' );