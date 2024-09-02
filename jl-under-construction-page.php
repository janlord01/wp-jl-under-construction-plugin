<?php
/*
Plugin Name: JL Under Construction Page
Description: A simple plugin to display an under construction page.
Version: 1.0
Author: Janlord Luga
Author URI: https://janlordluga.com/
*/

// Hook into 'admin_menu' to add the settings page
add_action('admin_menu', 'jl_ucp_add_admin_menu');

function jl_ucp_add_admin_menu() {
    add_menu_page(
        'Under Construction Settings', // Page title
        'Under Construction', // Menu title
        'manage_options', // Capability
        'jl-ucp-settings', // Menu slug
        'jl_ucp_settings_page', // Callback function
        'dashicons-hammer', // Icon
        100 // Position
    );

    // Add Preview Page Menu Item
    add_submenu_page(
        'jl-ucp-settings', // Parent slug
        'Preview Under Construction Page', // Page title
        'Preview', // Menu title
        'manage_options', // Capability
        'jl-ucp-preview', // Menu slug
        'jl_ucp_preview_page' // Callback function
    );
}

// Enqueue media uploader scripts
add_action('admin_enqueue_scripts', 'jl_ucp_enqueue_media_uploader');

function jl_ucp_enqueue_media_uploader($hook) {
    if ($hook != 'toplevel_page_jl-ucp-settings') {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_script('jl-ucp-media-uploader', plugin_dir_url(__FILE__) . 'media-uploader.js', array('jquery'), '1.0', true);
}

function jl_ucp_settings_page() {
    ?>
    <div class="wrap">
        <h1>Under Construction Settings</h1>
        <a href="<?php echo site_url(); ?>?jl_ucp_preview=true" target="_blank" class="button preview-button button-secondary" style="margin-left: 0px;">Preview</a>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php
            settings_fields('jl_ucp_settings_group');
            do_settings_sections('jl-ucp-settings');
            submit_button();
            ?>
             
        </form>
        <!-- <a href="<?php echo site_url(); ?>?jl_ucp_preview=true" target="_blank" class="button preview-button button-secondary" style="margin-left: 0px;">Preview</a> -->
    </div>
    <?php
}

// Hook into 'admin_init' to register the settings
add_action('admin_init', 'jl_ucp_register_settings');

function jl_ucp_register_settings() {
    register_setting('jl_ucp_settings_group', 'jl_ucp_enabled');
    register_setting('jl_ucp_settings_group', 'jl_ucp_background_image');
    register_setting('jl_ucp_settings_group', 'jl_ucp_heading');
    register_setting('jl_ucp_settings_group', 'jl_ucp_message');
    register_setting('jl_ucp_settings_group', 'jl_ucp_facebook');
    register_setting('jl_ucp_settings_group', 'jl_ucp_tiktok');
    register_setting('jl_ucp_settings_group', 'jl_ucp_instagram');
    register_setting('jl_ucp_settings_group', 'jl_ucp_overlay_enabled');
    register_setting('jl_ucp_settings_group', 'jl_ucp_overlay_color');
    register_setting('jl_ucp_settings_group', 'jl_ucp_overlay_enabled');
    register_setting('jl_ucp_settings_group', 'jl_ucp_overlay_color');
    register_setting('jl_ucp_settings_group', 'jl_ucp_h1_color');
    register_setting('jl_ucp_settings_group', 'jl_ucp_p_color');
    register_setting('jl_ucp_settings_group', 'jl_ucp_h1_margin_top');
    register_setting('jl_ucp_settings_group', 'jl_ucp_p_margin_top');

    add_settings_section(
        'jl_ucp_main_section',
        'Under Construction Mode',
        null,
        'jl-ucp-settings'
    );

    add_settings_field(
        'jl_ucp_enabled',
        'Enable Under Construction Mode',
        'jl_ucp_enabled_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_background_image',
        'Background Image',
        'jl_ucp_background_image_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_overlay_enabled',
        'Enable Background Overlay',
        'jl_ucp_overlay_enabled_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_overlay_color',
        'Overlay Color',
        'jl_ucp_overlay_color_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_heading',
        'Heading',
        'jl_ucp_heading_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_h1_color',
        'Heading Color (H1)',
        'jl_ucp_h1_color_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_h1_margin_top',
        'Heading Margin Top (H1)',
        'jl_ucp_h1_margin_top_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );


    add_settings_field(
        'jl_ucp_p_color',
        'Paragraph Color (P)',
        'jl_ucp_p_color_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_p_margin_top',
        'Paragraph Margin Top (P)',
        'jl_ucp_p_margin_top_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(           
        'jl_ucp_message',
        'Message',
        'jl_ucp_message_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_facebook',
        'Facebook URL',
        'jl_ucp_facebook_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_tiktok',
        'TikTok URL',
        'jl_ucp_tiktok_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    add_settings_field(
        'jl_ucp_instagram',
        'Instagram URL',
        'jl_ucp_instagram_callback',
        'jl-ucp-settings',
        'jl_ucp_main_section'
    );

    
}

function jl_ucp_h1_color_callback() {
    $jl_ucp_h1_color = get_option('jl_ucp_h1_color', '#fff');
    ?>
    <input type="color" name="jl_ucp_h1_color" value="<?php echo esc_attr($jl_ucp_h1_color); ?>" style="width: 100%;" />
    <p>Enter the color in hex format (e.g., #000000 for black).</p>
    <?php
}

function jl_ucp_p_color_callback() {
    $jl_ucp_p_color = get_option('jl_ucp_p_color', '#fff');
    ?>
    <input type="color" name="jl_ucp_p_color" value="<?php echo esc_attr($jl_ucp_p_color); ?>" style="width: 100%;" />
    <p>Enter the color in hex format (e.g., #000000 for black).</p>
    <?php
}

function jl_ucp_h1_margin_top_callback() {
    $jl_ucp_h1_margin_top = get_option('jl_ucp_h1_margin_top', '7%');
    ?>
    <input type="text" name="jl_ucp_h1_margin_top" value="<?php echo esc_attr($jl_ucp_h1_margin_top); ?>" style="width: 100%;" />
    <p>Enter the margin top value (e.g., 5%, 20px).</p>
    <?php
}

function jl_ucp_p_margin_top_callback() {
    $jl_ucp_p_margin_top = get_option('jl_ucp_p_margin_top', '20px');
    ?>
    <input type="text" name="jl_ucp_p_margin_top" value="<?php echo esc_attr($jl_ucp_p_margin_top); ?>" style="width: 100%;" />
    <p>Enter the margin top value (e.g., 20px).</p>
    <?php
}

function jl_ucp_overlay_enabled_callback() {
    $jl_ucp_overlay_enabled = get_option('jl_ucp_overlay_enabled');
    ?>
    <input type="checkbox" name="jl_ucp_overlay_enabled" value="1" <?php checked(1, $jl_ucp_overlay_enabled, true); ?> />
    <?php
}

function jl_ucp_overlay_color_callback() {
    $jl_ucp_overlay_color = get_option('jl_ucp_overlay_color', 'rgba(0, 0, 0, 0.5)');
    ?>
    <input type="text" name="jl_ucp_overlay_color" value="<?php echo esc_attr($jl_ucp_overlay_color); ?>" style="width: 100%;" />
    <p>Enter the overlay color in rgba format (e.g., rgba(0, 0, 0, 0.5)).</p>
    <?php
}   

function jl_ucp_enabled_callback() {
    $jl_ucp_enabled = get_option('jl_ucp_enabled');
    ?>
    <input type="checkbox" name="jl_ucp_enabled" value="1" <?php checked(1, $jl_ucp_enabled, true); ?> />
    <?php
}

function jl_ucp_background_image_callback() {
    $jl_ucp_background_image = get_option('jl_ucp_background_image');
    ?>
    <input type="text" name="jl_ucp_background_image" id="jl_ucp_background_image" value="<?php echo esc_url($jl_ucp_background_image); ?>" style="width: 80%;" />
    <input type="button" id="jl_ucp_upload_button" class="button" value="Select Background Image" />
    <p>Leave blank to use the default background image.</p>
    <?php
}

    function jl_ucp_heading_callback() {
    $jl_ucp_heading = get_option('jl_ucp_heading', "We're Under Construction");
    ?>
    <input type="text" name="jl_ucp_heading" value="<?php echo esc_attr($jl_ucp_heading); ?>" style="width: 100%;" />
    <?php
}

function jl_ucp_message_callback() {
    $jl_ucp_message = get_option('jl_ucp_message', "Our website is currently undergoing scheduled maintenance. Please check back soon.");
    ?>
    <textarea name="jl_ucp_message" style="width: 100%; height: 100px;"><?php echo esc_textarea($jl_ucp_message); ?></textarea>
    <?php
}

function jl_ucp_facebook_callback() {
    $jl_ucp_facebook = get_option('jl_ucp_facebook');
    ?>
    <input type="url" name="jl_ucp_facebook" value="<?php echo esc_url($jl_ucp_facebook); ?>" style="width: 100%;" />
    <?php
}

function jl_ucp_tiktok_callback() {
    $jl_ucp_tiktok = get_option('jl_ucp_tiktok');
    ?>
    <input type="url" name="jl_ucp_tiktok" value="<?php echo esc_url($jl_ucp_tiktok); ?>" style="width: 100%;" />
    <?php
}

function jl_ucp_instagram_callback() {
    $jl_ucp_instagram = get_option('jl_ucp_instagram');
    ?>
    <input type="url" name="jl_ucp_instagram" value="<?php echo esc_url($jl_ucp_instagram); ?>" style="width: 100%;" />
    <?php
}

// Hook into 'template_redirect' to display the Under Construction page if enabled or if preview mode is active
add_action('template_redirect', 'jl_ucp_display_under_construction');

function jl_ucp_display_under_construction() {
    $jl_ucp_enabled = get_option('jl_ucp_enabled');
    $is_preview = isset($_GET['jl_ucp_preview']) && $_GET['jl_ucp_preview'] == 'true';

     // Check if the user is not logged in or is not an admin and Under Construction mode is enabled
     if (($jl_ucp_enabled && !current_user_can('edit_posts')) || $is_preview) {
         include plugin_dir_path(__FILE__) . 'jl-under-construction-template.php';
         exit;
     }

}

// Add Settings and Preview link to plugin action links
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'jl_ucp_add_settings_link');

function jl_ucp_add_settings_link($links) {
    $settings_link = '<a href="admin.php?page=jl-ucp-settings">Settings</a>';
    array_push($links, $settings_link);
    return $links;
}

// Preview page callback function
function jl_ucp_preview_page() {
    ?>
    <div class="wrap">
        <h1>Preview Under Construction Page</h1>
        <iframe src="<?php echo site_url(); ?>?jl_ucp_preview=true" style="width: 100%; height: 80vh; border: 1px solid #ccc;"></iframe>
    </div>
    <?php
}

// Hook to display admin notices after saving settings
add_action('admin_notices', 'jl_ucp_admin_notice');

function jl_ucp_admin_notice() {
    // Check if the settings were updated
    if (isset($_GET['settings-updated']) && $_GET['settings-updated']) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><?php _e('Settings saved successfully!', 'jl-ucp'); ?></p>
        </div>
        <?php
    }
}

?>

