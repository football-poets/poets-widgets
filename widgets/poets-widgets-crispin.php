<?php
/**
 * Football Poets "Crispin's Corner" Widget.
 *
 * @package Poets_Widgets
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * "Crispin's Corner" Widget class.
 *
 * @since 0.1
 */
class Poets_Crispin_Widget extends WP_Widget {

	/**
	 * User ID.
	 *
	 * @since 0.1
	 * @access public
	 * @var object $cpt The WordPress user ID for Crispin
	 */
	public $user_id = 2;

	/**
	 * Constructor registers widget with WordPress.
	 *
	 * @since 0.1
	 */
	public function __construct() {

		// Define args.
		$args = [
			'description' => __( 'Use this widget to show the "Crispin’s Corner" widget.', 'poets-widgets' ),
			'classname'   => 'widget widget_fp_crispin_widget clearfix',
		];

		// Init parent.
		parent::__construct(
			'fp_crispin_widget', // Base ID.
			__( 'Crispin’s Corner', 'poets-widgets' ), // Name.
			$args
		);

	}

	/**
	 * Outputs the HTML for this widget.
	 *
	 * @since 0.1
	 *
	 * @param array $args An array of standard parameters for widgets in this theme.
	 * @param array $instance An array of settings for this widget instance.
	 */
	public function widget( $args, $instance ) {

		// Get user object.
		$user = new WP_User( $this->user_id );

		// Sanity check.
		if ( $user->exists() ) :

			// Get widget title.
			$title = apply_filters( 'widget_title', $instance['title'] );

			// Show before.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['before_widget'];

			// If we have a title, show it.
			if ( ! empty( $title ) ) {
				$args['after_title'] = str_replace( 'paragraph_wrapper', 'paragraph_wrapper start_open', $args['after_title'] );
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				echo $args['before_title'] . $title . $args['after_title'];
			}

			?>
			<div class="widget-inner clearfix">
				<div class="user-avatar"><?php /* echo get_avatar( $user->ID, $size='100' ); */ ?><img alt="" src="<?php echo esc_url( POETS_WIDGETS_URL . 'assets/images/crispins-corner.jpg' ); ?>" class="avatar avatar-100 photo" height="100" width="100"></div>
				<div class="user-links">
					<ul>
						<li class="news-link"><a href="<?php echo esc_url( get_permalink( 21068 ) ); ?>"><?php esc_html_e( 'Your Nostalgia Poems', 'poets-widgets' ); ?></a></li>
						<li class="news-link"><a href="<?php echo esc_url( get_permalink( 22983 ) ); ?>"><?php esc_html_e( 'Your Euros Poems', 'poets-widgets' ); ?></a></li>
						<li class="news-link"><a href="<?php echo esc_url( get_permalink( 19742 ) ); ?>"><?php esc_html_e( 'Your World Cup Poems', 'poets-widgets' ); ?></a></li>
						<li class="news-link"><a href="<?php echo esc_url( get_permalink( 19810 ) ); ?>"><?php esc_html_e( 'Your World Cup Haiku', 'poets-widgets' ); ?></a></li>
						<li class="poems-link"><a href="<?php echo esc_url( get_permalink( 89 ) ); ?>"><?php esc_html_e( 'Crispin’s Poems &amp; Profile', 'poets-widgets' ); ?></a></li>
					</ul>
				</div>
			</div>
			<?php

			// Show after.
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo $args['after_widget'];

			// End sanity check.
		endif;

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @since 0.1
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		// Get title.
		if ( isset( $instance['title'] ) ) {
			$title = $instance['title'];
		} else {
			$title = __( "Crispin's Corner", 'poets-widgets' );
		}

		?>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'poets-widgets' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @since 0.1
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
register_widget( 'Poets_Crispin_Widget' );
