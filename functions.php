<?php
/**
 * Unnavigated functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Unnavigated
 */

if ( ! function_exists( 'unnavigated_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function unnavigated_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Unnavigated, use a find and replace
		 * to change 'unnavigated' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'unnavigated', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );


		// This theme uses wp_nav_menu() in one location.
        function wpmu_nav_menus() {

            register_nav_menus( array(
                'primary' => __( 'Primary Navigation', 'unnavigated' ),
                'secondary' => __( 'Secondary Navigation', 'unnavigated' ),
                'footer' => __( 'footer Navigation', 'unnavigated' ),
            ) );

        }

        add_filter( 'wp_nav_menu_secondary_items', 'add_search_to_nav', 10, 2 );

        function add_search_to_nav( $items, $args )
        {
            $items .= '<li><i class="close-menu icon ion-close"></i></li>';
            return $items;
        }

        add_action( 'after_setup_theme', 'wpmu_nav_menus' );

        /* post formats */
        add_theme_support( 'post-formats', array( 'aside', 'quote' ) );

        /* post thumbnails */
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

        /* HTML5 */
        add_theme_support( 'html5' );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'unnavigated_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'unnavigated_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function unnavigated_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'unnavigated_content_width', 640 );
}
add_action( 'after_setup_theme', 'unnavigated_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function unnavigated_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'unnavigated' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'unnavigated' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'unnavigated_widgets_init' );


// add a favicon to your
function blog_favicon() {
    echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'/favicon.ico" />';
}
add_action('wp_head', 'blog_favicon');

// disable all widget areas
function disable_all_widgets($sidebars_widgets) {
    //if (is_home())
    $sidebars_widgets = array(false);
    return $sidebars_widgets;
}
add_filter('sidebars_widgets', 'disable_all_widgets');

// category id in body and post class
function category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes [] = 'cat-' . $category->cat_ID . '-id';
    return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

// remove version info from head and feeds
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

// enable threaded comments
function enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
            wp_enqueue_script('comment-reply');
    }
}
add_action('get_header', 'enable_threaded_comments');



// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/**
 * Enqueue scripts and styles.
 */
// smart jquery inclusion
if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"), false);
    wp_enqueue_script('jquery');
}

function unnavigated_assets() {

    wp_enqueue_style( 'style_normalize', get_stylesheet_directory_uri() . '/css/normalize.css');
    wp_enqueue_style( 'style_icons', 'http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    wp_enqueue_style( 'style_font', '//fonts.googleapis.com/css?family=Merriweather+Sans:700|Merriweather:300');
    wp_enqueue_style( 'style_materialize', get_stylesheet_directory_uri() . '/css/materialize.css');
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'script_shiv', 'https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js', false);
    wp_enqueue_script( 'script_respond', 'https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', false );
    wp_enqueue_script( 'script_instafeed', get_stylesheet_directory_uri() . '/js/instafeed.min.js', true );
    wp_enqueue_script( 'script_filterize', get_stylesheet_directory_uri() . '/js/jquery.filterizr.min.js', true);
    wp_enqueue_script( 'script_controls', get_stylesheet_directory_uri() . '/js/controls.js' , true );
    wp_enqueue_script( 'script_materialize', get_stylesheet_directory_uri() . '/js/materialize.js' , true );
    wp_enqueue_script( 'script_init.js', get_stylesheet_directory_uri() . '/js/init.js' , true );

}

add_action( 'wp_enqueue_scripts', 'unnavigated_assets' );



// add google analytics to footer
function add_google_analytics() {
    echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
    echo '<script type="text/javascript">';
    echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
    echo 'pageTracker._trackPageview();';
    echo '</script>';
}
add_action('wp_footer', 'add_google_analytics');

// custom excerpt length
function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length');

// custom excerpt ellipses for 2.9+
function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');


function wpb_list_child_pages() {

    global $post;

    if ( is_page() && $post->post_parent )
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' .$post->post_parent . '&echo=0' );
    else
        $childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

    if ( $childpages ) {
        $string = '<ul>' . $childpages . '</ul>';
    }

    return $string;
}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');


/* custom excerpt ellipses for 2.8-
function custom_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'custom_excerpt_more');
*/

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Include better comments file
require_once( get_template_directory() .'/inc/better-comments.php');

// Load more
function misha_my_load_more_scripts() {

    global $wp_query;

    // In most cases it is already included on the page and this line can be removed
    wp_enqueue_script('jquery');

    // register our main script but do not enqueue it yet
    wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );

    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );

function misha_loadmore_ajax_handler(){

    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );
    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );

    if( have_posts() ) :

        // run the loop
        while( have_posts() ): the_post();

            // look into your theme code how the posts are inserted, but you can use your own HTML of course
            // do you remember? - my example is adapted for Twenty Seventeen theme
            get_template_part( 'template-parts/post/content', get_post_format() );
            // for the test purposes comment the line above and uncomment the below one
            // the_title();


        endwhile;

    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}



add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}