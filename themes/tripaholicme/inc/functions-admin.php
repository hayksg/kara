<?php

function tripaholicme_add_admin_page() {

    // Generate Tripaholicme Admin Page
    add_menu_page( 
        'Tripaholicme Theme Options',                            // page_title
        'Tripaholicme',                                          // menu_title
        'manage_options',                                        // capability
        'tripaholicme-slug',                                     // menu_slug
        'tripaholicme_header_options_page',                      // function
        get_template_directory_uri() . '/site/images/admin.png', // icon_url
        110                                                      // position
    );

    // Generate Tripaholicme Admin Sub Pages
    add_submenu_page(
        'tripaholicme-slug',               // parent_slug
        'Tripaholicme Header Options',     // page_title
        'Header Options',                  // menu_title
        'manage_options',                  // capability
        'tripaholicme-slug',               // menu_slug
        'tripaholicme_header_options_page' // function
    );

    add_submenu_page(
        'tripaholicme-slug',              // parent_slug
        'Tripaholicme Main Options',      // page_title
        'Main Options',                   // menu_title
        'manage_options',                 // capability
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
    // header options
    add_settings_section( 'tripaholicme-header-options', 'Header Options', 'tripaholicme_header_options', 'tripaholicme-slug' );

    register_setting( 'tripaholicme-settings-group', 'business_email' );
    register_setting( 'tripaholicme-settings-group', 'business_phone' );
    
    add_settings_field( 'header_business_email', 'Business Email', 'tripaholicme_header_business_email', 'tripaholicme-slug', 'tripaholicme-header-options' );
    add_settings_field( 'header_business_phone', 'Business Phone', 'tripaholicme_header_business_phone', 'tripaholicme-slug', 'tripaholicme-header-options' );
    
    // main options
    add_settings_section( 'tripaholicme-main-options', 'Main Options', 'tripaholicme_main_options', 'tripaholicme-main-options-slug' );

    register_setting( 'tripaholicme-main-settings-group', 'hero_title' );
    register_setting( 'tripaholicme-main-settings-group', 'hot_tours_title' );
    register_setting( 'tripaholicme-main-settings-group', 'testimonials_title' );
    register_setting( 'tripaholicme-main-settings-group', 'about_us_bg_picture' );
    register_setting( 'tripaholicme-main-settings-group', 'facebook_handler', 'tripaholicme_sanitize_form_data' );
    register_setting( 'tripaholicme-main-settings-group', 'twitter_handler', 'tripaholicme_sanitize_form_data' );
    register_setting( 'tripaholicme-main-settings-group', 'instagram_handler', 'tripaholicme_sanitize_form_data' );
    register_setting( 'tripaholicme-main-settings-group', 'youtube_handler', 'tripaholicme_sanitize_form_data' );

    add_settings_field( 'hero_title', 'Hero Title', 'tripaholicme_hero_title', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'hot_tours_title', 'Hot Tours Title', 'tripaholicme_hot_tours_title', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'testimonials_title', 'Testimonials Title', 'tripaholicme_testimonials_title', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'about-us-bg-picture', 'About Us Background Picture', 'tripaholicme_about_us_bg_picture', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'facebook_handler', 'Facebook handler', 'tripaholicme_facebook', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'twitter_handler', 'Twitter handler', 'tripaholicme_twitter', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'instagram_handler', 'Instagram handler', 'tripaholicme_instagram', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );
    add_settings_field( 'youtube_handler', 'Youtube handler', 'tripaholicme_youtube', 'tripaholicme-main-options-slug', 'tripaholicme-main-options' );

    // footer options
    add_settings_section( 'tripaholicme-footer-options', 'Footer Options', 'tripaholicme_footer_options', 'tripaholicme-footer-options-slug' );

    register_setting( 'tripaholicme-footer-settings-group', 'footer_connect_title' );
    register_setting( 'tripaholicme-footer-settings-group', 'footer_business_days' );
    register_setting( 'tripaholicme-footer-settings-group', 'footer_business_hours' );
    register_setting( 'tripaholicme-footer-settings-group', 'footer_address' );
    register_setting( 'tripaholicme-footer-settings-group', 'footer_motto' );

    add_settings_field( 'footer_connect_title', 'Connect Title', 'tripaholicme_footer_connect_title', 'tripaholicme-footer-options-slug', 'tripaholicme-footer-options' );
    add_settings_field( 'footer_business_days', 'Business Days', 'tripaholicme_footer_business_days', 'tripaholicme-footer-options-slug', 'tripaholicme-footer-options' );
    add_settings_field( 'footer_business_hours', 'Business Hours', 'tripaholicme_footer_business_hours', 'tripaholicme-footer-options-slug', 'tripaholicme-footer-options' );
    add_settings_field( 'footer_address', 'Address', 'tripaholicme_footer_address', 'tripaholicme-footer-options-slug', 'tripaholicme-footer-options' );
    add_settings_field( 'footer_motto', 'Motto', 'tripaholicme_footer_motto', 'tripaholicme-footer-options-slug', 'tripaholicme-footer-options' );
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
    echo '<input type="text" name="hero_title" class="admin-main-input" value="' . $heroTitle . '" placeholder="Hero title here">';
}

function tripaholicme_hot_tours_title() {
    $hotToursTitle = esc_attr(get_option( 'hot_tours_title' ));
    echo '<input type="text" name="hot_tours_title" class="admin-main-input" value="' . $hotToursTitle . '" placeholder="Hot Tours title here">';
}

function tripaholicme_testimonials_title() {
    $testimonialsTitle = esc_attr(get_option( 'testimonials_title' ));
    echo '<input type="text" name="testimonials_title" class="admin-main-input" value="' . $testimonialsTitle . '" placeholder="Testimonials title here">';
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

function tripaholicme_footer_options() {
    echo "Customize your Footer Information";
}

function tripaholicme_footer_connect_title() {
    $footerConnectTitle = esc_attr(get_option( 'footer_connect_title' ));
    echo '<input type="text" name="footer_connect_title" class="admin-main-input" value="' . $footerConnectTitle . '" placeholder="Input title here">';
}

function tripaholicme_footer_business_days() {
    $footerBusinessDays = esc_attr(get_option( 'footer_business_days' ));
    echo '<input type="text" name="footer_business_days" class="admin-main-input" value="' . $footerBusinessDays . '" placeholder="Input days here">';
}

function tripaholicme_footer_address() {
    $footerAddress = esc_attr(get_option( 'footer_address' ));
    echo '<input type="text" name="footer_address" class="admin-main-input" value="' . $footerAddress . '" placeholder="Input address here">';
}

function tripaholicme_footer_business_hours() {
    $footerBusinessHours = esc_attr(get_option( 'footer_business_hours' ));
    echo '<input type="text" name="footer_business_hours" class="admin-main-input" value="' . $footerBusinessHours . '" placeholder="Input hours here">';
}

function tripaholicme_footer_motto() {
    $footerMotto = esc_attr(get_option( 'footer_motto' ));
    echo '<input type="text" name="footer_motto" class="admin-main-input" value="' . $footerMotto . '" placeholder="Input text here">';
}

function tripaholicme_facebook() {
    $facebook = esc_attr(get_option( 'facebook_handler' ));
    echo '<input type="text" name="facebook_handler" class="admin-main-input" value="' . $facebook . '" placeholder="Facebook address">';
}

function tripaholicme_twitter() {
    $twitter = esc_attr(get_option( 'twitter_handler' ));
    echo '<input type="text" name="twitter_handler" class="admin-main-input" value="' . $twitter . '" placeholder="Twitter address">';
}
  
function tripaholicme_instagram() {
    $instagram = esc_attr(get_option( 'instagram_handler' ));
    echo '<input type="text" name="instagram_handler" class="admin-main-input" value="' . $instagram . '" placeholder="Instagram address">';
}

function tripaholicme_youtube() {
    $youtube = esc_attr(get_option( 'youtube_handler' ));
    echo '<input type="text" name="youtube_handler" class="admin-main-input" value="' . $youtube . '" placeholder="Youtube address">';
}

// Sanitization settings
function tripaholicme_sanitize_form_data( $input ) {
    $output = sanitize_text_field( $input );
    return $output;
}
