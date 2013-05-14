=== Artiss Transient Cleaner ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: cache, clean, database, housekeep, options, table, tidy, transient, update, upgrade
Requires at least: 3.3
Tested up to: 3.5
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Housekeep expired transients from your options table

== Description ==

"Transients are a simple and standardized way of storing cached data in the WordPress database temporarily by giving it a custom name and a timeframe after which it will expire and be deleted."

Unfortunately, expired entries will only be deleted if you attempt to access the transient again. If you don't access the transient then, even though it's expired, WordPress will not remove it. This is [a known "issue"](http://core.trac.wordpress.org/ticket/20316 "Ticket #20316") and is due to be corrected at some point in the WordPress core code.

Why is this a problem? Transients are often used by plugins to "cache" data (my own plugins included). Because of the housekeeping problems this means that expired data can be left and build up, resulting in a bloated database table.

Meantime, this plugin is the solution, using the same proposed method as the WordPress core change will use. Simply activate the plugin, sit back and enjoy a much cleaner, smaller options table. It also adds the additional recommendation that after a database upgrade all transients will be cleared down.

Within `Administration` -> `Tools` -> `Transients` an options screen exists allowing you to tweak which of the various housekeeping you'd like to happen, including the ability to perform an ad-hoc run. You can also request an optimization of the options table to give your system a real "pep"!

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

I'd like to thank WordPress Developer Andrew Nacin for discussing this issue with and providing me with the Trac details. Also, I'd like to acknowledge [the useful article at Everybody Staze](http://www.staze.org/wordpress-_transient-buildup/ "WordPress _transient buildup") for ensuring my proposed solution wasn't totally mad, and [W-Shadow.com](http://w-shadow.com/blog/2012/04/17/delete-stale-transients/ "Cleaning Up Stale Transients") for the cleaning code.

== Installation ==

1. Upload the entire `artiss-transient-cleaner` folder to your wp-content/plugins/ directory and activate the plugin through the 'Plugins' menu in WordPress.
2. Alternatively, use the Add Plugins option within WordPress to search for and install the plugin.
3. That's it - you're done. Options can be changed in Administration via the Tools->Transients screen.

== Frequently Asked Questions ==

= How often will expired transients be cleared down? =

It runs alongside the existing trash deletion, which is timed to run once a day. However, it will also run whenever you activate the plugin, ensuring that you can immediately test the results.

= Even after performing the scheduled housekeeping there are still expired transients left =

This can happen when transients become "orphaned". Each transient consists of 2 record - one holds the expiry time and the other the actual data. If one is removed without the other then this will then cause problems for the scheduled housekeeping.

In this situation the Database Upgrade run, which removes all transients even if they're orphaned, will be the solution.

== Screenshots ==

1. Administration screen showing contextual help screen

== Changelog ==

= 1.2 =
* Maintenance: Split files because of additional code size
* Maintenance: Removed run upon activation
* Enhancement: Improved transient cleaning code efficiency (including housekeeping MU wide transients)
* Enhancement: Added administration screen (Tools->Transients) to allow ad-hoc runs and specify run options
* Enhancement: Show within new admin screen whether orphaned transients have been found (in this case full clear of the option table is recommended)
* Enhancement: Added internationalisation
* Enhancement: If external memory cache is in use display an admin box to indicate this plugin is not required

= 1.1 =
* Enhancement: Transients will be initially housekept when the plugin is activated

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.2 =
* Update to add new options screen and much improved housekeeping code

= 1.1 =
* Update to add housekeeping upon activation

= 1.0 =
* Initial release