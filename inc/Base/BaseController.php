<?php 
/**
 * @package custom-plugin
 * 
*/

namespace Inc\Base;

class BaseController 
{
    public $plugin; 
    public $plugin_path;
    public $plugin_url; 

    function __construct()
    {
        /* 
            This does not work, because the BaseController file is situated not in root but in inc/Base/BaseController.php
            $this->plugin = plugin_basename(__FILE__);
            $this->plugin_path = plugin_dir_path(__FILE__);
            $this->plugin_url =  plugin_dir_url(__FILE__); 
        */
        $this->plugin = plugin_basename(dirname(__FILE__,3)).'/custom-plugin.php'; //custom-plugin/custom-plugin.php
        $this->plugin_path = plugin_dir_path(dirname(__FILE__,2)); // C:\xampp\htdocs\wptests\wp-content\plugins\custom-plugin/
        $this->plugin_url =  plugin_dir_url(dirname(__FILE__,2)); //https://dev.co.uk/wp-content/plugins/custom-plugin/ 
    }
}