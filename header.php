<?php
/**
 * The header for our theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php 
	do_action( 'generik_in_head' );
wp_head(); ?>
</head>
<?php do_action( 'generik_before_body' ); ?>
<body <?php body_class(); ?>>

<?php
/*
 * Here we'll hook all of the functions needed to get the layout in shape!
 */ 
do_action( 'generik_after_body' );

	do_action( 'generik_header_before' );
		do_action( 'generik_header' );
	do_action( 'generik_header_after' );

do_action( 'generik_page_open' ); ?>
