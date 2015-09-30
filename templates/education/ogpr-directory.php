<?php

/**
 * A template for the the OGPR Faculty Directory isotope http://ogpr-educ.sites.olt.ubc.ca/directory/
 *
 */

// Fetch the post ID for the currently set up post - we're in the loop
$post_id 			= get_the_ID();

// Some custom fields
$contribution1					= get_post_meta( absint( $post_id ), 'contribution1', true );
$contribution2					= get_post_meta( absint( $post_id ), 'contribution2', true );
$contribution3					= get_post_meta( absint( $post_id ), 'contribution3', true );
$contribution4					= get_post_meta( absint( $post_id ), 'contribution4', true );
$contribution5					= get_post_meta( absint( $post_id ), 'contribution5', true );
$directory_firstname			= get_post_meta( absint( $post_id ), 'directory_firstname', true );
$directroy_lastname				= get_post_meta( absint( $post_id ), 'directroy_lastname', true );
$directory_title				= get_post_meta( absint( $post_id ), 'directory_title', true );
$directroy_department			= get_post_meta( absint( $post_id ), 'directroy_department', true );
$directory_chair				= get_post_meta( absint( $post_id ), 'directory_chair', true );
$directory_impact				= get_post_meta( absint( $post_id ), 'directory_impact', true );
$directory_keywords				= get_post_meta( absint( $post_id ), 'directory_keywords', true );
$directory_profilelink			= get_post_meta( absint( $post_id ), 'directory_profilelink', true );
$directory_researcharea			= get_post_meta( absint( $post_id ), 'directory_researcharea', true );


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

<div id="post-<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-profile">
	
	<div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> profile">
		
		<div class="boxey-inside">
			
			<div class="iso-featured-image"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>

			<div class="boxey-inner">
			
				<h3><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline">
				<div class="iso-title"><?php echo esc_html( $directory_firstname ); ?> <?php echo esc_html( $directroy_lastname ); ?>
				<small><?php echo esc_html( $directory_title ); ?>, <?php echo esc_html( $directroy_department ); ?><div><?php echo esc_html( $directory_chair ); ?></div></small></div></a></h3>

				<div class="iso-description hidden">
					<?php echo esc_html( $directory_keywords ); ?> 
					<?php echo esc_html( $directory_researcharea ); ?> 
					<?php echo esc_html( $directory_impact ); ?> 
					<?php echo esc_html( $contribution1 ); ?>
					<?php echo esc_html( $contribution2 ); ?>
					<?php echo esc_html( $contribution3 ); ?>
					<?php echo esc_html( $contribution4 ); ?>
					<?php echo esc_html( $contribution5 ); ?> 
					<?php echo esc_html( $directory_chair ); ?>
					<?php echo esc_html( $directory_firstname ); ?> 
					<?php echo esc_html( $directroy_lastname ); ?>
				</div>
				<a href="#modal_<?php echo absint( $post_id ); ?>" class="btn btn-small launch-btn fancybox-inline">Read More</a>
		
		</div><!-- end .boxey-inner -->
	
	</div><!-- end .boxey-inside -->

</div><!-- end .boxey -->

<div style="display:none;">
	
	<div id="modal_<?php echo absint( $post_id ); ?>" class="span9">
 		 
 		 <div class="">
			
			<div class="modal-header">
     		 <h3 class="modal-label header-tags"><?php echo esc_html( $directory_firstname ); ?> <?php echo esc_html( $directroy_lastname ); ?></br><small><?php echo esc_html( $directory_title); ?> || <?php echo esc_html( $directroy_department ); ?></small></h3>
    		</div>
    		
    		<div class="modal-body">
     			
     			 <div class="row-fluid">
       				 
       				 <div class="modal-body-content">
         			 <div class="span3"><div class="modal-iso-featured-image"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div><div class="chair"><?php echo esc_html( $directory_chair ); ?></div><div class="modalbtns"><?php echo esc_html( $directory_profilelink ); ?></div>
         			</div>

         			 <div class="span9"><div class="modal-iso-title"></div>
						
						<div class="modal-iso-description">
						<?php echo esc_html( $directory_impact ); ?></br>
						
						<strong><h5>Keywords:</h5></strong> 
						
						<div class="keywords"><?php echo esc_html( $directory_keywords); ?></div></br>
						
						<strong><h5>Contributions:</h5></strong>
						
						<div class="indent"><?php echo esc_html( $contribution1 ); ?></div>
						
						<div class="indent"><?php echo esc_html( $contribution2 ); ?></div>
						
						<div class="indent"><?php echo esc_html( $contribution3 ); ?></div>

						<div class="indent"><?php echo esc_html( $contribution4 ); ?></div>

						<div class="indent"><?php echo esc_html( $contribution5 ); ?></div>
						
						</div></div>

        			</div><!-- end .modal-body-content -->
     			
     			 </div><!-- end .row-fluid --> 
    		
    		</div><!-- end .modal-body -->
		
		</div><!-- end class none -->

	</div><!-- end span9-->

</div><!-- end display none-->

</div><!-- end iso outer -->
