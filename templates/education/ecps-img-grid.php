<?php

/**
 * A template for ECPS image grid - eg. http://ecps-educ.sites.olt.ubc.ca/special-education/graduate-concentrations/
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title          = get_the_title();

// Custom fields
$programlink 		= get_post_meta( absint( $post_id ), 'programlink', true );

// How to get the post thumbnail
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

// Replacement for [plain_tags_slug]
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

// Replacement for [plain_term_slug]
$plain_term_slug 	= \UBC\Helpers::get_plain_terms( absint( $post_id ), 'slug', ' ' );

// Replacement for [odd-even] but *really* this should be done in CSS.
global $usage_id;
$usage_id++;
$odd_even 			= ( 0 === $usage_id % 2 ) ? 'even' : 'odd';

?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_tags_slug ); ?>">

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<div class="iso-title">

					<a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>

				<div class="iso-description hidden"><?php the_content(); ?></div>

			</div><!-- end .boxey-inner -->

		</div><!-- end .boxey-inside -->

<!-- Start Modal -->
<div style="display:none;">

	<div id="modal_<?php echo absint( $post_id ); ?>" class="span9">

		<div class="<?php echo esc_attr( $plain_tags_slug ); ?>">

			<div class="modal-body">

				<div class="row-fluid">

					<div class="span12">

					<h3 class="post-title"><?php echo esc_html( $the_title ); ?></h3>

					<div class="modal-body-content"><?php the_content(); ?>

					<a href="<?php echo esc_attr( $programlink ); ?>" target="_blank">Learn More</a>

					</div><!-- end .modal-body-content -->

					</div><!-- end .span12 -->

				</div><!-- end .row-fluid -->

			</div><!-- end .modal-body -->

		</div><!-- end .plain-tags-slugs-->

	</div><!-- End .span9 -->

</div><!-- end display none -->

</div><!-- end .boxey -->

</div><!-- end  #theiD-->
