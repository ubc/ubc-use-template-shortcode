<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom modal launch button for ISO shortcode usage. 
 * 
 * This is a simple template to allow for larger reusability. Outputs a div with an id of the post. 
 *
 */
// Fetch the post ID for the currently set up post - we're in the loop
$post_id 		= get_the_ID();

// Replacement for [plain_term_slug]
$plain_term_slug 	= \UBC\Helpers::get_plain_terms( absint( $post_id ), 'slug', ' ' );
?>


<div class="boxey <?php echo esc_attr( $plain_term_slug ); ?>">

