<?php

$acid_location = get_template_directory() . '/inc/customizer/';
$customizer = acid_instance( $acid_location );

require get_parent_theme_file_path( '/inc/customizer/generik-color-defaults.php' );

$data = array (
    'panels' => array (
        /**
		 * Add theme's main customizer panel
		 **/
		'generik-panel' => array (
            'title' => __( 'GeneriK Options', 'generik' ),
            'description' => __( 'Customization settings and controls for our theme', 'generik' ),
            'sections' => array (
                /**
				 * Add the General section to theme's main panel
				 **/
				'generik-layout-section' => array (
                    'title' => __( 'Layout Settings', 'generik' ),
                    'description' => __( 'This is another section demo', 'generik' ),
                    'options' => array (
						'header-design-toggle' => array (
                            'label' => __( 'Header Layout', 'generik' ),
                            'description' => __( 'Set the desired Header content position', 'generik' ),
                            'type' => 'radio-toggle',
                            'default' => 'center',
                            'choices' => array (
                                'center' => __( 'Centered (default)', 'generik' ),
                                'left' => __( 'Align Left', 'generik' ),
                                'right' => __( 'Align Right', 'generik' ),
								'inline' => __( 'Display inline - Brand left & Menu right', 'generik' ),
                            ),
                        ),
						
						'generik-header-width' => array (
                            'label' => __( 'Header Width', 'generik' ),
                            'description' => __( 'Adjust the width of the header inner section', 'generik' ),
                            'type' => 'range',
                            'default' => 2000,
                            'min' => 400,
                            'max' => 2000,
                            'step' => 10
                        ),
						
						'no-sidebar-content-width' => array (
                            'label' => __( 'Content Width', 'generik' ),
                            'description' => __( 'Set the content width when there\'s no sidebar active (Numeric value only)', 'generik' ),
                            'type' => 'range',
                            'default' => 940,
                            'min' => 300,
                            'max' => 1600,
                            'step' => 10
                        ),
					),
				),
				/**
				 * Add the Header section to theme's main panel
				 **/
				'generik-brand-section' => array (
                    'title' => __( 'Title/Tagline Settings', 'generik' ),
                    'description' => __( 'Theme\'s Brand controls', 'generik' ),
                    'options' => array (
						'site-brand-on' => array (
                            'label' => __( 'Show/Hide Site Brand', 'generik' ),
                            'description' => __( 'Toggle the main site brand display on or off. Ideal if you have the brand set to center of the menu items', 'generik' ),
                            'type' => 'toggle',
                            'default' => true
                        ),
						'site-title-color' => array (
                            'label' => __( 'Site Title Color', 'generik' ),
                            'description' => __( 'Change the site title\'s main color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_site_title_color()
                        ),
						'site-title-hover' => array (
                            'label' => __( 'Site Title Hover State', 'generik' ),
                            'description' => __( 'Change the site title\'s hover state color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_site_title_hover()
                        ),
						'site-desc-on' => array (
                            'label' => __( 'Show/Hide Site Description', 'generik' ),
                            'description' => __( 'Toggle the site description display on or off.', 'generik' ),
                            'type' => 'toggle',
                            'default' => true
                        ),
						'site-desc-color' => array (
                            'label' => __( 'Site Description color', 'generik' ),
                            'description' => __( 'Change the site description\'s color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_site_description_color()
                        ),
                    ),
                ),
				
				'generik-navbar-section' => array (
                    'title' => __( 'Navigation Settings', 'generik' ),
                    'description' => __( 'Theme\'s navigation menu controls', 'generik' ),
                    'options' => array (
						//'navbar-sticky-position' => array (
                        //    'label' => __( 'Navbar Fixed', 'generik' ),
                        //    'description' => __( 'Fix the navbar to the top on scroll instead of a floating it?', 'generik' ),
                        //    'type' => 'toggle',
                         //   'default' => false
                        //),
						'navbar-bg-color' => array (
                            'label' => __( 'Navbar Bacground Color', 'generik' ),
                            'description' => __( 'Change the menu navigation menu\'s background color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_navbar_background_color()
                        ),
                        'menu-item-color' => array (
                            'label' => __( 'Menu Item Color', 'generik' ),
                            'description' => __( 'Change the menu item\'s initial color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_menu_item_color()
                        ),
						'menu-item-hover' => array (
                            'label' => __( 'Menu Item Color', 'generik' ),
                            'description' => __( 'Change the menu item\'s hover state color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_menu_item_hover_color()
                        ),
					),
				),
				/**
				 * Add the Footer section to theme's main panel
				 **/				
				'generik-footer-section' => array (
                    'title' => __( 'Footer Settings', 'generik' ),
                    'description' => __( 'Options for our theme\'s footer area', 'generik' ),
                    'options' => array (						
						'site-footer-fixed' => array (
                            'label' => __( 'Footer Fixed', 'generik' ),
                            'description' => __( 'Fix the footer to the bottom instead of a floating it?', 'generik' ),
                            'type' => 'toggle',
                            'default' => false
                        ),						
                        'generik-footer-copyright-text' => array (
                            'label' => __( 'Change the footer text', 'generik' ),
                            'description' => __( 'Enter footer test - HTML not allowed', 'generik' ),
                            'type' => 'text',
                            'default' => __( 'Copyright &copy; ', 'generik' ) . get_bloginfo( 'name' ) . ' ' . esc_attr( date_i18n( __( 'Y', 'generik' ) ) )
                        ),
                        'footer-text-aligment' => array (
                            'label' => __( 'Text Aligment', 'generik' ),
                            'description' => __( 'Select the footer text aligment as desired (Default: Center)', 'generik' ),
                            'type' => 'radio',
                            'default' => 'center',
                            'choices' => array (
                                'left' => __( 'Left', 'generik' ),
                                'center' => __( 'Align Center (Default)', 'generik' ),
                                'right' => __( 'Right', 'generik' ),
                            ),
                        ),
						'generik-theme-credits' => array (
                            'label' => __( 'Footer Credits', 'generik' ),
                            'description' => __( 'Enable or disable the theme\'s footer credits. Please consider leaving this on to show your support for the author', 'generik' ),
                            'type' => 'toggle',
                            'default' => true
                        ),
						'footer-text-color' => array (
                            'label' => __( 'Footer Text Color', 'generik' ),
                            'description' => __( 'Change the footer text color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_footer_text_color()
                        ),
						'footer-link-color' => array (
                            'label' => __( 'Footer Link Color', 'generik' ),
                            'description' => __( 'Change the footer links main color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_footer_link_color()
                        ),
						'footer-link-hover' => array (
                            'label' => __( 'Footer Link Hover', 'generik' ),
                            'description' => __( 'Change the footer links hover color', 'generik' ),
                            'type' => 'color',
                            'default' => generik_customizer_get_footer_link_hover_color()
                        ),
					),
				),
            ),
        ),
    ),
);

$customizer->config( $data );