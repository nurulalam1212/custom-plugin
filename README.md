# custom-plugin

This is a custom plugin

* Basic template
* 4 Sub menu pages
* Settings API
* CPT
* Custom Taxo
* Two Metabox
* Shortcode
* Plugin frontend template

# Workflow
- Create folder structure 
    index.php
    uninstall.php
    custom-plugin.php
    phpunit.xml
    /inc
        /Base
            Activate.php - flush_rewrite_rules
            Deactivate.php - flush_rewrite_rules
            SettingsLink.php - Adds a settings link to the plugin 
            Enqueue.php - Enqueues all scripts and stylesheets
            BaseController.php - provides common path and url attributes.
        /Pages
            Admin.php - Handles Admin pages
            - register()
                initiates SettingsApi and AdminCallbacks classes
                calls setPages method that sets $this->pages
                calls setSubPages that sets $this->subpages
                calls settingsApi object and envokes its addPages(this->pages)->withSubPage('Dashboard')->addSubPages(this->subpages)->register()
            -setPage()
                sets this->pages array attribute
            -SetSubPages()
                sets this->subpages array attribute
        /Api
            /Callbacks
                AdminCallbacks.php - loads all admin related callbacks for example loading html
            SettingsApi.php - Provides an API for accessing wordpress settings API
                - register()
                    if admin_pages variable is not empty then add pages to menu using admin_menu hook addAdminMenu is the callback
                - addPages(array $pages)
                    sets $this->admin_pages and return object;
                - withSubpage(string $title = null)
                    if $this->admin_pages is empty return object
                    if it has pages then attach the first sub page to whatever is found on the admin page. So it produces a default page with same link.
                    return object
                - addSubPage(array $pages)
                    array_merge and combile existing admin_subpage with default page with rest of the pages.
                - addAdminMenu use two foreach loops to add_menu_page and add_submenu_page 
    /templates
        /fronend - Custom template to be included for frontend
        /backend - Admin side templates
    /assets
        /css 
        /js
    /tests
        /unit
- Create php unit test environment
- write tests
- setup composer autoload
- custom-plugin.php
    - write header
    - sercurity measure
    - require composer autoload
    - procedurally add activation and deactivation hook
    - Call register_service static method from Init class

- Init.php
    - getServices() - returns an array with services
    - instantiate($class) - takes class as parameter and instantiate that class and returns it. 
    - register_services()
    - interates through getServices() arrays and instantiate each of them and checks if register method is present. if yes then calls it.


    