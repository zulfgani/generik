<?php

// Page loop used in page.php & maybe other page templates
function generik_canvas_render() {
	do_action( 'generik_canvas_start' );
	while ( have_posts() ) : the_post();
		do_action( 'generik_canvas_content_before' );
		the_content();
		do_action( 'generik_canvas_content_after' );
	endwhile;
	do_action( 'generik_canvas_end' );
}
add_action( 'generik_canvas', 'generik_canvas_render' );