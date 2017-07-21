<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package EmPress_Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function empress_lite_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', 'empress_lite_body_classes' );

/**
 * Enabling External Permalinks Redux with CPTs.
 *
 * @param array $content_types Content Types to hook External Permalinks Redux into.
 * @return array
 */
function empress_lite_enable_EPR_CPTs( $content_types ) {
    //$content_types[] = 'article';
    $content_types = array( 'post', 'page', 'article' );
    return $content_types;
}
add_filter( 'epr_post_types', 'empress_lite_enable_EPR_CPTs' );

/**
 * Filter External Permalinks Redux metabox title.
 *
 * @param string $title Title of External Permalinks Redux metabox.
 * @return string
 */
function empress_lite_filter_EPR_metabox_title( $title ) {
    $title = __( 'External Permalink to Article', 'empress-lite' );
    return $title;
}
add_filter( 'epr_metabox_title', 'empress_lite_filter_EPR_metabox_title' );


