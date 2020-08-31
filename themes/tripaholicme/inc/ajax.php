<?php

/* Ajax functions */

function tripaholicme_save_contact() {
  $name    = wp_strip_all_tags( $_POST['name'] );
  $email   = wp_strip_all_tags( $_POST['email'] );
  $message = wp_strip_all_tags( $_POST['message'] );

  $args = array(
    'post_title' => $name,
    'post_content' => $message,
    'post_status' => 'publish',
    'post_type' => 'tripaholicme-contact',
    'meta_input' => array(
      '_contact_email_value_key' => $email
    ),
  );

  $res = wp_insert_post( $args );

  if ($res != 0) {
    $to = get_bloginfo( 'admin_email' );
    $subject = 'Sunset Contact Form - ' . $name;
    $headers[] = 'From: ' . get_bloginfo( 'name' ) . ' <' . $to . '>';
    $headers[] = 'Reply-To: ' . $name . ' <' . $email . '>';
    $headers[] = 'Content-Type: text/html; charset=UTF-8';

    wp_mail($to, $subject, $message, $headers);

    echo $res;
  } else {
    echo 0;
  }

  exit;
}

add_action( 'wp_ajax_nopriv_tripaholicme_save_user_contact_form', 'tripaholicme_save_contact' ); // For all users
add_action( 'wp_ajax_tripaholicme_save_user_contact_form', 'tripaholicme_save_contact' ); // Only for admins