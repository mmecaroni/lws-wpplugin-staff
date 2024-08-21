<?php
// Register Hero Block
function Lws_register_acf_staff_resources_block() {
    // Register function hook by acf
    acf_register_block_type(array(
        'name'              => 'staff_resources_block',
        'title'             => __('LWS Staff Resources'),
        'description'       => __('Add staff resources to page layout.'),
        'render_template'   => plugin_dir_path( __FILE__ ) . '/staff-resources-view.php',
        'icon'              => '',

    ));
}
// Block register action general
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'Lws_register_acf_staff_resources_block');
}
