<?php
/**
 * The header for our canvas template
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<?php do_action( 'generik_canvas_body_before' ); ?>

<body <?php body_class(); ?>>

<?php do_action( 'generik_canvas_body_after' );