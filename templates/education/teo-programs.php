<?php

/**
 * A template for TEO Programs Isotope http://teach-educ.sites.olt.ubc.ca/bachelor-of-education-program/secondary/
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title    = get_the_title();


// Some custom fields
$subjdesc			= get_post_meta( absint( $post_id ), 'subj-desc', true );
$quote				= get_post_meta( absint( $post_id ), 'quote', true );

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

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> outer">

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

		<a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<h3 class="post-title">
					<div class="iso-title"><?php echo esc_html( $the_title ); ?></div></h3>
					<div class="iso-description hidden"><?php echo wp_kses_post( get_the_excerpt() ); ?>  <?php echo esc_attr( $plain_term_slug ); ?> </div>

				</div><!-- end .boxey-inner -->

		</div></a><!-- end .boxey-inside -->

	</div><!-- end .boxey-->

<!-- Start Modal -->
<div style="display:none;">

    <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">

        <div class="<?php echo esc_attr( $plain_term_slug ); ?>">

              <div class="modal-body">

              	<div class="row-fluid">

                  	<div class="span12">

                    	<h3 class="post-title"><?php echo esc_html( $the_title ); ?></h3>

                    	<div class="modal-body-content">

						<div id="sec-subject-entry">
						<div class="span8"><?php echo wp_kses_post( $subjdesc ); ?></div>
						<div class="span4">
						<img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" class="alignnone img-polaroid" />
						</div>
						<div class="clearfix">&nbsp;</div>
						<?php echo wp_kses_post( $quote ); ?>
						</div><!-- End sec-subject-entry -->

						</div><!-- End .modal-body-content -->

					</div>  <!-- End span12 -->

				</div><!-- end .row-fluid -->

			</div><!-- end .modal-body -->

		</div><!-- End plain cat slug -->

	</div><!-- End .span9 -->

</div><!-- End display none -->

</div><!-- End the id -->
