<?php

// Single post loop used in single.php
function generik_single_render() {
	do_action( 'generik_single_start' );
	
	while ( have_posts() ) : the_post();
	
		do_action( 'generik_single_content_before' );
		
			do_action( 'generik_single_article' );
			
		do_action( 'generik_single_content_after' );
		
			do_action( 'generik_post_comments_start' );
			
				do_action( 'generik_comments' );
				
			do_action( 'generik_post_comments_end' );
			
		do_action( 'generik_posts_pagination' );

	endwhile;
	
	do_action( 'generik_single_end' );
}
add_action( 'generik_single', 'generik_single_render' );

function generik_single_article_render() { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php 
				do_action( 'generik_single_title_before' );
					the_title( '<h1 class="entry-title">', '</h1>' );
				do_action( 'generik_single_title_after' );
					echo '<div class="entry-meta">';
						generik_posted_on();
					echo '</div><!-- .entry-meta -->';
				do_action( 'generik_single_posted_after' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			/* translators: %s: Name of current post */
			do_action( 'generik_single_entry_before' );
				the_content();
			do_action( 'generik_single_entry_after' );

			do_action( 'generik_paged_post' );
			?>
		</div><!-- .entry-content -->
		<?php 
		do_action( 'generik_entry_footer_after' );
			generik_entry_footer(); 
		do_action( 'generik_entry_footer_after' );
		?>
	</article><!-- #post-## -->
<?php
}
add_action( 'generik_single_article', 'generik_single_article_render' );

function generik_posts_navigation_render() {
	the_post_navigation( array(
		'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'generik' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'generik' ) . '</span> <span class="nav-title">%title</span>',
		'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'generik' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'generik' ) . '</span> <span class="nav-title">%title</span>',
	) );
}
add_action( 'generik_posts_navigation', 'generik_posts_navigation_render', 50 );

add_action( 'generik_single_title_before', 'generik_featured_image', 30 );