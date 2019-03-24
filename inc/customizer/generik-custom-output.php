<?php
/**
 * GeneriK.
 *
 * This file adds the required CSS to the front end to the GeneriK Theme.
 *
 * @package GeneriK
 * @author  ClassicDesigner
 * @license GPL-2.0+
 * @link    https://classicdesigner.co.uk/
 */

/**
* Checks the settings for the link color, and accent color.
* If any of these value are set the appropriate CSS is output.
*
* @since 1.0.0
*/
function generik_css() {
	if ( wp_get_theme()->get('Name') != 'GeneriK' ) {
		$theme_style = 'generik-child-style';
	} else {
		$theme_style = 'generik-style';
	}
	$handle  = $theme_style;

	$site_title			= get_theme_mod( 'site-title-color', generik_customizer_get_site_title_color() );
	$site_title_hover	= get_theme_mod( 'site-title-hover', generik_customizer_get_site_title_hover() );
	$site_desc			= get_theme_mod( 'site-desc-color', generik_customizer_get_site_description_color() );
	$navbar_bg 			= get_theme_mod( 'navbar-bg-color', generik_customizer_get_navbar_background_color() );
	$item_color 		= get_theme_mod( 'menu-item-color', generik_customizer_get_menu_item_color() );
	$item_hover			= get_theme_mod( 'menu-item-hover', generik_customizer_get_menu_item_hover_color() );
	
	$footer_text		= get_theme_mod( 'footer-text-color', generik_customizer_get_footer_text_color() );
	$footer_link		= get_theme_mod( 'footer-link-color', generik_customizer_get_footer_link_color() );
	$footer_hover		= get_theme_mod( 'footer-link-hover', generik_customizer_get_footer_link_hover_color() );
	
	$header_width 		= get_theme_mod( 'generik-header-width', 2000 );
	$header_inline		= get_theme_mod( 'header-design-toggle', 'center' );
	
	$content_width 		= get_theme_mod( 'no-sidebar-content-width', 1140 );
	//$color_accent_pri 		= get_theme_mod( 'generik_accent_primary', generik_customizer_get_default_accent_primary() );
	//$color_accent_sec 		= get_theme_mod( 'generik_accent_secondary', generik_customizer_get_default_accent_secondary() );
	//$color_button_pri 		= get_theme_mod( 'generik_button_primary', generik_customizer_get_default_button_primary() );
	//$color_button_sec 		= get_theme_mod( 'generik_button_secondary', generik_customizer_get_default_button_secondary() );

	$css = '';
	//* Calculate Color Contrast
	function actions_color_contrast( $color ) {
	
		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

		$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

		return ( $luminosity > 128 ) ? '#333333' : '#ffffff';

	}
	
	//* Calculate Color Brightness
	function actions_color_brightness( $color, $change ) {

		$hexcolor = str_replace( '#', '', $color );

		$red   = hexdec( substr( $hexcolor, 0, 2 ) );
		$green = hexdec( substr( $hexcolor, 2, 2 ) );
		$blue  = hexdec( substr( $hexcolor, 4, 2 ) );
	
		$red   = max( 0, min( 255, $red + $change ) );
		$green = max( 0, min( 255, $green + $change ) );  
		$blue  = max( 0, min( 255, $blue + $change ) );

		return '#'.dechex( $red ).dechex( $green ).dechex( $blue );

	}

	$css .= sprintf( '.desktop-nav-wrapper {max-width: %spx;}', $header_width );
	$css .= ( generik_customizer_get_site_title_color() !== $site_title ) ? sprintf( '.site-logo .site-title a{color: %s;}', $site_title ) : '';
	$css .= ( generik_customizer_get_site_title_hover() !== $site_title_hover ) ? sprintf( '.site-logo .site-title a:hover{color: %s;}', $site_title_hover ) : '';
	$css .= ( generik_customizer_get_site_description_color() !== $site_desc ) ? sprintf( '.site-description{color: %s;}', $site_desc ) : '';
	$css .= ( generik_customizer_get_navbar_background_color() !== $navbar_bg ) ? sprintf( '.desktop-nav-wrapper, .desktop-nav {background-color: %s;}', $navbar_bg ) : '';
	$css .= ( generik_customizer_get_menu_item_color() !== $item_color ) ? sprintf( '.desktop-nav ul > li > a{color: %s;}', $item_color ) : '';
	$css .= ( generik_customizer_get_menu_item_hover_color() !== $item_hover ) ? sprintf( '.desktop-nav ul > li > a:hover{color: %s;}', $item_hover ) : '';
	
	$css .= ( generik_customizer_get_footer_text_color() !== $footer_text ) ? sprintf( '.site-footer{color: %s;}', $footer_text ) : '';
	$css .= ( generik_customizer_get_footer_link_color() !== $footer_link ) ? sprintf( '.site-info a{color: %s;}', $footer_link ) : '';
	$css .= ( generik_customizer_get_footer_link_hover_color() !== $footer_hover ) ? sprintf( '.site-info a:hover{color: %s;}', $footer_hover ) : '';
	
	$css .= sprintf( '.desktop-nav-wrapper {max-width: %spx; margin: 0 auto;}', $header_width );
	if ( $header_inline == 'inline' ) {
		$css .= sprintf( '@media screen and (min-width: 48em) {.desktop-nav-wrapper {display: flex;}}' );
	}
	$css .= sprintf( '.no-sidebar .site .content-area, .page-template-default .content-area {max-width: %spx;}', $content_width );
	//$css .= ( generik_customizer_get_default_button_primary() !== $color_button_pri ) ? sprintf( 'input[type="submit"],input[type="button"],.header-elements .widget-area .button,.header-elements .widget-area a.button.small, .header-elements .widget-area button.small,.enews-widget input[type="submit"],.comments-area .form-submit .submit{background-color: %s; color: %s;}', $color_button_pri, actions_color_contrast( $color_button_pri ) ) : '';
	//$css .= ( generik_customizer_get_default_button_secondary() !== $color_button_sec ) ? sprintf( 'input[type="submit"]:hover,input[type="submit"]:focus,input[type="button"]:hover,input[type="button"]:focus,.header-elements .widget-area .button:hover,.header-elements .widget-area a.button.small:hover,.header-elements .widget-area button.small:hover,.header-elements .widget-area .button:focus,.header-elements .widget-area a.button.small:focus,.header-elements .widget-area button.small:focus,#secondary.enews-widget input:hover[type="submit"],.enews-widget input:focus[type="submit"],.comments-area .form-submit .submit:hover{background-color: %s; color: %s;}', $color_button_sec, actions_color_contrast( $color_button_sec ) ) : '';

	wp_add_inline_style( $handle, $css );

}
add_action( 'wp_enqueue_scripts', 'generik_css', 9999 );