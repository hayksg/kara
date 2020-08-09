<?php



/*
  Admin Enqueue Functions
*/

function tripaholicme_load_admin_scripts( $page ) {

    if ( $page === 'tripaholicme_page_tripaholicme-main-options-slug' ) {
      wp_register_style( 'tripaholicme-admin-styles', get_template_directory_uri() . '/site/css/admin-styles.css', array(), '1.0.0' );
      wp_enqueue_style( 'tripaholicme-admin-styles' );
  
      wp_enqueue_media();
  
      wp_register_script( 'tripaholicme-admin-styles-scripts', get_template_directory_uri() . '/site/js/admin-scripts.js', array('jquery'), '1.0.0', true );
      wp_enqueue_script( 'tripaholicme-admin-styles-scripts' );
    } else {
        return;
    }
  }
  
  add_action( 'admin_enqueue_scripts', 'tripaholicme_load_admin_scripts' );






















function tripaholicme_load_scripts( $page ) {
    wp_register_style( 'bootstrap', get_template_directory_uri() . '/site/plugins/bootstrap/css/bootstrap.min.css', array(), '3.3.2' );
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/site/fonts/font-awesome/css/font-awesome.min.css', array(), '4.5.0' );
    wp_register_style( 'owl-carousel-css', get_template_directory_uri() . '/site/plugins/owl.carousel/owl-carousel/owl.carousel.css', array(), '1.3.2' );
    wp_register_style( 'tripaholicme', get_template_directory_uri() . '/site/css/styles.css', array(), '1.0.0' );
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'owl-carousel-css' );
    wp_enqueue_style( 'font-awesome' );
    wp_enqueue_style( 'tripaholicme' );

    wp_enqueue_media();

    wp_register_script( 'modernizr', get_template_directory_uri() . '/site/plugins/modernizr/modernizr.custom.js', array('jquery'), '2.8.3', true );
    wp_register_script( 'owl-carousel-js', get_template_directory_uri() . '/site/plugins/owl.carousel/owl-carousel/owl.carousel.min.js', array('jquery'), '1.3.2', true );
	wp_register_script( 'bxslider', get_template_directory_uri() . '/site/plugins/bxslider/jquery.bxslider.min.js', array('jquery'), '4.1.2', true );
	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/site/plugins/bootstrap/js/bootstrap.min.js', array('jquery'), '3.3.2', true );
	wp_register_script( 'match-height', get_template_directory_uri() . '/site/plugins/matchHeight/dist/jquery.matchHeight-min.js', array('jquery'), '0.7.0', true );
    wp_register_script( 'tripaholicme-js', get_template_directory_uri() . '/site/js/scripts.js', array('jquery'), '1.0.0', true );
	
    wp_enqueue_script( 'modernizr' );
    wp_enqueue_script( 'owl-carousel-js' );
	wp_enqueue_script( 'bxslider' );
	wp_enqueue_script( 'bootstrap-js' );
	wp_enqueue_script( 'match-height' );
    wp_enqueue_script( 'tripaholicme-js' );
}

add_action( 'wp_enqueue_scripts', 'tripaholicme_load_scripts' );