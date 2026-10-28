=== Pritam ===

Contributors: templatesell
Theme URI: https://www.templatesell.com/item/pritam-premium-minimal-wordpress-blog-theme/
Author URI: https://www.templatesell.com/
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, blog, news
Requires at least: 6.0
Requires PHP: 7.4
Tested up to: 7.1
Stable tag: 1.0.6
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme. This theme has search option, off-canvas sidebar, multiple sidebar options, footer options, featured slider, promo boxed, footer widgets and many more. Besides that, this theme comes with added custom widgets for author information, featured posts, social icons, etc. It comes with primary color option to change the whole site color with a single click. More Details: https://www.templatesell.com/item/pritam-minimal-blog-wordpress-theme/

== Description ==

A perfect theme for blog and magazine site. With masonry layout and multiple blog page layout, this theme is the awesome and minimal theme.
== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Frequently Asked Questions ==

= Does this theme support any plugins? =

Pritam includes support for Infinite Scroll in Jetpack.

== Notes ==
* Custom pagination for numeric is made.

== Changelog ==
= 1.0.6 - August 24 2026 =

Fixed
* The submenu toggle could not be operated by keyboard and had no accessible name. script.js built it as <a class="sub-toggle" href="javascript:void(0);"> wrapping nothing but an icon font glyph, so a screen reader announced an empty link, its href did nothing, and a submenu could only be opened with a mouse. It is a <button type="button"> now, in the tab order, operable with Enter and Space, carrying aria-expanded that flips with the submenu and a translatable "Expand child menu" / "Collapse child menu" label that changes with it. The chevron is marked aria-hidden so it is not announced twice
* The toggle's labels are localized onto the pritam-script handle rather than pritam_ajax. pritam_ajax belongs to pritam-custom, which is enqueued after script.js, so its data is printed to the page after script.js has already run and could never have been read there
* The rule hiding toggles nested inside submenus named the element as "a.sub-toggle" and would have stopped matching once the toggle became a button, leaving those toggles visible on desktop where submenus already open on hover. It no longer names the element
* "nav ul li a { font-size: 11px; font-weight: 800 }" matched the old anchor and does not match a button, so the toggle would have been drawn at the list item's 15px/400 - a visibly larger chevron, sitting off the link's centre. The toggle is named in that same rule now, so it is drawn exactly as the anchor was. Measured against the anchor's own geometry recorded before the change: at 1280px the button's box is top 215.00, bottom 237.00, left 277.41 - the anchor's numbers to the pixel - and its centre is level with the menu link's. Below 992px the toggle is unchanged

Other
* languages/pritam.pot regenerated

= 1.0.5 - August 23 2026 =

Fixed
* The body text was #9c9c9c, which measures 2.75:1 against the white page - every paragraph on the site was below the readable minimum. It is #6f6f6f now, 5.02:1
* The accent measured 3.28:1, as text and as a background for white text alike, so links, the current pagination chip, the reply link and the comment button were all below the minimum. Same blue-grey, 4.81:1
* Three greys used for post meta and captions measured between 2.46:1 and 3.55:1
* Changing the Primary Color left the reply link, the comment form's heading link, the social icons and the blockquote mark behind, because those four were hard-coded in the stylesheet and never named in the dynamic CSS
* The Primary Color is run through sanitize_hex_color() rather than esc_attr(), which would pass "red; }" into the stylesheet
* Keyboard focus had no styling of its own
* The text domain was loaded without being told where the language files are

Performance
* Fonts are served from the theme instead of Google. They used to arrive twice over - once from the enqueue and again from an @import at the top of assets/css/style.css, which blocked rendering until it resolved. The two requests did not even agree: the @import asked for "Muli", the name Google retired when the family became Mulish, so the body font fell back to a browser default while Mulish was downloaded and never used
* Monsieur La Doulaise was fetched on every page view and is named nowhere in the theme's CSS or templates; it has been dropped
* The editor pulled two further families, Muli and Prata, neither of which the theme uses
* Removed a copy of imagesLoaded that WordPress's own registration always overrode, so it was never served; imagesLoaded and Masonry now come from WordPress, and only on the layouts that use them
* Every stylesheet and script is versioned from the theme version instead of "4.5.0", "20200412" or "202"
* The scripts that call jQuery now declare it

Editor
* Added editor styles. css/editor-styles.css shipped empty, and was loaded in a way that no longer reaches the content now that the editor is an iframe, so writing a post looked nothing like reading one
* Added three block styles - Lead paragraph, Boxed and Plain - and three block patterns
* Added support for wide alignment, and declared support for a custom background, which the theme has advertised in its tags since it shipped without the option ever appearing in the customizer

Other
* A stylesheet handle called font-awesome pointed at Line Awesome; the two are separate icon sets and both are bundled
* Corrected the readme: the stable tag said 1.0.0, the PHP requirement said 5.2, and Font Awesome was credited as 4.6.3 where the theme bundles 5.6.1
* Added languages/pritam.pot
* Tested up to WordPress 7.1

= 1.0.4 - Janurary 30 2023 =
* Initial release

= 1.0.0 - January 10 2023 =
* Initial release

== Credits ==

Pritam is free WordPress theme by, Template Sell.
Pritam is distributed under the terms of the GNU GPL v2 or later.


* Based on Underscores https://underscores.me/, (C) 2012-2017 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
* normalize.css https://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](https://opensource.org/licenses/MIT)
* BreadcrumbTrail, Copyright (c) 2008 - 2015, Justin Tadlock http://themehybrid.com/plugins/breadcrumb-trail
* Theia Sticky Sidebar https://github.com/WeCodePixels/theia-sticky-sidebar [MIT license]
* Slick Slider https://github.com/kenwheeler/slick/blob/master/LICENSE [The MIT License (MIT)]
* Font-Awesome https://github.com/FortAwesome/Font-Awesome FontAwesome 5.6.1 Copyright 2012 Dave Gandy Font License: SIL OFL 1.1 Code License: MIT License http://fontawesome.io/license/
* Lato, Copyright 2010-2014 Lukasz Dziedzic, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Lato
* Mulish, Copyright 2011 The Mulish Project Authors, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Mulish
* Playfair Display, Copyright 2017 The Playfair Display Project Authors, License: SIL Open Font License 1.1, Source: https://fonts.google.com/specimen/Playfair+Display
* Line Awesome 1.1.0 by @icons_8 - https://icons8.com/line-awesome License - https://icons8.com/good-boy-license/ (Font: SIL OFL 1.1, CSS: MIT License)
 * Bootstrap v4.0.0-beta (https://getbootstrap.com) Copyright 2011-2017 The Bootstrap Authors Copyright 2011-2017 Twitter, Inc. Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)

== Screenshot Images [CCO License] ==
Image for theme screenshot, Copyright Clay Banks
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/string-lights-LNYYCG845L

Image for theme screenshot, Copyright Larm Rmah
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/dark-trees-ANESRR0FUD

Image for theme screenshot, Copyright Burst
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/woman-drinking-UEQ0178WUT

Image for theme screenshot, Copyright Garon Piceli
License: CC0 1.0 Universal (CC0 1.0)
Source: https://stocksnap.io/photo/blonde-woman-IYNSZNJJ9U

* Sidbear icons for the customizer are self created and license under GPL.

== Affiliate Disclosure ==
Some of the links in this blog post are affiliate links, which means that if you click on one of the product links and then purchase the product, we’ll receive a small fee. No worries though, you’ll still pay the standard amount without any extra cost to you.