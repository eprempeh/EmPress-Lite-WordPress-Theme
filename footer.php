<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EmPress_Lite
 */

?>

	</div><!-- #content -->
	
	<!-- Scroll to Top Button -->
     <a href="#" class="fa fa-arrow-up" id="scroll-up" title="Back to Top"></a> 

	<!-- FOOTER
	============================================================ -->
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div id="footer-widget-area">
            <div id="tertiary" class="container">
				<?php if ( is_active_sidebar( 'f1-widgets' ) || is_active_sidebar( 'f2-widgets' ) || is_active_sidebar( 'f3-widgets' ) || is_active_sidebar( 'f4-widgets' ) ) { ?>
				<div class="row">

                    <?php if ( is_active_sidebar( 'f1-widgets' ) ) : ?>
                        <!-- First Widget Area -->
                        <div class="col-sm-3">
                            <?php dynamic_sidebar( 'f1-widgets' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'f2-widgets' ) ) : ?>
                        <!-- Second Widget Area -->
                        <div class="col-sm-3">
                            <?php dynamic_sidebar( 'f2-widgets' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'f3-widgets' ) ) : ?>
                        <!-- Third Widget Area -->
                        <div class="col-sm-3">
                            <?php dynamic_sidebar( 'f3-widgets' ); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'f4-widgets' ) ) : ?>
                        <!-- Fourth Widget Area -->
                        <div class="col-sm-3">
                            <?php dynamic_sidebar( 'f4-widgets' ); ?>
                        </div>
                    <?php endif; ?>

                </div>

				<?php } else {
    
                    wp_nav_menu( array(
                        'theme_location' => 'secondary',
                        'menu_class' => 'list-unstyled list-inline',
                        'menu_id' => 'footer-menu',
                        'container' => 'nav',
                        'container_class' => 'text-center',
                        
                    ) );
    
                } ?>
			</div>
			<div class="site-info container">
				
                <?php if ( get_theme_mod( 'empress_lite_copyright_setting') ) : ?>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="copyright">
                            <p><?php echo esc_html( get_theme_mod( 'empress_lite_copyright_setting' ) ); ?></p>
                        </div>
                    </div><!-- .site-info -->
                </div> <!-- end of .row -->                
                <?php endif; ?>

                <!-- sidebar active check begins -->
                <?php if ( is_active_sidebar( 'footer-social-1' ) ) : ?>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="footer-social-tool">
                            <!-- dynamic sidebar begins -->
                            <?php dynamic_sidebar( 'footer-social-1' ); ?>
                        </div>
                    </div>							
                </div>
				<?php endif; ?>		
			</div> <!-- end of .container -->
		</div>
	</footer><!-- #colophon -->

</div> <!-- end of #page -->

<?php wp_footer(); ?>

</body>
</html>
