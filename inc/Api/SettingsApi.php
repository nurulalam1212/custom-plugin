<?php 
/**
 * this class will help us to tap into wordpress settings API
 * 
 * @package pro101-teams
 * */ 

 namespace Inc\Api;

 class SettingsApi
 {
    public $admin_pages = [];
    public $admin_subpages = [];

    public function register()
    {
        if ( ! empty($this->admin_pages ) ) {
            add_action('admin_menu', [$this, 'addAdminMenu'] );
        }
    }

    public function addPages ( array $pages ) 
    {
        $this->admin_pages = $pages;
        return $this;
    }

    //withSubPage
    public function withSubPage(string $title = null)
    {
        if ( empty($this->admin_pages ) ) { 
            return $this; //if there is no admin page return as it is
        }
        //get the first item of the 
        $admin_page = $this->admin_pages[0]; //attach first admin page to $admin_page variable. 
        $subpage = [ [
            'parent_slug' =>  $admin_page['menu_slug'],
            'page_title' => $admin_page['page_title'],
            'menu_title' => ($title) ? $title : $admin_page['menu_title'], //if title is present then use that, else whatever was set
            'capability' => $admin_page['capability'],
            'menu_slug' =>$admin_page['menu_slug'],
            'callback' => $admin_page['callback'],
        ],

        ];
        $this->admin_subpages = $subpage;
        return $this;
    }

    //addSubPages
    public function addSubPages(Array $pages)
    {
        $this->admin_subpages = array_merge($this->admin_subpages, $pages);
        return $this;
    }

    //addAdminMenu
    public function addAdminMenu()
    {
        foreach($this->admin_pages as $page){
            add_menu_page($page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position'] );
        }
        foreach($this->admin_subpages as $page){
            add_submenu_page($page['parent_slug'], $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback']);
        }
    }
 }