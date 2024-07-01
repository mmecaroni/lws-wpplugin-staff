<?php
/**
 * Registers the REST API endpoint to fetch a published staff by its slug.
 *
 * @since 0.0.1
 */
add_action('rest_api_init', function() {
    register_rest_route('lws/v1', '/staff/slug/(?P<slug>[a-zA-Z0-9-]+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lws_read_staff_by_slug',
        'permission_callback' => function() {
            // Adjust the permission check as needed for your specific use case.
            // This example allows public access. Adjust accordingly.
            return true;
        },
        'args' => array(
            'slug' => array(
                'required' => true,
                'validate_callback' => function($param) {
                    return !empty($param);
                }
            ),
        ),
    ));
});

/**
 * Fetches a single published staff by its slug.
 *
 * @since 0.0.1
 * @param WP_REST_Request $request Full data about the request.
 * @return WP_REST_Response|WP_Error
 */
function lws_read_staff_by_slug($request) {
    $slug = $request['slug'];
    $posts = get_posts(array(
        'name' => $slug,
        'post_type' => 'staff', // Change 'page' to 'staff'
        'post_status' => 'publish',
        'numberposts' => 1
    ));

    if (empty($posts)) {
        return new WP_Error('lws_no_staff_found', __('No staff found with the specified slug', 'your-plugin-slug'), ['status' => 404]);
    }

    $post = $posts[0];

    $data = [
        'id' => $post->ID,
        'title' => get_the_title($post),
        'slug' => $post->post_name,
        'excerpt' => get_the_excerpt($post),
        'content' => apply_filters('the_content', $post->post_content),
        'featured_image' => [
            'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
            'medium' => get_the_post_thumbnail_url($post->ID, 'medium'),
            'large' => get_the_post_thumbnail_url($post->ID, 'large'),
        ],
    ];

    return new WP_REST_Response($data, 200);
}
