<?php
/**
 * Custom widgets for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Indivio
 */

/**
 * Recent Posts with Thumbnail
 */

 function eb_load_widget() {
         register_widget( 'eb_widget_recent_posts' );
     }
     add_action( 'widgets_init', 'eb_load_widget' );

     class eb_widget_recent_posts extends WP_Widget {
         function __construct() {
             parent::__construct(
                 // Base ID of your widget
                 'eb_widget_recent_posts',

                 // Widget name will appear in UI
                 __('Recent Posts', 'indivio'),

                 // Widget description
                 array( 'description' => __( 'Your site&#8217;s most recent posts', 'indivio' ), )
             );
         }

     	/**
     	 * Outputs the content for the current Recent Posts widget instance.
     	 *
     	 * @since 2.8.0
     	 *
     	 * @param array $args     Display arguments including 'before_title', 'after_title',
     	 *                        'before_widget', and 'after_widget'.
     	 * @param array $instance Settings for the current Recent Posts widget instance.
     	 */
     	public function widget( $args, $instance ) {
     		if ( ! isset( $args['widget_id'] ) ) {
     			$args['widget_id'] = $this->id;
     		}

     		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

     		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
     		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

     		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
     		if ( ! $number ) {
     			$number = 5;
     		}
     		$show_thumb = isset( $instance['show_thumb'] ) ? $instance['show_thumb'] : false;
     		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

     		/**
     		 * Filters the arguments for the Recent Posts widget.
     		 *
     		 * @since 3.4.0
     		 * @since 4.9.0 Added the `$instance` parameter.
     		 *
     		 * @see WP_Query::get_posts()
     		 *
     		 * @param array $args     An array of arguments used to retrieve the recent posts.
     		 * @param array $instance Array of settings for the current widget.
     		 */
     		$r = new WP_Query(
     			apply_filters(
     				'widget_posts_args',
     				array(
     					'posts_per_page'      => $number,
     					'no_found_rows'       => true,
     					'post_status'         => 'publish',
     					'ignore_sticky_posts' => true,
     				),
     				$instance
     			)
     		);

     		if ( ! $r->have_posts() ) {
     			return;
     		}
     		?>
     		<?php echo $args['before_widget']; ?>
     		<?php
     		if ( $title ) {
     			echo $args['before_title'] . $title . $args['after_title'];
     		}
     		?>

 			<?php foreach ( $r->posts as $recent_post ) : ?>
 				<?php
 				$post_title = get_the_title( $recent_post->ID );
 				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
 				?>
                 <div class="eb-post-item">
                     <?php if ( get_the_post_thumbnail($recent_post->ID) && $show_thumb ) { ?>
                         <div class="eb-post-item__image">
                             <a href="<?php the_permalink( $recent_post->ID ); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url($recent_post->ID, 'indivio-recent-thumbnails'); ?>');">
                         </div>
                     <?php } else { ?>
                         <?php if ( $show_thumb ) { ?>
                             <div class="eb-post-item__image">
                                 <a href="<?php the_permalink( $recent_post->ID ); ?>" style="background-image: url('<?php echo THEME_DIR . '/images/thumb_default_vert.jpg'; ?>');">
                             </div>
                        <?php } ?>
                     <?php } ?>
                     <div class="eb-post-item__info">
                         <a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title; ?></a>
                         <?php if ( $show_date ) : ?>
                             <span class="eb-post-item__info-date"><?php echo get_the_date( '', $recent_post->ID ); ?></span>
                         <?php endif; ?>
                     </div>
                 </div>
 			<?php endforeach; ?>

     		<?php
     		echo $args['after_widget'];
     	}

     	/**
     	 * Handles updating the settings for the current Recent Posts widget instance.
     	 *
     	 * @since 2.8.0
     	 *
     	 * @param array $new_instance New settings for this instance as input by the user via
     	 *                            WP_Widget::form().
     	 * @param array $old_instance Old settings for this instance.
     	 * @return array Updated settings to save.
     	 */
     	public function update( $new_instance, $old_instance ) {
     		$instance              = $old_instance;
     		$instance['title']     = sanitize_text_field( $new_instance['title'] );
     		$instance['number']    = (int) $new_instance['number'];
     		$instance['show_thumb'] = isset( $new_instance['show_thumb'] ) ? (bool) $new_instance['show_thumb'] : false;
     		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
     		return $instance;
     	}

     	/**
     	 * Outputs the settings form for the Recent Posts widget.
     	 *
     	 * @since 2.8.0
     	 *
     	 * @param array $instance Current settings.
     	 */
     	public function form( $instance ) {
     		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
     		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
     		$show_thumb = isset( $instance['show_thumb'] ) ? (bool) $instance['show_thumb'] : false;
     		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
     		?>
     		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
     		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

     		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
     		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

            <p><input class="checkbox" type="checkbox"<?php checked( $show_thumb ); ?> id="<?php echo $this->get_field_id( 'show_thumb' ); ?>" name="<?php echo $this->get_field_name( 'show_thumb' ); ?>" />
     		<label for="<?php echo $this->get_field_id( 'show_thumb' ); ?>"><?php _e( 'Display post thumbnails?' ); ?></label></p>

     		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
     		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
     		<?php
     	}
     }


?>
