<?php

// Register widget
add_action('widgets_init', create_function('', 'return register_widget( "EmPress_Lite_Featured_Articles_Widget" );'));

class EmPress_Lite_Featured_Articles_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'empress_lite_featured_articles',
			'description' => __( 'A widget to display Featured Articles on front page.', 'empress-lite') 
			);

		$control_ops = array(
			'width' => 200,
			'height' => 250
			);
		parent::__construct( false, $name = __( 'EmPress Lite - Featured Articles', 'empress-lite' ), $widget_ops, $control_ops );
	}

	public function form( $instance ) {
		$tg_defaults['title'] = '';
		$tg_defaults['text'] = '';
		$tg_defaults['number'] = 4;
		$tg_defaults['type'] = 'latest';
		$tg_defaults['category'] = '';
		$instance = wp_parse_args( (array) $instance, $tg_defaults );
		$title = esc_attr( $instance[ 'title' ] );
		$text = esc_textarea($instance['text']);
		$number = $instance['number'];
		$type = $instance['type'];
		$category = $instance['category'];
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:', 'empress-lite' ); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<?php _e( 'Description','empress-lite' ); ?>
		<textarea class="widefat" rows="5" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e( 'Number of posts to display:', 'empress-lite' ); ?></label>
			<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
		</p>

		<p><input type="radio" <?php checked($type, 'latest') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="latest"/><?php _e( 'Show latest Posts', 'empress-lite' );?><br />
		<input type="radio" <?php checked($type,'category') ?> id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>" value="category"/><?php _e( 'Show posts from a category', 'empress-lite' );?><br /></p>

		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Select category', 'empress-lite' ); ?>:</label>
			<?php wp_dropdown_categories( array( 'show_option_none' =>' ','name' => $this->get_field_name( 'category' ), 'selected' => $category ) ); ?>

		</p>
		<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		if ( current_user_can('unfiltered_html') )
		 $instance['text'] =  $new_instance[ 'text' ];
		else
		$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) );
		$instance[ 'number' ] = absint( $new_instance[ 'number' ] );
		$instance[ 'type' ] = $new_instance[ 'type' ];
		$instance[ 'category' ] = $new_instance[ 'category' ];

		return $instance;
	}

	function widget( $args, $instance ) {
		extract( $args );
		extract( $instance );

		global $post;
		$title 		= isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
		$text 		= isset( $instance[ 'text' ] ) ? $instance[ 'text' ] : '';
		$number 	= empty( $instance[ 'number' ] ) ? 4 : $instance[ 'number' ];
		$type 		= isset( $instance[ 'type' ] ) ? $instance[ 'type' ] : 'latest' ;
		$category 	= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : '';

		if ( $type == 'latest' ) {
			$get_featured_articles 		= new WP_Query( array(
				'posts_per_page'        => $number,
				'post_type'             => 'post',
				'post_status' 			=> 'publish',
				'ignore_sticky_posts'   => true
			) );
		}
		else {
		 $get_featured_articles 		= new WP_Query( array(
			    'posts_per_page'    	=> $number,
			    'post_type'         	=> 'post',
				'post_status' 			=> 'publish',
			    'category__in'      	=> $category
			) );
		}
      echo $before_widget;
      ?>

		<?php
		$i=1;
		while( $get_featured_articles->have_posts() ): $get_featured_articles->the_post();
		?>

		<?php if( $i == 1 ) { $featured = 'empress-lite-featured-post-medium'; } else { $featured = 'empress-lite-featured-post-small'; } ?>
		<?php if( $i == 1 ) { echo '<div class="first-post">'; } elseif ( $i == 2 ) { echo '<div class="following-post">'; } ?>
		<div class="single-article clearfix">
			<?php
			if( has_post_thumbnail() ) {
				$image = '';
				$title_attribute = get_the_title( $post->ID );
				$image .= '<figure>';
				$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
				$image .= get_the_post_thumbnail( $post->ID, $featured, array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
				$image .= '</figure>';
				echo $image;
			}
			?>
		    <div class="article-content">
				<?php empress_lite_colored_category(); ?>
				<h3 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
				</h3>
				<div class="below-entry-meta">
				<?php
					$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
					$time_string = sprintf( $time_string,
					  esc_attr( get_the_date( 'c' ) ),
					  esc_html( get_the_date() )
					);
					printf( __( '<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'empress-lite' ),
					  esc_url( get_permalink() ),
					  esc_attr( get_the_time() ),
					  $time_string
					);
				?>
				<span class="byline"><span class="author vcard"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo get_the_author(); ?>"><?php echo esc_html( get_the_author() ); ?></a></span></span>
				<span class="comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>
				</div>
				<?php if( $i == 1 ) { ?>
				<div class="entry-content">
				<?php the_excerpt(); ?>
				</div>
				<?php } ?>
			</div>
		</div>

		<?php if( $i == 1 ) { echo '</div>'; } ?>
		<?php
		$i++;
		endwhile;
		if ( $i > 2 ) { echo '</div>'; }
		// Reset Post Data
		wp_reset_query();
		?>
		<?php echo $after_widget;
	}

}

?>