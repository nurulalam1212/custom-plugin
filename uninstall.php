<?php 
/**
 * @package custom-plugin
 * This file calls when uninstall hook is called
 * */ 

 if ( ! defined ( 'WP_UNINSTALL_PLUGIN' ) ) {
     die("Direct access not allowed");
 }

 //delete every db entries related to the plugin