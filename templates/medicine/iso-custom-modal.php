<?php 
/**
 * URL: http://arts.med.ubc.ca/
 * Custom loop and modal for ISO shortcode usage. 
 * 
 *
 */

$post_id 			= get_the_ID();
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );
$the_permalink		= get_permalink();
$the_title          = get_the_title();
$the_date 			= get_the_date();
$the_excerpt 		= get_the_excerpt();
$the_content        = get_the_content();
$category_list		= get_the_category_list();
$the_author			= get_the_author();

?>



	<div class="boxey <?php echo esc_attr( $plain_term_slug ); ?>">
		<small class="header-tags"><?php echo wp_kses_post( $category_list ); ?></small>

		<img src="<?php echo esc_url( $post_thumbnail ); ?>" class="img-rounded">
		<h2><a href="<?php echo esc_url( $the_permalink ); ?>" title="<?php echo esc_html( $the_title ); ?>"> <?php echo esc_html( $the_title ); ?></a></h2>
		<p class="the_author">
			<?php echo esc_html( $the_author ); ?><br />
			<small><?php echo esc_html( $the_date );?></small>
		</p>
		
		<a class="btn btn-small launch-btn" title="launch post" href="#<?php echo absint( $post_id ); ?>" data-toggle="modal">Launch</a>
		<p class="the_excerpt"><?php echo wp_kses_post( $the_excerpt ); ?></p>


		<div id="<?php echo absint( $post_id ); ?>" class="modal fade hide container" tabindex="-1">
			<div>
				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">×</button>
					<h3><a href="<?php echo esc_url( $the_permalink ); ?>#myModalLablel_" title="<?php echo esc_html( $the_title ); ?>" class="modal-label header-tags"><?php echo esc_html( $the_title ); ?></a></h3>
				</div>
				<!-- end #modal-header -->
				<div class="modal-body">
					<div class="row-fluid">
						<div class="modal-body-content"><?php echo wp_kses_post( $the_content );  ?></div>
					</div>
				<!-- end .row-fluid -->

				</div>
				<!-- end .modal-body -->
				<div class="modal-footer">
					<a href="<?php echo esc_url( $the_permalink ); ?>" title="Open full page">open full page <i class="icon-share-alt belize-hole"></i></a>
					<button class="close" type="button" data-dismiss="modal">×</button>
				</div>
				<!-- End modal-footer -->

			</div>
		</div>
	</div>

