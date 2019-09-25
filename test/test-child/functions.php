<?php 
/**
 * Enqueue script and styles for child theme
 */
function test_child_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'test_child_enqueue_styles', 1000 );