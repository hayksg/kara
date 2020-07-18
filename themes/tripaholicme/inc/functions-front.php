<?php

function tripaholicme_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'tripaholicme_add_excerpts_to_pages' );
