<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package EmPress_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "list" ); ?>>
	
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php empress_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">

		<?php if ( has_post_thumbnail() ) {?>
			<figure class="img-responsive">
			<a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
			</figure> 
		<?php } ?>
		
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php empress_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

