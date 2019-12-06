Site Logo
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

Mega Menu (Basic).
The theme comes with a simple mega menu option which can be activate via a checkbox under the top level menu item. All sub-menu items will then rendered in a mega menu format.

Footer.
The footer can be set to float (default) or fixed to the bottom via the Customizer > Controls > Footer options.

NOTES:
GeneriK utilises the Acid Customizer framework

# Changelog

Mar. 24, 2019, dev time < 30mins

= 1.0.1 =
This update represents minor non breaking tweaks for aesthetic purposes.

* Minor CSS tweaks - style.css @lines 481-487 - New rules added.
* Adjusted rule for fixed footer - template-functions.php @line 31 to false as the initial state.
* Removed unsued & commented out code in generik-custom-output.php
* Fixed: Incorrect thumbnail handle - functions.php @lines 52-54 and comon-functions.php @lines 72 & 78
* Ammended incorrect License tag in style.css header

Mar. 23, 2019, dev time > 100hrs

= 1.0.0 =

* Initial release