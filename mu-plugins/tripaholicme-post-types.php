<?php

function tripaholicme_post_types() {

    // Hero-slider-big Post Type
    register_post_type( 'hero-slider-big', array(
        'labels' => array(
            'name'          => 'Hero Slider Big',
            'add_new_item'  => 'Add New Slide',
            'edit_item'     => 'Edit Slide',
            'all_items'     => 'All Slides',
            'singular_name' => 'Slider',
        ),
        'public'    => true,
        'show_ui'   => true,  // show in admin panel
        'rewrite'   => array( 'slug' => 'hero-slider-big' ),
        'menu_icon' => 'dashicons-image-flip-horizontal',
        'supports'  => array( 'title', 'thumbnail' ),
    ) );

    // Hero-slider-small Post Type
    register_post_type( 'hero-slider-small', array(
        'labels' => array(
            'name'          => 'Hero Slider Small',
            'add_new_item'  => 'Add New Slide',
            'edit_item'     => 'Edit Slide',
            'all_items'     => 'All Slides',
            'singular_name' => 'Slider',
        ),
        'public'    => true,
        'show_ui'   => true,  // show in admin panel
        'rewrite'   => array( 'slug' => 'hero-slider-small' ),
        'menu_icon' => 'dashicons-image-flip-horizontal',
        'supports'  => array( 'title', 'thumbnail' ),
    ) );

    // Testimonials Post Type
    register_post_type( 'testimonials', array(
        'labels' => array(
            'name'          => 'Testimonials',
            'add_new_item'  => 'Add New Testimonial',
            'edit_item'     => 'Edit Testimonial',
            'all_items'     => 'All Testimonials',
            'singular_name' => 'Testimonial',
        ),
        'public'    => true,
        'show_ui'   => true,  // show in admin panel
        'rewrite'   => array( 'slug' => 'testimonials' ),
        'menu_icon' => 'dashicons-testimonial',
        'supports'  => array( 'title', 'excerpt', 'thumbnail' ),
    ) );

    // Contact Post Type
    register_post_type( 'tripaholicme-contact', array(
		'labels' => array(
            'name'           => 'Messages',
            'singular_name'  => 'Message',
            'menu_name'      => 'Messages',
            'name_admin_bar' => 'Message',
        ),
        'show_ui'         => true,
        'show_in_menu'    => true,
        'capability_type' => 'post',
        'hierarchical'    => false,
        'menu_position'   => 26,
        'menu_icon'       => 'dashicons-email-alt',
        'supports'        => array( 'title', 'editor' )
    ) );

    // Tour Post Type
    register_post_type( 'tour', array(
        'labels' => array(
            'name'          => 'Tours',
            'add_new_item'  => 'Add New Tour',
            'edit_item'     => 'Edit Tour',
            'all_items'     => 'All Tours',
            'singular_name' => 'Tours',
        ),
        'public'      => true,
        'show_ui'     => true,  // show in admin panel
        'rewrite'     => array( 'slug' => 'tours' ),
        'menu_icon'   => 'dashicons-admin-site-alt3',
        'supports'    => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
        'has_archive' => true,
    ) );

    // Tour Categories custom taxonomy
    register_taxonomy( 'tour-categories', 'tour', array(
        'hierarchical' => true,
		'labels'       => array(
            'name' => 'Tours Categories',
        ),
        'public'  => true,
        'show_ui' => true,  // show in admin panel
        'rewrite' => array( 'slug' => 'tour-category' ),
    ) );

}
add_action( 'init', 'tripaholicme_post_types' );

/* Filters */

// Filter for changing "Add title" to "Enter name"
function custom_enter_title( $input ) {
    global $post_type;

    if( is_admin() && 'Add title' == $input && 'testimonials' == $post_type ) {
        return 'Enter name';
    }

    return $input;
}

add_filter('gettext','custom_enter_title');
add_filter( 'manage_testimonials_posts_columns', 'tripaholicme_testimonials_columns' );
add_filter( 'manage_tripaholicme-contact_posts_columns', 'tripaholicme_set_contact_columns' );
add_action( 'manage_tripaholicme-contact_posts_custom_column', 'tripaholicme_contact_custom_column', 10, 2 );

function tripaholicme_testimonials_columns( $columns ) {
    $newColumns = array();
    $newColumns['title'] = 'Full Name';
    $newColumns['date']  = 'Date';
    return $newColumns;
}

function tripaholicme_set_contact_columns( $columns ) {
    $newColumns = array();
    $newColumns['title']   = 'Full Name';
    $newColumns['message'] = 'Message';
    $newColumns['email']   = 'Email';
    $newColumns['date']    = 'Date';
    return $newColumns;
}
  
function tripaholicme_contact_custom_column( $column, $post_id ) {
    switch ( $column ) {
      case 'message':
        echo get_the_excerpt();
        break;
      case 'email':
        $email = esc_attr( get_post_meta( $post_id, '_contact_email_value_key', true ) );
        echo '<a href="mailto:' . $email . '">' . $email . '</a>';
        break;
    }
}

/* Meta box */
  
// Activating meta box
add_action( 'add_meta_boxes', 'tripaholicme_contact_add_meta_box' );
// Saving meta box value to database
add_action( 'save_post', 'tripaholicme_save_contact_email_data' );

/* Contact meta boxes  */
function tripaholicme_contact_add_meta_box() {
    add_meta_box( 
        'contact_email',                       // id, 
        'User Email',                          // title, 
        'tripaholicme_contact_email_callback', // callback, 
        'tripaholicme-contact',                // custom post type name
        'side',                                // $context = 'advanced'
        'default'                              // $priority = 'default'
    );
}
  
function tripaholicme_contact_email_callback( $post ) {
    wp_nonce_field( 
        'tripaholicme_save_contact_email_data',     // action
        'tripaholicme_contact_email_meta_box_nonce' // $name = '_wpnonce'
    );
  
    $value = esc_attr( get_post_meta( 
        $post->ID,                  // $post_id
        '_contact_email_value_key', // $key = '', 
        true                        // $single = false 
    ) );
  
    echo '<label for="tripaholicme_contact_email_field">User Email Address: </label>';
    echo '<input type="email" id="tripaholicme_contact_email_field" name="tripaholicme_contact_email_field" value="' . $value . '" size="25">';
}
  
function tripaholicme_save_contact_email_data( $post_id ) {
    if ( ! isset($_POST['tripaholicme_contact_email_meta_box_nonce']) ) { return; }
  
    if ( ! wp_verify_nonce( $_POST['tripaholicme_contact_email_meta_box_nonce'], 'tripaholicme_save_contact_email_data' ) ) { return; }
  
    // For preventing auto saving in update time( if we want )
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { return; }
  
    if ( ! current_user_can( 'edit_post', $post_id ) ) { return; }
  
    if ( ! isset($_POST['tripaholicme_contact_email_field']) ) { return; }
  
    $my_data = sanitize_text_field( $_POST['tripaholicme_contact_email_field'] );
    update_post_meta( 
      $post_id, 
      '_contact_email_value_key', // $meta_key
      $my_data                    // $meta_value
    );
}