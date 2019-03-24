<?php

function generik_search_render() {	
	do_action( 'search_loop' );	
}
add_action( 'generik_search', 'generik_search_render', 50 );

// Main loop used in index.php & maybe home.php
function generik_search_loop() {
	do_action( 'generik_search_start' );
	if ( have_posts() ) :
	
		do_action( 'generik_loop_start' );
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			
			/**
			 * generik_post_content_before hook.
			 *
			 * @hooked generik_search_content_open - 50
			 */
			do_action( 'generik_post_content_before' );
			
				/**
				 * generik_search_content_render hook.
				 *
				 * @hooked generik_search_content_header - 50
				 * @hooked generik_search_content_output - 60
				 */
				do_action( 'generik_search_content_render' );				
				
			/**
			 * generik_post_content_after hook.
			 *
			 * @hooked generik_search_content_close - 50
			 */	
			do_action( 'generik_post_content_after' );

		endwhile;
		/**
		 * generik_loop_end hook.
		 *
		 * @hooked generik_search_pagination - 20
		 */
		do_action( 'generik_loop_end' );
		
	endif;
	do_action( 'generik_search_end' );
}
add_action( 'search_loop', 'generik_search_loop' );

// Article Wrapper
function generik_search_content_open() { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<?php
}
add_action( 'generik_post_content_before', 'generik_search_content_open', 50 );

// Article Wrapper Closer
function generik_search_content_close() {
	echo '</article>';
}
add_action( 'generik_post_content_after', 'generik_search_content_close', 50 );

// Return Article Titles
function generik_search_content_header() { 
	echo '<header class="entry-header">';
		do_action( 'generik_search_title_before' );
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );			
		do_action( 'generik_search_title_after' );
			echo '<div class="entry-meta">';
				generik_posted_on();
			echo '</div><!-- .entry-meta -->';
		do_action( 'generik_search_postedon_after' );
	echo '</header>';
}
add_action( 'generik_search_content_render', 'generik_search_content_header', 50 );

function generik_search_results_header() {	
	echo '<div class="no-results">';
	echo '<header class="page-header">';		 
		if ( have_posts() ) {
			echo '<h1 class="page-title">';
				printf( __( 'Search Results for: %s', 'generik' ), '<span>' . get_search_query() . '</span>' );
			echo '</h1>';
		} else {
			do_action( 'generik_no_results' );
		} 		
	echo '</header>';
	echo '</div>';
}
add_action( 'generik_search_start', 'generik_search_results_header', 30 );

// Return Article Excerpts
function generik_search_content_output() { 
	echo '<div class="entry-summary">';
		the_excerpt();
	echo '</div>';	
}
add_action( 'generik_search_content_render', 'generik_search_content_output', 60 );

add_action( 'generik_search_title_before', 'generik_featured_image', 20 );

function generik_search_no_results() { ?>
	<h1 class="page-title"><?php printf( __( 'Nothing Found for: %s', 'generik' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	<p class="nothing-found"><?php _e( 'Sorry, but nothing matched your search term(s). Please try again with some different keywords.', 'generik' ); ?></p>
<?php
	get_search_form();
}
add_action( 'generik_no_results', 'generik_search_no_results' );