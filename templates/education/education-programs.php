<?php
/**
 * A template for the Education Programs. This is also an example of how to use
 * and correctly escape content to be output.
 *
 * This template is loaded using output buffering, which means you should probably
 * not use output buffering in here.
 *
 * You're in the main WordPress loop (if you're using this with a [loop] shortcode)
 * and so you have access to all of the WordPress items which rely on that. The big thing
 * you will need will be the individual post ID for this. you can do that with
 * $id = get_the_ID();
 *
 * $id will now contain the ID of the current post.
 *
 * Also, if you wish to get a custom field for this post, you can use get_post_meta()
 * Docs: https://developer.wordpress.org/reference/functions/get_post_meta/
 * A gotcha for this is normally you will want the third paramater to be true (so it
 * returns a single value), i.e. if you have a custom field with a key of location;
 * $location = get_post_meta( $id, 'location', true );
 *
 * You *can* also use shortcodes here. However, and this is REALLY IMPORTANT, don't
 * use them within HTML attributes. That is the whole reason this plugin exists.
 * In order to use a shortcode you need to use the do_shortcode() function. i.e.
 * if you *really* must, and you have a shortcode called [my_shortcode] then the following
 * should work;
 * echo do_shortcode( '[my_shortcode]' );
 *
 * A best practice is to set up your variables at the top of this file, and then
 * use them sparingly - WITH ESCAPING - in the markup
 *
 */
// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();
//Fetch post title

$the_title          = get_the_title();
// Some custom fields
$location			= get_post_meta( absint( $post_id ), 'location', true );
$department 		= get_post_meta( absint( $post_id ), 'department', true );
$programlink 		= get_post_meta( absint( $post_id ), 'programlink', true );
$applylink 			= get_post_meta( absint( $post_id ), 'applylink', true );
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
					<?php echo esc_html( $the_title ); ?>
				</div>

				<div class="iso-description hidden">
					<?php the_content(); ?>
					<?php echo wp_kses_post( $department ); ?>
					<?php echo wp_kses_post( $location ); ?>
				</div>

				<div class="excerpt">

					<div class="location">
						<?php echo wp_kses_post( $location ); ?>
						<small><?php echo wp_kses_post( $department ); ?></small>
					</div>

				</div>

			</div><!-- .boxey-inner -->

		</div><!-- .boxey-inside -->

		<a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" class="fancybox-inline"><span class="link-spanner"></span></a>

		<!-- Start Modal -->
<div style="display:none">
            
        <div id="modal_<?php echo absint( $post_id ); ?>" class="span9 fancystyle">

			<div class="<?php echo esc_attr( $plain_tags_slug ); ?>">

				<div class="modal-header <?php echo esc_attr( $plain_tags_slug ); ?>">
				</div><!-- .modal-header -->

				<div class="modal-body">

					<div class="row-fluid">

						<div class="span12">

							<img class="pull-right visible-desktop visible-tablet alignright featured-images-pages" src="<?php echo wp_kses_post( $post_thumbnail ); ?>" alt="" />
							<h3 class="post-title"><a href="<?php esc_url( $programlink ); ?>"><?php echo esc_html( $the_title ); ?></a></h3>

							<div class="modal-body-content">

								<div class="modal-location">
									<?php echo wp_kses_post( $location ); ?>
								</div>

								<?php the_content(); ?>

								<div class="modal-excerpt">
									<?php echo wp_kses_post( $department ); ?>
								</div>

								<div class="modal-icons-set">

									<div class="lefticon">
										<a href="<?php esc_url( $programlink ); ?>" target="_blank" role="button" class="btn btn-large launch-btn"><i class="icon-th-list"></i> Details</a>
									</div>

									<div class="righticon">
										<a href="<?php esc_url( $applylink ); ?>" target="_blank" role="button" class="btn btn-large launch-btn"><i class="icon-pencil"></i> How to Apply</a>
									</div>

								</div>

							</div>

						</div>

					</div><!-- .row-fluid -->

				</div><!-- .modal-body -->

			</div>

		</div><!-- .modal -->

	</div>
	
	</div>

</div>
