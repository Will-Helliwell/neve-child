<?php
add_action( 'wp_enqueue_scripts', 'neve_child_theme_enqueue_styles' );
function neve_child_theme_enqueue_styles() {
    // Enqueue the parent theme's stylesheet with the proper text domain
    wp_enqueue_style( 'neve-child-theme-parent-style', get_parent_theme_file_uri( 'style.css' ), array(), '1.0.0' );

    // Enqueue the child theme's stylesheet with its own text domain
    wp_enqueue_style( 'neve-child-theme-style', get_stylesheet_uri(), array( 'neve-child-theme-parent-style' ), '1.0.0' );
}

echo 'in functions.php' . PHP_EOL;


if ( ! function_exists( 'add_footer_component' ) ) {
    echo 'add_footer_component() exists' . PHP_EOL;
    function add_footer_component( $builder, $row, $slot ) {
        echo 'in add_footer_component()' . PHP_EOL;
        if ( ! defined( '\HFG\Core\Builder\Footer::BUILDER_NAME' ) ) {
            return;
        }
        
        if ( $builder !== \HFG\Core\Builder\Footer::BUILDER_NAME ) {
            return;
        }

        if ( $row !== 'bottom' ) {
            return;
        }

        if ( $slot !== 'left' ) {
            return;
        }

        $output  = '<div class="builder-item"><div class="item--inner"><div class="component-wrap"><div>';
        $output .= sprintf(
            /* translators: %1$s is Theme Name ( Neve ), %2$s is WordPress */
            esc_html__( '%1$s | functions.php modified by %2$s', 'neve' ),
            wp_kses_post( '<p><a href="https://themeisle.com/themes/neve/" rel="nofollow">Neve</a>' ),
            wp_kses_post( '<a href="http://wordpress.org" rel="nofollow">WordPress</a></p>' )
        );
        $output .= '</div></div></div></div>';

        echo wp_kses_post( $output );
    }
}
