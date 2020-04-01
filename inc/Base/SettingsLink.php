<?php 
/**
 * @package custom-plugin
 * */ 

 namespace Inc\Base;

 class SettingsLink extends BaseController
 {
    public function add_settings_link($links)
    {
        $settings_link = '<a href="#">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }

    public function debug($text)
    {
        $text = '$this->plugin : '.$this->plugin;
        $text .= "<br/>";
        $text .= '$this->plugin_path : '.$this->plugin_path; 
        $text .= "<br/>";
        $text .= '$this->plugin_url : '.$this->plugin_url;

        return $text;
    }   

    public function register()
    {
        add_filter('plugin_action_links_'. $this->plugin, [$this, 'add_settings_link'] );
        add_filter('admin_footer_text',[$this,'debug']);
    }

 }