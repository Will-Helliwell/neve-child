<?php
add_action( 'wp_enqueue_scripts', 'astra_child_theme_enqueue_styles' );
function astra_child_theme_enqueue_styles() {
    // Enqueue the parent theme's stylesheet with the proper text domain
    wp_enqueue_style( 'astra-child-theme-parent-style', get_parent_theme_file_uri( 'style.css' ), array(), '1.0.0' );

    // Enqueue the child theme's stylesheet with its own text domain
    wp_enqueue_style( 'astra-child-theme-style', get_stylesheet_uri(), array( 'astra-child-theme-parent-style' ), '1.0.0' );
}