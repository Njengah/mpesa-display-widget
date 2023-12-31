<?php 
/**
 * Suppayments_Display_Widget class extends the WP_Widget class.
 *
 * @link       https://njengah.com/developer
 * @since      1.0.0
 *
 * @package    Suppayments Till or Paybill Display Widget
 * @subpackage Suppayments Till or Paybill Display Widget/inc
 */

class Suppayments_Display_Widget extends WP_Widget {

    // Constructor 
    public function __construct() {
        parent::__construct(
            'suppayments_display_widget',
            'Lipa na Mpesa Display Widget',
            array( 'description' => 'Displays the Mpesa Till or Paybill number.' )
        );

    }
    
    // Renders the widget with the provided arguments and instance settings
    public function widget( $args, $instance ) {
        $suppayments_option = isset( $instance['suppayments_option'] ) ? $instance['suppayments_option'] : '';
        $till_number = isset( $instance['till_number'] ) ? $instance['till_number'] : '';
        $paybill_number = isset( $instance['paybill_number'] ) ? $instance['paybill_number'] : '';
        $account_number = isset( $instance['account_number'] ) ? $instance['account_number'] : '';
        $send_phone_number = isset( $instance['send_phone_number'] ) ? $instance['send_phone_number'] : '';
    
        echo $args['before_widget']; ?>
        <div class="suppayments-payment-display-widget">
            <?php 
            // Widget content display
            echo '<img src="' . esc_url( plugin_dir_url( __FILE__ ) ) . 'img/title-image.jpeg" alt="Lipa Na Mpesa" />';
            // Display the selected option
            if ( 'till' === $suppayments_option ) {
                echo '<h3>' . esc_html( 'TILL NUMBER' ) . '</h3>';
            } elseif ( 'paybill' === $suppayments_option ) {
                echo '<h3>' . esc_html( 'PAYBILL NUMBER' ) . '</h3>';
            } elseif ( 'phone_number' === $suppayments_option ) {
                echo '<h3>' . esc_html( 'SEND MONEY' ) . '</h3>';
            }
            // Display the corresponding fields based on the selected option
            if ( 'till' === $suppayments_option ) {
                echo '<div class="suppayments-till-number">';
                $till_chars = str_split( $till_number ); // Convert string to an array of characters
                foreach ( $till_chars as $char ) {
                    echo '<span>' . esc_html( $char ) . '</span>';
                }
                echo '</div>';
            } elseif ( 'paybill' === $suppayments_option ) {
                echo '<div class="suppayments-paybill-number"><span>' . esc_html( 'NO' ) . '</span>' . "    "  . esc_html( $paybill_number ) . '</div>';
                echo '<div class="suppayments-paybill-account"><span>' . esc_html( 'A/C' ) . '</span>' . "    " . esc_html( $account_number ) . '</div>';
            } elseif ( 'phone_number' === $suppayments_option ) {
                echo '<div class="suppayments-send-money">';
                $phone_chars = str_split( $send_phone_number ); // Convert string to an array of characters
                foreach ( $phone_chars as $char ) {
                    echo '<span>' . esc_html( $char ) . '</span>';
                }
                echo '</div>';
            }
            ?>
        </div>
        <?php 
        echo $args['after_widget'];
    }
    
// Renders the widget settings form with the provided instance settings
    public function form( $instance ) {
        $suppayments_option = isset( $instance['suppayments_option'] ) ? $instance['suppayments_option'] : '';  ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'suppayments_option' ) ); ?>">Select Option:</label><br>
            <input type="radio" name="<?php echo esc_attr( $this->get_field_name( 'suppayments_option' ) ); ?>" value="till" <?php checked( $suppayments_option, 'till' ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'suppayments_option' ) ); ?>_till"><?php echo esc_html( 'Mpesa Till' ); ?></label><br>
            <input type="radio" name="<?php echo esc_attr( $this->get_field_name( 'suppayments_option' ) ); ?>" value="paybill" <?php checked( $suppayments_option, 'paybill' ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'suppayments_option' ) ); ?>_paybill"><?php echo esc_html( 'Mpesa Paybill' ); ?></label><br>
            <input type="radio" name="<?php echo esc_attr( $this->get_field_name( 'suppayments_option' ) ); ?>" value="phone_number" <?php checked( $suppayments_option, 'phone_number' ); ?>>
            <label for="<?php echo esc_attr( $this->get_field_id( 'suppayments_option' ) ); ?>_phone_number"><?php echo esc_html( 'Send to Phone Number' ); ?></label>
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'till_number' ) ); ?>"><?php echo esc_html( 'Till Number:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'till_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'till_number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['till_number'] ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'paybill_number' ) ); ?>"><?php echo esc_html( 'Paybill Business Number:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'paybill_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'paybill_number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['paybill_number'] ); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'account_number' ) ); ?>"><?php echo esc_html( 'Paybill Account Number:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'account_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'account_number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['account_number'] ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'send_phone_number' ) ); ?>"><?php echo esc_html( 'Send to Phone Number:' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'send_phone_number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'send_phone_number' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['send_phone_number'] ); ?>" />
        </p>
        
        <?php
    }


// Updates and saves the widget instance settings with the new instance values
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['suppayments_option'] = ! empty( $new_instance['suppayments_option'] ) ? sanitize_text_field( $new_instance['suppayments_option'] ) : '';
        $instance['till_number'] = ! empty( $new_instance['till_number'] ) ? sanitize_text_field( $new_instance['till_number'] ) : '';
        $instance['paybill_number'] = ! empty( $new_instance['paybill_number'] ) ? sanitize_text_field( $new_instance['paybill_number'] ) : '';
        $instance['account_number'] = ! empty( $new_instance['account_number'] ) ? sanitize_text_field( $new_instance['account_number'] ) : '';
        $instance['send_phone_number'] = ! empty( $new_instance['send_phone_number'] ) ? sanitize_text_field( $new_instance['send_phone_number'] ) : '';

        return $instance;
    }

}