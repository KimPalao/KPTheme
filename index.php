<?php
/**
 * Index
 * 
 * Index file for the theme
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

get_header();?>

    <?php
    if (have_posts()) :
        while (have_posts()): the_post();?>
            <h3><?php the_title();?></h3>
            <div class="post-thumbnail"><?php the_post_thumbnail('thumbnail')?></div>
            <small><?php the_time('F j, Y');?> at <?php the_time('h:i A');?></small>
            <p><?php the_content();?></p>
        <?php
        endwhile;
    endif;
    ?>
<?php get_sidebar();?>
<?php get_footer();?>