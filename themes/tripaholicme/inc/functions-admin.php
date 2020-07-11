<?php

function tripaholicme_add_admin_page() {

    // Generate Tripaholicme Admin Page
    add_menu_page( 
        'Tripaholicme Theme Options',      // page_title
        'Tripaholicme',                    // menu_title
        'manage_options',                  // capability
        'tripaholicme-slug',               // menu_slug
        'tripaholicme_header_options_page', // function
        get_template_directory_uri() . '/site/images/admin.png', // icon_url
        110                                // position
    );

    // Generate Tripaholicme Admin Sub Pages
    add_submenu_page(
        'tripaholicme-slug',              // parent_slug
        'Tripaholicme Header Options',     // page_title
        'Header Options',                  // menu_title
        'manage_options',                 // capability
        'tripaholicme-slug',              // menu_slug
        'tripaholicme_header_options_page' // function
    );

    add_submenu_page(
        'tripaholicme-slug',                // parent_slug
        'Tripaholicme Header Options',      // page_title
        'Hero Options',                   // menu_title
        'manage_options',                   // capability
        'tripaholicme-hero-options-slug', // menu_slug
        'tripaholicme_hero_options_page'  // function
    );

    add_submenu_page(
        'tripaholicme-slug',                // parent_slug
        'Tripaholicme Footer Options',      // page_title
        'Footer Options',                   // menu_title
        'manage_options',                   // capability
        'tripaholicme-footer-options-slug', // menu_slug
        'tripaholicme_footer_options_page'  // function
    );

    // Activate custom settings
    add_action( 'admin_init', 'tripaholicme_custom_settings' );
}

add_action( 'admin_menu', 'tripaholicme_add_admin_page' );

function tripaholicme_header_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-header-options.php');
}

function tripaholicme_hero_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-hero-options.php');
}

function tripaholicme_footer_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-footer-options.php');
}

function tripaholicme_custom_settings() {
    // Header Options
    register_setting( 'tripaholicme-settings-group', 'business_email' );
    register_setting( 'tripaholicme-settings-group', 'business_phone' );
    

    add_settings_section( 'tripaholicme-header-options', 'Header Options', 'tripaholicme_header_options', 'tripaholicme-slug' );
   
  
    add_settings_field( 'header_business_email', 'Business Email', 'tripaholicme_header_business_email', 'tripaholicme-slug', 'tripaholicme-header-options' );
    add_settings_field( 'header_business_phone', 'Business Phone', 'tripaholicme_header_business_phone', 'tripaholicme-slug', 'tripaholicme-header-options' );
    



    register_setting( 'tripaholicme-hero-title', 'hero_title' );
    add_settings_section( 'tripaholicme-hero-options', 'Hero Options', 'tripaholicme_hero_options', 'tripaholicme-hero-options-slug' );
    add_settings_field( 'hero_title', 'Hero Title', 'tripaholicme_hero_title', 'tripaholicme-hero-options-slug', 'tripaholicme-hero-options' );
}

// Header Options Functions

function tripaholicme_header_options() {
    echo "Customize your Header Information";
}
  
function tripaholicme_header_business_email() {
    $businessEmail = esc_attr(get_option( 'business_email' ));
    echo '<input type="email" name="business_email" value="' . $businessEmail . '" placeholder="Email">';
}

function tripaholicme_header_business_phone() {
    $businessPhone = esc_attr(get_option( 'business_phone' ));
    echo '<input type="text" name="business_phone" value="' . $businessPhone . '" placeholder="Phone">';
}

function tripaholicme_hero_options() {
    echo "Customize your Hero Information";
}

function tripaholicme_hero_title() {
    $heroTitle = esc_attr(get_option( 'hero_title' ));
    echo '<input type="text" name="hero_title" value="' . $heroTitle . '" placeholder="Hero title here">';
}