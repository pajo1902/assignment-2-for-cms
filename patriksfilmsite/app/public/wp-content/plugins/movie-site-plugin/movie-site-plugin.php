<?php
/*
    Plugin Name: Movie Site Plugin
    Author: Patrik Johansson
    Version: 1.0
    Description: Plugin with Movie CPT
*/

//to protect getting access of php files directly from the browser
if (! defined('ABSPATH')) {
    exit;
}

function create_movie_cpt() {
    $labels = array(
        'name' => __('Movies', 'Post Type General Name', 'movies'),
        'singular_name' => __('Movies', 'Post Type General Name', 'movies'),
        'menu_name' => __('Movies', 'movies'),
        'name_admin_bar' => __('movies', 'movies'),
        'archives' => __('Movies Archives', 'movies'),
        'attributes' => __('Movie Attributes', 'movies'),
        'parent_item_colon' => __('Parent Movie', 'movies'),
        'all_items' => __('All Movies', 'movies'),
        'add_new_item' => __('Add New Movie', 'movies'),
        'add_new' => __('Add New', 'movies'),
        'new_item' => __('New Movie', 'movies'),
        'edit_item' => __('Edit Movie', 'movies'),
        'update_item' => __('Update Movie', 'movies'),
        'view_item' => __('View Movie', 'movies'),
        'view_items' => __('View Movies', 'movies'),
        'search_items' => __('Search Movies', 'movies'),
        'not_found' => __('Not Found', 'movies'),
        'not_found_in_trash' => __('Not Found in Trash', 'movies'),
        'featured_image' => __('Featured Image', 'movies'),
        'set_featured_image' => __('Set Featured Image', 'movies'),
        'remove_featured_image' => __('Remove Featured Image', 'movies'),
        'use_featured_image' => __('Use as Featured Image', 'movies'),
        'insert_into_item' => __('Insert Into Movie', 'movies'),
        'uploaded_to_this_item' => __('Uploaded To This Movie', 'movies'),
        'items_list' => __('Movies List', 'movies'),
        'items_list_navigation' => __('Movies List Navigation', 'movies'),
        'filter_items_list' => __('Filter Movies List', 'movies')
    );

    $args = array(
        'label' => __('Movie', 'movies'),
        'description' => __('Cool Movie Rating', 'movies'),
        'labels' => $labels,
        'menu_icon' => 'dashicons-editor-video',
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'author'),
        'taxonomies' => array('category', 'post_tag'),
        'public' => true, //so its public accessable
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'movies') //to let the slug (the url) to be movies
    );
    register_post_type('movies', $args);

}
add_action('init', 'create_movie_cpt', 0); //using init-hook

function rewrite_movies_flush() {
    create_movie_cpt();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rewrite_movies_flush'); //when activating the plugin it will let wp to be able to rewrite the permalinks


//adding meta box below

function wporg_add_custom_box()
{
    $screens = ['movies', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'wporg_box_id',           // Unique ID
            'IMDB Custom Meta Box',  // Box title
            'wporg_custom_box_html',  // Content callback, must be of type callable
            'movies'                 // Post type
        );
    }
}
add_action('add_meta_boxes', 'wporg_add_custom_box');

function wporg_custom_box_html($post)
{
    $value = get_post_meta($post->ID, '_wporg_meta_key', true);
    ?>
    <label for="wporg_field">IMDB URL: </label>
    <input name="wporg_field" id="wporg_field" class="postbox">
    <?php
}

function wporg_save_postdata($post_id)
{
    if (array_key_exists('wporg_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_wporg_meta_key',
            $_POST['wporg_field']
        );
    }
}
add_action('save_post', 'wporg_save_postdata');
