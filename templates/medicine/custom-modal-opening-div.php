<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom modal launch button for ISO shortcode usage. 
 * 
 * This is a simple template to allow for larger reusability. Outputs a div with an id of the post. 
 *
 */
$post_id 		= get_the_ID();
?>


<div id="<?php echo absint( $post_id ); ?>" class="modal fade hide container" tabindex="-1">