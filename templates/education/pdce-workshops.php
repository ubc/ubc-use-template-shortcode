<?php

/**
 * A template for PDCE Workshops Isotope http://pdce-sandbox.sites.olt.ubc.ca/workshops-institutes/
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title
$the_title          = get_the_title();

//Get the post permalink
$permalink          = get_permalink( absint( $post_id) );

// Some custom fields
$coursecodeundergrad			= get_post_meta( absint( $post_id ), 'CourseCodeUndergrad', true );
$coursecodegrad					= get_post_meta( absint( $post_id ), 'CourseCodeGrad', true );
$vanityurl 						= get_post_meta( absint( $post_id ), 'VanityUrl', true );
$credit 						= get_post_meta( absint( $post_id ), 'Credit', true );
$promophoto 					= get_post_meta( absint( $post_id ), 'PromoPhoto', true );
$subtitle						= get_post_meta( absint( $post_id ), 'Subtitle', true );
$dates							= get_post_meta( absint( $post_id ), 'Dates', true );
$location						= get_post_meta( absint( $post_id ), 'Location', true );
$deliverymode                   = get_post_meta( absint( $post_id ), 'DeliveryMode', true );
$programtype                    = get_post_meta( absint( $post_id ), 'ProgramType', true );

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

//change the icon based on the delivery mode
$icon = "";

switch ( $deliverymode ){
    case "Face-to-Face": $icon = 'icon-group';
                         break;
    case "Online":       $icon = 'icon-laptop';
                         break;
    case "Mixed Mode":   $icon = 'icon-road';
                         break;
    default:             $icon = 'icon-tag';
                         break;
}

?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-box">

	<div class="boxey entry-content  <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> iso-style">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<a href="<?php echo esc_html( $permalink ); ?>" target="_blank"><span class="iso-title"><?php echo esc_html( $the_title ); ?></span></a>

				<div class="iso-description hidden"><?php echo wp_kses_post( get_the_excerpt() ); ?> <?php echo esc_html( $the_title ); ?> <?php echo esc_html( $coursecodeundergrad ); ?> <?php echo esc_html( $coursecodegrad ); ?> <?php echo esc_attr( $plain_term_slug ); ?> <?php echo esc_html ( $deliverymode ); ?> <?php echo esc_html ( $location ); ?> <?php echo esc_html ( $programtype ); ?> <?php echo esc_html ( $credit ); ?></div>

				<hr class="iso-separate" />

                <div class="iso-subtitle" data-subtitle="<?php echo esc_attr( $subtitle ); ?>">

					<p align="left"><?php echo esc_html( $subtitle ); ?></p>

				</div>

				<div class="iso-image">

					<div class="iso-image-mask"><img src="<?php echo esc_url( $promophoto ); ?>" alt="" /></div>

				</div>

				<div class="iso-footer">

                    <i class="icon-map-marker"></i> <small><?php echo esc_html( $location ); ?></small> <br/>

                    <i class="icon-time"></i> <small><?php echo esc_html( $dates ); ?></small><br/>

                    <i class="<?php echo esc_html( $icon ); ?>"></i> <small><?php echo esc_html( $deliverymode ); ?></small>

				</div>

			</div><!-- end .boxey-inner -->

		</div><!-- end .boxey-inside -->

	</div><!-- end .boxey entry-content -->

</div>
