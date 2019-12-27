<?php

function generik_get_footer() {
	get_footer();
}
add_action( 'generik_footer', 'generik_get_footer', 50 );

function generik_canvas_footer_render() {
	get_footer( 'canvas' );
}
add_action( 'generik_canvas_footer', 'generik_canvas_footer_render', 50 );

function generik_footer_wrapper_open() {
	echo '<footer id="colophon" class="site-footer" role="contentinfo">';
		echo '<div class="wrapper">';
		do_action( 'generik_designer_footer_top_location' );
}
add_action( 'generik_footer_start', 'generik_footer_wrapper_open', 50);

function generik_footer_wrapper_close() {
		do_action( 'generik_designer_footer_bottom_location' );
		echo '</div>';
	echo '</footer>';
	
}
add_action( 'generik_footer_end', 'generik_footer_wrapper_close', 50);

// Custom widget for the Custom Menu widget
if ( ! function_exists( 'generik_footer_menu_widgets' ) ) {
	function generik_footer_menu_widgets() {
		if ( is_active_sidebar( 'sidebar-footer-menu' ) ) {
		echo '<aside id="footer-menu-widget" class="footer-menu-area" role="complementary">';
			echo '<div class="footer-menu-inner">';
				dynamic_sidebar( 'sidebar-footer-menu' );
			echo '</div>';
		echo '</aside>';
		}
	}	
}
add_action( 'generik_footer_render', 'generik_footer_menu_widgets', 10 );

if ( ! function_exists( 'generik_footer_widgets_render' ) ) {
	function generik_footer_widgets_render() {
		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			do_action( 'generik_designer_footer_area_top_location' );
			echo '<aside id="footer-widgets" class="footer-widgets-area" role="complementary">';
				
				dynamic_sidebar( 'sidebar-footer' );
				
			echo '</aside>';
			do_action( 'generik_designer_footer_area_bottom_location' );
		}
	}	
}
add_action( 'generik_footer_render', 'generik_footer_widgets_render', 20 );

function generik_site_info() { 
$footer_text_alignment = get_theme_mod( 'footer-text-aligment' );
?>
	<div class="site-info <?php echo esc_attr( $footer_text_alignment ); ?>">
		<span class="copyright">
			<?php do_action( 'generik_copyright' ); ?>
		</span>		
			<?php 
			$generik_credits = get_theme_mod( 'generik-theme-credits', true );
			if ( true == $generik_credits ) { ?>
				<span class="sep"></span>
				<?php do_action( 'generik_credits' ); 
			} ?>
	</div>
<?php
}
add_action( 'generik_footer_render', 'generik_site_info', 30 );

if ( ! function_exists( 'generik_footer_credits' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function generik_footer_credits() {
		$generik_theme = wp_get_theme();
        $name = $generik_theme->get( 'Name' );
		$url = $generik_theme->get( 'ThemeURI' );
		$author = $generik_theme->get( 'Author' );
		$credits = get_theme_mod( 'generik_footer_credits', true );
		
		if ( true == $credits ) {
		    printf( __( ' Theme: %1$s, designed by %2$s.', 'generik' ), esc_attr( $name ), '<a href="' . esc_url( $url ) . '" alt="' . esc_attr( $name ) . '" title="' . esc_attr( $name ) . '" rel="designer nofollow noopener">' . esc_attr( $author ) . '</a>' );
		}        
	}
	add_action( 'generik_credits', 'generik_footer_credits' );
}

if ( ! function_exists( 'generik_footer_copyright' ) ) {
	/**
	 * Display the theme credit
	 * @since  1.0.0
	 * @return void
	 */
	function generik_footer_copyright() {		
		$copyright = get_theme_mod( 'generik-footer-copyright-text', __( 'Copyright &copy; ', 'generik' ) . get_bloginfo( 'name' ) . ' ' . esc_attr( date_i18n( __( 'Y', 'generik' ) ) ) );
		
		if ( $copyright ) {
			echo wp_kses_post( apply_filters( 'generik_footer_copyright_text', $copyright ) );
		}       
	}
	add_action( 'generik_copyright', 'generik_footer_copyright' );
}