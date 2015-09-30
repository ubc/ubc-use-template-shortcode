<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom modal launch button for ISO shortcode usage. 
 * 
 * This is a simple template to allow for larger reusability. Outputs a link with an is of the post. Needs data attribute added with JS on page.
 *
 */
$post_id 		= get_the_ID();
?>

<a class="btn btn-small launch-btn" href="#<?php echo absint( $post_id ); ?>" data-toggle="modal">Launch</a>
