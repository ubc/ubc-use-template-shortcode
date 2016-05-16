<?php

// Fetch common wp funtions get_the_/ title, permalink, title, excerpt, and the_post_thumbnail.
$post_id 			= get_the_ID();
$the_permalink 		= get_the_permalink();
$get_the_title 		= get_the_title();
$get_the_excerpt	= get_the_excerpt();
$post_thumbnail 	= the_post_thumbnail( 'large' );

// Fetch category and tags.
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );
$plain_term_slug 	= \UBC\Helpers::get_plain_terms( absint( $post_id ), 'slug', ' ' );

?>
<div class="span4 grid-item <?php echo esc_html( $plain_tags_slug ); ?> <?php echo esc_html( $plain_term_slug ); ?>">

	<div class="quick-links-box">

		<?php if ( has_post_thumbnail() ) : ?>

		<div class="img-container">

			<a target="_self" href="<?php echo esc_url( $the_permalink ); ?>" title="<?php echo esc_attr( $get_the_title ); ?>">
				<?php esc_html( $post_thumbnail ); ?>
			</a>

		</div><!-- end .img-container -->

		<?php endif; ?>

		<h4><a target="_self" href="<?php echo esc_url( $the_permalink ); ?>" title="<?php echo esc_attr( $get_the_title ); ?>" class=""><?php echo esc_html( $get_the_title ); ?></a></h4>
		<?php echo esc_html( $get_the_excerpt ); ?>
		<br>
	    <a target="_self" href="http://beatymuseum.ubc.ca/learn/book-a-program/" title="Read more on <?php echo esc_attr( $get_the_title ); ?>" class="btn btn-primary btn-small">Read more</a>
	    <br>

	</div><!-- end .quick-links-box -->

</div><!-- end .span4 -->
