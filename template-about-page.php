<?php
/**
 *
 * Template Name: About Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */

// INITIALISE GLOBAL POST VARIABLE
global $post;

// GET FIELDS FROM CUSTOM FIELDS
$vision_title             = get_field('vision_title', $post->ID);
$vision_body_text         = get_field('vision_body_text', $post->ID);

$core_values_title        = get_field('core_values_title', $post->ID);
$core_values_1            = get_field('core_values_1', $post->ID);
$core_values_2            = get_field('core_values_2', $post->ID);
$core_values_3            = get_field('core_values_3', $post->ID);
$core_values_4            = get_field('core_values_4', $post->ID);
$core_values_5            = get_field('core_values_5', $post->ID);
$core_values_6            = get_field('core_values_6', $post->ID);

$journal_impact_title     = get_field('journal_impact_title', $post->ID);
$journal_impact_text      = get_field('journal_impact_text', $post->ID);

$journal_ownership_title  = get_field( 'journal_ownership_title', $post->ID );
$journal_ownership_text   = get_field( 'journal_ownership_text', $post->ID );


get_header(); ?>
       
    <div class="container">
        <div class="row">
            
            <div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">
                    <section class="about-us">
                       
                        <?php 
                        // Breadcrumb
                        if ( function_exists( 'yoast_breadcrumb' ) ) {
                            yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                        }

                        if( have_posts() ) while( have_posts() ) : the_post(); ?>                           
                            <header class="entry-header">
                                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <?php if ( has_post_thumbnail() ) { ?>
                                    <figure class="img-responsive">
                                        <?php the_post_thumbnail(); ?>
                                    </figure>
                                <?php } ?>

                                <div class="long-description">
                                    <?php the_content(); ?>
                                </div>

                            </div><!-- .entry-content -->
                        <?php endwhile; ?>
                        
                        <!-- Vision and Mission -->
                        <h2><?php echo $vision_title; ?></h2>
                        <p><?php echo $vision_body_text; ?></p>
                        
                        <!-- Core Values -->
                        <h2><?php echo $core_values_title; ?></h2>
                        <ul class="list-unstyled core-values">
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_1 ?></li>
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_2 ?></li>
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_3 ?></li>
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_4 ?></li>
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_5 ?></li>
                            <li><i class="fa fa-check-circle"></i><?php echo $core_values_6 ?></li>
                        </ul>

                        <!-- Journal Impact -->
                        <h2><?php echo $journal_impact_title; ?></h2>
                        <p><?php echo $journal_impact_text; ?></p>

                        <!-- Journal Ownership -->
                        <h2><?php echo $journal_ownership_title; ?></h2>
                        <p><?php echo $journal_ownership_text; ?></p>
                    </section>                 
                    
                    <!-- Advertisement -->
                    <?php empress_lite_get_below_ad(); ?>
                    
        		</main> <!-- end of #main -->
        	</div> <!-- end of #primary -->

            <?php get_sidebar( 'about' ); ?>
        </div> <!-- end of .row --> 
    </div> <!-- end of .container -->
<?php get_footer(); ?>
