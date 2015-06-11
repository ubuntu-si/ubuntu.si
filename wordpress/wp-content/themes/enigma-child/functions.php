<?php
function theme_enqueue_custom()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'Ubuntu','//fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery') );
}
function theme_dequeue_custom()
{
    wp_dequeue_style('OpenSansRegular');
    wp_dequeue_style('OpenSansBold');
    wp_dequeue_style('OpenSansSemiBold');
    wp_dequeue_style('RobotoRegular');
    wp_dequeue_style('RobotoBold');
    wp_dequeue_style('RalewaySemiBold');
    wp_dequeue_style('Courgette');
}



function wp2vanilla_post_comments()
{
    global $wpdb;
    $id = get_the_ID ();
    if ( empty($id) || !$id || !defined('WP_TO_VANILLA_PREFIX'))
        return null;

    $vanilla_id = $wpdb->get_var($wpdb->prepare("SELECT vanilla_discussion_id FROM " . WP_TO_VANILLA_PREFIX . "map WHERE wp_post_id = %d", $id));
    if ( empty($vanilla_id) || !$vanilla_id )
        return null;

    return '<a href="' . home_url("forum") . '/discussion/' . $vanilla_id . '/" title="' . __('Komentiraj') . '"><i class="fa fa-comments-o"></i></a><small>Komentiraj</small>';
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_custom' );
add_action( 'wp_enqueue_scripts', 'theme_dequeue_custom', 11);
?>
