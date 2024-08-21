<?php
// Register Hero Block
function Lws_register_acf_services_block() {
    // Register function hook by acf
    acf_register_block_type(array(
        'name'              => 'staff_services_block',
        'title'             => __('LWS Staff Services'),
        'description'       => __('Select staff services to see on page layout.'),
        'render_template'   => plugin_dir_path( __FILE__ ) . '/staff-services-view.php',
        'icon'              => '',

    ));
}
// Block register action general
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'Lws_register_acf_services_block');
}
