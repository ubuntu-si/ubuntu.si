<?php
function theme_enqueue_custom()
{
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'Ubuntu','//fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin,Latin-ext' );
    wp_enqueue_script( 'custom-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), false, true );
    wp_enqueue_script('menu', WL_TEMPLATE_DIR_URI .'/js/menu.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap-js', WL_TEMPLATE_DIR_URI .'/js/bootstrap.js', array('jquery'), false, true);
    wp_enqueue_script('enigma-theme-script', WL_TEMPLATE_DIR_URI .'/js/enigma_theme_script.js', array('jquery'), false, true);
    if(is_front_page()){
        wp_enqueue_script('jquery.carouFredSel', WL_TEMPLATE_DIR_URI .'/js/carouFredSel-6.2.1/jquery.carouFredSel-6.2.1.js', array('jquery'), false, true);
        wp_enqueue_script('carouFredSel-element', WL_TEMPLATE_DIR_URI .'/js/carouFredSel-6.2.1/caroufredsel-element.js', array('jquery'), false, true);
        wp_enqueue_script('photobox-js', WL_TEMPLATE_DIR_URI .'/js/jquery.photobox.js', array('jquery'), false, true);
    }
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
    wp_dequeue_script('menu');
    wp_dequeue_script('bootstrap-js');
    wp_dequeue_script('enigma-theme-script');
    wp_dequeue_script('jquery.carouFredSel');
    wp_dequeue_script('carouFredSel-element');
    wp_dequeue_script('photobox-js');
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

function remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

add_filter( 'style_loader_src', 'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
add_action( 'wp_enqueue_scripts', 'theme_dequeue_custom', 11);
add_action( 'wp_enqueue_scripts', 'theme_enqueue_custom', 12);
?>
