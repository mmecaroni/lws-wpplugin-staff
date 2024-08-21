<?php
    // ACF Template
    $class_name = 'lws-staff-wrapper';
    if ( ! empty( $block['className'] ) ) {
        $class_name .= ' ' . $block['className'];
    }
    if ( ! empty( $block['align'] ) ) {
        $class_name .= ' align' . $block['align'];
    }

    $staff_block = get_field('staff_block');
    $select_column_layout = get_field('select_column_layout');
    
    $args = array(
        'post_type'      => 'staff',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'staff_categories',
                'terms'    => $staff_block
            ),
        ),
    );
    
    $query = new WP_Query( $args );
    if ( ! $query->have_posts() ) {
        return 'No Staff members found in this category.';
    }
    ?>
   <div class="<?php echo $class_name; ?>">
   <?php 
    while ( $query->have_posts() ) {
        $query->the_post();
		$staff_tags = wp_get_post_terms( get_the_ID(), 'staff_tags' );
		$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
		$link_onoff = get_field('onoff_staff_link',get_the_ID());
    ?>
        <div class="column-<?php echo $select_column_layout; ?>">
        <div class="lws-staff-box">
        <?php if(!($link_onoff == 1)): ?>
        <a href="<?php  echo get_permalink(); ?>">
        <?php endif; ?>

            <figure class="wp-block-image aligncenter size-full is-resized">
            <img src="<?php echo $image_url ?>" title="<?php echo get_the_title() ?>" alt="<?php echo get_the_title() ?>" />
            </figure>
			<div class="is-vertical is-layout-flex">
				<p class="wp-block-paragraph aligncenter has-text-align-center aligncenter"> <?php echo get_the_title(); ?></p>
				<p class="wp-block-paragraph aligncenter has-text-align-center aligncenter staff-tags">
				<?php foreach ($staff_tags as $staff_tag ): ?>
				   <span><?php echo $staff_tag->name; ?></span>
				<?php endforeach; ?>
				</p>
			</div>
            <?php if(!($link_onoff == 1)): ?>
              </a>
            <?php endif; ?>
        </div>            
    </div>
   
    <?php } wp_reset_postdata(); ?>

    </div>
    


   


