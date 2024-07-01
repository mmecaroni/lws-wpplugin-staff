<?php
/**
 * Registers the REST API endpoint to fetch a published staff by its ID.
 *
 * @since 0.0.1
 */

add_action('rest_api_init', function() {
    register_rest_route('lws/v1', '/staff/(?P<id>\d+)', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lws_read_staff_by_id',
        'permission_callback' => '__return_true',
        'args' => array(
            'id' => array(
                'validate_callback' => function($param, $request, $key) {
                    return is_numeric($param);
                }
            ),
        ),
    ));
});

/**
 * Fetches a single published staff by its ID.
 * @since 0.0.1
 * @param WP_REST_Request $request Full data about the request.
 * @return WP_REST_Response|WP_Error
 */
function lws_read_staff_by_id($request) {
    $id = $request['id'];
    $post = get_post($id);

    if (!$post || 'staff' !== $post->post_type || 'publish' !== $post->post_status) {
        return new WP_Error('lws_no_staff_found', __('No staff found with the specified ID', 'your-plugin-slug'), ['status' => 404]);
    }

    $data = [
        'id'             => $post->ID,
        'title'          => get_the_title($post),
        'slug'           => $post->post_name,
        'excerpt'        => get_the_excerpt($post),
        'content'        => apply_filters('the_content', $post->post_content),
        'featured_image' => [
            'thumbnail' => get_the_post_thumbnail_url($post->ID, 'thumbnail'),
            'medium'    => get_the_post_thumbnail_url($post->ID, 'medium'),
            'large'     => get_the_post_thumbnail_url($post->ID, 'large'),
        ],
    ];

    return new WP_REST_Response($data, 200);
}
