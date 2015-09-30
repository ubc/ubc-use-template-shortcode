<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom modal launch button for ISO shortcode usage. 
 * 
 * This is a simple template to allow for larger reusability. Outputs a div with an id of the post. 
 *
 */

?>
<div class=" boxey <?php foreach(get_the_category() as $category) {
echo $category->slug . ' ';} ?>">

