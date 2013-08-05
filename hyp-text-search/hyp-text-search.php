<?php
/*
Plugin Name: Hyp Text Search
Plugin URI: http://textsearch.myhyperspace.com
Description: A client side text search plugin
Version: 1.0
Author: Adam J Nowak
Author URI: http://hyperspatial.com
License: GPL2
*/

/*
This plugin adds a search box to the top of wordpress content. It will render the box between the title fo the page and the content. The div targeted by the search can be changed in: hyp-text-search.js. Just change #main-content to whatever element you want to target on line 79 and 84

Instructions:

1) Add this to the top of a page template (like page.php) above get_header(); Page templates located in the root directory of the theme. 

<?php $hypts_activate = 1 ?>

2) To create a custom page template, make a copy of page.php. Then name this file page-MYSLUG.php

Example: the page url is http://tsi.hyptx.com/hippa-manual/, name the template page-hippa-manual.php

If you want to create a template for more than one page, just add the template name PHP block to the top of the template file. Then you can select this template from the wordpress page editor for any page.

/* Template Name: MyTemplateName */

define('HYPTS_PLUGIN',WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/');
define('HYPTS_PLUGIN_SERVERPATH',dirname(__FILE__) . '/');

/* Add Styles */
function hypts_add_styles(){
	global $hypts_activate;
	if(!$hypts_activate) return;
	?>
	<style type="text/css">
	#hypts{margin:16px 0}
	.highlight{background-color:#FFF78F; -moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px; -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.7); -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.7); box-shadow:0 1px 4px rgba(0, 0, 0, 0.7)}
	.highlight{padding:0 2px}
	</style>    
	<?php	
}
add_action('wp_head','hypts_add_styles');

/* Enqueue Javascript */
function enqueue_js(){
	global $hypts_activate;
	if(!$hypts_activate) return;
    wp_enqueue_script('hypts_js', HYPTS_PLUGIN . 'hyp-text-search.js');
}
add_action('wp_print_scripts', 'enqueue_js');

/* Print Search Box */
function hypts_print_search_box($content){
	global $hypts_activate;
	if(!$hypts_activate) return;
	$content = '<div id="hypts"><strong>Search:</strong> <input type="text" id="text-search" /></div>' . $content;
	return $content;
}
add_filter( 'the_content', 'hypts_print_search_box' );

?>