<?php 
/**
 * MPesa_Display_Widget class extends the WP_Widget class.
 *
 * @link       https://njengah.com/developer
 * @since      1.0.0
 *
 * @package    MPesa Till or Paybill Display Widget
 * @subpackage MPesa Till or Paybill Display Widget/inc
 */

class MPesa_Display_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'mpesa_display_widget',
            'MPesa Till or Paybill Display Widget',
            array( 'description' => 'Displays the MPesa Till or Paybill number.' )
        );

    }
    

    // Renders the widget with the provided arguments and instance settings

    public function widget( $args, $instance ) {
        $mpesa_number = apply_filters( 'mpesa_display_widget_mpesa_number', $instance['mpesa_number'] );
        
        echo $args['before_widget'];
        echo $args['before_title'] . 'MPesa Till or Paybill Number' . $args['after_title'];
        
        if ( $mpesa_number ) {
            echo '<p>' . $mpesa_number . '</p>';
        } else {
            echo '<p>No MPesa number set. Please set the MPesa number.</p>';
        }
        
        echo $args['after_widget'];
    }


    // Renders the widget settings form with the provided instance settings
 // Renders the widget settings form with the provided instance settings
public function form( $instance ) {
    $mpesa_number = isset( $instance['mpesa_number'] ) ? $instance['mpesa_number'] : '';
    $mpesa_option = isset( $instance['mpesa_option'] ) ? $instance['mpesa_option'] : '';

    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>">Select Option:</label><br>
        <input type="radio" name="<?php echo $this->get_field_name( 'mpesa_option' ); ?>" value="till" <?php checked( $mpesa_option, 'till' ); ?>>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>_till">MPesa Till</label><br>
        <input type="radio" name="<?php echo $this->get_field_name( 'mpesa_option' ); ?>" value="paybill" <?php checked( $mpesa_option, 'paybill' ); ?>>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>_paybill">MPesa Paybill</label>
    </p>
    
    <?php if ( 'till' === $mpesa_option ) : ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'mpesa_number' ); ?>">MPesa Till Number:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'mpesa_number' ); ?>" name="<?php echo $this->get_field_name( 'mpesa_number' ); ?>" type="text" value="<?php echo esc_attr( $mpesa_number ); ?>" />
        </p>
    <?php elseif ( 'paybill' === $mpesa_option ) : ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'mpesa_number' ); ?>">MPesa Paybill Number:</label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'mpesa_number' ); ?>" name="<?php echo $this->get_field_name( 'mpesa_number' ); ?>" type="text" value="<?php echo esc_attr( $mpesa_number ); ?>" />
        </p>
    <?php endif; ?>
    
    <?php
}



   // Updates and saves the widget instance settings with the new instance values
   public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['mpesa_option'] = ! empty( $new_instance['mpesa_option'] ) ? sanitize_text_field( $new_instance['mpesa_option'] ) : '';
    $instance['mpesa_number'] = ! empty( $new_instance['mpesa_number'] ) ? sanitize_text_field( $new_instance['mpesa_number'] ) : '';

    return $instance;
}

}