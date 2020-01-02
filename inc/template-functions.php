<?php
/**
 * Additional features to allow styling of the templates
 *
 * @package GeneriK
 * @since 1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function generik_body_classes( $classes ) {
	$classes[] = 'generik';
	// Add class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Add class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class if we're viewing the Customizer for easier styling of theme options.
	if ( is_customize_preview() ) {
		$classes[] = 'generik-customizer';
	}
	
	if ( get_theme_mod( 'navbar-sticky-position', false ) ) {
		$classes[] = 'navbar-sticky-position';
	}
	
	if ( get_theme_mod( 'site-footer-fixed', false ) ) {
		$classes[] = 'footer-bottom-fixed';
	}

	// Add class on front page.
	if ( generik_is_frontpage() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'generik-front-page';
	}

	// Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}

	// Add class if sidebar is used.
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}
	
	// Add class if sidebar is not used.
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'no-sidebar';
	}

	// Add class if the site title and tagline is hidden.
	if ( 'blank' === get_header_textcolor() ) {
		$classes[] = 'title-tagline-hidden';
	}

	return $classes;
}
add_filter( 'body_class', 'generik_body_classes' );

/**
 * Checks to see if we're on the homepage or not.
 */
function generik_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}