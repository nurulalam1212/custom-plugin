<?php 
/**
 * @package custom-plugin
 * */ 
/**
 * Plugin Name: Custom Plugin
 * Description: This is a custom plugin template for all my future projects. I should practice it every two days
 * Author: Nurul Alam
 * Author URI: #
 * Plugin URI: # 
 * Version: 1.0 
 * Text Domain: custom-plugin
 * License: Gplv2 or less
 * 
 * */ 

 if( ! defined('ABSPATH') ) {
     die("Direct access not allowed.");
 }
 //require in the composer autoload file for autoloading class
 if ( file_exists ( plugin_dir_path ( __FILE__ ).'vendor/autoload.php' ) ) {
    require_once plugin_dir_path ( __FILE__ ).'vendor/autoload.php';
 }
 //procedural activation deactivation of the plugin
 function custom_plugin_plugin_activation()
 {
     Inc\Base\Activate::activate();
 }
 register_activation_hook(__FILE__,'custom_plugin_plugin_activation');

 function custom_plugin_plugin_deactivation()
 {
    Inc\Base\Deactivate::deactivate();
 }
 register_deactivation_hook(__FILE__,'custom_plugin_plugin_deactivation');


 // initialise init class and start all services dynamically
 
 //if class exists
 if( class_exists ( "Inc\\Init" ) ) {
     //run register services method which calls each services
     Inc\Init::register_services();
 }