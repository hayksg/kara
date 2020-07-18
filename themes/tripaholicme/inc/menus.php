<?php
function tripaholicme_menus () {
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
}

add_action('after_setup_theme', 'tripaholicme_menus');