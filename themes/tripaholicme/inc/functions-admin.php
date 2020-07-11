<?php

function tripaholicme_add_admin_page() {

    // Generate Tripaholicme Admin Page
    add_menu_page( 
        'Tripaholicme Theme Options',      // page_title
        'Tripaholicme',                    // menu_title
        'manage_options',                  // capability
        'tripaholicme-slug',               // menu_slug
        'tripaholicme_theme_options_page', // function
        get_template_directory_uri() . '/site/images/admin.png', // icon_url
        110                                // position
    );

    // Generate Tripaholicme Admin Sub Pages
    add_submenu_page(
        'tripaholicme-slug',              // parent_slug
        'Tripaholicme Theme Options',     // page_title
        'Theme Options',                  // menu_title
        'manage_options',                 // capability
        'tripaholicme-slug',              // menu_slug
        'tripaholicme_theme_options_page' // function
    );

    add_submenu_page(
        'tripaholicme-slug',            // parent_slug
        'Tripaholicme Sidebar Options', // page_title
        'Sidebar',                      // menu_title
        'manage_options',               // capability
        'tripaholicme-sidebar-slug',    // menu_slug
        'tripaholicme_sidebar_page'     // function
    );

    // Activate custom settings
    add_action( 'admin_init', 'tripaholicme_custom_settings' );
}

add_action( 'admin_menu', 'tripaholicme_add_admin_page' );

function tripaholicme_theme_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-theme-options.php');
}

function tripaholicme_sidebar_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-sidebar.php');
}

function tripaholicme_custom_settings() {
    // Header Options
    register_setting( 'tripaholicme-settings-group', 'business_email' );
    register_setting( 'tripaholicme-settings-group', 'business_phone' );

    add_settings_section( 'tripaholicme-header-options', 'Header Options', 'tripaholicme_header_options', 'tripaholicme-slug' );
  
    add_settings_field( 'header_business_email', 'Business Email', 'tripaholicme_header_business_email', 'tripaholicme-slug', 'tripaholicme-header-options' );
    add_settings_field( 'header_business_phone', 'Business Phone', 'tripaholicme_header_business_phone', 'tripaholicme-slug', 'tripaholicme-header-options' );
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