<?php

//**
 //* A template for EDCP Sudent Profiles page. http://edcp.educ.ubc.ca/students/current-students-2/doctoral-student-profiles/

// Fetch the post ID for the currently set up post - we're in the loop

$post_id          = get_the_ID();

// How to get the post thumbnail
$post_thumbnail   = wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

// Some custom fields
$email		      	= get_post_meta( absint( $post_id ), 'email', true );

// Replacement for [plain_tags_slug]
$plain_tags_slug  = \UBC\Helpers::get_plain_tags( absint( $post_id ), 'slug', ' ' );

// Replacement for [plain_term_slug]
$plain_term_slug  = \UBC\Helpers::get_plain_terms( absint( $post_id ), 'slug', ' ' );

// To get Taxonomies as names
$plain_term_name  = \UBC\Helpers::get_plain_terms( absint( $post_id ), 'name', ' ' );


// Replacement for [odd-even] but *really* this should be done in CSS.
global $usage_id;
$usage_id++;
$odd_even       = ( 0 === $usage_id % 2 ) ? 'even' : 'odd';

?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-profile">

  <div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> profile">

    <div class="boxey-inside">

    	<small class="red-tags"><?php echo $plain_term_name ?></small>

    	 <div class="boxey-inner">
            
          <div class="iso-featured-image"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>
          
           <h3>

            <div class="iso-title"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><?php $the_title;?></a>

           </div>

           </h3>

				<small><a href="mailto:<?php echo esc_attr( $email );?>"><?php echo esc_html( $email );?></a></small>

				<div class="iso-description hidden"><?php $the_content;?></div>
				
				<a href="#modal_<?php echo absint( $post_id ); ?>" role="button" class="btn btn-small launch-btn fancybox-inline">Read More</a>          

        </div>

      </div>

    </div>

<div style="display:none;">
 
  <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">
 
    <div>

    	<div class="modal-header">
			
			<h3 id="myModalLabel_<?php echo absint( $post_id ); ?>" class="modal-label header-tags">[the_title] 
				
				<small><a href="mailto:<?php echo esc_attr( $email );?>"><?php echo esc_html( $email );?></a></small></h3>
		</div><!-- end .modal-header -->
  
     <div class="modal-body">
    
        <div class="row-fluid">
       
         <div class="span12">
        
           <div class="modal-body-content">
          
             <div class="span3"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div>
             
             <div class="span9">
                  
                  <div class="modal-iso-description">

                 <?php $the_content;?>

                  </div>                  
            
             </div><!-- end .span9--> 
            
            </div><!-- end .modal-body-content--> 
       
        </div><!-- end .span12 --> 
      
      </div><!-- end .row-fluid --> 
    
    </div><!-- end .modal-body -->
 
  </div><!-- end no class -->

</div><!-- end #modal_theID-->

</div><!-- end display none-->

</div><!-- end #post-theID-->
