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
        'public'        => true,
        'show_ui'       => true,  // show in admin panel
        'rewrite'       => array( 'slug' => 'hero-slider-big' ),
        'menu_icon'     => 'dashicons-image-flip-horizontal',
        'supports'      => array( 'title', 'thumbnail' ),
    ) );

}
add_action( 'init', 'tripaholicme_post_types' );