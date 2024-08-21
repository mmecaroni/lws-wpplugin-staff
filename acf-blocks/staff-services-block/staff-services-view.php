<?php
// ACF Services Block 
if(have_rows('member_services_list')):
?>
   <ul class="wp-block-list wp-block-list is-style-check-circle staff-services">
   <?php 
    while (have_rows('member_services_list') ) :the_row();
	  $add_services_item = get_sub_field('add_services_item');	
    ?>
        <li><?php echo $add_services_item; ?>  </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>
    


   


