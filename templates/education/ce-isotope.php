<?php

//**
//* A template for Community Engagement projects page.  http://commen-sandbox.educ.sites.olt.ubc.ca/community-engagement/

// Collate our data

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

// Custom fields
$disable			= get_post_meta( absint( $post_id ), 'disable', true );
$leademail		= get_post_meta( absint( $post_id ), 'leademail', true );
$projecttitle 		= get_post_meta( absint( $post_id ), 'projecttitle', true );


// How to get the post thumbnail
$post_thumbnail 	= wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

// Replacement for [plain_tags_slug]
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );


// Replacement for [odd-even]
global $usage_id;
$usage_id++;
$odd_even 			= ( 0 === $usage_id % 2 ) ? 'even' : 'odd';

?>

<div class="boxey <?php echo esc_attr( $plain_tags_slug ); ?>" data-category="<?php echo esc_attr( $plain_tags_slug ); ?>"><a href="<?php the_permalink(); ?>" class="<?php echo esc_attr( $disable); ?>"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a>
	<div class="boxeycontent">
		<div class="boxeytitle"><?php echo esc_html( $projecttitle); ?></div>
		<div class="projectinfo">
			<div class="lead"><?php echo esc_html( $leademail ); ?></div>
			<div class="dept department"><?php echo esc_attr( $plain_tags_slug ); ?></div>
		</div>
	</div>
</div>
