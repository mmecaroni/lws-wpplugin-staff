<?php
// Register Custom Post Type
function Lws_staff_setting_page() {
    // Add submenu page under CPT 'Books'
    add_submenu_page(
        'edit.php?post_type=staff', // Parent slug
        'Book Settings',           // Page title
        'Settings',                // Menu title
        'manage_options',          // Capability
        'staff-setting',           // Menu slug
        'Lws_staff_setting_page_callback'       // Callback function
    );
}
add_action( 'admin_menu', 'Lws_staff_setting_page' );

// Callback function to display the options page content
function Lws_staff_setting_page_callback() {
    ?>
    <div class="wrap">
        <h1>Staff Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'staff-setting-group' );
            do_settings_sections( 'staff-setting' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

function register_staff_setting() {
    // Register a setting
    register_setting( 'staff-setting-group', 'staff_setting_name' );

    // Add a settings section
    add_settings_section(
        'staff-setting-section', // ID
        'Staff Setting', // Title
        'staff_setting_section_callback', // Callback
        'staff-setting' // Page
    );

    // Add a settings field
    add_settings_field(
        'staff-setting-name', // ID
        'Setting Name', // Title
        'staff_setting_field_callback', // Callback
        'staff-setting', // Page
        'staff-setting-section' // Section
    );
}
add_action( 'admin_init', 'register_staff_setting' );

// Callback for the settings section
function staff_setting_section_callback() {
    //Content coming here
}

// Callback for the settings field
function staff_setting_field_callback() {
    $setting = get_option( 'staff_setting_name' );
    ?>
    <input type="text" name="staff_setting_name" value="<?php echo esc_attr( $setting ); ?>" />
    <?php
}
