<?php
/**
 * Football Poets "Kick It Out" Widget.
 *
 * @package Poets_Widgets
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * "Kick It Out" Widget class.
 *
 * @since 0.1.1
 */
class Kick_It_Out_Widget extends WP_Widget {

	/**
	 * Constructor registers widget with WordPress.
	 *
	 * @since 0.1.1
	 */
	public function __construct() {

		// Define args.
		$args = [
			'description' => __( 'Use this widget to show the "Kick It Out/Christmas Truce" widget.', 'poets-widgets' ),
			'classname'   => 'widget widget_fp_kick_it_widget clearfix',
		];

		// Init parent.
		parent::__construct(
			'fp_kick_it_widget', // Base ID.
			__( 'Kick It Out/Christmas Truce', 'poets-widgets' ), // Name.
			$args
		);

	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @since 0.1.1
	 *
	 * @param array $args An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 */
	public function widget( $args, $instance ) {

		// Get widget title.
		$title = apply_filters( 'widget_title', $instance['title'] );

		// Show before.
		echo $args['before_widget'];

		// If we have a title, show it.
		if ( ! empty( $title ) ) {
			$args['after_title'] = str_replace( 'paragraph_wrapper', 'paragraph_wrapper start_open', $args['after_title'] );
			echo $args['before_title'] . $title . $args['after_title'];
		}

		?>
		<div class="widget-inner clearfix">
			<div class="user-avatar"><img alt="" src="<?php echo POETS_WIDGETS_URL . 'assets/images/kio-truce.jpg'; ?>" class="avatar avatar-100 photo" height="100" width="100"></div>
			<div class="user-links">
				<ul>
					<li class="poems-link"><a href="<?php echo get_permalink( 22977 ); ?>"><?php echo __( 'Your Kick It Out Poems', 'poets-widgets' ); ?></a></li>
					<li class="poems-link"><a href="<?php echo get_permalink( 22979 ); ?>"><?php echo __( 'Your Christmas Truce Poems', 'poets-widgets' ); ?></a></li>
					<li class="poems-link"><a href="<?php echo get_permalink( 22981 ); ?>"><?php echo __( 'Your Football At Christmas Poems', 'poets-widgets' ); ?></a></li>
				</ul>
			</div>
		</div>
		<?php

		// Show after.
		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @since 0.1.1
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		// Get title.
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( 'Kick It Out', 'poets-widgets' );
		}

		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'poets-widgets' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @since 0.1.1
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 * @return array $instance Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		// Never lose a value.
		$instance = wp_parse_args( $new_instance, $old_instance );

		// --<
		return $instance;

	}

}

// Register this widget.
register_widget( 'Kick_It_Out_Widget' );
