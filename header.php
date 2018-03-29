<?php
/**
 * Header
 * 
 * Header file for the theme
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
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset')?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <?php wp_head();?>
        <title><?php wp_title();?></title>
    </head>
    <body <?php body_class();?>>
    <div id="modal-container" class="hide">
        <div id="modal">
            <i id="modal-close" class="fas fa-times"></i>
            <a href="" id="modal-link" target="_blank"></a>
            <div id="modal-link-background"></div>
        </div>
    </div>
    <header>
        <!-- This one will use the photo as is. -->
        <!-- <img src="<?php header_image()?>" width="<?php echo get_custom_header()->width;?>" height="<?php echo get_custom_header()->height;?>" alt=""> -->

        <!-- This one will set the width of the header to 100% of screen width. The height will scale down to fit -->
        <img src="<?php header_image()?>" width="100%" alt="" class="header-image">
        <!-- WordPress header implementation -->
        <div class="header-navigation-wrapper">
            <?php wp_nav_menu(array('theme_location' => 'primary'));?>
            <div class="header-navigation-search">
                <?php get_search_form();?>
            </div>
        </div>
    </header>
    <div id="main-body">
