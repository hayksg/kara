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

//Filter the search results for search page
function SearchFilter($query) {
    // Now filter the posts
    if ( !is_admin() && $query->is_main_query() && $query->is_search() ) {
        $front_page_id = get_option( 'page_on_front' );
        $blog_page_id  = get_option( 'page_for_posts' );
        $query->set('post_type', array('page', 'post', 'tour'));           // search only in 'page', 'post', 'tour' post types
        $query->set('post__not_in', array($front_page_id, $blog_page_id)); // exclude from search results home and blog pages
    }
   // Returning the query after it has been modified
    return $query;
}

add_action('pre_get_posts', 'SearchFilter');
