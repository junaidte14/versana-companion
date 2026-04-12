=== Versana Companion ===
Contributors: junaidte14
Tags: demo import, starter templates, versana
Requires at least: 6.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Extends the Versana theme with seamless demo imports, exclusive starter templates, and advanced block patterns.

== Description ==

Versana Companion is a plugin designed specifically for the Versana WordPress theme. It adds:

* Four fully functional free starter demos (Blog, Business, Portfolio, Boutique and more coming...) with one-click import
* Additional block patterns for building pages
* Additional style variations
* Header, footer, and blog layout options via the WordPress Customizer
* Optional site-enhancement toggles (breadcrumbs, reading-progress bar, related posts, lazy loading)

**All features in this plugin are completely free and fully functional.** No account, license key, or payment is required to use any of them.
 
A separate **Versana PRO** plugin is available at https://versana.codoplex.com/get-versana-pro/ that adds premium starter demos (Restaurant, Fitness, Real Estate, WooCommerce Store, Premium Shop, and many more...) and additional advanced features. The PRO plugin is sold and distributed independently; it is not included here.
 
This plugin requires the Versana theme to be installed and activated.

== Installation ==

1. Upload the plugin files to `/wp-content/plugins/versana-companion`
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Make sure Versana theme is active

== Frequently Asked Questions ==

= Do I need the Versana theme? =

Yes, this plugin is designed to work only with Versana theme.

= Is this plugin free? =
 
Yes, completely free. All features in this plugin are fully functional at no cost.

= What is Versana PRO? =
 
Versana PRO is a separate, paid plugin available at https://versana.codoplex.com/get-versana-pro/ that extends this free plugin with premium demo templates and additional advanced features. It is not bundled here.
 
= Does this plugin send any data to external servers? =
 
Only if you click the "Preview" button for a demo (which opens the demo preview site in a new browser tab) or if you choose to install the separate Versana PRO plugin (which handles its own license verification). See the External Services section below for full details.
 
== External Services ==
 
This plugin connects to the following external services. No data is sent without a deliberate user action.
 
**1. Versana Demo Preview Site (versana.codoplex.com)**
 
The Demo Import tab displays preview buttons that open demo previews on versana.codoplex.com in a new browser tab. This is a standard external link — no data is transmitted to that server by this plugin. The preview page loads only when the user explicitly clicks the "Preview" button.
 
* Service provider: Codoplex — https://codoplex.com
* Data sent: None from this plugin. The user's browser makes a normal page request when the link is opened.
* When: Only when a user clicks a "Preview" button in the Demo Import tab.
* Terms of Use: https://codoplex.com/terms-and-conditions/
* Privacy Policy: https://codoplex.com/privacy-policy/
 
**Note:** The Versana PRO plugin (a separate product) connects to versana.codoplex.com for license activation and verification. That service is fully documented within the PRO plugin itself and is unrelated to this free plugin.
 
== Screenshots ==
 
1. **One-Click Demo Import:** Choose from four free professional starter templates and import with a single click.
2. **PRO Demo Previews:** See what is available in Versana PRO with teaser cards and direct preview links — no obligation.
3. **Content & Layout Options:** Toggle breadcrumbs, reading progress, and related posts without touching any code.
4. **Performance Optimizations:** Enable advanced lazy loading and other speed improvements from one settings screen.
5. **Customizer:** Configure the header, footer, and blog layout options via the WordPress Customizer

== Changelog ==

= 1.0.2 =
* Removed the header and footer scripts to comply with WP Directory submission rules
* Changed the theme options tab name from Integrations to Advanced

= 1.0.1 =
* Page title issue is fixed
* A new one-click demo is added
* Removed header layouts from customizer and handled through template parts
* Removed license management from this plugin and moved it to the Versana PRO plugin
* Breadcrumbs, reading progress, and related posts feature is added
* Performance optimization features are added 
* Optimized related posts query to remove performance-heavy exclusionary parameters.
* Properly enqueued inline styles and scripts via WordPress standard hooks.

= 1.0.0 =
* Initial release
* Basic plugin structure