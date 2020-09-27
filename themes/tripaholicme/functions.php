<?php
// Set Up
add_theme_support( 'title-tag' );
add_theme_support( 'menus' );
add_theme_support( 'post-thumbnails' );

// Includes
require get_template_directory() . '/inc/functions-admin.php';
require get_template_directory() . '/inc/functions-front.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/menus.php';
require get_template_directory() . '/inc/ajax.php';

/* Filters */
//Turn off WordPress Update Message
add_filter( 'pre_site_transient_update_core' , create_function( '$a' , "return null;" ) );


// $allPosts = get_posts(array(
//     'fields'          => array('post_content'), 
//     'posts_per_page'  => -1,
//     'post_type' => array('page'),
// ));;

// var_dump($allPosts);

// function jp_search_filter( $query ) {
//     if ( $query->is_search && $query->is_main_query() ) {
//         $query->set( 'post__not_in', array( 80, 78, 77, 72 ) );
//     }
// }
    
// add_action( 'pre_get_posts', 'jp_search_filter' );



// $args = array(
//     'posts_per_page'   => -1,
//     'post_type'        =>  array('testimonials', 'hero-slider-small', 'hero-slider-small') ,
// );
// $the_query = new WP_Query( $args );

// while ( $the_query->have_posts()  ) {
//     $the_query->the_post();
//     if (!get_the_content()) {
//         echo the_id();
//     }
    
// }



 
 
