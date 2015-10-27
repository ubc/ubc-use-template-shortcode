<?php

/**
 * A template for the International Programs page. http://international-educ.sites.olt.ubc.ca/programs-research/
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title          = get_the_title();

// Some custom fields
$session_type			= get_post_meta( absint( $post_id ), 'session_type', true );
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

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> boxISO <?php echo esc_html( $session_type ); ?>">

		<div class="boxey-inside">

			<?php echo esc_attr( $plain_term_slug ); ?> <span class="sessionType"><?php echo esc_html( $session_type ); ?></span>

                <div class="boxey-inner">

					<h3 class="boxTitle"><span class="iso-title"><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" target="_blank"><?php echo esc_html( $the_title ); ?></a></span></h3>

					<div class="iso-description"><?php echo wp_kses_post( get_the_excerpt() ); ?> <span class="iso-title hidden"><?php echo esc_html( $the_title ); ?></span></div>

				</div>

		</div>

	</div>

</div>
