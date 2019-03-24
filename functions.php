<?php

/**
 * GeneriK functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GeneriK
 * @since 1.0.0
 */


/**
 * Assign the Actions version to a var
 */
$theme 			  = wp_get_theme( 'generik' );
$generik_version  = $theme['Version'];

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function generik_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/nore
	 * If you're building a theme based on GeneriK, use a find and replace
	 * to change 'generik' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'generik' );

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
	add_image_size( 'nore-featured-image', 1140, 450, true );
	add_image_size( 'nore-single-image', 780, 400, true );
	add_image_size( 'nore-large-image', 1600, 700, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 1600;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => __( 'Primary', 'generik' ),
		'devices'    => __( 'Mobile Devices', 'generik' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
}
add_action( 'after_setup_theme', 'generik_setup' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since GeneriK 1.0.0
 */
function generik_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'generik_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function generik_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'generik_pingback_header' );

/**
 * Enqueue scripts and styles.
 */
function generik_scripts() {
	global $generik_version;
	$parent_style = 'generik-style'; // This is handle for the GeneriK theme.
	$child_style = 'generik-child-style'; // This is handle for the GeneriK child themes.
	
	// Theme stylesheet.
	if ( wp_get_theme()->get('Name') != 'GeneriK' ) {
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(), $generik_version );
		wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $generik_version );
	} else {
		wp_enqueue_style( $parent_style, get_stylesheet_uri(), array(), $generik_version );
	}
	
	wp_enqueue_script( 'generik-skip-link-focus-fix', get_theme_file_uri( '/core/assets/js/skip-link-focus-fix.js' ), array(), $generik_version, true );
	wp_enqueue_script( 'generik-navigation', get_theme_file_uri( '/core/assets/js/navigation.js' ), array( 'jquery' ), $generik_version, true );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'generik_scripts' );

require get_parent_theme_file_path( '/core/core-init.php' );
