<?php

// Page loop used in page.php & maybe other page templates
function generik_page_render() {
	do_action( 'generik_page_start' );
	while ( have_posts() ) : the_post();
		do_action( 'page_content_before' );
			the_content();
			do_action( 'generik_paged_page' );
		do_action( 'page_content_after' );
		// If comments are open or we have at least one comment, load up the comment template.
		do_action( 'generik_page_comments_start' );
			do_action( 'generik_comments' );
		do_action( 'generik_page_comments_end' );
	endwhile;
	do_action( 'generik_page_end' );
}
add_action( 'generik_page', 'generik_page_render', 50 );


function generik_page_article_open() { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
}
add_action( 'page_content_before', 'generik_page_article_open', 10 );

function generik_page_article_close() { ?>
	</article><!-- #post-## -->
<?php	
}
add_action( 'page_content_after', 'generik_page_article_close', 10 );

function generik_page_header_render() {
	echo '<header class="entry-header">'; 
		do_action( 'generik_page_title_before' );
			the_title( '<h1 class="entry-title">', '</h1>' );
		do_action( 'generik_page_title_after' );
	echo '</header>';

}
add_action( 'page_content_before', 'generik_page_header_render', 30 );