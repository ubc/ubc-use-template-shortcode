<?php

/**
 * URL: http://educ.ubc.ca/about/education-at-ponderosa-commons/
 * A template for Education's Ponderosa Commons about page. However, this also
 * serves as a basic example of how to use this shortcode.
 *
 * It shows a thumbnail, with a link to the full image and some custom field
 * info shown below each thumbnail
 *
 * Please see the other comments in templates/education/programs.php for more
 * genetic information about escaping, variables etc.
 *
 * Note: get_the_excerpt() is used as using just the_excerpt() applies formatting
 * to it (and hence wraps a <p> tag around it which would break this layout
 * otherwise)
 */

// Collate our data
$post_id 		= get_the_ID();
$photo_date 	= get_post_meta( absint( $post_id ), 'photo_date', true );
$post_thumb_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );
$full_img_url 	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

?>

<div class="spacing">

	<a title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" href="<?php echo esc_url( $full_img_url[0] ); ?>">
		<img src='<?php echo esc_url( $post_thumb_url[0] ); ?>' alt='' />
	</a>

	<div class="excerpt_text">
		<em><?php echo esc_html( $photo_date ); ?></em> - <?php echo wp_kses_post( get_the_excerpt() ); ?>
	</div><!-- .excerpt_text -->

</div><!-- .spacing -->
