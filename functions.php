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
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true);
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
}

// Use 'init' or 'after_theme_setup'
add_action('init', 'Kim_Theme_setup');

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

add_theme_support('post-formats', array('aside', 'image', 'video'));

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
}

add_action('widgets_init', 'Kim_Widget_setup');