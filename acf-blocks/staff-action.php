<?php
// Register Hero Block
function Lws_register_acf_staff_block() {
    // Register function hook by acf
    acf_register_block_type(array(
        'name'              => 'staff_block',
        'title'             => __('LWS Staff'),
        'description'       => __('Select staff memember to see on page layout.'),
        'render_template'   => plugin_dir_path( __FILE__ ) . '/staff-template.php',
        'icon'              => '<svg class="lws_icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g class="lws_icon">
                                    <path class="lws_icon-ring" d="M10,20c-2.7,0-5.2-1-7.1-2.9C1,15.2,0,12.7,0,10c0-2.7,1-5.2,2.9-7.1C4.8,1,7.3,0,10,0c2.7,0,5.2,1,7.1,2.9
                                        C19,4.8,20,7.3,20,10c0,2.7-1,5.2-2.9,7.1C15.2,19,12.7,20,10,20z M10,1.5C7.7,1.5,5.6,2.4,4,4c-1.6,1.6-2.5,3.7-2.5,6
                                        c0,2.3,0.9,4.4,2.5,6c1.6,1.6,3.7,2.5,6,2.5c2.3,0,4.4-0.9,6-2.5c1.6-1.6,2.5-3.7,2.5-6c0-2.3-0.9-4.4-2.5-6
                                        C14.4,2.4,12.3,1.5,10,1.5z"></path>
                                    <polygon class="lws_icon-left" points="9.6,3.4 6.8,5 6.8,9.7 4.1,11.3 4.1,14.5 9.6,11.4 9.6,11.4 9.6,11.4 9.6,8.2 9.6,8.2"></polygon>
                                    <polygon class="lws_icon-right" points="10.4,3.4 13.2,5 13.2,9.7 15.9,11.3 15.9,14.5 10.4,11.4 10.4,11.4 10.4,11.4 10.4,8.2 10.4,8.2"></polygon>
                                </g>
                                </svg>',
    ));
}

// Block register action general
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'Lws_register_acf_staff_block');
}
