<?php
// Shortcode Function
function display_staff_by_category( $atts ) {
    $atts = shortcode_atts( array(
        'category' => '',
        'column' => '',
    ), $atts, 'staff_by_category' );
    $column = intval( $atts['column'] );
    if ( empty( $atts['category'] ) ) {
        return 'No category specified.';
    }
    
    $args = array(
        'post_type'      => 'staff',
        'posts_per_page' => -1,
        'tax_query'      => array(
            array(
                'taxonomy' => 'staff_categories',
                'field'    => 'slug',
                'terms'    => $atts['category'],
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( ! $query->have_posts() ) {
        return 'No Staff members found in this category.';
    }

    $output = '<div class="wp-block-columns lws-staff-wrapper">';

    while ( $query->have_posts() ) {
        $query->the_post();
		$staff_tags = wp_get_post_terms( get_the_ID(), 'staff_tags' );
		$image_url = wp_get_attachment_url( get_post_thumbnail_id() );
        $output .= '<div class="lws-staff-box wp-block-column column-'.$column.'">';
        $output .= '<a href="'. get_permalink() .'">';

        $output .= '<figure class="wp-block-image aligncenter size-full is-resized">';
        $output .= '<img src="'. $image_url .'" title="'. get_the_title() .'" alt="'. get_the_title() .'" />';
        $output .= '</figure>';
			$output .= '<div class="is-vertical is-layout-flex wp-block-group-is-layout-flex">';
				$output .= '<p class="wp-block-paragraph aligncenter has-text-align-center aligncenter">' . get_the_title() . '</p>';
				$output .= '<p class="wp-block-paragraph aligncenter has-text-align-center aligncenter staff-tags">';
				foreach ($staff_tags as $staff_tag ):
				$output .= '<span>' . $staff_tag->name . '</span>';
				endforeach;
				$output .= '</p>';
			$output .= '</div>';
        $output .= '</a>';
        $output .= '</div>';
    }

    $output .= '</div>';

    wp_reset_postdata();

    return $output;
}

//Register the Shortcode
function register_staff_by_category_shortcode() {
    add_shortcode( 'staff_by_category', 'display_staff_by_category' );
}
add_action( 'init', 'register_staff_by_category_shortcode' );