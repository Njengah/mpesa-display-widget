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
            'Lipa na Mpesa Display Widget',
            array( 'description' => 'Displays the MPesa Till or Paybill number.' )
        );

    }
    
// Renders the widget with the provided arguments and instance settings
public function widget( $args, $instance ) {
    $mpesa_option = isset( $instance['mpesa_option'] ) ? $instance['mpesa_option'] : '';
    $till_number = isset( $instance['till_number'] ) ? $instance['till_number'] : '';
    $paybill_number = isset( $instance['paybill_number'] ) ? $instance['paybill_number'] : '';
    $account_number = isset( $instance['account_number'] ) ? $instance['account_number'] : '';
    $send_phone_number = isset( $instance['send_phone_number'] ) ? $instance['send_phone_number'] : '';

    echo $args['before_widget'];
    ?>

    <div class="mpesa-payment-display-widget">
        <?php 
        // Widget content display
        echo '<img src="' . plugin_dir_url( __FILE__ ) . 'img/title-image.jpeg" alt="Lipa Na Mpesa" />';

        // Display the selected option
        if ( 'till' === $mpesa_option ) {
            echo '<h3>TILL NUMBER</h3>';
        } elseif ( 'paybill' === $mpesa_option ) {
            echo '<h3>PAYBILL NUMBER</h3>';
        } elseif ( 'phone_number' === $mpesa_option ) {
            echo '<h3>SEND MONEY</h3>';
        }

        // Display the corresponding fields based on the selected option
        if ( 'till' === $mpesa_option ) {
            echo '<div class="mpesa-till-number">'. $till_number . '</div>';
        } elseif ( 'paybill' === $mpesa_option ) {
            echo '<div class="mpesa-paybill-number">'. '<span>NO</span>' . "    "  . $paybill_number . '</div>';
            echo '<div class="mpesa-paybill-account">'.'<span>A/C</span>'. "    " . $account_number . '</div>';
        } elseif ( 'phone_number' === $mpesa_option ) {
            echo '<div class="mpesa-send-money">' . $send_phone_number . '</div>';
        }
        ?>
    </div>

    <?php 
    echo $args['after_widget'];
}


    // Renders the widget settings form with the provided instance settings
// Renders the widget settings form with the provided instance settings
// Renders the widget settings form with the provided instance settings
public function form( $instance ) {
    $mpesa_option = isset( $instance['mpesa_option'] ) ? $instance['mpesa_option'] : '';

    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>">Select Option:</label><br>
        <input type="radio" name="<?php echo $this->get_field_name( 'mpesa_option' ); ?>" value="till" <?php checked( $mpesa_option, 'till' ); ?>>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>_till">MPesa Till</label><br>
        <input type="radio" name="<?php echo $this->get_field_name( 'mpesa_option' ); ?>" value="paybill" <?php checked( $mpesa_option, 'paybill' ); ?>>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>_paybill">MPesa Paybill</label><br>
        <input type="radio" name="<?php echo $this->get_field_name( 'mpesa_option' ); ?>" value="phone_number" <?php checked( $mpesa_option, 'phone_number' ); ?>>
        <label for="<?php echo $this->get_field_id( 'mpesa_option' ); ?>_phone_number">Send to Phone Number</label>
    </p>
    
   
    
    <p>
        <label for="<?php echo $this->get_field_id( 'till_number' ); ?>">Till Number:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'till_number' ); ?>" name="<?php echo $this->get_field_name( 'till_number' ); ?>" type="text" value="<?php echo esc_attr( $instance['till_number'] ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'paybill_number' ); ?>">Paybill Business Number:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'paybill_number' ); ?>" name="<?php echo $this->get_field_name( 'paybill_number' ); ?>" type="text" value="<?php echo esc_attr( $instance['paybill_number'] ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'account_number' ); ?>">Paybill Account Number:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'account_number' ); ?>" name="<?php echo $this->get_field_name( 'account_number' ); ?>" type="text" value="<?php echo esc_attr( $instance['account_number'] ); ?>" />
    </p>

    <p>
        <label for="<?php echo $this->get_field_id( 'send_phone_number' ); ?>">Send to Phone Number:</label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'send_phone_number' ); ?>" name="<?php echo $this->get_field_name( 'send_phone_number' ); ?>" type="text" value="<?php echo esc_attr( $instance['send_phone_number'] ); ?>" />
    </p>
    
    <?php
}






// Updates and saves the widget instance settings with the new instance values
public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['mpesa_option'] = ! empty( $new_instance['mpesa_option'] ) ? sanitize_text_field( $new_instance['mpesa_option'] ) : '';
    $instance['till_number'] = ! empty( $new_instance['till_number'] ) ? sanitize_text_field( $new_instance['till_number'] ) : '';
    $instance['paybill_number'] = ! empty( $new_instance['paybill_number'] ) ? sanitize_text_field( $new_instance['paybill_number'] ) : '';
    $instance['account_number'] = ! empty( $new_instance['account_number'] ) ? sanitize_text_field( $new_instance['account_number'] ) : '';
    $instance['send_phone_number'] = ! empty( $new_instance['send_phone_number'] ) ? sanitize_text_field( $new_instance['send_phone_number'] ) : '';

    return $instance;
}


}