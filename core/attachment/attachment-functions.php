<?php

function generik_get_attachment_parent_link() {
	
	if ( !is_attachment() ) return false;
	
	$attachment   = get_queried_object();
	$parent_url   = get_permalink( $attachment->post_parent );
	$parent_title = get_post( $attachment->post_parent )->post_title;
	
	$link = apply_filters( 'generik_attachment_published_in_lead', __( 'Published in: ', 'generik' ) ) . '<a href="'. esc_url( $parent_url ) .'">' . $parent_title .'</a>';
	
	return $link;
	
}

function generik_attachment_render() {
	
	echo '<div class="attachment-container">';
		echo wp_get_attachment_image( get_the_ID(), 'large' );
		//$attachment_id = wp_get_attachment_id();
		$attachment = get_post();
		$caption 	= $attachment->post_excerpt;
		$content 	= $attachment->post_content;
		$origin 	= generik_get_attachment_parent_link();
			echo '<h1 class="entry-title">' . apply_filters( 'generik_attachment_title_lead', __( 'Title: ', 'generik' ) ) . $attachment->post_title . '</h1>';
			if ( $caption != '' ) {
				echo '<p class="attachment-caption">' . apply_filters( 'generik_attachment_caption_lead', __( 'Caption: ', 'generik' ) ) . $caption . '</p>';
			}
			if ( $content != '' ) {
				echo esc_attr( $content );
			}
			
			echo '<p class="attachment-post-link">' . $origin . '</p>';
		
	echo '</div>';
	
}
add_action( 'generik_attachment', 'generik_attachment_render', 50 );