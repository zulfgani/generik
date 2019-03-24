<?php
/*
 * Function that calls the main header for the site
 */
function generik_render_header() {
	get_header();
}
add_action( 'generik_get_header', 'generik_render_header', 50 );
/*
 * Function that calls the canvas header for our custom template
 */
function generik_canvas_header_render() {
	get_header( 'canvas' );
}
add_action( 'generik_canvas_header', 'generik_canvas_header_render', 50 );

 
function generik_main_menu_render() { 
	$header_text_alignment = get_theme_mod( 'header-design-toggle', 'center' );	
?> 
	<div id="masthead" class="site-header" role="banner">
	<header class="desktop-nav-wrapper">
	<?php 
		
		do_action( 'desktop_nav_before' ); 
		$generik_brand = get_theme_mod( 'site-brand-on', true );
		$generik_desc = get_theme_mod( 'site-desc-on', true );
		$description = get_bloginfo( 'description');
		if ( true == $generik_brand ) {
	?>
		<div class="site-logo <?php echo $header_text_alignment; ?>" itemscope="itemscope" itemtype="http://schema.org/Organization">
			<?php generik_branding(); 
			if ( true == $generik_desc ) { ?>
				<p class="site-description <?php echo $header_text_alignment; ?> "> <?php echo esc_attr( $description ); /* WPCS: xss ok. */?></p>
			<?php }
			?>
		</div>
		<?php } ?>
		<div class="wrapper">
			<?php do_action( 'desktop_nav_menu_before' ); ?>
			<nav itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" class="desktop-nav <?php echo $header_text_alignment; ?>">						
				<?php wp_nav_menu( array( 'theme_location'=> 'primary', 'container'=> 'navigation' ) );?>			
			</nav>
			<?php do_action( 'desktop_nav_menu_after' ); ?>
		</div>
	<?php 
		do_action( 'desktop_nav_after' ); 
		
	?>
	</header>
	</div>
	
	<header class="mobile-nav-wrapper">
		<?php do_action( 'mobile_nav_before' ); ?>
		<div class="site-logo" itemscope="itemscope" itemtype="http://schema.org/Organization">
			<?php generik_branding(); ?>
		</div>
		<div class="toggle-nav">
			<?php echo generik_get_svg( array( 'icon' => 'bars' ) ); ?>
		</div>
		<nav itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" class="mobile-nav">
			<?php 
				do_action( 'mobile_nav_menu_before' );
					wp_nav_menu( array( 'theme_location'=> 'devices', 'container'=> 'navigation' ) );
				do_action( 'mobile_nav_menu_after' ); 
			?>
		</nav>
		<?php do_action( 'mobile_nav_after' ); ?>
	</header>
<?php
	
}
add_action( 'generik_header', 'generik_main_menu_render', 10 );

function generik_branding() {
	if( has_custom_logo() ) {
		the_custom_logo(); 
	} else {
		generik_site_title_render();
	}
}

function generik_site_title_render() {
	?>
	<h1 class="site-title">
	<?php					
		$title = get_bloginfo('name');
		$description = get_bloginfo( 'description'); 
	?>						
		<a itemprop="url" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $description ); /* WPCS: xss ok. */ ?>" alt="<?php echo esc_attr( $title ); ?>">
			<?php bloginfo( 'name' ); ?>
		</a>
	</h1>
	<?php
}

function generik_home_logo() { 
	if ( wp_get_theme()->get('Name') != 'GeneriK' ) {
		$theme_style = 'generik-child-style';
	} else {
		$theme_style = 'generik-style';
	}
	$handle  = $theme_style;
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo_render = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	$centered_logo = '';

	$centered_logo .= 'header .desktop-nav ul > li.site-brand a {background-size: contain; background-image: url(' . esc_url( $logo_render[0] ) . ');}';
	
	wp_add_inline_style( $handle, $centered_logo );
}
add_action( 'wp_enqueue_scripts', 'generik_home_logo', 200 );

function generik_custom_enqueue() {
	global $pagenow;
	if ( 'nav-menus.php' == $pagenow ) {
		wp_enqueue_script( 'generik-menu-controls', get_theme_file_uri( '/core/assets/js/generik-menu-controls.js' ), array( 'jquery' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'generik_custom_enqueue', 999 );