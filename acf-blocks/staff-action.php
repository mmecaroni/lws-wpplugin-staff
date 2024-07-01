<?php
// Register Hero Block
function Lws_register_acf_staff_block() {
    // Register function hook by acf
    acf_register_block_type(array(
        'name'              => 'staff_block',
        'title'             => __('LWS Staff'),
        'description'       => __('Select staff memember to see on page layout.'),
        'render_template'   => plugin_dir_path( __FILE__ ) . '/staff-template.php',
        'icon'              => 'dashicons-format-video',
        /*'enqueue_assets' => function(){
            wp_enqueue_style( 'staff-css', LWS_STAFF_ASSETS . 'assets/css/lws-staff-style.css' );
          },*/

    ));
}

// Block register action general
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'Lws_register_acf_staff_block');
}
