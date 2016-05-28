<?php

function post_type_labels($singular, $plural = '') {
    if ($plural == '')
        $plural = $singular . 's';

    return array(
        'name' => _x($plural, 'post type general name'),
        'singular_name' => _x($singular, 'post type singular name'),
        'add_new' => __('Add New'),
        'add_new_item' => __('Add New ' . $singular),
        'edit_item' => __('Edit ' . $singular),
        'new_item' => __('New ' . $singular),
        'view_item' => __('View ' . $singular),
        'search_items' => __('Search ' . $plural),
        'not_found' => __('No ' . $plural . ' found'),
        'not_found_in_trash' => __('No ' . $plural . ' found in Trash'),
        'parent_item_colon' => ''
    );
}

function create_gallery_post_type() {
    $args = array(
        'labels' => post_type_labels('Gallery', 'Gallery'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor',
            'thumbnail',
        ),
    );
    register_post_type('gallery', $args);
}

add_action('init', 'create_gallery_post_type');

function add_gallery_taxonomy() {

    register_taxonomy('gallery-categories', 'gallery', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Gallery Category', 'taxonomy general name'),
            'singular_name' => _x('Gallery Category', 'taxonomy singular name'),
            'search_items' => __('Search Gallery Categories'),
            'all_items' => __('All Gallery Categories'),
            'parent_item' => __('Parent Gallery Category'),
            'parent_item_colon' => __('Parent Gallery:'),
            'edit_item' => __('Edit Gallery Category'),
            'update_item' => __('Update Gallery Category'),
            'add_new_item' => __('Add New Gallery Category'),
            'new_item_name' => __('New Gallery Name'),
            'menu_name' => __('Gallery Categories'),
        ),
        'rewrite' => array(
            'slug' => 'gallery-category', // This controls the base slug that will display before each term
            'with_front' => true, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ));
}

add_action('init', 'add_gallery_taxonomy');
?>
