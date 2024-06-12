<?php
add_action( 'wp_enqueue_scripts', 'neve_child_theme_enqueue_styles' );
function neve_child_theme_enqueue_styles() {
    // Enqueue the parent theme's stylesheet with the proper text domain
    wp_enqueue_style( 'neve-child-theme-parent-style', get_parent_theme_file_uri( 'style.css' ), array(), '1.0.0' );

    // Enqueue the child theme's stylesheet with its own text domain
    wp_enqueue_style( 'neve-child-theme-style', get_stylesheet_uri(), array( 'neve-child-theme-parent-style' ), '1.0.0' );
}

function print_attributes($atts) {
    // Define default attributes and merge with user-defined attributes
    $atts = shortcode_atts(
        array(
            'attr1' => 'default1',
            'attr2' => 'default2',
        ),
        $atts,
        'test_short_code'
    );

    // Output the merged attributes
    return 'Attribute 1 is ' . esc_attr($atts['attr1']) . ' and Attribute 2 is ' . esc_attr($atts['attr2']);
}
add_shortcode('test_short_code', 'print_attributes');