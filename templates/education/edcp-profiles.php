<?php

//**
 //* A template for EDCP Profiles.  http://edcp.educ.ubc.ca/faculty-directory/

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

$salutations         = ( isset( $profile_cct['name']['salutations'] ) ) ? $profile_cct['name']['salutations']: false;
$first_name          = ( isset( $profile_cct['name']['first'] ) ) ? $profile_cct['name']['first']: false;
$middle_name         = ( isset( $profile_cct['name']['middle'] ) ) ? $profile_cct['name']['middle']: false;
$last_name           = ( isset( $profile_cct['name']['last'] ) ) ? $profile_cct['name']['last']: false;
$phone1              = ( isset( $profile_cct['phone']['0']['tel-1'] ) ) ? $profile_cct['phone']['0']['tel-1']: false;
$phone2              = ( isset( $profile_cct['phone']['0']['tel-2'] ) ) ? $profile_cct['phone']['0']['tel-2']: false;
$phone3              = ( isset( $profile_cct['phone']['0']['tel-3'] ) ) ? $profile_cct['phone']['0']['tel-3']: false;
$email               = ( isset( $profile_cct['email']['0']['email'] ) ) ? $profile_cct['email']['0']['email']: false;
$bio                 = ( isset( $profile_cct['bio']['textarea'] ) ) ? $profile_cct['bio']['textarea']: false;
$research_interests  = ( isset( $profile_cct['clone_individual_research_interests']['0']['text'] ) ) ? $profile_cct['clone_individual_research_interests']['0']['text']: false;
$website             = ( isset( $profile_cct['website']['textarea'] ) ) ? $profile_cct['website']['textarea']: false;

?>

<div id="<?php echo absint( $post_id ); ?>" class="<?php echo esc_attr( $plain_term_slug ); ?> iso-profile">

  <div class="boxey <?php echo esc_attr( $odd_even ); ?> <?php echo esc_attr( $plain_term_slug ); ?> profile">

    <div class="boxey-inside">

        <div class="boxey-inner">
   
          <div class="iso-featured-image"><a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" /></a></div>

          <h3><div class="iso-title">

            <a href="#modal_<?php echo absint( $post_id ); ?>" class="fancybox-inline">
            <?php if ( false !== $salutations ) : echo esc_html( $salutations ); endif; ?> <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>          
            </a>

          </div></h3>

          <div class="iso-description hidden">
            <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> 
            <?php if ( false !== $middle ) : echo esc_html( $middle ); endif; ?> 
            <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>
            <?php if ( false !== $research_interests ) : echo esc_html( $research_interests ); endif; ?> 
            <?php if ( false !== $bio ) : echo esc_html( $bio ); endif; ?> 
            <?php echo esc_html( $plain_term_name ); ?>
          </div>

          <?php if ( false !== $email ) :  ?>
          <i class="icon-envelope"></i> <?php echo "<a href='mailto:" . esc_html( $email ) . "'>" . esc_html( $email ) . "</a>" ?>
          <?php endif; ?> </br>

          <?php if ( false !== $phone1 ) :  ?>
           <i class='icon-phone-sign'></i> <?php echo esc_html( $phone1 ) . " " . esc_html( $phone2 ) . "-" . esc_html( $phone3 ); ?>
          <?php endif; ?>  </br>

          <a href="#modal_<?php echo absint( $post_id ); ?>" role="button" class="btn btn-small launch-btn fancybox-inline">Read Profile</a>

        </div>

      </div>

    </div>

  <div style="display:none">

      <div id="modal_<?php echo absint( $post_id ); ?>" class="span9">

        <div>

         <div class="modal-body">

            <div class="row-fluid">

             <div class="span12">

               <div class="modal-body-content">

                 <div class="span3"><img src="<?php echo esc_url( $post_thumbnail ); ?>" alt="" />

                 </div>

                 <div class="span9">

                    <div class="modal-iso-title">

                       <h3>
                       <?php if ( false !== $salutations ) : echo esc_html( $salutations ); endif; ?> <?php if ( false !== $first_name ) : echo esc_html( $first_name ); endif; ?> <?php if ( false !== $middle ) : echo esc_html( $middle ); endif; ?> <?php if ( false !== $last_name ) : echo esc_html( $last_name ); endif; ?>          
                       </h3>

                    </div>

                     <?php if ( false !== $research_interests ) : echo esc_html( $research_interests ); endif; ?>
 
                    <div class="modal-iso-description">

                      <?php if ( false !== $email ) :  ?>
                      <i class="icon-envelope"></i> <?php echo "<a href='mailto:" . esc_html( $email ) . "'>" . esc_html( $email ) . "</a>" ?>
                      <?php endif; ?> </br>

                      <?php if ( false !== $phone1 ) :  ?>
                       <i class='icon-phone-sign'></i> <?php echo esc_html( $phone1 ) . " " . esc_html( $phone2 ) . "-" . esc_html( $phone3 ); ?>
                      <?php endif; ?>  </br>

                       <?php if ( false !== $website ) :  ?>
                       <i class='icon-laptop'></i> <?php echo wp_kses_post( $website ); ?>
                      <?php endif; ?>  </br>

                    </div>

                    <div class="modal-postion-description"><?php if ( false !== $bio ) : echo esc_html( $bio ); endif; ?></br>
                      <?php echo esc_html( $plain_term_name );?></div>

                </div><!-- end .span9--> 

              </div><!-- end .modal-body-content--> 

            </div><!-- end .span12 --> 

          </div><!-- end .row-fluid --> 

        </div><!-- end .modal-body -->

      </div><!-- end no class -->

    </div><!-- end #modal_theID-->

  </div><!-- end display none-->

</div><!-- end #post-theID-->
