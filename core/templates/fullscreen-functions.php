<?php

// Main loop used in fullscreen.php

function generik_fullscreen_render() {
	do_action( 'generik_fullscreen_start' );
	while ( have_posts() ) : the_post();
		do_action( 'generik_fullscreen_content_before' );
			the_content();
		do_action( 'generik_fullscreen_content_after' );
	endwhile;
	do_action( 'generik_fullscreen_end' );
}
add_action( 'generik_fullscreen', 'generik_fullscreen_render' );

function generik_fullscreen_article_open() { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
}
add_action( 'generik_fullscreen_start', 'generik_fullscreen_article_open', 10 );

function generik_fullscreen_article_close() { ?>
	</article><!-- #post-## -->
<?php	
}
add_action( 'generik_fullscreen_end', 'generik_fullscreen_article_close', 10 );