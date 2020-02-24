<?php
/*
Plugin Name: Click to Call
Description: This plugin adds a quick call button at the bottom of the website. 
Version: 1.0.0
Author: Marina Pappa
*/

//Exit if accessed directly 
if (!defined('ABSPATH')){
    exit;
}

//Load Scripts
require_once(plugin_dir_path(__FILE__) . '/includes/mpclicktocall-scripts.php');

//Load Class
require_once(plugin_dir_path(__FILE__) . '/includes/mpclicktocall-class.php');

/****Settings*******/

function my_plugin_settings_link($links) { 
	$settings_link = '<a href="options-general.php?page=Click_to_Call_Plugin">Settings</a>'; 
	array_unshift($links, $settings_link); 
	return $links; 
  }
  $plugin = plugin_basename(__FILE__); 
  add_filter("plugin_action_links_$plugin", 'my_plugin_settings_link' );


add_action('admin_menu', 'mpctc_admin_actions'); 

function mpctc_admin_actions() {
    add_options_page(
        'Click to Call Plugin', 
        'Click to Call Button', 
        'manage_options', 
        'Click_to_Call_Plugin', 
        'mpctc_plugin_settings_page'
    ); 
}

add_action( 'admin_init', 'register_mpctc_plugin_settings' );


function register_mpctc_plugin_settings() {
	//register settings
	register_setting( 'mpctc-plugin-settings-group', 'telephone' );
	register_setting( 'mpctc-plugin-settings-group', 'mobile_only' );
}

function mpctc_plugin_settings_page() {
?>
<div class="wrap">
<h1>Click to Call Settings</h1>

<form method="post" action="options.php">
    <?php settings_fields( 'mpctc-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'mpctc-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Telephone Number</th>
            <td><input type="text" name="telephone" value="<?php echo esc_attr( get_option('telephone') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Show button <span class="bold">only on Mobile devices</span>?</th>
            <td><label class="switch">
                <input type="checkbox" name="mobile_only" value="mobile" <?php if (get_option('mobile_only')=='mobile') {echo ' checked';}?>>
                <span class="slider round"></span>
                </label>
            </td>
        </tr>

    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php 

} ?>
