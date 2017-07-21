<?php
/**
 * The template for displaying header branding.
 *
 *
 * @package EmPress_Lite
 */ 

if ( get_theme_mod( 'empress_lite_logo' ) ) : ?>
    <img src="<?php echo esc_url( get_theme_mod( 'empress_lite_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
<?php endif; ?>