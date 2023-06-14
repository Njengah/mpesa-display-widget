<?php
/**
 * Plugin Name: Supported Payments Display Widget
 * Plugin URI: https://storemizer.com/products/supported-payments-widget
 * Description: This plugin allows users to effortlessly display supported payment options for Mpesa and other mobile payment methods. Easily showcase the available payment options on your website, providing a convenient and seamless payment experience for your customers.
 * Version: 1.0.0
 * Author: Joe Njenga
 * Author URI: https://njengah.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: supported-payments-widget
 * Domain Path: /languages
 * 
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation. You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * 
 */



/*
 * Prevent direct access to this file 
 * Exit if accessed directly
 */

if (!defined('ABSPATH')) {
    exit; 
}

/*
*Include the Suppayments Display Widget class
*/

require plugin_dir_path(__FILE__) . 'inc/class-suppayments-display-widget.php';


/*
 * Registers the Suppayments_Display_Widget as a WordPress widget
 * Allows the widget to be added and displayed in widget areas
 */
function suppayments_display_widget_register_widget() {
    register_widget( 'Suppayments_Display_Widget' );
}
add_action( 'widgets_init', 'suppayments_display_widget_register_widget' );


/**
 * Enqueue styles for the Suppayments Display Widget.
 */
function suppayments_display_widget_enqueue_widget_styles() {
    wp_enqueue_style( 'suppayments-display-widget-styles', plugin_dir_url( __FILE__ ) . 'assets/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'suppayments_display_widget_enqueue_widget_styles' );
