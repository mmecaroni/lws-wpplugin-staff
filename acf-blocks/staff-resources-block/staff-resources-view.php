<?php
// ACF Services Block 
if(have_rows('staff_resource_list')):
?>
   <div class="lws-staff-wrapper staff-resource-wrapper">
   <?php 
    while (have_rows('staff_resource_list') ) :the_row();
	  $staff_resource_title = get_sub_field('staff_resource_title');	
	  $staff_resource_file = get_sub_field('staff_resource_file');	
    ?>
        <div class="column-3 resource-box has-primary-50-background-color ">
           <h3 class="wp-block-heading has-18-font-size"><?php echo $staff_resource_title; ?></h3>
           <div class="wp-block-button">
              <a class="wp-element-button" href="<?php echo $staff_resource_file;  ?>" target="_blank" rel="noreferrer noopener">
                  Download PDF 
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  data-icon="wordpress-download" fill="currentColor" height="20" width="20">
                    <title>Download</title>
                    <title id="icon-66a210ed265bd">Download Icon</title>
                    <path d="m18 11.3-1-1.1-4 4V3h-1.5v11.3L7 10.2l-1 1.1 6.2 5.8 5.8-5.8zm.5 3.7v3.5h-13V15H4v5h16v-5h-1.5z"></path>
                  </svg>
              </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>
    


   


