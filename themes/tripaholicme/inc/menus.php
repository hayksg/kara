<?php
function tripaholicme_menus () {
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenu1Location', 'Footer Menu1 Location');
    register_nav_menu('footerMenu2Location', 'Footer Menu2 Location');
}

add_action('after_setup_theme', 'tripaholicme_menus');