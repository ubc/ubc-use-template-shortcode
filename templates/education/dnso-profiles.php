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
$profile_cct  = get_post_meta( $post_id, 'profile_cct', true);

$salutations         = ( isset( $profile_cct['name']['salutations'] ) ) ? $profile_cct['name']['salutations'] : false;
$first_name          = ( isset( $profile_cct['name']['first'] ) ) ? $profile_cct['name']['first'] : false;
$middle_name         = ( isset( $profile_cct['name']['middle'] ) ) ? $profile_cct['name']['middle'] : false;
$last_name           = ( isset( $profile_cct['name']['last'] ) ) ? $profile_cct['name']['last'] : false;
$position            = ( isset( $profile_cct['position']['0']['position'] ) ) ? $profile_cct['position']['0']['position']  : false;
$clone_room_number   = ( isset( $profile_cct['clone_room_number']['0']['position'] ) ) ? $profile_cct['clone_room_number']['0']['position'] : false;
$clone_name_title_room_phone_email = ( isset( $profile_cct['clone_name_title_room_phone_email']['textarea'] ) ) ? $profile_cct['clone_name_title_room_phone_email']['textarea'] : false;
$phone1              = ( isset( $profile_cct['phone']['0']['tel-1'] ) ) ? $profile_cct['phone']['0']['tel-1']  : false;
$phone2              = ( isset( $profile_cct['phone']['0']['tel-2'] ) ) ? $profile_cct['phone']['0']['tel-2']: false;
$phone3              = ( isset( $profile_cct['phone']['0']['tel-3'] ) ) ? $profile_cct['phone']['0']['tel-3']: false;
$email               = ( isset( $profile_cct['email']['0']['email'] ) ) ? $profile_cct['email']['0']['email'] : false;
$clone_bio           = ( isset( $profile_cct['clone_bio']['textarea'] ) ) ? $profile_cct['clone_bio']['textarea'] : false;
$clone_office        = ( isset( $profile_cct['clone_office']['0']['text'] ) ) ? $profile_cct['clone_office']['0']['text'] : false;


?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-profile">

  <div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> profile">

    <div class="boxey-inside">

        <div class="boxey-inner">
   
          <div class="iso-featured-image"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>

          <h3><div class="iso-title">

            <a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline">
            <?php if ( false !== $salutations ) : echo esc_html( $salutations ); endif; ?> <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> <?php if ( false !== $middle ) : echo esc_html( $middle ); endif; ?> <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>          
            <small><?php if ( false !== $position ) : echo esc_html( $position ); endif; ?></small></a>

          </div></h3>

          <div class="iso-description hidden">
            <?php if ( false !== $salutations ) : echo esc_html( $salutations ); endif; ?> 
            <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> 
            <?php if ( false !== $middle ) : echo esc_html( $middle ); endif; ?> 
            <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>
            <?php if ( false !== $position ) : echo esc_html( $position ); endif; ?> 
            <?php if ( false !== $clone_name_title_room_phone_email ) : echo esc_html( $clone_name_title_room_phone_email ); endif; ?> 
            <?php echo esc_html( $plain_term_name ); ?>
          </div>

          <?php if ( false !== $clone_room_number ) : echo esc_html( $clone_room_number ); endif; ?></br>

          <i class="icon-envelope"></i> <a href="mailto:<?php echo esc_attr( $email );?>"><?php if ( false !== $email ) : echo $email; endif; ?></a></br>

          <i class="icon-phone-sign"></i> <?php if ( false !== $phone1 ) : echo esc_html( $phone1 ); endif; ?> <?php if ( false !== $phone2 ) : echo esc_html( $phone2 ); endif; ?> <?php if ( false !== $phone3 ) : echo esc_html( $phone3 ); endif; ?></br>

          <a href="#modal_<?php echo absint( $post_id ); ?>" role="button" class="btn btn-small launch-btn fancybox-inline">See More</a>

        </div>

      </div>

    </div>

  <div style="display:none">

      <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">

        <div class="">

         <div class="modal-body">

            <div class="row-fluid">

             <div class="span12">

               <div class="modal-body-content">

                 <div class="span3"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></div>

                 <div class="span9">

                    <div class="modal-iso-title">

                       <h3>
                       <?php if ( false !== $salutations ) : echo esc_html( $salutations ); endif; ?> <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> <?php if ( false !== $middle ) : echo esc_html( $middle ); endif; ?> <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>          
                       </h3>

                    </div>
 
                    <div class="modal-iso-description">
                       <?php if ( false !== $clone_room_number ) : echo esc_html( $clone_room_number ); endif; ?></br>

                       <i class="icon-envelope"></i> <a href="mailto:<?php if ( false !== $email ) : echo esc_attr( $email ); endif; ?>"><?php if ( false !== $email ) : echo esc_html( $email ); endif; ?></a>
                       <i class="icon-phone-sign"></i> <?php if ( false !== $phone1 ) : echo esc_html( $phone1 ); endif; ?> <?php if ( false !== $phone2 ) : echo esc_html( $phone2 ); endif; ?> <?php if ( false !== $phone3 ) : echo esc_html( $phone3 ); endif; ?>
                    </div>
  
                    <div class="modal-postion-description"><?php if ( false !== $clone_bio ) : echo wp_kses_post( $clone_bio ); endif; ?></div>

                </div><!-- end .span9--> 
                
              </div><!-- end .modal-body-content--> 
           
            </div><!-- end .span12 --> 
          
          </div><!-- end .row-fluid --> 
        
        </div><!-- end .modal-body -->
     
      </div><!-- end no class -->

    </div><!-- end #modal_theID-->

  </div><!-- end display none-->

</div><!-- end #post-theID-->
