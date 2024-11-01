=== WP Admin Quicklinks ===
Contributors: Rich Hinchcliffe
Donate link: http://www.tmrw.co.uk/blog/wp-admin-quicklinks-plugin/
Tags: simple admin panel, wp-admin dashboard, quicklinks
Requires at least: 2.6
Tested up to: 2.7
Stable tag: trunk

Adds an unobtrusive floating panel to the top-right of every page on your live site (once you're logged in) for easy access to parts of your admin.

== Description ==

WP Admin Quicklinks is a *very* simple **unobtrusive little admin panel** that sits quietly at the top-right of all your site's pages and posts *(only once you've logged in)* giving you shortcuts to the most commonly used WP Admin sections - well, the ones I was always needing to link to anyway.

**Currently they are...**

* Edit this Post/Page *(only shows if you're on a single post or a page)*
* Add new Post
* Dashboard
* Posts
* Pages
* Plugins
* Log out
    
**Do I need it? Aren't there lots of plugins that do this already?**

Yes, there are lots of similar plugins, and as great as most of the ones I tried are,  I found non of them were quite right for me. The two best ones I found were...

* [WordPress Admin Bar](http://www.viper007bond.com/wordpress-plugins/wordpress-admin-bar/ "Link to the viper007bond WordPress Admin Bar")
* [WP Easy Admin](http://wpcandy.com/plugins/wp-easy-admin-plugin.html "Link to WP Easy Admin plugin")

They're both very well made, highly customisable plugins that did the job but they have one thing in common which I personally didn't like - they both add a big thick admin bar across the top of each page, pushing your own layout down. This was no good for me as I didn't like the look of a big fat bar on the top of the pages I was working on - it made it harder to visualise how the page would actually look to an end user. I guess it comes down to personal preference.

Functionality wise they *are* better than my little plugin in that they give direct access to pretty much *all* the admin pages, but I prefer mine in terms of it's **simplicity, and I like the fact that it doesn't spoil the look and feel or significantly alter the layout of the blog/site I'm working on**.


== Installation ==

1. Download the plugin, unzip it and upload it to your plugins directory - /wp-content/plugins/
2. Activate it from the 'Plugins' area of the WordPress admin
3. That's it, you're done!

== Frequently Asked Questions ==

= It's not working! Why? =

This plugin should work with most themes out there. If it doesn't it's probably because the theme you're using doesn't have the correct template tags in it. WP Admin Quicklinks requires that both the `<?php wp_head(); ?>` and `<?php wp_footer(); ?>` template tags are in the theme, usually in the header.php and footer.php respectively. If they're not there you can try add them yourself, or try contact the theme's author and ask if they'd be nice enough to update the theme and add them for you.

== Screenshots ==

1. wp-admin-quicklinks full positional screenshot
2. wp-admin-quicklinks when hidden
3. wp-admin-quicklinks on mouse over
4. edit post example
5. edit page example
6. wp-admin-quicklinks screenshot, hidden panel
7. wp-admin-quicklinks on mouse over

== Arbitrary section ==

**Changelog**
* 1.01 - 08/01/2009 - Fix WP2.7 'Logout' link redirect for on the homepage, category and archive pages etc
* 1.00 - 07/01/2009 - Initial release
