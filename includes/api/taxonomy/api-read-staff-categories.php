<?php

/**
 * Registers the REST API endpoint to fetch all staff categories.
 *
 * @since 0.0.1
 */
add_action('rest_api_init', function() {
    register_rest_route('lws/v1', '/staff_categories', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lws_read_staff_categories',
        'permission_callback' => '__return_true',
    ));
});

if (!function_exists('lws_read_staff_categories')) {
    /**
     * Fetches all staff categories.
     *
     * @since 0.0.1
     * @return WP_REST_Response|WP_Error
     */
    function lws_read_staff_categories() {
        $categories = get_terms(array(
            'taxonomy' => 'staff_categories', // Taxonomy name
            'hide_empty' => false, // Set to true if you want to exclude empty categories
        ));

        if (is_wp_error($categories)) {
            return new WP_Error('lws_no_categories_found', __('No categories found', 'your-plugin-slug'), array('status' => 404));
        }

        $categories_data = array_map(function($category) {
            return array(
                'id' => $category->term_id,
                'name' => $category->name,
                'slug' => $category->slug,
                'description' => $category->description,
                'count' => $category->count,
            );
        }, $categories);

        return new WP_REST_Response($categories_data, 200);
    }
}
