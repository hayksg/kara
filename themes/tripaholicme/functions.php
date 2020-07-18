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

