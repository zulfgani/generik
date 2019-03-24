<?php

function generik_index_render() {	
	do_action( 'main_loop' );	
}
add_action( 'generik_index', 'generik_index_render', 50 );

// Main loop used in index.php & maybe home.php
function generik_main_loop() {
	do_action( 'generik_posts_start' );
	if ( have_posts() ) :
	
		do_action( 'generik_loop_start' );
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			
			/**
			 * generik_post_content_before hook.
			 *
			 * @hooked generik_index_content_open - 50
			 */
			do_action( 'generik_post_content_before' );
			
				/**
				 * generik_index_content_render hook.
				 *
				 * @hooked generik_index_content_header - 50
				 * @hooked generik_index_content_output - 60
				 */
				do_action( 'generik_index_content_render' );
				
				
			/**
			 * generik_post_content_after hook.
			 *
			 * @hooked generik_index_content_close - 50
			 */	
			do_action( 'generik_post_content_after' );

		endwhile;
		/**
		 * generik_loop_end hook.
		 *
		 * @hooked generik_posts_pagination - 20
		 */
		do_action( 'generik_loop_end' );
		
	endif;
	do_action( 'generik_posts_end' );
}
add_action( 'main_loop', 'generik_main_loop' );

// Article Wrapper
function generik_index_content_open() { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
	<?php
}
add_action( 'generik_post_content_before', 'generik_index_content_open', 50 );

// Article Wrapper Closer
function generik_index_content_close() {
	echo '</article>';
}
add_action( 'generik_post_content_after', 'generik_index_content_close', 50 );

// Return Article Titles
function generik_index_content_header() { 
	echo '<header class="entry-header">';
		do_action( 'generik_index_title_before' );
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );			
		do_action( 'generik_index_title_after' );
			echo '<div class="entry-meta">';
				generik_posted_on();
			echo '</div><!-- .entry-meta -->';
		do_action( 'generik_index_postedon_after' );
	echo '</header>';
}
add_action( 'generik_index_content_render', 'generik_index_content_header', 50 );

// Return Article Excerpts
function generik_index_content_output() { 
	echo '<div class="entry-summary">';
		the_excerpt();
	echo '</div>';	
}
add_action( 'generik_index_content_render', 'generik_index_content_output', 60 );

function generik_posts_pagination() {
	the_posts_pagination( array(
		'<span class="screen-reader-text">' . __( 'Previous page', 'generik' ) . '</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'generik' ) . '</span>',
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'generik' ) . ' </span>',
	) );
}
add_action( 'generik_loop_end', 'generik_posts_pagination', 20 );

add_action( 'generik_index_title_before', 'generik_featured_image', 20 );

