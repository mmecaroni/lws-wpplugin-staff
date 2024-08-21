<?php // ACF Services Block ?>
<div class="lws-staff-wrapper staff-about-wrapper has-primary-50-background-color alignwide">
  <?php
  if(have_rows('member_education_list')):
  //Var
  $education_title = get_field('education_title');
  ?>
    <div class="column-2 staff-edu-column">
      <?php
      if($education_title):
        echo "<h3 class='wp-block-heading'>".$education_title."</h3>";
      endif;
      ?>
    
      <ul class="wp-block-list wp-block-list is-style-check-circle staff-services">
      <?php 
        while (have_rows('member_education_list') ) :the_row();
        $add_education_item = get_sub_field('add_education_item');
        $add_education_label = get_sub_field('add_education_label');	
        ?>
            <li>
              <?php if($add_education_label): echo "<strong>".$add_education_label."</strong>"; endif; ?>
              <?php echo $add_education_item; ?>  
            </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php
  if(have_rows('medical_societies_list')):
  //Var
  $medical_societies_title = get_field('medical_societies_title');
  ?>
    <div class="column-2 staff-medical-column">
      <?php
      if($medical_societies_title):
        echo "<h3 class='wp-block-heading'>".$medical_societies_title."</h3>";
      endif;
      ?>
    
      <ul class="wp-block-list wp-block-list is-style-check-circle staff-services">
      <?php 
        while (have_rows('medical_societies_list') ) :the_row();
        $add_medical_societies_item = get_sub_field('add_medical_societies_item');
        $add_medical_societies_label = get_sub_field('add_medical_societies_label');
        ?>
            <li>
              <?php if($add_medical_societies_label): echo "<strong>".$add_medical_societies_label."</strong>"; endif; ?>
              <?php echo $add_medical_societies_item; ?> 
            </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php endif; ?>
  
  <?php
  //CV button section 
  $upload_doctor_cv = get_field('upload_doctor_cv');
  if($upload_doctor_cv):
  ?>
  <div class="wp-block-buttons is-content-justification-center is-layout-flex wp-container-core-buttons-is-layout-4 wp-block-buttons-is-layout-flex">
    <div class="wp-block-button" style="">
        <a class="wp-block-button__link wp-element-button" href="<?php echo $upload_doctor_cv; ?>" target="_blank" rel="noreferrer noopener" style="">
          View Physician’s CV 
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" role="img" aria-labelledby="icon-66a1f80cd2771" data-icon="wordpress-download" fill="currentColor" height="20" width="20">
              <title>Download</title>
              <title id="icon-66a1f80cd2771">Download Icon</title>
              <path d="m18 11.3-1-1.1-4 4V3h-1.5v11.3L7 10.2l-1 1.1 6.2 5.8 5.8-5.8zm.5 3.7v3.5h-13V15H4v5h16v-5h-1.5z"></path>
          </svg>
        </a>
    </div>
  </div>
  <?php endif; ?>
</div>
    


   


