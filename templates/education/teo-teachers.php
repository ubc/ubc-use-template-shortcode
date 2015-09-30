<?php

//**
 //* A template for TEO Teachers iso. http://teach-educ.sites.olt.ubc.ca/faculty/adjunct-teaching-professors/

// Fetch the post ID for the currently set up post - we're in the loop

$post_id      = get_the_ID();

//Fetch post title
$the_title          = get_the_title();

// How to get the post thumbnail
$post_thumbnail   = wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

// Some custom fields
$email						= get_post_meta( absint( $post_id ), 'email', true );
$body						= get_post_meta( absint( $post_id ), 'body', true );

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

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?>">

  <div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?>">

    <div class="boxey-inside">

    	 <div class="boxey-inner">
            
          <a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a>
          
           <div class="iso-title"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><?php echo esc_html ( $the_title );?></a>

           </div>
				
			<a href="#modal_<?php echo absint( $post_id ); ?>" role="button" class="btn btn-small launch-btn fancybox-inline">Read More</a>

        </div>

      </div>

    </div>

<div style="display:none;">
 
  <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">
 
    <div class="<?php echo esc_attr( $plain_term_slug ); ?>">

    	<div class="modal-header <?php echo esc_attr( $plain_term_slug ); ?>">

    	</div><!-- end .modal-header -->
  
     <div class="modal-body">
    
        <div class="row-fluid">
       
         <div class="span12">

         	<h3 class="post-title"><?php echo esc_html ( $the_title );?></h3>
        
           <div class="modal-body-content">

           	<div id="adjunct-teacher-entry">
          
            	 <div class="span4"><img class="alignnone img-polaroid" src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div>
             
            	 <div class="span8">
                  
                	 <?php echo esc_html( $body ); ?>
            
            	 </div><!-- end .span8--> 

            	 <div class="clearfix"></div>

        	 </div> <!-- end .adjunct-teacher-entry--> 
            
            </div><!-- end .modal-body-content --> 
       
        </div><!-- end .span12 --> 
      
      </div><!-- end .row-fluid --> 
    
    </div><!-- end .modal-body -->

    <div class="modal-footer"><a href="<?php echo get_permalink(); ?>" target="_blank">open full page <i class="icon-share-alt belize-hole"></i></a></div>
 
  </div><!-- end .plain_term_slug -->

</div><!-- end #modal_theID-->

</div><!-- end display none-->

</div><!-- end #post-theID-->
