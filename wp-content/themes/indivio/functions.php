<?php
/**
 * Indivio functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Indivio
 */

if ( ! function_exists( 'indivio_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function indivio_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Indivio, use a find and replace
		 * to change 'indivio' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'indivio', get_template_directory() . '/languages' );

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
		add_image_size( 'indivio-featured-image', 2000, 1200, true );
        add_image_size( 'indivio-recent-thumbnails', 90, 90, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'indivio' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Unregister default widgets
		 */
		function eb_unregister_widgets(){
			unregister_widget('WP_Widget_Pages');
			unregister_widget('WP_Widget_Calendar');
			unregister_widget('WP_Widget_Archives');
			unregister_widget('WP_Widget_Links');
			unregister_widget('WP_Widget_Meta');
			unregister_widget('WP_Widget_Search');
			unregister_widget('WP_Widget_Text');
			unregister_widget('WP_Widget_Categories');
			unregister_widget('WP_Widget_Recent_Posts');
			unregister_widget('WP_Widget_Recent_Comments');
			unregister_widget('WP_Widget_RSS');
			unregister_widget('WP_Widget_Tag_Cloud');
			unregister_widget('WP_Nav_Menu_Widget');
			unregister_widget('WP_Widget_Media_Audio');
			unregister_widget('WP_Widget_Media_Image');
			unregister_widget('WP_Widget_Media_Gallery');
			unregister_widget('WP_Widget_Media_Video');
			unregister_widget('WP_Widget_Custom_HTML');
		}
		add_action( 'widgets_init', 'eb_unregister_widgets' );

		function remove_dashboard_widgets() {
		    global $wp_meta_boxes;

		    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
		    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
		    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
		    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

		}

		add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

		/**
		 * Unregister default blocks
		 */
		 add_filter( 'allowed_block_types', 'eb_allowed_block_types' );

		 function eb_allowed_block_types( $allowed_blocks ) {

			$allowed_blocks = array(
		 		'core/image',
		 		'core/paragraph',
		 		'core/heading',
		 		'core/spacer',
		 		'core/columns',
		 		'core/group',
				'acf/block-info',
				'acf/block-list',
				'acf/block-button',
				'acf/block-sponsors',
				'acf/block-matches',
				'acf/block-contact-form',
		 	);

			if ( is_plugin_active( 'doneren-met-mollie/doneren-met-mollie.php' ) && get_option('dmm_mollie_apikey') ) {
			   array_push($allowed_blocks, 'acf/block-donation');
			}

		 	return $allowed_blocks;

		 }
	}
endif;
add_action( 'after_setup_theme', 'indivio_setup' );

define("THEME_DIR", get_template_directory_uri());

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function indivio_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'indivio' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'indivio' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'indivio_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function indivio_scripts() {
	wp_enqueue_style( 'normalize-css', THEME_DIR . '/css/vendor/normalize.css' );
	wp_enqueue_style( 'famfamfam-flags', THEME_DIR . '/css/vendor/famfamfam-flags.min.css' );
	wp_enqueue_style( 'indivio-style', get_stylesheet_uri() );

	wp_enqueue_style( 'theme-styles', THEME_DIR . '/css/theme-styles.css' );
	$custom_css = theme_get_customizer_css();
  	wp_add_inline_style( 'theme-styles', $custom_css );

	wp_register_script( 'modernizr', THEME_DIR . '/js/vendor/modernizr-3.5.0.min.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'modernizr' );
    wp_register_script( 'main', THEME_DIR . '/js/main.js', array( 'jquery' ), '1', true );
    wp_enqueue_script( 'main' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'indivio_scripts' );

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

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
 * Customizer Sass.
 */
require get_template_directory() . '/inc/theme-color.php';

/**
 * Twitch API.
 */
require get_template_directory() . '/inc/faceit-api.php';

/**
 * FaceIt API.
 */
require get_template_directory() . '/inc/twitch-api.php';

/**
 * Custom Messages.
 */
require get_template_directory() . '/inc/custom-messages.php';

/**
 * Duplicate Post
 */
require get_template_directory() . '/inc/duplicate-post.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Better Comments file.
 */
require_once get_parent_theme_file_path( '/template-parts/better-comments.php' );
