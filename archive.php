<?php
/**
 * The template for displaying archive pages.
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
                        
					if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );
							?>

						<?php endwhile; ?>

						<?php the_posts_navigation(); ?>

					<?php else : ?>

						<?php get_template_part( 'template-parts/content', 'none' ); ?>

					<?php endif; ?>

					<!-- Advertisement -->
                    <?php empress_lite_get_below_ad(); ?>

				</main> <!-- end of #main -->
			</div> <!-- end of #primary -->
			<?php get_sidebar(); ?>
		</div> <!-- end of .row -->
	</div> <!-- end of .container -->
	
<?php get_footer(); ?>
