<?php
/**
 * The template for displaying the footer
 */
do_action( 'generik_page_close' );

do_action( 'generik_footer_start' );
	do_action( 'generik_footer_render' );
do_action( 'generik_footer_end' );

wp_footer(); ?>

</body>
</html>