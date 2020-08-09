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
        'Tripaholicme Main Options',      // page_title
        'Main Options',                   // menu_title
        'manage_options',                   // capability
        'tripaholicme-main-options-slug', // menu_slug
        'tripaholicme_main_options_page'  // function
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

function tripaholicme_main_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-main-options.php');
}

function tripaholicme_footer_options_page() {
    require_once( get_template_directory() . '/inc/templates/tripaholicme-footer-options.php');
}

function tripaholicme_custom_settings() {
    add_settings_section( 'tripaholicme-header-options', 'Header Options', 'tripaholicme_header_options', 'tripaholicme-slug' );

    register_setting( 'tripaholicme-settings-group', 'business_email' );
    register_setting( 'tripaholicme-settings-group', 'business_phone' );
    
    add_settings_field( 'header_business_email', 'Business Email', 'tripaholicme_header_business_email', 'tripaholicme-slug', 'tripaholicme-header-options' );
    add_settings_field( 'header_business_phone', 'Business Phone', 'tripaholicme_header_business_phone', 'tripaholicme-slug', 'tripaholicme-header-options' );
    



    add_settings_section( 'tripaholicme-main-options', 'Main Options', 'tripaholicme_main_options', 'tripaholicme-main-options-slug' );

    register_setting( 'tripaholicme-main-settings-group', 'hero_title' );
    register_setting( 'tripaholicme-main-settings-group', 'about_us_bg_picture' );

    add_settings_field( 'hero_title', 'Hero Title', 'tripaholicme_hero_title', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'about-us-bg-picture', 'About Us Background Picture', 'tripaholicme_about_us_bg_picture', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
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

function tripaholicme_main_options() {
    echo "Customize your Main Information";
}

function tripaholicme_hero_title() {
    $heroTitle = esc_attr(get_option( 'hero_title' ));
    echo '<input type="text" name="hero_title" value="' . $heroTitle . '" placeholder="Hero title here">';
}

function tripaholicme_about_us_bg_picture() {
    $aboutUsBgPicture = esc_attr(get_option( 'about_us_bg_picture' ));

    echo '<input type="hidden" name="about_us_bg_picture" id="about-us-bg-picture" value="' . $aboutUsBgPicture . '">';

    echo '
    <div class="image-container">
		<div id="about-us-bg-picture-preview" style="background: url(' . $aboutUsBgPicture . ') center/cover no-repeat;"></div>
	</div> ';
  
   
    echo '<input type="button" class="button button-secondary" value="Upload About Us Background Picture" id="upload-button">';
}