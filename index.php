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
    <div id="post-container">
    <?php
    // $query = array(
    //     'type' => 'post'
    // );
    // foreach ($_GET as $key => $value) {
    //     $args[$key] = $value;
    // }
    // var_dump($query);
    // $posts = new WP_Query($query);
    if (have_posts()) :
        while (have_posts()): the_post();?>
            <div class="post <?php echo get_post_format() ? get_post_format() : 'standard';?>">
                <div class="post-calendar">
                    <!-- <small><?php the_time('F j, Y');?> at <?php the_time('h:i A');?></small> -->
                    <div class="post-month"><?php the_time('M');?></div>
                    <div class="post-date"><h2><?php the_time('d');?></h2></div>
                    <div class="post-year"><small><?php the_time('Y');?></small></div>
                </div>
                <div class="post-content">
                    <div class="post-header">
                        <h2 class="post-title"><?php the_title();?></h2>
                        <small>Posted on <?php the_time('F j, Y');?> at <?php the_time('h:i A');?></small>
                    </div>
                    <hr>
                    <div class="post-body">
                        <div class="post-thumbnail"><?php the_post_thumbnail('thumbnail')?></div>
                        <p><?php the_content();?></p>
                    </div>
                    <hr>
                    <div class="post-footer">
                        <div class="post-category">

                        </div>
                        <div class="post-tags">
                            Tags:
                            <?php the_tags('<span class="post-tag">', '', '</span>');?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    // wp_reset_postdata();
    ?>
    </div>
<?php get_sidebar('sidebar');?>
<?php get_sidebar('sidebar-project');?>
<?php get_footer();?>