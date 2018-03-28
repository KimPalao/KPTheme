<?php
/**
 * Functions
 * 
 * Functions file for the theme
 * 
 * PHP version 7.2.0
 *
 * @category   Components
 * @package    WordPress
 * @subpackage Kimpalao
 * @author     Kim palao <kimfarhantpalao@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.en.html GNU/GPLv3
 * @link       localhost/wordpress
 */

/**
 * Enqueues the main Kim.js file
 * 
 * @return null
 */
function Kim_Script_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/kim.css', array(), '0.0.1', '');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/kim.js', array(), '0.0.1', true);
    // wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true);
    // wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true);
    // wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/releases/v5.0.9/js/all.js', array(), '5.0.9', true);
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.0.9/css/all.css', array(), '5.0.9', '');
}

add_action('wp_enqueue_scripts', 'Kim_Script_enqueue');

/**
 * Sets up theme support
 * 
 * @return null
 */
function Kim_Theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary Header Navigation');
    register_nav_menu('secondary', 'Footer Navigation');
    register_nav_menu('social', 'Social Links');
    register_post_type(
        'projects',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new_item' => 'Add New Project',
                'edit_item' => 'Edit Project',
                'new_item' => 'New Project',
                'view_item' => 'View Project',
                'view_items' => 'View Projects',
                'search_items' => 'Search Projects',
                'not_found' => 'No projects found',
                'not_found_in_trash' => 'No projects found in trash',
                'all_items' => 'All Projects',
                'archives' => 'Project Archives',
                'attributes' => 'Project Attributes',
                'insert_into_item' => 'Insert into project',
                'uploaded_to_this_item' => 'Uploaded to this project',
                'menu_name' => 'Projects',
                'name_admin_bar' => 'Project'
            ),
            'public' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchial' => false,
            'rewrite' => array('slug' => 'projects'),
            'query_var' => true,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'comments',
                'revisions',
                'trackbacks',
                'page-attributes',
                'custom-fields',
                'thumbnail',
            )
        )
    );
}

// Use 'init' or 'after_theme_setup'
add_action('init', 'Kim_Theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('aside', 'image', 'video', 'gallery', 'link', 'quote', 'status', 'audio', 'chat'));
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
/**
 * Sets up sidebar and widget functionality
 * 
 * @return null
 */
function Kim_Widget_setup() {
    register_sidebar(
        array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-1',
            'class'         => 'custom' ,
            'description'   => 'Standard sidebar',
            'before-widget' => '<aside id="%1$s" class="widget %2$s">',
            'after-widget'  => '</aside>',
            'before-title'  => '<h2 class="widget-title">',
            'after-title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Project',
            'id'            => 'sidebar-project',
            'class'         => 'custom' ,
            'description'   => 'A sidebar for showing my current project',
            'before-widget' => '<aside id="%1$s" class="widget %2$s">',
            'after-widget'  => '</aside>',
            'before-title'  => '<h2 class="widget-title">',
            'after-title'   => '</h2>',
        )
    );
}

add_action('widgets_init', 'Kim_Widget_setup');