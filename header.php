<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EmPress_Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'empress-lite' ); ?></a>

	<!-- HEADER -->
    <header id="masthead" class="site-header" role="banner">
        <!-- Custom Wrapper -->
        <div class="navbar-wrapper">
            <nav id="site-navigation" class="navbar navbar-default navbar-fixed-top main-navigation" role="navigation">
                <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <p class="navbar-text navbar-account">
                            <?php if ( get_theme_mod( 'empress_lite_account_register' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'empress_lite_account_register' ) ); ?>" target="_blank" id="signup" class="navbar-link btn btn-default"><?php echo esc_html_e( get_theme_mod( 'empress_lite_account_register_text' ) ); ?> &raquo;</a>
                            <?php endif; ?>

                            <?php if ( get_theme_mod( 'empress_lite_account_login' ) ) : ?>
                            <a href="<?php echo esc_url( get_theme_mod( 'empress_lite_account_login' ) ); ?>" target="_blank" id="login" class="navbar-link"><?php echo esc_html_e( get_theme_mod( 'empress_lite_account_login_text' ) ); ?></a>
                            <?php endif; ?>
                        </p>
                    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php 
                    wp_nav_menu( array(
                        'menu'				=> 'primary',
                        'theme_location' 	=> 'primary', 
                        'menu_class' 		=> 'nav navbar-nav', 
                        'menu_id' 			=> 'primary-menu', 
                        'container' 		=> 'div', 
                        'depth'             => 2,
                        'container_class' 	=> 'collapse navbar-collapse', 
                        'container_id' 		=> 'navbar-ex1-collapse',
                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                        'walker'			=> new wp_bootstrap_navwalker()
                    ) ); 
                ?>
                </div>
            </nav>
        </div>

        <!-- Site Branding -->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="site-branding">

                        <?php if (is_front_page() && is_home() || is_page_template( 'template-home-page.php' )) : ?>
                            <h1 class="site-title site-logo">
                                <a href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' )); ?> - <?php bloginfo('description'); ?>" rel="home">

                                <!-- Include template for logo -->
                                <?php get_template_part( 'template-parts/branding', 'part' ); ?>

                                </a>
                            </h1>

                        <?php else : ?>
                            <p class="site-title site-logo">
                                <a href="<?php echo esc_url( home_url( '/' )); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' )); ?> - <?php bloginfo('description'); ?>" rel="home">

                                <!-- Include template for logo -->
                                <?php get_template_part( 'template-parts/branding', 'part' ); ?>

                                </a>
                            </p>

                        <?php endif; ?>

                    </div> <!-- end .site-branding -->
                </div> <!-- end of col-md-6 -->
                <div class="col-md-6 clearfix">
                    <div id="header-search-form">
                        <aside class="widget widget_search">
                            <?php get_template_part( 'template-parts/headersearch', 'form' ); ?>
                        </aside>
                    </div>
                    <div id="header-social-tool">
                        <?php if ( is_active_sidebar( 'header-social-1' ) ) {
                            dynamic_sidebar( 'header-social-1' );
                        } ?>
                    </div>
                </div>
            </div>
        </div> <!-- end of .container -->

    </header> <!-- end of #masthead -->

    <div id="content" class="site-content">