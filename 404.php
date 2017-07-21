<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package EmPress_Lite
 */

get_header(); ?>

	<div class="container">
        <div class="row">
            
            <div id="primary" class="content-area col-md-8">
				<main id="main" class="site-main" role="main">

                    <?php // Breadcrumb
                    if ( function_exists( 'yoast_breadcrumb' ) ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                    } ?>

					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'empress-lite' ); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'empress-lite' ); ?></p>
							
							<!-- CATEGORIES -->
							<h3>Categories</h3>
							<p>...or maybe a popular category</p>
							<div class="widget widget_categories">
							    <h3 class="widget-title"></h3>
							    <ul>
							        <?php
                                    
                                        wp_list_categories( array(
                                            
                                            'orderby'     => 'count',
                                            'order'       => 'DESC',
                                            'show_count'  => 1,
                                            'title_li'    => '',
                                            'number'      => 10
                                        
                                        ) );
                                    
                                    ?>
							    </ul>
							</div>
														
							<p><a href="<?php echo esc_html(home_url('/')); ?>">Click here to get back home.</a></p>

						</div> <!-- .page-content -->
					</section> <!-- .error-404 -->

				</main> <!-- end of #main -->
			</div> <!-- end of #primary -->
			<?php get_sidebar(); ?>
		</div> <!-- end of .row -->
	</div> <!-- end of .container -->

<?php get_footer(); ?>
