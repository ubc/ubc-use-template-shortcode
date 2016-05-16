<?php

// Template for Education's 100 http://educ.ubc.ca/alumni-supporters/year-of-alumni/educations-100/

// Fetch the post ID for the currently set up post - we're in the loop
$post_id = get_the_ID();

//The permalink
$the_permalink = get_the_permalink();

//Get the Profile Fields
$profile_cct	= get_post_meta( $post_id, 'profile_cct', true );

//Set variables for profile field salutations, first name, middle name, last name and bio using a ternary operator
$salutations = ( isset( $profile_cct['name']['salutations'] ) ) ? $profile_cct['name']['salutations']: false;
$first_name = ( isset( $profile_cct['name']['first'] ) ) ? $profile_cct['name']['first']: false;
$middle_name = ( isset( $profile_cct['name']['middle'] ) ) ? $profile_cct['name']['middle']: false;
$last_name = ( isset( $profile_cct['name']['last'] ) ) ? $profile_cct['name']['last']: false;
$credentials = ( isset( $profile_cct['name']['credentials'] ) ) ? $profile_cct['name']['credentials']: false;
$bio = ( isset( $profile_cct['bio']['textarea'] ) ) ? $profile_cct['bio']['textarea']: false;

?>
<div class="span3 grid-item">

	<?php if ( has_post_thumbnail() ) : //lets make sure the post has a thumbnail before echo... even though it's suppose to have one ?>
	<a class="fancybox-inline" href="#<?php echo absint( $post_id ); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
	<?php endif; ?>

	<header>
		<h2><a class="fancybox-inline name" href="#<?php echo absint( $post_id ); ?>">

<?php if ( false !== $salutations ) :

	echo '<span class="salutations>'.esc_html( $salutations ).' </span>';// Show salutations if set

endif;

if ( false !== $first_name ) :

	echo '<span class="first">'. esc_html( $first_name ).' </span>'; // Show first name if set

endif;

if ( false !== $middle_name ) :

	echo '<span class="middle">'.esc_html( $middle_name ).' </span>'; // Show middle name if set

endif;

if ( false !== $last_name ) :

	echo '<span class="last">'. esc_html( $last_name ).'</span>'; // Show last name if set

endif;

if ( false !== $credentials ) :

	echo '<span class="credentials">, '. esc_html( $credentials ).'</span>'; // Show creditials if set

endif; ?>

		</a></h2>
	</header>
</div><!-- end .grid-item -->

<div style="display:none"><!-- div needed for fancybox inline popup -->
	<div class="span9" id="<?php echo absint( $post_id ); ?>">
		<div class="row-fluid">
			<div class="span8 profile-modal">
				<h2>

<?php if ( false !== $salutations ) :

	echo '<span class="salutations>'.esc_html( $salutations ).' </span>';// Show salutations if set

endif;

if ( false !== $first_name ) :

	echo '<span class="first">'. esc_html( $first_name ).' </span>'; // Show first name if set

endif;

if ( false !== $middle_name ) :

	echo '<span class="middle">'.esc_html( $middle_name ).' </span>'; // Show middle name if set

endif;

if ( false !== $last_name ) :

	echo '<span class="last">'. esc_html( $last_name ).'</span>'; // Show last name if set

endif;

if ( false !== $credentials ) :

	echo '<span class="credentials">, '. esc_html( $credentials ).'</span>'; // Show creditials if set

endif; ?>

				</h2>
<p><?php if ( false !== $bio ) :

	echo wp_kses_post( do_shortcode( '[profilefield type=bio]' ) );

endif; ?></p>
					<p><a href="<?php echo esc_url( $the_permalink ); ?>" class="btn btn-small" target="_blank">View Profile Page</a></p>
			</div><!-- end .span8 -->
			<div class="span4">

<?php if ( has_post_thumbnail() ) : //Same deal as before lets make sure the post has a thumbnail before showing it... yes the div will be empty if there is nothing.. so be it

	the_post_thumbnail( 'full' );

endif; ?>

			</div><!-- end .span4 -->
		</div><!-- end .row-fluid -->
	</div><!-- end .span9 -->
</div><!-- end style display none -->
