<?php
/**
 * @package WordPressToPunBB
 * @version 0.1
 */
/*
Plugin Name: WordPressToPunBB
Plugin URI: http://
Description: This plugin inserts WordPress posts into PunBB forum.
Author: Zan Dobersek
Version: 0.1
Author URI: http://
*/

define('PUNBB_PREFIX', "punbb_");
define('PUNBB_FORUM', "Novice");
define('WP_TO_PUNBB_PREFIX', "wp2punbb_");

function wp2punbb_activation() {
    global $wpdb;

    $create_table_sql = "CREATE TABLE IF NOT EXISTS " . WP_TO_PUNBB_PREFIX . "map (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `wp_post_id` int(11) NOT NULL,
 `punbb_topic_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
);";
    $wpdb->query($wpdb->prepare($create_table_sql));
}

function add_new_post($post) {
    global $wpdb;

    $time = current_time("timestamp", true);

    $author = $wpdb->get_row($wpdb->prepare("SELECT user_login, user_email FROM $wpdb->users WHERE ID = %d", $post->post_author));
    if ( empty($author) )
        return;

    $punbb_user_sql = "SELECT id, username FROM " . PUNBB_PREFIX . "users WHERE username = %s AND email = %s";
    $punbb_user = $wpdb->get_row($wpdb->prepare($punbb_user_sql, $author->user_login, $author->user_email));
    if ( empty($punbb_user) )
        return;

    $punbb_forum_id_sql = "SELECT id FROM " . PUNBB_PREFIX . "forums WHERE forum_name = %s";
    $punbb_forum_id = $wpdb->get_var($wpdb->prepare($punbb_forum_id_sql, PUNBB_FORUM));
    if ( empty($punbb_forum_id) )
        return;

    // F-ing CHs :/
    $p_content = $post->post_content;
    $p_content = str_replace("Č", "[TheChChar]", $p_content);


    $posts_data = array(
        "poster" => $punbb_user->username,
        "poster_id" => $punbb_user->id,
        "poster_ip" => "0.0.0.0",
        "message" => utf8_encode("[WordPress-Post-Insertion-Request]" . htmlspecialchars(wpautop($p_content))),
        "posted" => $time,
    );
    $wpdb->insert(PUNBB_PREFIX . "posts", $posts_data);
    $punbb_post_id = $wpdb->insert_id;

    $topics_data = array(
        "poster" => $punbb_user->username,
        "subject" => utf8_encode($post->post_title), 
        "posted" => $time,
        "first_post_id" => $punbb_post_id,
        "last_post" => $time,
        "last_post_id" => $punbb_post_id,
        "last_poster" => $punbb_user->username,
        "forum_id" => $punbb_forum_id
    );
    $wpdb->insert(PUNBB_PREFIX . "topics", $topics_data);
    $punbb_topic_id = $wpdb->insert_id;

    $wpdb->update(PUNBB_PREFIX . "posts", array("topic_id" => $punbb_topic_id), array("id" => $punbb_post_id));

    $punbb_current_forum_stats_sql = "SELECT num_topics, num_posts FROM " . PUNBB_PREFIX . "forums WHERE id = %d";
    $punbb_current_forum_stats = $wpdb->get_row($wpdb->prepare($punbb_current_forum_stats_sql, $punbb_forum_id));

    $punbb_updated_stats = array(
        "num_topics" => $punbb_current_forum_stats->num_topics + 1,
        "num_posts" => $punbb_current_forum_stats->num_posts + 1,
        "last_post" => $time,
        "last_post_id" => $punbb_post_id,
        "last_poster" => $punbb_user->username
    );
    $wpdb->update(PUNBB_PREFIX . "forums", $punbb_updated_stats, array("id" => $punbb_forum_id));

    $wpdb->insert(WP_TO_PUNBB_PREFIX . "map", array("wp_post_id" => $post->ID, "punbb_topic_id" => $punbb_topic_id));
}

function edit_existing_post($post) {
    global $wpdb, $current_user;

    $time = current_time("timestamp", true);

    $author = $wpdb->get_row($wpdb->prepare("SELECT user_login, user_email FROM $wpdb->users WHERE ID = %d", $current_user->ID));
    if ( empty($author) )
        return;

    $punbb_user_sql = "SELECT id, username FROM " . PUNBB_PREFIX . "users WHERE username = %s AND email = %s";
    $punbb_user = $wpdb->get_row($wpdb->prepare($punbb_user_sql, $author->user_login, $author->user_email));
    if ( empty($punbb_user) )
        return;

    $punbb_topic_id_sql = "SELECT punbb_topic_id FROM " . WP_TO_PUNBB_PREFIX . "map WHERE wp_post_id = %d";
    $punbb_topic_id = $wpdb->get_var($wpdb->prepare($punbb_topic_id_sql, $post->ID));
    if ( empty($punbb_topic_id) )
        return;

    $punbb_post_id = $wpdb->get_var($wpdb->prepare("SELECT first_post_id FROM " . PUNBB_PREFIX . "topics WHERE id = %d", $punbb_topic_id));
    if ( empty($punbb_post_id) )
        return;

    // F-ing CHs :/
    $p_content = apply_filters('the_content', $post->post_content);
    $p_content = str_replace("Č", "[TheChChar]", $p_content);


    $post_data = array(
        "message" => utf8_encode("[WordPress-Post-Insertion-Request]" . htmlspecialchars(wpautop($p_content))),
        "edited" => $time,
        "edited_by" => $punbb_user->username,
    );
    $wpdb->update(PUNBB_PREFIX . "posts", $post_data, array("id" => $punbb_post_id));

    $topic_data = array("subject" => utf8_encode($post->post_title));
    $wpdb->update(PUNBB_PREFIX . "topics", $topic_data, array("id" => $punbb_topic_id));
}

function remove_existing_post($post) {
    global $wpdb;

    $mapped_post_sql = "SELECT id, punbb_topic_id FROM " . WP_TO_PUNBB_PREFIX . "map WHERE wp_post_id = %d";
    $mapped_post = $wpdb->get_row($wpdb->prepare($mapped_post_sql, $post->ID));
    if ( empty($mapped_post) || empty($mapped_post->id) )
        return;

    $num_posts = $wpdb->query($wpdb->prepare("DELETE FROM " . PUNBB_PREFIX . "posts WHERE topic_id = %d", $mapped_post->punbb_topic_id));
    $wpdb->query($wpdb->prepare("DELETE FROM " . PUNBB_PREFIX . "topics WHERE id = %d", $mapped_post->punbb_topic_id));

    $punbb_forum_id_sql = "SELECT id FROM " . PUNBB_PREFIX . "forums WHERE forum_name = %s";
    $punbb_forum_id = $wpdb->get_var($wpdb->prepare($punbb_forum_id_sql, PUNBB_FORUM));
    if ( empty($punbb_forum_id) )
        return;

    $punbb_current_forum_stats_sql = "SELECT num_topics, num_posts FROM " . PUNBB_PREFIX . "forums WHERE id = %d";
    $punbb_current_forum_stats = $wpdb->get_row($wpdb->prepare($punbb_current_forum_stats_sql, $punbb_forum_id));

    $latest_post_sql = "SELECT last_post, last_post_id, last_poster FROM " . PUNBB_PREFIX . "topics WHERE forum_id = %d ORDER BY last_post DESC";
    $latest_post = $wpdb->get_row($wpdb->prepare($latest_post_sql, $punbb_forum_id));

    $punbb_updated_stats = array(
        "num_topics" => $punbb_current_forum_stats->num_topics - 1,
        "num_posts" => $punbb_current_forum_stats->num_posts - $num_posts,
        "last_post" => $latest_post->last_post,
        "last_post_id" => $latest_post->last_post_id,
        "last_poster" => $latest_post->last_poster
    );
    $wpdb->update(PUNBB_PREFIX . "forums", $punbb_updated_stats, array("id" => $punbb_forum_id));

    $wpdb->query($wpdb->prepare("DELETE FROM " . WP_TO_PUNBB_PREFIX . "map WHERE wp_post_id = %d", $post->ID));
}

function insert_post_into_punbb ($post_ID, $post) {
    global $wpdb;

    if ( empty($post) )
        $post = get_post($post_ID);

    if ($post->post_type != "post")
        return;

    if ( $post->post_status == "trash" ) {
        remove_existing_post($post);
    } elseif ( $post->post_status == "publish" ) {
        $mapped_id = $wpdb->get_var($wpdb->prepare("SELECT id FROM " . WP_TO_PUNBB_PREFIX . "map WHERE wp_post_id = %d", $post_ID));
        if ( empty($mapped_id) )
            add_new_post($post);
        else
            edit_existing_post($post);
    }
}

register_activation_hook( __FILE__, 'wp2punbb_activation' );
add_action( 'wp_insert_post', 'insert_post_into_punbb' );

?>
