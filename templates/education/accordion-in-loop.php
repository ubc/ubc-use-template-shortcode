<?php

/**
 * A template for instances of accordion within loop in Education sites. eg. http://ecps-educ.sites.olt.ubc.ca/special-education/sped-courses/
 * needs to be wrapped in the following to work: 
* <div class="accordion-shortcode accordion courses">[loop query="" ]
* ADD THIS TEMPLATE
* [/loop]</div>
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

$title 			= get_the_title();

$content 			= get_the_content();

?>

<div class="accordion-group">
	<div class="accordion-heading">
		<a class="accordion-toggle" href="#<?php echo absint( $post_id ); ?>" data-toggle="collapse" data-parent=".courses"><?php the_title_attribute(); ?>
		</a>
	</div>
	<div id="<?php echo absint( $post_id ); ?>" class="accordian-shortcode-content accordion-body collapse">
		<div class="accordion-inner"><?php the_content(); ?>
			<strong>Course Link:</strong><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title_attribute(); ?></a>
		</div>
	</div>
</div>
