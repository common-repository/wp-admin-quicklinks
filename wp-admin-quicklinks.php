<?php
/*
Plugin Name: WP Admin Quicklinks
Plugin URI: http://www.tmrw.co.uk/blog/wp-admin-quicklinks-plugin/
Description: Adds an unobtrusive, simple floating panel to the top-right of every page on your live WordPress site once you're logged in. Allows easy access to all major sections of the admin interface.
Version: 1.01
Author: Rich Hinchcliffe
Author URI: http://www.tmrw.co.uk/
*/

/*
Changelog
1.01 - 08/01/2009 - Fix WP2.7 'Logout' link redirect for on the homepage, category and archive pages etc
1.00 - 07/01/2009 - Initial release
*/

/*  Copyright 2009  Rich Hinchcliffe  (email : wp-admin-quicklinks@tmrw.co.uk)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/*
Get the URL for the page you're on for Logout Redirects
Ordinarily you could probably use get_permalink(), but that didn't work on the homepage, it was picking up
the permalinkof the last iem shopwn from The Loop
*/
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


//put the relevant css in the header
function easy_admin_head_insert() {
	?>
	<?php
	//check if logged in and that user is admin
	global $user_ID; if( $user_ID ) : 
	if( current_user_can('level_10') ) :
	?>
<!-- inserted by the WP Admin Quicklinks plugin -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/wp-admin-quicklinks/wp-admin-quicklinks.css" />
<!-- end code inserted by the WP Admin Quicklinks -->
	<?php endif; endif; ?>
	<?php
} //end easy_admin_head_insert function

//prender the admin menu way down in the footer - don't worry, it's positioned absolutely
function easy_admin_panel_insert() {
	?>
	<?php
	//check if logged in and that user is admin
	global $user_ID;
	if( $user_ID ) : 
	if( current_user_can('level_10') ) :
	?>

	  
<div id="wp-admin-quicklinks">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
  <?php if(is_single() || is_page()) : ?>
	<ul id="wp-admin-quicklinks-page-items">
  	<?php if(is_single()) : ?>
    <?php edit_post_link('Edit this post', '<li>', '</li>'); ?>
    <?php elseif(is_page()) : ?>
		<?php edit_post_link('Edit this page', '<li>', '</li>'); ?>
    <?php endif; ?>
  </ul>
  <?php endif; ?>
  <?php endwhile; endif; ?>
  <ul id="wp-admin-quicklinks-general-items">
  	<li><a href="<?php bloginfo('wpurl'); ?>/wp-admin/post-new.php" title="Write a new post">Add new Post</a>
    <li><a href="<?php bloginfo('wpurl'); ?>/wp-admin/" title="View the admin dashboard">Dashboard</a>
    <li><a href="<?php bloginfo('wpurl'); ?>/wp-admin/edit.php" title="View all your posts">Posts</a></li>
    <li><a href="<?php bloginfo('wpurl'); ?>/wp-admin/edit-pages.php" title="View all your pages">Pages</a></li>  
    <li><a href="<?php bloginfo('wpurl'); ?>/wp-admin/plugins.php" title="View all your plugins">Plugins</a></li>  
    <?php /*checks WP version. If older than 2.7 use old style logout link*/ if(get_bloginfo('version') < 2.7) : ?>
    <li id="wp-admin-quicklinks-logout"><?php echo wp_loginout(); ?></li>
    <?php /*if version is 2.7 or greater use new logout link with redirect*/ else : ?>
		<li id="wp-admin-quicklinks-logout"><a href="<?php echo wp_logout_url(curPageURL()); ?>" title="Logout of your site and close the WP Admin Quicklinks panel">Log out</a></li>
    <?php endif; ?>
  </ul>
</div><!-- end wp-admin-quicklinks -->
	<?php endif; endif; ?>
	<?php
} //end easy_admin_panel_insert function

add_action('wp_head', 'easy_admin_head_insert');
add_action('wp_footer', 'easy_admin_panel_insert');

?>