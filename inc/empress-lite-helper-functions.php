<?php
    
/*
 * Random Post in header
 */
if ( !function_exists( 'empress_lite_random_post' ) ) :
function empress_lite_random_post() {
   $get_random_post = new WP_Query( array(
      'posts_per_page'        => 1,
      'post_type'             => 'post', // Change post type
      'ignore_sticky_posts'   => true,
      'orderby'               => 'rand'
   ) );
?>
   <div class="random-post">
      <?php while( $get_random_post->have_posts() ) : $get_random_post->the_post(); ?>
         <a href="<?php the_permalink(); ?>" title="<?php _e( 'View a random post', 'empress-lite' ); ?>"><i class="fa fa-random"></i></a>
      <?php endwhile; ?>
   </div>
   <?php
   // Reset Post Data
   wp_reset_query();
}
endif;

/*
 * Ad Widget below main content
 */
if ( !function_exists( 'empress_lite_get_below_ad' ) ) :
    function empress_lite_get_below_ad() {
        if ( is_active_sidebar( 'below-content-ad' ) ) : ?>
            <div id="below-content-ad">
                <div class="row">
                    <div class="col-sm-12">
                        <?php dynamic_sidebar( 'below-content-ad' ); ?>
                    </div>
                </div>
            </div>
        <?php endif;
    } 
endif;

?>