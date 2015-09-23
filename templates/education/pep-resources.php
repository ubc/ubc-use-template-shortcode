<?php

/**
 * A template for the PEP Resources page.  http://pacificedpress-educ.sites.olt.ubc.ca/resources/
**/

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 		= get_the_ID();

//Fetch post title
$the_title      	 = get_the_title();

// How to get the post thumbnail
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

// Replacement for [plain_tags_slug]
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

// Replacement for [plain_term_slug]
$plain_term_slug 	= \UBC\Helpers::get_plain_terms( absint( $post_id ), 'slug', ' ' );

// Replacement for [odd-even]
global $usage_id;
$usage_id++;
$odd_even 			= ( 0 === $usage_id % 2 ) ? 'even' : 'odd';

?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_tags_slug ); ?>">

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a>

				<h3 class="post-title"><div class="iso-title"><a href="<?php the_permalink(); ?>" target="_blank" title="<?php the_title_attribute(); ?>"><?php echo esc_html( $the_title ); ?></a></div></h3>

				<div class="iso-description hidden"><?php echo esc_html( $the_title ); ?></div>

			</div><!-- .boxey-inner -->

		</div><!-- .boxey-inside -->

	</div>

</div>
