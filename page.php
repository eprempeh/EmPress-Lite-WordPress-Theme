<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */

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
                        
					while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

					<?php endwhile; // End of the loop. ?>

					<!-- Advertisement -->
                    <?php empress_lite_get_below_ad(); ?>

				</main> <!-- end of #main -->
			</div> <!-- end of #primary -->
			
			<?php get_sidebar( 'page' ); ?>
		</div> <!-- end of .row -->
	</div> <!-- end of .container -->
	
<?php get_footer(); ?>
