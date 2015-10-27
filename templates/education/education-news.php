<?php
/**
 * A template for the Education News page. http://educ.sites.olt.ubc.ca/news-events/
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
 */
// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title          = get_the_title();

//Fetch post content

$the_content          = get_the_content();

// Some custom fields
$location			= get_post_meta( absint( $post_id ), 'location', true );
$department 		= get_post_meta( absint( $post_id ), 'department', true );

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

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?>">

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<small class="modal-tags header-tags"><?php echo esc_html( $plain_tags_slug ); ?></small>

				<a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" title="<?php the_title_attribute(); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a>

				<h3 class="post-title">

				<div class="iso-title"><a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" title="<?php the_title_attribute(); ?>" class="fancybox-inline"><?php the_title(); ?></a>

				</div>

				</h3>

				<div class="iso-description hidden"><?php echo wp_kses_post( get_the_excerpt() ); ?>
					<?php the_content(); ?></div>

				<div class="boxey-excerpt"><?php echo wp_kses_post( get_the_excerpt() ); ?></div>

			</div><!-- end .boxey-inner -->

		</div> <!-- end .boxey-inside -->

<!-- Start fancybox popup -->
<div style="display:none;">

        <div id="modal_<?php echo absint( $post_id ); ?>" class="span9 fancystyle">

            <div class="<?php echo esc_attr( $plain_term_slug ); ?>">

              	<div class="modal-header <?php echo esc_attr( $plain_term_slug ); ?>">

              	</div><!-- end #modal-header -->

              <div class="modal-body">

              	<div class="row-fluid">

                  <div class="span12">

                    <h3 class="post-title"><?php echo esc_html( $the_title ); ?></h3>

                    <div class="modal-body-content">
					          <?php the_content(); ?>
				          	</div>

                  </div>   <!-- end .span12 -->

                </div> <!-- end .row-fluid -->

              </div>  <!-- end .modal-body -->

          	<div class="modal-footer">

        		<a href="<?php echo get_permalink(); ?>" target="_blank">open full page <i class="icon-share-alt belize-hole"></i></a> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

         	</div>  <!-- End .modal-footer -->

		</div> <!-- End .plain terms slug-->

    </div><!-- End .span9 -->

</div><!-- End display none -->

	</div> <!-- end .boxey-->

</div><!-- End #the_ID -->
