<?php
/**
 * Registers the REST API endpoint to fetch all published staff.
 *
 * @since 0.0.1
 */

add_action('rest_api_init', function() {
    register_rest_route('lws/v1', '/staff', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lws_read_staff',
        'permission_callback' => '__return_true',
    ));
});

if (!function_exists('lws_read_staff')) {
    /**
     * Fetches all published staff.
     * @since 0.0.1
     * @return WP_REST_Response|WP_Error
     */
    function lws_read_staff() {
        $query = new WP_Query([
            'post_type'      => 'staff', // Changed from 'page' to 'staff'
            'posts_per_page' => -1,
            'post_status'    => 'publish',
        ]);

        if (!$query->have_posts()) {
            return new WP_Error('lws_no_staff_found', __('No staff found', 'your-plugin-slug'), ['status' => 404]);
        }

        $posts_data = array_map(function($post) {
            return [
                'id'             => $post->ID,
                'title'          => get_the_title($post),
                'slug'           => $post->post_name,
                'excerpt'        => get_the_excerpt($post),
                'content'        => apply_filters('the_content', $post->post_content),
                'slug'           => $post->post_name,
                'featured_image' => [
                    'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
                    'medium'    => get_the_post_thumbnail_url($post->ID, 'medium'),
                    'large'     => get_the_post_thumbnail_url($post->ID, 'large'),
                ],
            ];
        }, $query->posts);

        return new WP_REST_Response($posts_data, 200);
    }
}
