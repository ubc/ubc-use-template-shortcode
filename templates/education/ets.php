<?php

/**
 * A template for Faculty of Education html within Loop or Isotope queries.
 * This template is specifically for http://ets.educ.ubc.ca/learning-technology-events
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id = get_the_ID();

// Some custom fields
$session_type = get_post_meta( absint( $post_id ), 'session_type', true );

// Replacement for [plain_cat_slug]
$category = get_the_category();

$plain_cat_slug = '';

for ( $i=0; $i<count( $category ); $i++) {
	$plain_cat_slug .= $category[ $i ]->slug . " ";
}

?>


	<div class="boxey <?php echo esc_attr( $plain_cat_slug ); ?> boxStyle <?php echo esc_attr( $session_type ); ?> ">
		<p><?php echo esc_html( $plain_cat_slug ); ?> <span class="sessionType"><?php echo esc_html( $session_type ); ?></span></p>
		<h3 class="boxTitle"><a title="<?php echo esc_attr( the_title_attribute() ); ?>" href="<?php echo esc_url( the_permalink()); ?>" target="_blank"><?php esc_html( the_title() ); ?></h3>
		<p class="boxContent"><?php echo esc_html( the_excerpt() ); ?></p>
	</div>
