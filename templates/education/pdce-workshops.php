<?php

/**
 * A template for PDCE Workshops Isotope http://pdce-sandbox.sites.olt.ubc.ca/workshops-institutes/
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title          = get_the_title();

// Some custom fields
$coursecodeundergrad			= get_post_meta( absint( $post_id ), 'coursecodeundergrad', true );
$coursecodegrad					= get_post_meta( absint( $post_id ), 'coursecodegrad', true );
$vanityurl 						= get_post_meta( absint( $post_id ), 'vanityurl', true );
$credit 						= get_post_meta( absint( $post_id ), 'credit', true );
$promophoto 					= get_post_meta( absint( $post_id ), 'promophoto', true );
$subtitle						= get_post_meta( absint( $post_id ), 'subtitle', true );
$dates							= get_post_meta( absint( $post_id ), 'dates', true );
$location						= get_post_meta( absint( $post_id ), 'location', true );


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

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-box">

	<div class="boxey entry-content  <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> iso-style">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" class="fancybox-inline"><span class="iso-title"><?php echo esc_html( $the_title ); ?></span></a>

				<div class="iso-description hidden"><?php echo wp_kses_post( get_the_excerpt() ); ?> <?php echo esc_html( $the_title ); ?> <?php echo esc_html( $coursecodeundergrad); ?> <?php echo esc_html( $coursecodegrad ); ?> <?php echo esc_attr( $plain_term_slug ); ?></div>

				<hr class="iso-separate" />

				<div class="iso-coursecode" data-subtitle="<?php echo esc_attr( $subtitle ); ?>">

					<p align="left"><?php echo esc_html( $coursecodeundergrad ); ?> <span class="gradCC">| <?php echo esc_html( $coursecodegrad ); ?></span></p>

				</div>

				<div class="iso-image">

					<div class="iso-image-mask"><img src="<?php echo esc_url( $promophoto ); ?>" alt="" /></div>

				</div>

				<div class="iso-footer"><i class="icon-pushpin"></i> <small><?php echo esc_html( $location); ?></small>
				<i class="icon-time"></i> <small><?php echo esc_html( $dates ); ?></small>
				</div>

			</div><!-- end .boxey-inner -->

		</div><!-- end .boxey-inside -->

	</div><!-- end .boxey entry-content -->

<div style="display:none;">

	<div id="modal_<?php echo absint( $post_id ); ?>" class="span9">

		<div class="modal-header">
		<h3 class="modal-label header-tags"><?php echo esc_html( $the_title ); ?></h3>
		</div><!-- end .modal-header -->

		<hr class="modal-separate" />

		<h3 class="modal-cc"><?php echo esc_html( $subtitle); ?></h3>

			<div class="modal-body">

				<div class="row-fluid">

					<div class="span12">

						<div class="modal-body-content">

							<div class="span3">

								<div class="iso-featured-image">
								<a id="modalImage_<?php echo absint( $post_id ); ?>" href="#"><img style="margin-top: 0px;" src="<?php echo esc_url( $promophoto); ?>" alt="" /></a>
								</div>

							</div>

							<div class="span9">

								<h3 class="modal-subheader">Program Description</h3>
								<?php the_excerpt(); ?>

								<h3 class="modal-subheader">Registration Options</h3>
								Registration is available for <?php echo esc_html( $credit ); ?>.

								<h3 class="modal-subheader">Academic Course Code</h3>
								<?php echo esc_html( $coursecodeundergrad ); ?> <span class="gradCC">| <?php echo esc_html( $coursecodegrad ); ?></span>

								<h3 class="modal-subheader">More Information</h3>
								For more information, please visit <?php echo wp_kses_post( $vanityurl ); ?>.

							</div>

						</div><!-- end .modal-body-content -->

					</div><!-- end .span12 -->

				</div><!-- end .row-fluid -->

			</div><!-- end .modal-body -->

		</div><!-- end .span9-->

	</div><!-- end display none-->

</div>
