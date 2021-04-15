<?php

class CatsBackend {

    //Enqueue Admin
    public function enqueue_admin()
    {
        wp_enqueue_style('admin_cats_style', plugins_url('assets/admin/styles/main.css',__DIR__ ));
    }

    //Add cats-show point to admin menu
    function create_plugin_menu()
    {
        add_menu_page(
            'Settings Show Cats',
            'Cats', 'manage_options',
            'cats_settings',
            array($this, 'create_admin_page'),
            'dashicons-pets',
            5
        );
    }

    //Admin cats-show settings page
    public function create_admin_page()
    {
        include plugin_dir_path(__FILE__) . '/view/admin_page_template.php';
    }
}





