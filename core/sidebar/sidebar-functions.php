<?php

function generik_sidebar() {
	get_sidebar();
}
add_action( 'generik_posts_end', 'generik_sidebar', 60 );
add_action( 'generik_single_end', 'generik_sidebar', 60 );
add_action( 'generik_archive_end', 'generik_sidebar', 60 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function generik_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'generik' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'generik' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'container_selector' => '#secondary',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Navigation', 'generik' ),
		'id'            => 'sidebar-footer-menu',
		'description'   => esc_html__('Preformated widget for menu in the footer. Only add the Navigation Menu Widget here!', 'generik' ),
		'before' => '<div class="footer-menu-widgets"><div class="widget-area"><div class="footer-menu-wrap">',
		'after'  => '</div></div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'container_selector' => '#widget-area',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area', 'generik' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__('Spruce up your footer area with your widgets of choice. Widgets placed here will be displayed in a 4 column format dropping down to 2 and 1 for mobile devices!', 'generik' ),
		'before' => '<section id="%1$s" class="widget %2$s">',
		'after'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'container_selector' => '#widget-area',
	) );
	
}
add_action( 'widgets_init', 'generik_widgets_init' );