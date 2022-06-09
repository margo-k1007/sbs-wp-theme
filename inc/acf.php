<?php
/**
 * ACF Settings
 *
 * @package sbs
 */

/* ==========================================================================
 *  Acf Options Pages
 * ========================================================================== */
function register_acf_options_pages() {

    if( !function_exists('acf_add_options_page') )
        return;

    $option_page = acf_add_options_page(array(
        'page_title'    => __('Theme General Settings'),
        'menu_title'    => __('Theme Options'),
        'menu_slug'     => 'theme-general-settings',
        'icon_url'      => 'dashicons-admin-generic',
        'position'      => '2',
        'post_id'       => 'options',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    $header_option_page = acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Options',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    $footer_option_page = acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Options',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    $error404_option_page = acf_add_options_sub_page(array(
        'page_title' 	=> 'Page 404 Options',
        'menu_title'	=> 'Page 404',
        'parent_slug'	=> 'theme-general-settings',
    ));
}

add_action('acf/init', 'register_acf_options_pages');