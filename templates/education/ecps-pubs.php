<?php

/**
 * Template for ECPS Recent Publications http://ecps-educ.sites.olt.ubc.ca/events-media/recent-publications/ 
*
 */

// Collate our data
//Fetch post ID
$post_id 		= get_the_ID();

// Custom fields
$author				= get_post_meta( absint( $post_id ), 'author', true );
$publish_date 		= get_post_meta( absint( $post_id ), 'publish_date', true );
$publisher 			= get_post_meta( absint( $post_id ), 'publisher', true );
$publication_url 	= get_post_meta( absint( $post_id ), 'publication-url', true );

// Replacement for [plain_tags_slug]
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

// How to get the post thumbnail
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );
?>

<div class="span2">
<div class="pubimageback"><img class="pub-image" src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div>
</div><div class="span9">
<h3><?php the_title(); ?></h3>
<?php echo esc_html( $author ); ?>  <?php the_content(); ?>
<div class="published">Published <?php echo esc_html( $publish_date ); ?> by <?php echo esc_html( $publisher ); ?></div>
</div><div class="span1">
<div class="pubsicon <?php echo esc_attr( $plain_tags_slug ); ?>"><a href="<?php echo esc_url( $publication_url); ?>" target="_blank"><i class="icon-search"></i></a></div>
</div>
<hr />
