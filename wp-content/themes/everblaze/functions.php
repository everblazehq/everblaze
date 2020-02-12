<?php
/**
 * everblaze functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package everblaze
 */

if ( ! function_exists( 'everblaze_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function everblaze_setup() {
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'everblaze_setup' );

define("THEME_DIR", get_template_directory_uri());

/**
 * Enqueue scripts and styles.
 */

function everblaze_scripts() {
	wp_enqueue_style( 'normalize-css', THEME_DIR . '/css/vendor/normalize.css' );
	wp_enqueue_style( 'everblaze-style', get_stylesheet_uri() );

	wp_register_script( 'modernizr', THEME_DIR . '/js/vendor/modernizr-3.5.0.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'modernizr' );
	wp_register_script( 'simpleparallax', THEME_DIR . '/js/vendor/simpleParallax.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'simpleparallax' );
	wp_register_script( 'waypoints', THEME_DIR . '/js/vendor/jquery.waypoints.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'waypoints' );
	wp_register_script( 'inview', THEME_DIR . '/js/vendor/inview.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'inview' );
	wp_register_script( 'detectmobilebrowser', THEME_DIR . '/js/vendor/detectmobilebrowser.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'detectmobilebrowser' );
    wp_register_script( 'plugins', THEME_DIR . '/js/plugins.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'plugins' );
    wp_register_script( 'main', THEME_DIR . '/js/main.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'everblaze_scripts' );

?>
