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


// Filter for changing "Add title" to "Enter name"
function custom_enter_title( $input ) {
    global $post_type;

    if( is_admin() && 'Add title' == $input && 'testimonials' == $post_type ) {
        return 'Enter name';
    }

    return $input;
}

add_filter('gettext','custom_enter_title');
