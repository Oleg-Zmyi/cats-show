<?php
/**
 * Plugin Name: Cats Show
 * Plugin URI:https://github.com/Oleg-Zmyi/cats-show
 * Description: <strong>Plugin for studying API</strong>
 * Author: Oleg Myroslavovych
 * Version: 0.0.1
 * Author URI: https://github.com/Oleg-Zmyi
 * Text Domain: cats_show
 * Domain Path: /languages/
 * License: GPLv2 or later
 * */

defined("ABSPATH") or die();

include plugin_dir_path(__FILE__) . 'admin/admin.php';
include plugin_dir_path(__FILE__) . 'frontend/frontend.php';

class CatsShow
{
    //Loading
    function init(){

        $catsBack = new CatsBackend();
        $catsFront = new CatsFrontend();
        $catsFront->set_data();

        add_action('admin_enqueue_scripts', [$catsBack, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$catsFront, 'enqueue_front']);
        add_action('admin_menu', [$catsBack, 'create_plugin_menu']);
        add_shortcode( 'show_cats', [$catsFront, 'show_cats'] );

    }

}

//Init plugin
if (class_exists('CatsShow')) {
    $show_cats = new CatsShow();
    $show_cats->init();
}


