<?php
/**
 * Registers the REST API endpoint to fetch category details with posts by staff category.
 *
 * @since 0.0.1
 */
add_action('rest_api_init', function() {
    register_rest_route('lws/v1', '/staff_categories/(?P<category_id>\d+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lws_read_category_with_posts_by_staff_category_id',
        'permission_callback' => '__return_true',
    ));
});

if (!function_exists('lws_read_category_with_posts_by_staff_category_id')) {
    /**
     * Fetches category details with posts by staff category.
     *
     * @since 0.0.1
     * @param WP_REST_Request $request
     * @return WP_REST_Response|WP_Error
     */
    function lws_read_category_with_posts_by_staff_category_id($request) {
        $category_id = $request['category_id'];
        
        $category = get_term_by('id', $category_id, 'staff_categories');
        
        if (!$category) {
            return new WP_Error('lws_category_not_found', __('Category not found', 'your-plugin-slug'), array('status' => 404));
        }

        $query = new WP_Query(array(
            'post_type' => 'staff',
            'tax_query' => array(
                array(
                    'taxonomy' => 'staff_categories',
                    'field' => 'term_id', // Ensure 'term_id' is used to query by category ID
                    'terms' => $category_id,
                ),
            ),
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ));

        $posts_data = array_map(function($post) {
            return array(
                'id' => $post->ID,
                'title' => get_the_title($post),
                'slug' => $post->post_name,
                'excerpt' => get_the_excerpt($post),
                'content' => apply_filters('the_content', $post->post_content),
                'featured_image' => array(
                    'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
                    'medium' => get_the_post_thumbnail_url($post->ID, 'medium'),
                    'large' => get_the_post_thumbnail_url($post->ID, 'large'),
                ),
            );
        }, $query->posts);

        $category_data = array(
            'id' => $category->term_id,
            'name' => $category->name,
            'slug' => $category->slug,
            'description' => $category->description,
            'count' => $category->count,
            'posts' => $posts_data,
        );

        return new WP_REST_Response($category_data, 200);
    }
}