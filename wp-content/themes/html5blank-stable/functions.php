<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

// Custom functions
function getImageByFilename($filename)
{
    global $wpdb;
    $i = current($wpdb->get_results('SELECT * FROM `css_posts` where guid like \'%'.$filename.'%\' ORDER BY `post_date` DESC LIMIT 1;'));
    return $i->guid;
}

function chagePostGuidToIP($ip)
{
    global $wpdb;
    $posts = $wpdb->get_results('SELECT * FROM `css_posts` where `guid` LIKE \'%localhost%\' OR `post_content` LIKE \'%localhost%\';');
    foreach($posts as $post)
    {
        $newGuid = str_replace('localhost', $ip, $post->guid);
        $newContent = str_replace('localhost', $ip, $post->post_content);
        $wpdb->update('css_posts', array('guid'=>$newGuid, 'post_content'=>$newContent), array('ID'=>$post->ID));
    }
    $opts = $wpdb->get_results('SELECT * FROM `wp_options` where `option_value` LIKE \'%localhost%\';');
    foreach($opts as $opt)
    {
        $newOpt = str_replace('localhost', $ip, $opt->option_value);
        $wpdb->update('wp_options',array('option_value'=>$newOpt),(array('option_id'=>$opt->option_id)));
    }
    return 1;
}

function changePostGuidToLocal($ip)
{
    global $wpdb;
    $posts = $wpdb->get_results('SELECT * FROM `css_posts` where `guid` LIKE \'%'.$ip.'%\' OR `post_content` LIKE \'%'.$ip.'%\';');
    foreach($posts as $post)
    {
        $newGuid = str_replace($ip, 'localhost', $post->guid);
        $newContent = str_replace($ip, 'localhost', $post->post_content);
        $wpdb->update('css_posts', array('guid'=>$newGuid, 'post_content'=>$newContent), array('ID'=>$post->ID));
    }
    $opts = $wpdb->get_results('SELECT * FROM `wp_options` where `option_value` LIKE \'%'.$ip.'%\';');
    foreach($opts as $opt)
    {
        $newOpt = str_replace($ip, 'localhost', $opt->option_value);
        $wpdb->update('wp_options',array('option_value'=>$newOpt),(array('option_id'=>$opt->option_id)));
    }
    return 1;
}

function getPostsByCategory($categoryName, $status = 'revision', $limit = 3, $offset = 0, $orderBy = 'date', $order = 'ASC', $author='')
{
    $id  = get_cat_ID($categoryName);
    return get_posts(array(
        'posts_per_page'   => $limit,
        'offset'           => $offset,
        'category'         => $id,
        'category_name'    => '',
        'orderby'          => $orderBy,
        'order'            => $order,
        'include'          => '',
        'exclude'          => '',
        'meta_key'         => '',
        'meta_value'       => '',
        'post_type'        => 'post',
        'post_mime_type'   => '',
        'post_parent'      => '',
        'author'       => $author,
        'post_status'      => $status,
        'suppress_filters' => true 
    ));
}

function getPostByTitle($title)
{
    global $wpdb;
    $i = current($wpdb->get_results('SELECT * FROM `css_posts` where post_title = "'.$title.'" ORDER BY `post_date` DESC LIMIT 1;'));
    return $i;
}

function getPageByTitle($title)
{
    global $wpdb;
    $i = current($wpdb->get_results('SELECT * FROM `css_posts` where post_title = "'.$title.'" AND post_type = "page" ORDER BY `post_date` DESC LIMIT 1;'));
    return $i;
}
function getPageUrl($page)
{
    $o = getPageByTitle($page);
    return get_page_link($o->ID);
}

function getNewsPosts($limit = 0,$offset = 0)
{
    global $wpdb;
    $i = $wpdb->get_results('SELECT * FROM `css_posts` WHERE ID IN (SELECT `object_id` FROM `css_term_relationships` WHERE `term_taxonomy_id` = 6) AND `post_status` = "publish"'.
        'UNION SELECT * FROM `css_posts`  WHERE ID IN (SELECT `object_id` FROM `css_term_relationships` WHERE `term_taxonomy_id` = 7) AND `post_status` = "publish" ORDER BY `post_date` DESC');
    return $i;
}

function getEventsPosts($offset = 0,$limit = 0)
{
    global $wpdb;
    $d = date("F j, Y");
    $query = 'SELECT t1.ID,t1.post_title,t1.post_content,t1.post_excerpt,t1.post_author,t1.post_date,t1.guid,t2.*
                            FROM
                            (SELECT * FROM css_posts WHERE post_status = "publish" GROUP BY ID) t1, 
                            ( SELECT a.post_id,
                                a.meta_value AS "EventDate",
                                b.meta_value as "EventStartTime",
                                c.meta_value as "EventEndTime",
                                d.meta_value AS "EventLocation"
                                FROM css_postmeta a,css_postmeta b,css_postmeta c,css_postmeta d
                                WHERE
                                a.meta_key LIKE "Event Date"
                                AND b.meta_key LIKE "Event Start Time"
                                AND c.meta_key LIKE "Event End Time"
                                AND d.meta_key LIKE "Event Location"
                                AND a.post_id = b.post_id
                                AND b.post_id = c.post_id
                                AND c.post_id = d.post_id
                            ) t2
                            WHERE
                            t1.ID = t2.post_id AND DATE(t2.EventDate) >= CURDATE()
                            ORDER BY t2.EventDate ASC, t2.EventStartTime DESC';
    if($limit > 0)
    {
        if($offset > 0)
        {
            $query .= " LIMIT $offset,$limit";
        }
        else
        {
            $query .= " LIMIT $limit";
        }
    }
    return $wpdb->get_results($query);
}

function getOldEventsPosts($offset = 0,$limit = 0)
{
    global $wpdb;
    $d = date("F j, Y");
    $query = 'SELECT t1.ID,t1.post_title,t1.post_content,t1.post_excerpt,t1.post_author,t1.post_date,t1.guid,t2.*
                            FROM
                            (SELECT * FROM css_posts WHERE post_status = "publish" GROUP BY ID) t1, 
                            ( SELECT a.post_id,
                                a.meta_value AS "EventDate",
                                b.meta_value as "EventStartTime",
                                c.meta_value as "EventEndTime",
                                d.meta_value AS "EventLocation"
                                FROM css_postmeta a,css_postmeta b,css_postmeta c,css_postmeta d
                                WHERE
                                a.meta_key LIKE "Event Date"
                                AND b.meta_key LIKE "Event Start Time"
                                AND c.meta_key LIKE "Event End Time"
                                AND d.meta_key LIKE "Event Location"
                                AND a.post_id = b.post_id
                                AND b.post_id = c.post_id
                                AND c.post_id = d.post_id
                            ) t2
                            WHERE
                            t1.ID = t2.post_id AND DATE(t2.EventDate) < CURDATE()
                            ORDER BY t2.EventDate ASC, t2.EventStartTime DESC';
    if($limit > 0)
    {
        if($offset > 0)
        {
            $query .= " LIMIT $offset,$limit";
        }
        else
        {
            $query .= " LIMIT $limit";
        }
    }
    return $wpdb->get_results($query);
}
function winwar_first_sentence( $string ) {

    $sentence = preg_split( '/(\.|!|\?)\s/', $string, 2, PREG_SPLIT_DELIM_CAPTURE );
    return $sentence['0'] . $sentence['1'];

}
/*Grabbed from http://www.wpbeginner.com/wp-themes/create-custom-single-post-templates-for-specific-posts-or-sections-in-wordpress/*/
/**
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;

/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :

if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

endforeach;
}

function getAccreditationApplications($id = null){
    global $wpdb;
    if($id == null){
        $i = $wpdb->get_results('SELECT * FROM `css_accreditationdata`;');
        return $i;
    }else{
        $i = current($wpdb->get_results("SELECT * FROM `css_accreditationdata` WHERE ID = {$id} LIMIT 1;"));
        return $i;
    }
}

add_action('init', function() {
    add_shortcode('userform', 'print_user_form');
});

function print_user_form() {
    echo '<form method="POST">';
    wp_nonce_field('user_info', 'user_info_nonce', true, true);
    echo '<input type="hidden" name="userFilename1" value="'.$_REQUEST['filename1'].'"/>';
    if(isset($_REQUEST['filename2'])) {
        echo '<input type="hidden" name="userFilename2" value="'.$_REQUEST['filename2'].'"/>';
    }

    if(isset($_REQUEST['filename3'])) {
        echo '<input type="hidden" name="userFilename3" value="'.$_REQUEST['filename3'].'"/>';
    }

    if(isset($_REQUEST['filename4'])) {
        echo '<input type="hidden" name="userFilename4" value="'.$_REQUEST['filename4'].'"/>';
    }
    echo '<input type="hidden" name="userType" value="'.$_REQUEST['type'].'"/>';
    echo '<label for="field-22">Name</label>
            <input id="lastName" type="text" placeholder="Last Name" name="lastName" required="required" class="w-input name-field">
            <input id="firstName" type="text" placeholder="First Name" name="firstName" required="required" data-name="lastName" class="w-input name-field">
            <input id="middleName" type="text" placeholder="Middle Name" name="middleName" required="required" data-name="middleName" class="w-input name-field">
            <div class="w-row">
                <div class="w-col w-col-4 w-clearfix">
                    <label for="dateOfBirth" class="accreditation-labels">Date of Birth</label>
                    <select id="yearOfBirth" name="yearOfBirth" data-name="yearOfBirth" required="required" class="w-select birthday-field">
                    <option value="">Year</option>';
                    for($i = 1866; $i <= 1998; $i++){
                        echo "<option value=\"$i\">$i</option>";
                    }
                echo '</select>
                    <select id="dayOfBirth" name="dayOfBirth" data-name="dayOfBirth" required="required" class="w-select birthday-field">
                    <option value="">Day</option>';
                    for($i = 1; $i <= 31; $i++){
                        echo "<option value=\"$i\">$i</option>";
                    }
                echo '</select>
                    <select id="monthOfBirth" name="monthOfBirth" required="required" class="w-select birthday-field">
                    <option value="">Month</option>';
                    for($i = 1; $i <= 12; $i++){
                        echo "<option value=\"$i\">$i</option>";
                    }
                echo '</select>
                </div>
                <div class="w-col w-col-4">
                    <label for="placeOfBirth" class="accreditation-labels">Place of Birth</label>
                    <input id="placeOfBirth" type="text" placeholder="Address " name="placeOfBirth" required="required" data-name="placeOfBirth" class="w-input">
                </div>
                <div class="w-col w-col-4">
                    <label for="civilStatus" class="accreditation-labels">Status</label>
                    <select id="civilStatus" name="civilStatus" data-name="civilStatus" class="w-select status">
                        <option value="">Select Status</option>
                        <option value="single">Single</option>
                        <option value="maried">Maried</option>
                        <option value="separated">Separated</option>
                    </select>
                </div>
            </div>
            <label for="residence" class="accreditation-labels">Residence</label>
            <input id="residenceCity" type="text" placeholder="City" name="residenceCity" required="required" data-name="residenceCity" class="w-input name-field">
            <input id="residenceProvince" type="text" placeholder="Province" name="residenceProvince" required="required" data-name="residenceProvince" class="w-input name-field">
            <input id="residenceContact" type="text" placeholder="Phone Number" name="residenceContact" required="required" data-name="residenceContact" class="w-input name-field">
            <div class="w-row">
                <div class="w-col w-col-4">
                <label for="workPosition" class="accreditation-labels">Position / Designation</label>
                <input id="workPosition" type="text" placeholder="Write Position here" name="workPosition" required="required" data-name="workPosition" class="w-input">
                </div>
                <div class="w-col w-col-4">
                <label for="workEmployer" class="accreditation-labels">Organisation</label>
                <input id="workEmployer" type="text" placeholder="Write Organisation here" name="workEmployer" required="required" data-name="workEmployer" class="w-input">
                </div>
                <div class="w-col w-col-4">
                <label for="workEmail" class="accreditation-labels">Email Address</label>
                <input id="workEmail" type="email" placeholder="You@email.com" name="workEmail" required="required" data-name="workEmail" class="w-input">
            </div>
            </div>
            <label for="workManager">Name of Editor/ Station Manager</label>
            <input id="workManagerLastName" type="text" placeholder="Last Name" name="workManagerLastName" required="required" data-name="workManagerLastName" class="w-input name-field">
            <input id="workManagerFirstName" type="text" placeholder="First Name" name="workManagerFirstName" required="required" data-name="workManagerFirstName" class="w-input name-field">
            <input id="workManagerMiddleName" type="text" placeholder="Middle Name" name="workManagerMiddleName" required="required" data-name="workManagerMiddleName" class="w-input name-field">
            <label for="workAddress" class="accreditation-labels">Business Address</label>
            <input id="workAddressCity" type="text" placeholder="Work address" name="workAddressCity" required="required" data-name="workAddressCity" class="w-input">
            <label for="workContact" class="accreditation-labels">Tel Nos</label>
            <input id="workContact" type="text" placeholder="Write Nos" name="workContact" required="required" data-name="workContact" class="w-input">
            <label for="workPlaces" class="accreditation-labels">Places to Visit</label>
            <input id="workPlaces" type="text" placeholder="Write places separated by ," name="workPlaces" required="required" data-name="workPlaces" class="w-input">
            <label for="userPhoto" class="accreditation-labels">Please take photo&nbsp;</label>
            <div id="webcam"></div>
            <br/>
            <div id="snapshot"></div>
            <br/>
            <button type="button" onclick="getSnapshot()" id="captureButton" class="w-button button">Capture</button>
            <input type="hidden" name="userPhoto" id="userPhoto" value=""/>
            <br/><br/>
            <input type="submit" value="Submit form" class="w-button button"/>';
    echo '</form>';
    echo '<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    <script language="JavaScript" src="'.get_template_directory_uri().'/js/scriptcam.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#webcam").scriptcam({
                path: "'.get_template_directory_uri().'/js/",
                noFlashFound: "<p><a href=\"http://www.adobe.com/go/getflashplayer\">Adobe Flash Player</a> 11.7 or greater is needed to use your webcam.</p>"
            });
        });

        function getSnapshot(){
            var x = $.scriptcam.getFrameAsBase64();
            $("#userPhoto").val(x);
            $("#snapshot").html("<p>Captured image</p><img src=\"data:image/jpeg;base64,"+x+"\"/>");
        }
    </script>';
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

add_action('template_redirect', function() {
   if ( ( is_single() || is_page() ) &&
        isset($_POST[user_info_nonce]) &&
        wp_verify_nonce($_POST[user_info_nonce], 'user_info')
    ) {
        /*
      // you should do the validation before save data in db.
      // I will not write the validation function, is out of scope of this answer
      $pass_validation = validate_user_data($_POST);
      if ( $pass_validation ) {
        $data = array(
          'name' => $_POST['name'],
          'email' => $_POST['email'],
          'phone' => $_POST['phone'],
        );
        global $wpdb;
        // if you have followed my suggestion to name your table using wordpress prefix
        $table_name = $wpdb->prefix . 'my_custom_table';
        // next line will insert the data
        $wpdb->insert($table_name, $data, '%s'); 
        // if you want to retrieve the ID value for the just inserted row use
        $rowid = $wpdb->insert_id;
        // after we insert we have to redirect user
        // I sugest you to cretae another page and title it "Thank You"
        // if you do so:
        $redirect_page = get_page_by_title('Thank You') ? : get_queried_object();
        // previous line if page titled 'Thank You' is not found set the current page
        // as the redirection page. Next line get the url of redirect page:
        $redirect_url = get_permalink( $redirect_page );
        // now redirect
        wp_safe_redirect( $redirect_url );
        // and stop php
        exit();
      }
      */
        $errors = array();
        /*Trimming and validation*/
        $firstName = test_input($_POST['firstName']);
        if (!preg_match("/^[a-zA-Z]*$/",$firstName)) {
            $errors['firstName'] = "Only letters are allowed on First Name."; 
        }
        $middleName = test_input($_POST['middleName']);
        if (!preg_match("/^[a-zA-Z]*$/",$middleName)) {
            $errors['middleName'] = "Only letters are allowed on Middle Name."; 
        }
        $lastName = test_input($_POST['lastName']);
        if (!preg_match("/^[a-zA-Z]*$/",$lastName)) {
            $errors['lastName'] = "Only letters are allowed on Last Name."; 
        }
        $yearOfBirth = test_input($_POST['yearOfBirth']);
        if (!preg_match("/^[0-9]*$/",$yearOfBirth)) {
            $errors['birthdate'] = "Only numbers are allowed on Year of birth."; 
        }else if(strlen($yearOfBirth) != 4){
            $errors['birthdate'] = "Length mismatch on Year of birth."; 
        }
        $dayOfBirth = test_input($_POST['dayOfBirth']);
        if (!preg_match("/^[0-9]*$/",$dayOfBirth)) {
            $errors['birthdate'] = "Only numbers are allowed on Day of birth.";
        }
        $monthOfBirth = test_input($_POST['monthOfBirth']);
        if (!preg_match("/^[0-9]*$/",$monthOfBirth)) {
            $errors['birthdate'] = "Only numbers are allowed on Month of birth.";
        }
        $placeOfBirth = test_input($_POST['placeOfBirth']);
        $civilStatus = test_input($_POST['civilStatus']);
        if (!preg_match("/^[a-zA-Z]*$/",$civilStatus)) {
            $errors['civilStatus'] = "Only letters are allowed on Place of Birth."; 
        }
        $residenceCity = test_input($_POST['residenceCity']);
        $residenceProvince = test_input($_POST['residenceProvince']);
        $residenceContact = test_input($_POST['residenceContact']);
        $workPosition = test_input($_POST['workPosition']);
        $workEmployer = test_input($_POST['workEmployer']);
        $workEmail = test_input($_POST['workEmail']);
        if (!filter_var($workEmail, FILTER_VALIDATE_EMAIL)) {
            $errors['workEmail'] = "Invalid email format"; 
        }
        $workManagerFirstName = test_input($_POST['workManagerFirstName']);
        if (!preg_match("/^[a-zA-Z]*$/",$workManagerFirstName)) {
            $errors['workManagerFirstName'] = "Only letters are allowed on Supervisor's First name."; 
        }
        $workManagerMiddleName = test_input($_POST['workManagerMiddleName']);
        if (!preg_match("/^[a-zA-Z]*$/",$workManagerMiddleName)) {
            $errors['workManagerMiddleName'] = "Only letters are allowed on Supervisor's Middle Name."; 
        }
        $workManagerLastName = test_input($_POST['workManagerLastName']);
        if (!preg_match("/^[a-zA-Z]*$/",$workManagerLastName)) {
            $errors['workManagerLastName'] = "Only letters are allowed on Supervisor's Last Name."; 
        }
        $workAddressCity = test_input($_POST['workAddressCity']);
        $workContact = test_input($_POST['workContact']);
        $workPlaces = test_input($_POST['workPlaces']);
        /*Trimming and validation done*/

        if (empty($errors)) {

            //save image to file

            $upload_dir = wp_upload_dir();
            $baseUpload = $upload_dir['basedir'];
            $separator = $upload_dir['subdir'][0];
            $filename = $firstName."-".$lastName.date("Y-M-d-H-i-s").".jpg";

            $fp = fopen($baseUpload.$separator."accreditationuserimages".$separator.$_POST['userType'].$separator.$filename, 'w');
            fwrite($fp, base64_decode($_POST['userPhoto']));
            chmod($baseUpload.$separator."accreditationuserimages".$separator.$_POST['userType'].$separator.$filename, 0755);
            if(fclose($fp)){
                if(isset($_POST['userFilename1'])) {
                    $userFilename1 = rawurldecode($_POST['userFilename1']);
                } else {
                    $userFilename1 = "";
                }

                if(isset($_POST['userFilename2'])) {
                    $userFilename2 = rawurldecode($_POST['userFilename2']);
                } else {
                    $userFilename2 = "";
                }

                if(isset($_POST['userFilename3'])) {
                    $userFilename3 = rawurldecode($_POST['userFilename3']);
                } else {
                    $userFilename3 = "";
                }

                if(isset($_POST['userFilename4'])) {
                    $userFilename4 = rawurldecode($_POST['userFilename4']);
                } else {
                    $userFilename4 = "";
                }

            //save user info to db
                global $wpdb;
                $data = array(
                    'firstName' => $firstName,
                    'middleName' => $middleName,
                    'lastName' => $lastName,
                    'yearOfBirth' => $yearOfBirth,
                    'dayOfBirth' => $dayOfBirth,
                    'monthOfBirth' => $monthOfBirth,
                    'placeOfBirth' => $placeOfBirth,
                    'civilStatus' => $civilStatus,
                    'residenceCity' => $residenceCity,
                    'residenceProvince' => $residenceProvince,
                    'residenceContact' => $residenceContact,
                    'workPosition' => $workPosition,
                    'workEmployer' => $workEmployer,
                    'workEmail' => $workEmail,
                    'workManagerFirstName' => $workManagerFirstName,
                    'workManagerMiddleName' => $workManagerMiddleName,
                    'workManagerLastName' => $workManagerLastName,
                    'workAddressCity' => $workAddressCity,
                    'workContact' => $workContact,
                    'workPlaces' => $workPlaces,
                    'userRequirementFilename1' => $userFilename1,
                    'userRequirementFilename2' => $userFilename2,
                    'userRequirementFilename3' => $userFilename3,
                    'userRequirementFilename4' => $userFilename4,
                    'userType' => $_POST['userType'],
                    'userImageFilename' => $filename
                );
                $table_name = $wpdb->prefix . 'accreditationdata';
                $wpdb->insert($table_name, $data, '%s'); 
                $rowid = $wpdb->insert_id;

                accreditationSendNotification($rowid,$firstName,$lastName);           

                $redirect_page = get_page_by_title('Thank You') ? : get_queried_object();
                $redirect_url = get_permalink( $redirect_page );
                wp_safe_redirect( $redirect_url );
                exit();

            }else{
                $errors['fileUpload'] = "An error occured while uploading your photo.";
            }
        }
   }
});

add_action( 'wp_ajax_accreditationstatus', 'css_ajax_accreditationstatus' );
add_action( 'wp_ajax_nopriv_wp_ajax_accreditationstatus', 'prefix_ajax_add_foobar_no' );

function css_ajax_accreditationstatus() {
    // Handle request then generate response using WP_Ajax_Response
    global $wpdb;
    $id = $_POST['data']['id'];
    $newStatus = $_POST['data']['status'];
    $wpdb->update(
        'css_accreditationdata', array('applicationStatus' => $newStatus), array('ID'=>$id), array('%d'), array('%d')
    );
    accreditationSendEmail($id,$newStatus);
    if($newStatus == 1){
        echo json_encode(array('msg'=>'Application approved!'));
    }
    else{
        echo json_encode(array('msg'=>'Application denied!'));
    }
    die();
}

function prefix_ajax_add_foobar_no() {
    die();
}


function accreditationSendEmail($id,$newStatus){
    $subj = "Media Accreditation Application";
    $headers = "From: Pili-Pinas2016 <no-reply@pilipinas2016.ph>\r\n";
    $body = "";
    if($newStatus == 1)
        $body = "Congratulations! Your media accreditation application has been approved!";
    else
        $body = "We are sorry to inform you that your media accreditation application has been denied.";
    $application = getAccreditationApplications($id);
    $email = $application->workEmail;
    wp_mail($email,$subj,$body,$headers);
}

function accreditationSendNotification($applicationID, $applicantFirstName, $applicantLastName) {
    $subj = "Media Accreditation Application Notification";
    $headers = "From: Pili-Pinas2016 <no-reply@pilipinas2016.ph>\r\n";
    $body = $applicantFirstName." ".$applicantLastName." has applied for media accreditation. Please log in using an administrator account, then go to ".get_site_url()."/accreditation/admin/?id=".$applicationID." to view his/her application.";
    $email = "jabjimenez@gmail.com";
    wp_mail($email,$subj,$body,$headers);
}
?>
