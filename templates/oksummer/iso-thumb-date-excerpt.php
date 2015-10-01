<?php

/**
 * URL: http://summer.ok.ubc.ca/
 * A template for Okanagan campus Summer Programs website using ISO shortcode.
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

// Replacement for [plain_tags_slug]
$plain_tags_slug 	= \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

// Replacement for [odd-even] but *really* this should be done in CSS.
global $usage_id;
$usage_id++;
$odd_even 			= ( 0 === $usage_id % 2 ) ? 'even' : 'odd';

?>

<div id="post-<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_tags_slug ); ?> outerfeature boxey">
    <a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium'); ?></a>
    <div>
        <div>
            <div class="innerfeature">
                <div>
                    <div>
                        <div class="iso-title">
                            <h3 class="title"><?php the_title(); ?></h3>
                        </div>
                        <strong class="target"><?php the_excerpt(); ?></strong>
                        <a class="btn btn-info btn-small" title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">More Info</a>
                    </div>
                </div>
                       <div class="iso-description"><?php the_content(); ?></div>
            </div>
        </div>
    </div>
</div>