<?php

//**
 //* A template for DNSO Profiles.  http://dnso.educ.ubc.ca/administrative-directory/

// Fetch the post ID for the currently set up post - we're in the loop

$post_id      = get_the_ID();

// How to get the post thumbnail
$post_thumbnail   = wp_get_attachment_url( get_post_thumbnail_id( absint( $post_id ) ) );

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

//Get the Profile Fields 
$profile_cct  = get_post_meta( $post_id, 'profile_cct',true);

$salutations         = $profile_cct['name']['salutations'] ;
$first_name          = $profile_cct['name']['first'];
$middle_name         = $profile_cct['name']['middle'] ;
$last_name           = $profile_cct['name']['last'] ;
$position            = $profile_cct['position']['0']['position'] ;
$clone_room_number   = $profile_cct['clone_room_number']['0']['position'] ;
$clone_name_title_room_phone_email = $profile_cct['clone_name_title_room_phone_email']['textarea'] ;
$phone1              = $profile_cct['phone']['0']['tel-1'];
$phone2              = $profile_cct['phone']['0']['tel-2'];
$phone3              = $profile_cct['phone']['0']['tel-3'];
$email               = $profile_cct['email']['0']['email'];
$clone_bio           = $profile_cct['clone_bio']['textarea'];
$clone_other_websites = $profile_cct['clone_other_websites']['textarea'];
$clone_office        = $profile_cct['clone_office']['0']['text'];
$website             = $profile_cct['website']['textarea'];
?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-profile">

  <div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> profile">

    <div class="boxey-inside">

        <div class="boxey-inner">
            
          <div class="iso-featured-image"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>
          
          <h3><div class="iso-title"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline">
            <?php echo esc_html( $salutations );?> <?php echo esc_html( $first_name );?> <?php echo esc_html( $middle_name );?> <?php echo esc_html( $last_name );?> 
          
          <small><?php echo esc_html( $position ); ?></small></a></div></h3>
          
          <div class="iso-description hidden">
            <?php echo esc_html( $first_name );?> 
            <?php echo esc_html( $middle_name );?> 
            <?php echo esc_html( $last_name );?> 
            <?php echo esc_html( $clone_bio );?>
            <?php echo esc_html( $bio );?>
            <?php echo esc_html( $position ); ?>
            <?php echo esc_html( $plain_term_name ); ?>
          </div>

          <?php echo esc_html( $clone_room_number );?></br>
          
          <i class="icon-envelope"></i> <a href="mailto:<?php echo esc_attr( $email );?>"><?php echo esc_html ( $email );?></a></br>
          
          <i class="icon-phone-sign"></i> <?php echo esc_html( $phone1 );?> <?php echo esc_html( $phone2 );?>-<?php echo esc_html( $phone3 );?></br>
          
          <a href="#modal_<?php echo absint( $post_id ); ?>" role="button" class="btn btn-small launch-btn fancybox-inline">See More</a>

        </div>

      </div>

    </div>

<div style="display:none;">
 
  <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">
 
    <div class="">
  
     <div class="modal-body">
    
        <div class="row-fluid">
       
         <div class="span12">
        
           <div class="modal-body-content">
          
             <div class="span3"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div>
             
             <div class="span9">

              <div class="modal-iso-title">

                <h3> <?php echo esc_html ( $salutations );?> <?php echo esc_html ( $first_name );?>  <?php echo esc_html( $middle_name );?> <?php echo esc_html( $last_name );?> 

                <small></small></h3>

              </div>
                  
                  <div class="modal-iso-description">
                  <?php echo esc_html( $clone_room_number );?></br>
                 

                   <i class="icon-envelope"></i> <a href="mailto:<?php echo esc_attr( $email );?>"><?php echo esc_html ( $email );?></a>
                   <i class="icon-phone-sign"></i> <?php echo esc_html( $phone1 );?> <?php echo esc_html( $phone2 );?>-<?php echo esc_html( $phone3 );?>
                  </div>
                  
                  <div class="modal-postion-description"><?php echo esc_html ( $clone_bio );?></div>
            
             </div><!-- end .span9--> 
            
            </div><!-- end .modal-body-content--> 
       
        </div><!-- end .span12 --> 
      
      </div><!-- end .row-fluid --> 
    
    </div><!-- end .modal-body -->
 
  </div><!-- end no class -->

</div><!-- end #modal_theID-->

</div><!-- end display none-->

</div><!-- end #post-theID-->
