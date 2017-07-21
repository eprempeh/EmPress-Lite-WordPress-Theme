<?php
/**
 *
 * Template Name: Contact Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */
// INITIALISE GLOBAL POST VARIABLE
global $post;

// GET FIELDS FROM CUSTOM FIELDS
$address_title            = get_field('address_title', $post->ID);
$street_adress            = get_field('street_adress', $post->ID);
$post_office_box          = get_field('post_office_box', $post->ID);
$location                 = get_field('location', $post->ID);

$principal_contact_title  = get_field('principal_contact_title', $post->ID);
$principal_contact_email  = get_field('principal_contact_email', $post->ID);
$principal_contact_phone  = get_field('principal_contact_phone', $post->ID);

$map_location_title       = get_field('map_location_title', $post->ID);
$map_location_url         = get_field('map_location_url', $post->ID);
$map_location_more        = get_field('map_location_more', $post->ID);

get_header(); ?>
      
    <div class="container">
        <div class="row">
            
            <div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">                    
                    <div id="contact-us">
                        
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
                        
                        <div id="address-info">
                            <address>
                              <?php if( !empty($address_title) ) { ?>
                               <h3><?php echo $address_title; ?></h3>
                                <?php } ?>
                                
                                <?php if( !empty($street_adress) ) { ?>
                               <i class="fa fa-map-marker fa-lg"></i>&nbsp;&nbsp; <?php echo $street_adress; ?><br />
                                <?php } ?>
                                
                               <?php if( !empty($post_office_box) ) { ?>
                                 <i class="fa fa-envelope fa-lg"></i>&nbsp;&nbsp; <?php echo $post_office_box; ?><br />
                                <?php } ?>
                                
                              <?php if( !empty($location) ) { ?>
                                 <i class="fa fa-map fa-lg"></i>&nbsp;&nbsp; <?php echo $location; ?><br />
                                <?php } ?>
                            </address>

                            <address>
                              <?php if( !empty($principal_contact_title) ) { ?>
                                 <h3><?php echo $principal_contact_title; ?></h3>
                                <?php } ?>
                                
                                 <?php if( !empty($principal_contact_email) ) { ?>
                                 <i class="fa fa-envelope fa-lg"></i>&nbsp;&nbsp; <a href="mailto:ansongd@afrijcmr.org"><?php echo $principal_contact_email; ?></a><br />
                                <?php } ?>
                                
                                <?php if( !empty($principal_contact_phone) ) { ?>
                                 <i class="fa fa-phone fa-lg"></i>&nbsp;&nbsp; <?php echo $principal_contact_phone; ?><br />
                                <?php } ?>
                            </address>
                        </div>
                        <!-- end #address -->
                        
                        <?php if( !empty($map_location_url) ) { ?>
                            <div id="map-location">
                                <h3><?php echo $map_location_title; ?></h3>

                                <iframe class="google-map" src="<?php echo $map_location_url; ?>" allowfullscreen></iframe>
                                <br />
                                <small><a href="<?php echo $map_location_url; ?>" target="_blank"><?php echo $map_location_more; ?></a></small>
                            </div>
                            <!-- end #map-location -->
                        <?php } ?>

                    </div>
                    <!-- end #contact-us -->
                    
        		</main> <!-- end of #main -->
        	</div> <!-- end of #primary -->

            <?php get_sidebar( 'contact' ); ?>
        </div> <!-- end of .row --> 
    </div> <!-- end of .container -->
<?php get_footer(); ?>
