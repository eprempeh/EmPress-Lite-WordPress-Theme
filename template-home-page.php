<?php
/**
 *
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */

// INITIALISE GLOBAL POST VARIABLE
global $post;

// GET WELCOME VARIABLES FROM CUSTOM FIELDS
$welcome_section_title          = get_field('welcome_section_title', $post->ID);
$welcome_section_body_text      = get_field('welcome_section_body_text', $post->ID);

// GET FOCUS, MISSION AND VISION VARIABLES FROM CUSTOM FIELDS
$focus_icon                     = get_field('focus_icon', $post->ID);
$focus_title                    = get_field('focus_title', $post->ID);
$focus_message                  = get_field('focus_message', $post->ID);
$focus_button_text              = get_field('focus_button_text', $post->ID);
$focus_button_url               = get_field('focus_button_url', $post->ID);

$mission_icon                   = get_field('mission_icon', $post->ID);
$mission_title                  = get_field('mission_title', $post->ID);
$mission_message                = get_field('mission_message', $post->ID);
$mission_button_text            = get_field('mission_button_text', $post->ID);
$mission_button_url             = get_field('mission_button_url', $post->ID);

$vision_icon                    = get_field('vision_icon', $post->ID);
$vision_title                   = get_field('vision_title', $post->ID);
$vision_message                 = get_field('vision_message', $post->ID);
$vision_button_text             = get_field('vision_button_text', $post->ID);
$vision_button_url              = get_field('vision_button_url', $post->ID);

get_header(); ?>
    
    <div class="container">
        <div class="row">
            
            <div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">
                    
                    <?php 
                    // Breadcrumb
                    if ( function_exists( 'yoast_breadcrumb' ) ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    }

                    // first-home-widget-area
    				if( is_active_sidebar( 'front-1' ) ) : ?>
                        <section class="first-home-widget-area">
                            <?php dynamic_sidebar( 'front-1' ); ?>
                        </section>
                    <?php endif; ?>
                    
                    <!-- second-home-widget-area -->
                    <section class="second-home-widget-area">
                        <article class="welcome">
                            <header>
                                <h2><?php echo $welcome_section_title ?></h2>
                            </header>
                            <p><?php echo $welcome_section_body_text ?></p>
                        </article>
		    		</section>
                   
                    <!-- third-home-widget-area -->
                    <section class="third-home-widget-area row">
                        <article class="section-one col-sm-4">
                            <div class="section">
                               <?php if( !empty($focus_icon) ) { ?>
                                <div class="section-header">
                                    <span><i class="<?php echo $focus_icon; ?>"></i></span>
                                </div>
                                <?php } else { ?>
                                <div class="section-header">
                                    <img src="<?php parent_theme_uri('/images/focus-scope.jpg'); ?>" alt="">
                                </div>
                                <?php } ?>
                                <div class="section-content">
                                    <header>
                                        <h2><?php echo $focus_title; ?></h2>
                                    </header>
                                    <p class="focus-scope"><?php echo $focus_message; ?></p>	    									
                                    <p><a href="<?php echo $focus_button_url; ?>" class="btn btn-primary intro-read-more" ><?php echo $focus_button_text; ?> <i class="fa fa-angle-double-right"></i></a></p>
                                </div>
                            </div>
                        </article> <!-- end .focus-scope -->
                        
                        <article class="section-two col-sm-4">
                            <div class="section">
                                <?php if( !empty($mission_icon) ) { ?>
                                <div class="section-header">
                                    <span><i class="<?php echo $mission_icon; ?>"></i></span>
                                </div>
                                <?php } else { ?>
                                <div class="section-header">
                                    <img src="<?php parent_theme_uri('/images/mission.jpg'); ?>" alt="">
                                </div>
                                <?php } ?>
                                <div class="section-content">
                                    <header>
                                        <h2><?php echo $mission_title; ?></h2>
                                    </header>
                                    <p class="mission"><?php echo $mission_message; ?></p>
                                    <p><a href="<?php echo $mission_button_url; ?>" class="btn btn-primary intro-read-more" ><?php echo $mission_button_text; ?> <i class="fa fa-angle-double-right"></i></a></p>
                                </div>
                            </div>
                        </article>
                        <article class="section-three col-sm-4">
                            <div class="section">
                                 <?php if( !empty($vision_icon) ) { ?>
                                <div class="section-header">
                                    <span><i class="<?php echo $vision_icon; ?>"></i></span>
                                </div>
                                <?php } else { ?>
                                <div class="section-header">
                                    <img src="<?php parent_theme_uri('/images/vision.jpg'); ?>" alt="">
                                </div>
                                <?php } ?>
                                <div class="section-content">
                                    <header>
                                        <h2><?php echo $vision_title; ?></h2>
                                    </header>
                                    <p class="vision"><?php echo $vision_message; ?></p>
                                    <p><a href="<?php echo $vision_button_url; ?>" class="btn btn-primary intro-read-more"><?php echo $vision_button_text; ?> <i class="fa fa-angle-double-right"></i></a></p>
                                </div>
                            </div>
                        </article>
                    </section>
                    
                    <!-- fourth-home-widget-area -->
                    <?php if( is_active_sidebar( 'front-4' ) ) : ?>
                        <section class="fourth-home-widget-area">
                            <?php dynamic_sidebar( 'front-4' ); ?>
                        </section> <!-- end of #featured-article -->
                    <?php endif; ?>

                    <!-- Advertisement -->
                    <?php empress_lite_get_below_ad(); ?>
                    
        		</main> <!-- end of #main -->
        	</div> <!-- end of #primary -->

            <?php get_sidebar(); ?>
        </div> <!-- end of .row --> 
    </div> <!-- end of .container -->
<?php get_footer(); ?>