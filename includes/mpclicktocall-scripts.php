<?php

//Add Scripts
function mpctc_add_scripts(){
    //Add Main CSS
    wp_enqueue_style('mpctc-main-style', plugins_url() . '/mpclicktocall/css/style.css');


    //Add Main JS
    wp_enqueue_script('mpctc-main-script', plugins_url() . '/mpclicktocall/js/main.js',array('jquery'));

    //Add Google Script
    wp_register_script('google','https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}

//Add Admin Scripts
function mpctc_add_admin_scripts(){
    //Add Admin CSS
    wp_enqueue_style('mpctc-admin-style', plugins_url() . '/mpclicktocall/css/admin-style.css');

    //Add Admin JS
    wp_enqueue_script('mpctc-admin-script', plugins_url() . '/mpclicktocall/js/main.js',array('jquery'));

    //Add Google Script
    wp_register_script('google','https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'mpctc_add_scripts');
add_action('admin_enqueue_scripts', 'mpctc_add_admin_scripts');

