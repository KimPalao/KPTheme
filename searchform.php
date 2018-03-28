<?php
/**
 * Search Form
 * 
 * Search Form file for the theme
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
<form role="search" method="GET" action="<?php echo home_url('/');?>">
    <input id="search" type="search" class="form-control" placeholder="Search for something" value="<?php echo get_search_query();?>" name="s" title="search"><button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form>