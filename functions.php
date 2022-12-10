<?php
/**
 * customtheme functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package customtheme
 */

if ( ! function_exists( 'customtheme_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function customtheme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on customtheme, use a find and replace
         * to change 'customtheme' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'customtheme', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menu( 'header_menu', __( 'Header Menu', 'customtheme' ) );
        register_nav_menu( 'footer_menu', __( 'Footer Menu', 'customtheme' ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'customtheme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'customtheme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function customtheme_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'customtheme' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'customtheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'customtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function customtheme_scripts() {
    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
    wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . '/css/style.css', array(), '5.7.0', 'all' );
    wp_enqueue_style( 'customtheme-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '5.7.0', 'all' );

    wp_enqueue_script( 'customtheme-jquery-min', get_template_directory_uri() . '/js/jquery.js', array(), '20151215', true );
    wp_enqueue_script( 'customtheme-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );
    wp_enqueue_script( 'customtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'customtheme-animate-js', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '', true );
    wp_enqueue_script( 'custom-dev', get_template_directory_uri() . '/js/custom-dev.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
//
add_action( 'wp_enqueue_scripts', 'customtheme_scripts' );

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ) );
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $output .= "\n$indent<ul class=\"dropdown-content\">\n";
    }
}

/* * ** Register Custom post type for customtheme share companies **** */

function register_customtheme_stock_companies() {
    $customtheme_share_labels = array(
        'name'                  => _x( 'Stock company', 'Post type general name', 'customtheme' ),
        'singular_name'         => _x( 'Share comapny', 'Post type singular name', 'customtheme' ),
        'menu_name'             => _x( 'Shares', 'Admin Menu text', 'customtheme' ),
        'name_admin_bar'        => _x( 'Shares', 'Add New on Toolbar', 'customtheme' ),
        'add_new'               => __( 'Add New', 'customtheme' ),
        'add_new_item'          => __( 'Add New company', 'customtheme' ),
        'new_item'              => __( 'New member', 'customtheme' ),
        'edit_item'             => __( 'Edit Share company', 'customtheme' ),
        'view_item'             => __( 'View Share company', 'customtheme' ),
        'all_items'             => __( 'All Share company', 'customtheme' ),
        'search_items'          => __( 'Search Share company', 'customtheme' ),
        'parent_item_colon'     => __( 'Parent Share company:', 'customtheme' ),
        'not_found'             => __( 'No member found.', 'customtheme' ),
        'not_found_in_trash'    => __( 'No Share company found in Trash.', 'customtheme' ),
        'featured_image'        => _x( 'company Image', 'customtheme' ),
        'set_featured_image'    => _x( 'company image', 'customtheme' ),
        'remove_featured_image' => _x( 'Remove company image', 'customtheme' ),
        'use_featured_image'    => _x( 'Use as company image', 'customtheme' ),
        'archives'              => _x( 'Book archives', 'customtheme' ),
        'insert_into_item'      => _x( 'Insert into share company', 'customtheme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this share company', 'customtheme' ),
        'filter_items_list'     => _x( 'Filter team list', 'Default “Filter posts list”/”Filter pages list”', 'customtheme' ),
        'items_list_navigation' => _x( 'Share company list navigation', 'customtheme' ),
        'items_list'            => _x( 'Our team', 'customtheme' ),
    );

    $customtheme_share_args = array(
        'labels'             => $customtheme_share_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'share_companies' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-analytics',
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
    register_post_type( 'shares_list', $customtheme_share_args );
}

add_action( 'init', 'register_customtheme_stock_companies' );


function wd_admin_gutenstyles() {
    wp_enqueue_script( 'wd-editor', get_stylesheet_directory_uri() . '/js/margin-block.js', array(
        'wp-blocks',
        'wp-dom',
    ), filemtime( get_stylesheet_directory() . '/js/margin-block.js' ), true );
}

add_action( 'enqueue_block_editor_assets', 'wd_admin_gutenstyles' );

function loadMyBlock() {
    wp_enqueue_script( 'custom-new-block', get_stylesheet_directory_uri() . '/js/margin-block.js', array( 'wp-blocks', 'wp-editor' ), true );
}

add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    return $content;
});