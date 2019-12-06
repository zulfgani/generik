<?php

function generik_comments_render() {
	// If comments are open or we have at least one comment, load up the comment template.	
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}
add_action( 'generik_comments', 'generik_comments_render', 50 );

function generik_link_pages() {
	wp_link_pages( array(
		'before'      => '<div class="page-links">' . __( 'Pages:', 'generik' ),
		'after'       => '</div>',
		'link_before' => '<span class="page-number">',
		'link_after'  => '</span>',
	) );
}
add_action( 'generik_paged_post', 'generik_link_pages', 20 );
add_action( 'generik_paged_page', 'generik_link_pages', 20 );

function generik_page_container_start() {
	echo '<div id="page" class="site">';	
}
add_action( 'generik_page_open', 'generik_page_container_start', 10 );

function generik_page_container_end() {	
	echo '</div>'; // End of content container
}
add_action( 'generik_page_close', 'generik_page_container_end', 60 );

function generik_content_wrapper_start() {
	echo '<div class="wrapper">';
}
add_action( 'generik_posts_start', 'generik_content_wrapper_start', 30 );
add_action( 'generik_page_start', 'generik_content_wrapper_start', 30 );
add_action( 'generik_single_start', 'generik_content_wrapper_start', 30 );
add_action( 'generik_archive_start', 'generik_content_wrapper_start', 50 );
add_action( 'generik_search_start', 'generik_content_wrapper_start', 10 );

function generik_content_wrapper_end() {
	echo '</div>'; // End of content wrapper
}
add_action( 'generik_posts_end', 'generik_content_area_end', 50 );
add_action( 'generik_page_end', 'generik_content_area_end', 50 );
add_action( 'generik_single_end', 'generik_content_area_end', 50 );
add_action( 'generik_archive_end', 'generik_content_area_end', 50 );
add_action( 'generik_search_end', 'generik_content_area_end', 100 );

function generik_content_area_start() {	
	echo '<div id="primary" class="content-area">';
		echo '<main id="main" class="site-main" role="main">';
}
add_action( 'generik_posts_start', 'generik_content_area_start', 50 );
add_action( 'generik_page_start', 'generik_content_area_start', 50 );
add_action( 'generik_single_start', 'generik_content_area_start', 50 );
add_action( 'generik_archive_start', 'generik_content_area_start', 50 );

function generik_content_area_end() {
	echo '</main>';
	echo '</div>';
}
add_action( 'generik_posts_end', 'generik_content_area_end', 50 );
add_action( 'generik_page_end', 'generik_content_area_end', 50 );
add_action( 'generik_single_end', 'generik_content_area_end', 50 );
add_action( 'generik_archive_end', 'generik_content_area_end', 50 );

function generik_featured_image() {
	if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'generik-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php 
	elseif ( '' !== get_the_post_thumbnail() && is_single() ) : ?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'generik-large-image' ); ?>
		</div>
	<?php endif;
}
