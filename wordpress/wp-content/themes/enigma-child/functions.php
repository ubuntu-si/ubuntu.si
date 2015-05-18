<?php
function theme_enqueue_styles()
{
    # load parent theme styles
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
?>