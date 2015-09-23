<?php

/**
 * A template for the CFE Partners page.  http://cfe-educ.sites.olt.ubc.ca/community-partners/ 
 *
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

//Fetch post title

$the_title          = get_the_title();

// Some custom fields
$location			= get_post_meta( absint( $post_id ), 'Location', true );
$description		= get_post_meta( absint( $post_id ), 'Description', true );
$session 	    	= get_post_meta( absint( $post_id ), 'Session', true );
$website            = get_post_meta( absint( $post_id ), 'Website', true );
$theme              = get_post_meta( absint( $post_id ), 'Theme', true );
$address            = get_post_meta( absint( $post_id ), 'Physical Address', true );
$age                = get_post_meta( absint( $post_id ), 'Age Group', true );

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

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?>">

	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

		<div class="boxey-inside">

			<div class="boxey-inner">

				<a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" title="<?php the_title_attribute(); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a>
				
				<h3 class="post-title">

				<div class="iso-title"><a href="#modal_<?php echo absint( $post_id ); ?>" target="_blank" title="<?php the_title_attribute(); ?>" class="fancybox-inline"><?php echo esc_html( $the_title ); ?></a>
				</div>

				</h3>	

				<div class="iso-description hidden"><?php echo wp_kses_post( get_the_excerpt() ); ?> 
					<?php the_content(); ?></div>

				<a class="btn btn-small fancybox-inline" title="<?php the_title_attribute(); ?>" href="#modal_<?php echo absint( $post_id ); ?>">Read More</a>				
		
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
                   
                    	<div class="modal-body-content">
							
							<div id="community-partner-entry">
								<img class="pull-right alignright" src="<?php echo esc_url( $post_thumbnail ); ?>" />
								<a href="<?php echo esc_attr( $website ); ?>" target="_blank"><?php echo esc_html( $website ); ?></a><strong>Theme:</strong> <?php echo esc_html( $theme ); ?>

								<strong>Location(s):</strong> <?php echo esc_html( $location ); ?>

								<strong>Session(s):</strong> <?php echo esc_html( $sessions ); ?>

								<strong>Description:</strong>
								<?php echo esc_html( $description ); ?>

								<a href="<?php echo get_permalink(); ?>" target="_blank">open full page <i class="icon-share-alt belize-hole"></i></a>

							</div><!-- end .community partner entry-->

						</div><!-- end .modal-body-content -->
                  
                 	 </div>   <!-- end .span12 -->          
               
                </div> <!-- end .row-fluid --> 
               
            </div>  <!-- end .modal-body -->

		</div> <!-- End .plain terms slug-->
        
    </div><!-- End #modal_theID -->

</div><!-- End display none -->

	</div> <!-- end .boxey-->

</div><!-- End #the_ID -->
