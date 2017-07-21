<?php
/**
 * The default Sidebar. It will appear on all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EmPress_Lite
 */
?>
<?php if ( is_active_sidebar( 'page-1' ) ) : ?>
	<div id="secondary" class="widget-area col-md-4" role="complementary">
		<?php if ( ! dynamic_sidebar( 'page-1' ) ) : ?>
		<?php endif; // end sidebar widget area ?>
	</div>
<?php endif; ?>