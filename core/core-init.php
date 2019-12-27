<?php

/**
 * Let's get all of our components loaded.
 */
require get_parent_theme_file_path( '/core/header/header-functions.php' );
require get_parent_theme_file_path( '/core/index/index-functions.php' );
require get_parent_theme_file_path( '/core/single/single-functions.php' );
require get_parent_theme_file_path( '/core/page/page-functions.php' );
require get_parent_theme_file_path( '/core/archive/archive-functions.php' );
require get_parent_theme_file_path( '/core/templates/canvas-functions.php' );
require get_parent_theme_file_path( '/core/templates/fullscreen-functions.php' );
require get_parent_theme_file_path( '/core/footer/footer-functions.php' );
require get_parent_theme_file_path( '/core/sidebar/sidebar-functions.php' );
require get_parent_theme_file_path( '/core/search/search-functions.php' );
require get_parent_theme_file_path( '/core/attachment/attachment-functions.php' );

require get_parent_theme_file_path( '/core/common-functions.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Implement the theme Customizer features.
 */

require get_parent_theme_file_path( '/inc/customizer/acid/acid.php' );

require get_parent_theme_file_path( '/inc/customizer-data.php' );

require get_parent_theme_file_path( '/inc/customizer/generik-custom-output.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Let's fire the GeneriK engine up!
 */
function generik() {
	
	if ( is_page_template( 'page-templates/canvas.php' ) ) {
		/**
		 * generik_canvas_header hook.
		 *
		 * @hooked generik_canvas_header_render - 50
		 */
		do_action( 'generik_canvas_header' );
		
			/**
			 * generik_canvas hook.
			 *
			 * @hooked generik_canvas_render - 50
			 */
			do_action( 'generik_canvas' );
			
		/**
		 * generik_canvas_footer hook.
		 *
		 * @hooked generik_canvas_footer_render - 50
		 */	
		do_action( 'generik_canvas_footer' );
		
	} else {
		
		/**
		 * generik_get_header hook.
		 *
		 * @hooked generik_header_render - 50
		 */
		do_action( 'generik_get_header' );
		
		if ( is_single() ) {
			/**
			 * generik_single hook.
			 *
			 * @hooked generik_single_render - 50
			 */
			do_action( 'generik_single' );
			
		} elseif ( is_front_page() || is_home() ) {
			/**
			 * generik_index hook.
			 *
			 * @hooked generik_index_render - 50
			 */
			do_action( 'generik_index' );
			
		} elseif ( is_archive() ) {
			/**
			 * generik_archive hook.
			 *
			 * @hooked generik_archive_render - 50
			 */
			do_action( 'generik_archive' );
			
		} elseif ( is_page() ) {
			/**
			 * generik_page hook.
			 *
			 * @hooked generik_page_render - 50
			 */
			do_action( 'generik_page' );
			
		}
		elseif ( is_page_template( 'page-templates/fullscreen.php' ) ) {
			/**
			 * generik_fullscreen hook.
			 *
			 * @hooked generik_fullscreen_render - 50
			 */
			do_action( 'generik_fullscreen' );
			
		}
		elseif ( is_search() ) {
			/**
			 * generik_search hook.
			 *
			 * @hooked generik_search_render - 50
			 */
			do_action( 'generik_search' );
			
		}
		
		/**
		 * generik_footer hook.
		 *
		 * @hooked generik_footer_render - 50
		 */
		do_action( 'generik_footer' );
		
	}
	
}

function generik_404_render() {
	echo '<div class="wrapper">';
		echo '<div id="primary" class="content-area">';
			echo '<main id="main" class="site-main" role="main">';

				echo '<section class="error-404 not-found">';
					echo '<header class="page-header">';
						echo '<h1 class="page-title">';
							_e( 'Oops! That page can&rsquo;t be found.', 'generik' );
						echo '</h1>';
					echo '</header><!-- .page-header -->';
					echo '<div class="page-content">';
						echo '<p>';
							_e( 'It looks like nothing was found at this location. Maybe try a search?', 'generik' );
						echo '</p>';

						get_search_form();

					echo '</div><!-- .page-content -->';
				echo '</section><!-- .error-404 -->';
			echo '</main><!-- #main -->';
		echo '</div><!-- #primary -->';
	echo '</div><!-- .wrapper -->';
}
add_action( 'generik_404', 'generik_404_render' );