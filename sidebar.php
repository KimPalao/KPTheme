<?php
/**
 * Sidebar
 * 
 * Sidebar file for the theme
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
<div id="sidebar">
     <div id="sidebar-project" class="sidebar">
    <?php Project_sidebar_init();?>
    </div> 
    <div id="sidebar-navigation" class="sidebar widgets-area">
    <?php dynamic_sidebar('sidebar-1');?>
    </div>
</div>