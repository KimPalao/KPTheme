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
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/kim.js', array('jquery'), '0.0.1', true);
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


    // Registering the Project content type
    
    $project_content_type_labels = array(
        'name'                  => 'Projects',
        'singular_name'         => 'Project',
        'add_new_item'          => 'Add New Project',
        'edit_item'             => 'Edit Project',
        'new_item'              => 'New Project',
        'view_item'             => 'View Project',
        'view_items'            => 'View Projects',
        'search_items'          => 'Search Projects',
        'not_found'             => 'No projects found',
        'not_found_in_trash'    => 'No projects found in trash',
        'all_items'             => 'All Projects',
        'archives'              => 'Project Archives',
        'attributes'            => 'Project Attributes',
        'insert_into_item'      => 'Insert into project',
        'uploaded_to_this_item' => 'Uploaded to this project',
        'menu_name'             => 'Projects',
        'name_admin_bar'        => 'Project'
    );
    $supports = array(
        'title',
        'editor',
        'excerpt',
        'comments',
        'revisions',
        'trackbacks',
        'page-attributes',
        'thumbnail',
    );
    $register_project_args = array(
        'labels'               => $project_content_type_labels,
        'register_meta_box_cb' => 'Project_Meta_box',
        'public'               => true,
        'show_ui'              => true,
        'capability_type'      => 'post',
        'hierarchial'          => true,
        'rewrite'              => array('slug' => 'projects'),
        'query_var'            => true,
        'menu_icon'            => 'dashicons-clipboard',
        'show_in_rest'         => true,
        'supports'             => $supports
    );
    register_post_type('projects', $register_project_args);

    // Registering the Programming Language taxonomy
    $register_programming_language_labels = array(
        'name'                       => 'Programming Languages',
        'singular_name'              => 'Programming Language',
        'all_items'                  => 'All programming languages',
        'edit_item'                  => 'Edit Programming Language',
        'view_item'                  => 'View Programming Language',
        'update_item'                => 'Update Programming Language',
        'add_new_item'               => 'Add New Programming Language',
        'new_item_name'              => 'New Programming Language',
        'search_items'               => 'Search Programming Languages',
        'popular_items'              => 'Popular Programming Language tags',
        'separate_items_with_commas' => 'Separate programming languages with commas',
        'add_or_remove_items'        => 'Add or remove programming languages',
        'choose_from_most_used'      => 'Choose from most used programming languages',
        'not_found'                  => 'No programming languages found.',
    );
    $register_programming_language_capabilities = array(
        'manage_terms' => 'manage_programming_languages',
        'edit_terms'   => 'edit_programming_languages',
        'delete_terms' => 'delete_programming_languages',
        'assign_terms' => 'assign_programming_languages'
    );
    $register_programming_language_args = array(
        'labels' => $register_programming_language_labels,
        'descripttion' => 'Programming Languages',
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    );
    register_taxonomy('programming-language', array('post', 'projects'), $register_programming_language_args);
}

/* Everything under this area will be for the Project content type */

/**
 * Initializes the meta boxes for the Project content type
 * 
 * @param WP_Post $post the WordPress post
 * 
 * @return void
 */
function Project_Meta_box(WP_Post $post) {
    add_meta_box('project_date_start', 'Starting Date', function() use ($post) {
        $field_name = 'project_date_start';
        $field_value = get_post_meta($post->ID, $field_name, true);
        wp_nonce_field($field_name . '_nonce', $field_name . '_nonce');?>
        <table class="form-table">
            <tr>
                <td>
                    <input type="date" name="<?php echo $field_name;?>" id="<?php echo $field_name;?>" value="<?php echo esc_attr($field_value);?>"> 
                </td>
            </tr>
        </table>
        <?php
    });
    add_meta_box('project_date_end', 'Ending Date', function() use ($post) {
        $field_name = 'project_date_end';
        $field_value = get_post_meta($post->ID, $field_name, true);
        wp_nonce_field($field_name . '_nonce', $field_name . '_nonce');?>
        <table class="form-table">
            <tr>
                <td>
                    <input type="date" name="<?php echo $field_name;?>" id="<?php echo $field_name;?>" value="<?php echo esc_attr($field_value);?>"> 
                </td>
            </tr>
        </table>
        <?php
    });
    add_meta_box('project_repository', 'Repository', function() use ($post) {
        $field_name = 'project_repository';
        $field_value = get_post_meta($post->ID, $field_name, true);
        wp_nonce_field($field_name . '_nonce', $field_name . '_nonce');?>
        <table class="form-table">
            <tr>
                <td>
                    <input type="text" name="<?php echo $field_name;?>" id="<?php echo $field_name;?>" value="<?php echo esc_attr($field_value);?>" size="50"> 
                </td>
            </tr>
        </table>
        <?php
    });
}

/**
 * Creates a filter for the Project content type
 * 
 * @param string $title This is the title passed in by WordPress
 * 
 * @return string $title
 */
function Project_Title_filter($title) {
    $screen = get_current_screen();
    if ($screen->post_type == 'projects') {
        $title = 'Enter project name';
    }
    return $title;
}
add_filter('enter_title_here', 'Project_Title_filter');

/**
 * Creates a help tab for the Project content type
 * 
 * @return null;
 */
function Project_Help_tab() {
    $screen = get_current_screen();
    if ($screen->post_type != 'projects') {
        return;
    }
    $args = array(
        'id'      => 'project_help',
        'title'   => 'Project Help',
        'content' => '<h3>Projects</h3><p>Programming projects for your portfolio</p>'
    );
    $screen->add_help_tab($args);
}
add_action('admin_head', 'Project_Help_tab');

/**
 * Creates custom messages for the Project content type
 * 
 * @param string $messages Messsages 
 * 
 * @return array(string);
 */
function Project_Messages_filter($messages) {
    global $post, $post_ID;
    $link = esc_url(get_permalink($post_ID));
    
    $messages['projects'] = array(
        0  => '',
        1  => sprintf(__('Project updated. <a href="%s">View project</a>'), $link),
        2  => __('Custom field updated.'),
        3  => __('Custom field deleted.'),
        4  => 'Project updated.',
        5  => isset($_GET['revision']) ? sprintf(__('Project restored to revision from %s'), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf(__('Project published. <a href="%s">View Project</a>'),  $link),
        7  => __('Project saved.'),
        8  => sprintf(__('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID)))),
        9  => sprintf(__('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'), date_i18n(__('M j, Y @ h:i A'), strtotime($post->post_date)), $link),
        10 => sprintf(__('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url(add_query_arg('preview', 'true', get_permalink($post_ID))))
    );
    return $messages;
}
add_filter('post_updated_messages', 'Project_Messages_filter');

/**
 * Creates custom bulk messages for the Project content type
 * 
 * @param array{string} $bulk_messages Bulk Messsages 
 * @param array{string} $bulk_counts   Bulk Counts
 * 
 * @return array{string};
 */
function Project_Bulk_Messages_filter($bulk_messages, $bulk_counts) {
    $bulk_messages['projects'] = array(
        'updated'   => _n('%s project updated.', '%s projects updated.', $bulk_counts['updated']),
        'locked'    => _n('%s project not updated, somebody is editing it.', '%s projects not updated, somebody is editing them.', $bulk_counts['locked']),
        'deleted'   => _n('%s project permanently deleted.', '%s projects permanently deleted.', $bulk_counts['deleted']),
        'trashed'   => _n('%s project moved to the Trash.', '%s projects moved to the Trash.', $bulk_counts['trashed']),
        'untrashed' => _n('%s project restored from the Trash.', '%s projects restored from the Trash.', $bulk_counts['untrashed'])
    );
    return $bulk_messages;
}
add_filter('bulk_post_updated_messages', 'Project_Bulk_Messages_filter', 10, 2);

function check_parent_programming_languages($post_ID, $post) {
    if ($post->post_type != 'projects') {
        return $post_ID;
    }
    $terms = wp_get_post_terms( $post_ID, 'programming-language');
    foreach($terms as $term) {
        while($term->parent != 0 && !has_term($term->parent, 'programming-language', $post)) {
            wp_set_post_terms($post_ID, array($term->parent), 'programming-language', true);
            $term = get_term($term->parent, 'programming-language');
        }
    }
}
add_action('save_post', 'check_parent_programming_languages', 10, 2);

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

function Project_sidebar_init() {
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => 1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            ?>
            <aside>
                <h2>Current Project:</h2>
                <div class="current-project-thumbnail"><?php echo get_the_post_thumbnail('medium');?></div>
                <div class="content">
                    <?php the_title();?>
                </div>
            </aside>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}

add_action('widgets_init', 'Kim_Widget_setup');