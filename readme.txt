=== GeneriK ===
Contributors: ClassicDesigner
Requires at least: ClassicPress 1.0.0
Tested up to: ClassicPress 1.0.1
Stable tag: 1.0.2
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Tags: blog, one-column, two-columns, right-sidebar, custom-menu, custom-logo, featured-images, footer-widgets, full-width-template, sticky-post, theme-options, threaded-comments, translation-ready

== Installation ==

1. Download the latest version from GitHub
2. In your admin panel, go to Appearance -> Themes and click the 'Add New' button.
3. Click the Upload Theme button and locate the downloaded zip file.
4. Click install and wait for ClassicPress to complete the installation.
5. Activate the theme then navigate to Appearance > Customize in your admin panel.

== Copyright ==

GeneriK ClassicPress Theme, Copyright 2019 ClassicDesigner & classicdesigner.co.uk
GeneriK is Distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

== Site Logo ==
GeneriK theme comes with an option to add the logo within the menu so that it can
be centered.

To do so, first create a menu group via Appearance > Menus and then....
1: Add the desired menu items including the Home item.
2: Move the Home item to the center of all of the items. Try to ballance this by moving items around to give the navigation a uniformed look.
3: Expand the Home menu item and add "site-brand" without the quotation marks in the CSS Class field. You may need to enable this field via the Screen Options tab
4: Select Primary as the Display Location and save.
5: If you have not done so already then navigate to Appearance > Customizer and upload a logo to the site. Don't forget to save the settings.

You should now have the site logo sitting pretty right in the center of the menu items. You can still move the logo to the beginning or end of the navigation
by simply dragging the Home item to the desired location.

By default the navigation is center aligned but you can choose to Left or Right align it. To do so visit the Customizer and take a look under GeneriK Options > Header Controls for the available options.

== Mega Menu (Basic) ==
The theme comes with a simple mega menu option which can be activate via a checkbox under the top level menu item. All sub-menu items will then rendered in a mega menu format.

== Footer ==
The footer can be set to float (default) or fixed to the bottom via the Customizer > Controls > Footer options.

NOTES:
GeneriK Theme bundles the following third-party resources: 
Acid Customizer framework
License:- GNU General Public License v3.0
Source:- https://github.com/smartcatdev/Acid-WordPress-Customizer-Framework

== Changelog ==

Dec. 27, 2019, dev time < 30mins

= 1.0.2 =
* New: Added support for the Components Page Builder plugin to allow for testing.

Apr. 02, 2019, dev time > 2hrs

= 1.0.1 =
This update represents minor non breaking tweaks for aesthetic purposes.

* Minor CSS tweaks - style.css @lines 481-487 - New rules added.
* Adjusted rule for fixed footer - template-functions.php @line 31 to false as the initial state.
* Removed unsued & commented out code in generik-custom-output.php
* Fixed: Incorrect thumbnail handle - functions.php @lines 52-54 and common-functions.php @lines 72 & 78
* Ammended incorrect License tag in style.css header
* NEW: Added attachment page functionality - files added: attachment.php(root) & attachment-functions.php (in folder /core/attachment)
* NEW: Added a theme updater class to allow for future automatic updates. - File added: (in folder /inc/updater.php)

Mar. 23, 2019, dev time > 100hrs

= 1.0.0 =

* Initial release