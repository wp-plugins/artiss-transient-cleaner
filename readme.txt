=== Artiss Transient Cleaner ===
Contributors: dartiss
Donate link: http://artiss.co.uk/donate
Tags: cache, clean, database, housekeep, table, tidy, transient, update, upgrade
Requires at least: 2.5
Tested up to: 3.4.2
Stable tag: 1.0

Housekeep expired transients from your options table

== Description ==

"Transients are a simple and standardized way of storing cached data in the WordPress database temporarily by giving it a custom name and a timeframe after which it will expire and be deleted."

Unfortunately, expired entries will only be deleted if you attempt to access the transient again. If you don't access the transient then, even though it's expired, WordPress will not remove it. This is [a known "issue"](http://core.trac.wordpress.org/ticket/20316 "Ticket #20316") and is due to be corrected at some point in the WordPress core code.

Why is this a problem? Transients are often used by plugins to "cache" data (my own plugins included). Because of the housekeeping problems this means that expired data can be left and build up, resulting in a bloated database table.

Meantime, this plugin is the solution, using the same proposed method as the WordPress core change will use. Simply activate the plugin, sit back and enjoy a much cleaner, smaller options table. It also adds the additional recommendation that after a database upgrade all transients will be cleared down.

To top things off, an optimisation of the options table is performed after each clean-up to really give some "pep" to your system.

**For help with this plugin, or simply to comment or get in touch, please read the appropriate section in "Other Notes" for details. This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Licence ==

This WordPress plugin is licensed under the [GPLv2 (or later)](http://wordpress.org/about/gpl/ "GNU General Public License").

== Support ==

All of my plugins are supported via [my website](http://www.artiss.co.uk "Artiss.co.uk").

Please feel free to visit the site for plugin updates and development news - either visit the site regularly or [follow me on Twitter](http://www.twitter.com/artiss_tech "Artiss.co.uk on Twitter") (@artiss_tech).

For problems, suggestions or enhancements for this plugin, there is [a dedicated page](http://www.artiss.co.uk/transient-cleaner "Artiss Transient Cleaner") and [a forum](http://www.artiss.co.uk/forum "WordPress Plugins Forum"). The dedicated page will also list any known issues and planned enhancements.

**This plugin, and all support, is supplied for free, but [donations](http://artiss.co.uk/donate "Donate") are always welcome.**

== Acknowledgements ==

I'd like to thank WordPress Developer Andrew Nacin for discussing this issue with and providing me with the Trac details.

Also, I'd like to acknowledge [the useful article at Everybody Staze](http://www.staze.org/wordpress-_transient-buildup/ "WordPress _transient buildup") for ensuring my proposed solution wasn't totally mad.

== Installation ==

1. Upload the entire `artiss-transient-cleaner` folder to your wp-content/plugins/ directory and activate the plugin through the 'Plugins' menu in WordPress.
2. Alternatively, use the Add Plugins option within WordPress to search for and install the plugin.
3. That's it - you're done!

== Frequently Asked Questions ==

= How often will expired transients be cleared down? =

It runs alongside the existing trash deletion, which is timed to run once a day.

= Which version of PHP does this plugin work with? =

It has been tested and been found valid from PHP 4 upwards.

Please note, however, that the minimum for WordPress is now PHP 5.2.4. Even though this plugin supports a lower version, I am not coding specifically to achieve this - therefore this minimum may change in the future.

== Changelog ==

= 1.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
* Initial release