<?php
/*
Plugin Name: Markdown Markup
Description: Allows the use of Markdown markup syntax instead of HTML in your page content.
Version: 1.0.0
Author: Chris Wells
Author URI: http://cevanwells.com
Author email: cevan@wells.io
Source code: https://github.com/cevanwells/markdown_markup
*/

# load the required library. I'm not using the autoloader as recommended
# in the library. Oh well.
require_once(dirname(__FILE__) . '/markdown_markup/Michelf/Markdown.inc.php');
use Michelf\Markdown as Markdown;

# get the correct ID for the plugin
# this is apparently needed, although I'm not sure if it does much
# more than grab the actual name of the file being used as a plugin.
$thisFile = basename(__FILE__, ".php");

# register the plugin
register_plugin(
  $thisFile,
  'Markdown Markup',
  '1.0.0',
  'Chris Wells',
  'http://cevanwells.com',
  'Allows the use of the Markdown markup language by John Gruber instead of HTML',
  'plugins',
  ''
);

# activate the filter
add_filter('content', 'parse_content');

# parse the page content
function parse_content($content) {
  return Markdown::defaultTransform($content);
}
?>
