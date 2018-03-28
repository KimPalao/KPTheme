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
?>
        </div>
        <footer>
            <span>
                &copy; Kim Palao 2018 <br>
                Connect with me through these social media networks:
                <br><br>
            </span>
            <?php 
            $args = array(
                'theme_location' => 'social',
                'menu_class' => 'social-links',
            );
            wp_nav_menu($args); 
            ?>
        </footer>

    <?php wp_footer();?>
    </body>
</html>