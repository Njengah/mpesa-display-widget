<?php
/**
 * Plugin Name: MPesa Till or Paybill Display Widget
 * Plugin URI: https://njengah.com
 * Description: A widget plugin for WordPress or WooCommerce that seamlessly displays the MPesa Till or Paybill number on your website. Easily configure and showcase your payment details with this user-friendly solution.
 * Version: 1.0.0
 * Author: Joe Njenga
 * Author URI: https://njengah.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       send-to-mpesa-payment
 * Domain Path:       /languages
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
*Include the MPesa Display Widget class
*/

require plugin_dir_path(__FILE__) . 'inc/class-mpesa-display-widget.php';


/*
 * Registers the MPesa_Display_Widget as a WordPress widget
 * Allows the widget to be added and displayed in widget areas
 */
function mpesa_display_widget_register_widget() {
    register_widget( 'MPesa_Display_Widget' );
}
add_action( 'widgets_init', 'mpesa_display_widget_register_widget' );


/**
 * Enqueue styles for the MPesa Display Widget.
 */
function mpesa_display_widget_enqueue_widget_styles() {
    wp_enqueue_style( 'mpesa-display-widget-styles', plugin_dir_url( __FILE__ ) . 'assets/styles.css' );
}
add_action( 'wp_enqueue_scripts', 'mpesa_display_widget_enqueue_widget_styles' );
