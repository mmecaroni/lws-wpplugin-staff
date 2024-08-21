<?php
// Staff About Block
function Lws_register_acf_staff_about_block() {
    // Register function hook by acf
    acf_register_block_type(array(
        'name'              => 'staff_about_block',
        'title'             => __('LWS Staff About'),
        'description'       => __('About block for more content items.'),
        'render_template'   => plugin_dir_path( __FILE__ ) . '/staff-about-view.php',
        'icon'              => '',

    ));
}
// Block register action general
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'Lws_register_acf_staff_about_block');
}
