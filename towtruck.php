<?php
/**
Plugin Name: Tow Truck
Plugin URI: https://derekmarcinyshyn.github.com/towtruck
Description: <a href="http://towtruck.mozillalabs.com/">Mozilla Labs Tow Truck</a> collaboration made easy.
Author: Derek Marcinyshyn
Author URI: http://derek.marcinyshyn.com
Version: 1.1
License: GPLv2

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Exit if called directly
defined( 'ABSPATH' ) or die ( 'Cannot access pages directly.' );

/**
 * Add Tow Truck over https
 */
function add_tow_truck() {
    if ( is_admin_bar_showing() )
        wp_enqueue_script( 'tow-truck', 'https://towtruck.mozillalabs.com/towtruck.js', '', false, true );
}

add_action( 'init', 'add_tow_truck' );

/**
 * Add Button for Tow Truck in Admin Bar
 */
function add_tow_truck_button() {
    global $wp_admin_bar;

    if ( is_admin_bar_showing() ) {
        $meta = array( 'onclick' => 'TowTruck(this); return false;' );
        $wp_admin_bar->add_menu( array( 'id' => 'tow-truck', 'title' => __( 'Start TowTruck', 'towtruck'), 'href' => "#", 'meta' => $meta ) );
    }
}

add_action( 'admin_bar_menu', 'add_tow_truck_button', 1000 );