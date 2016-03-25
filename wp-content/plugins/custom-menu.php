<?php
/**
 * @package Hello_Dolly
 * @version 1.6
 */
/*
Plugin Name: Custom Menu
Plugin URI: http://www.newdimensiontaxservices.dev/
Description: Creates a custom menu for the currently active theme
Author: Jonathan Onglatco
Version: 1.6
Author URI: http://www.newdimensiontaxservices.dev/
*/

function navigation_jalex_menus() {
	//'custom-menu' is the slug. Can be any name you want
	//'Custom Menu Area' is the name of the checkbox that will appear in the "Create New Menu" area
	register_nav_menus(array('custom-menu' => 'Custom Menu Area'));
	//<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); This will make the menu appear. Put it on any page you want, and replace 'header-menu' with menu slug

}



//Calls the function to run it. 
add_action('init','navigation_jalex_menus');
?>
