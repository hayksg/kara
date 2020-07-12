<?php

function tripaholicme_post_types() {

    // Hero-slider-big Post Type
    register_post_type( 'hero-slider-big', array(
        'labels' => array(
            'name'          => 'Hero Slider Big',
            'add_new_item'  => 'Add New Slider',
            'edit_item'     => 'Edit Slider',
            'all_items'     => 'All Sliders',
            'singular_name' => 'Slider',
        ),
        'public'    => true,
        'show_ui'   => true,  // show in admin panel
        'rewrite'   => array( 'slug' => 'hero-slider-big' ),
        'menu_icon' => 'dashicons-image-flip-horizontal',
        'supports'  => array( 'title', 'thumbnail' ),
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
        'public'     => true,
        'show_ui'    => true,  // show in admin panel
        'rewrite'    => array( 'slug' => 'tour' ),
        'menu_icon'  => 'dashicons-admin-site-alt3',
        'supports'   => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
    ) );

    // Tour Categories custom taxonomy
    register_taxonomy( 'tour_categories', 'tour', array(
        'hierarchical'      => true,
		'labels'            => array(
            'name'          => 'Types of Tours',
        ),
        'public'     => true,
        'show_ui'    => true,  // show in admin panel
        'rewrite'    => array( 'slug' => 'tour-category' ),
    ) );

}
add_action( 'init', 'tripaholicme_post_types' );







