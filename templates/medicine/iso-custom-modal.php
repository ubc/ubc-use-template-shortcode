<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom modal launch button for ISO shortcode usage. 
 * 
 * This is a simple template to allow for larger reusability. Outputs a div with an id of the post. 
 *
 */

$post_id 			= absint( get_the_ID() );
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( $post_id ) );
$the_permalink		= esc_url( get_permalink() );
$the_title          = esc_html( get_the_title() );
$the_date 			= get_the_date();
$the_excerpt 		= wp_kses_post( get_the_excerpt() );
$the_content        = wp_kses_post( get_the_content() );
$category_list		= wp_kses_post( get_the_category_list() );
$the_author			= esc_html( get_the_author() );
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

?>



	<div class="boxey <?php echo esc_attr( $plain_term_slug ); ?>">
		<small class="header-tags"><?php echo $category_list; ?></small>

		<img src="<?php echo $post_thumbnail; ?>" class="img-rounded">
		<h2><a href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>"> <?php echo $the_title; ?></a></h2>
		<p class="the_author">
			<?php echo $the_author; ?><br />
			<small><?php echo $the_date; ?></small>
		</p>
		
		<a class="btn btn-small launch-btn" href="#<?php echo absint( $post_id ); ?>" data-toggle="modal">Launch</a>
		<p class="the_excerpt"><?php echo $the_excerpt ?></p>


		<div id="<?php echo $post_id; ?>" class="modal fade hide container" tabindex="-1">
			<div>
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">×</button>
					<h3><a href="<?php echo $the_permalink; ?>#myModalLablel_" class="modal-label header-tags"><?php echo $the_title; ?></a></h3>
				</div>
				<!-- end #modal-header -->
				<div class="modal-body">
					<div class="row-fluid">
						<div class="modal-body-content"><?php echo $the_content;  ?></div>
					</div>
				<!-- end .row-fluid -->

				</div>
				<!-- end .modal-body -->
				<div class="modal-footer">
					<a href="<?php echo $the_permalink; ?>">open full page <i class="icon-share-alt belize-hole"></i></a>
					<button class="close" type="button" data-dismiss="modal">×</button>
				</div>
				<!-- End modal-footer -->

			</div>
		</div>
	</div>

