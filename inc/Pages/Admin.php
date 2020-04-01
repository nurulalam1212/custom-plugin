<?php 
/**
 * @package custom-plugin
 * Adds 4 pages for admin menu
 * Add a dashboard page
 * Callback function loads page templates
 * */ 

 namespace Inc\Pages;

 class Admin 
 {
    public $pages = []; 
    public $subpages = [];
    public $settings;
    public $callback;

    public function register()
    {
      $this->setPages();
      $this->setSubPages();
      $this->settings = new \Inc\Api\SettingsApi;
      $this->callback = new \Inc\Api\Callbacks\AdminCallbacks;
      $this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
    }
    public function setPages()
    {
      $this->pages = [
         [
            'page_title' => 'Pro Team',
            'menu_title' => 'Pro Team',
            'capability' => 'manage_options',
            'menu_slug' =>'pro101-teams',
            'callback' =>function(){ echo "test";},
            'icon_url' => 'dashicons-buddicons-buddypress-logo',
            'position' => 5

         ],
      ];
    }
    public function setSubPages()
    {
      $this->subpages = [
            [
               'parent_slug' =>  'pro101-teams',
               'page_title' => 'Custom Post Type',
               'menu_title' => 'CPT',
               'capability' => 'manage_options',
               'menu_slug' =>'pro-teams-cpt',
               'callback' => function(){ echo "<h1> CPT Manager </h1>"; },
            ],
            [
            'parent_slug' =>  'pro101-teams',
            'page_title' => 'Custom Taxonomies',
            'menu_title' => 'Taxonomies',
            'capability' => 'manage_options',
            'menu_slug' =>'pro-teams-taxo',
            'callback' => function(){ echo "<h1> Taxonomy Manager </h1>"; },
            ],
            [
            'parent_slug' =>  'pro101-teams',
            'page_title' => 'About Us',
            'menu_title' => 'About',
            'capability' => 'manage_options',
            'menu_slug' =>'pro-teams-about',
            'callback' => function(){ echo "<h1> About Us </h1>"; },
            ],
      ];
    }
 }