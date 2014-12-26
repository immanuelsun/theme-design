<?php
/**
 * Simone functions and definitions
 *
 * @package Simone
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 600; /* pixels */
}

if ( ! function_exists( 'simone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function simone_setup() {

	/* Add editor styles */
	// This theme styles the visual editor to resemble the theme style.
	$font_url = 'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,900,900italic|PT+Serif:400,700,400italic,700italic';

	add_editor_style( array( 'inc/editor-style.css', str_replace( ',', '%2C', $font_url ) ) );

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Simone, use a find and replace
	 * to change 'simone' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'simone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// Add image sizes
	add_image_size( 'large-thumb', 1060, 650, true );
	add_image_size( 'index-thumb', 780, 250, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'simone' ),
		'social' => __( 'Social Menu', 'simone' ),
	) );

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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'simone_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // simone_setup
add_action( 'after_setup_theme', 'simone_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function simone_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'simone' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'simone' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Footer widgets appear at the footer of the site.', 'simone' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'simone_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function simone_scripts() {
	wp_enqueue_style( 'simone-style', get_stylesheet_uri() );

	if (is_page_template('page-templates/page-nosidebar.php')) {
	    wp_enqueue_style( 'sinome-layout-style' , get_template_directory_uri() . '/layouts/no-sidebar.css');
	} else {
	    wp_enqueue_style( 'sinome-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');
	}

	wp_enqueue_style( 'simone-google-fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic' );
	wp_enqueue_style( 'simone-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );

	if  (file_exists(get_template_directory_uri() . '/js/core/customizer.js')) {
		wp_enqueue_script( 'simone-customizer', get_template_directory_uri() . '/js/core/customizer.js', array('jquery', 'customize-preview'), '20120206', true );
		wp_enqueue_script( 'simone-navigation', get_template_directory_uri() . '/js/core/navigation.js', array('jquery'), '20120206', true );
		wp_enqueue_script( 'simone-skip-link-focus-fix', get_template_directory_uri() . '/js/core/skip-link-focus-fix.js', array(), '20120206', true );
		wp_enqueue_script( 'simone-superfish', get_template_directory_uri() . '/js/extras/superfish.min.js', array('jquery'), '20141014', true );
		wp_enqueue_script( 'simone-superfish-settings', get_template_directory_uri() . '/js/extras/superfish-settings.js', array('jquery'), '20141014', true );
		wp_enqueue_script( 'simone-masonry-settings', get_template_directory_uri() . '/js/extras/masonry-settings.js', array('masonry'), '20141014', true );
		wp_enqueue_script( 'simone-hide-search', get_template_directory_uri() . '/js/extras/hide-search.js', array('jquery'), '20141014', true );
	} else {
		wp_enqueue_script( 'simone-core', get_template_directory_uri() . '/js/core.min.js', array('jquery', 'customize-preview'), '20120206', true );
		wp_enqueue_script( 'simone-extras', get_template_directory_uri() . '/js/extras.min.js', array('jquery', 'masonry'), '20120206', true );
	}

	wp_enqueue_script( 'simone-core', get_template_directory_uri() . '/js/core.min.js', array(), '20120206', true );
	wp_enqueue_script( 'simone-core', get_template_directory_uri() . '/js/extras.min.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'simone_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
