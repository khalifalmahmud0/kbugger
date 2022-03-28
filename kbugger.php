<?php

/**
 * Plugin Name:       WP Debugger Pro 
 * Plugin URI:        https://khalifalmahmud.xyz/
 * Description:       Quick Debugger Plugin. List of all necessary debugging plugins.
 * Version:           1.0.0
 * Author:            Khalif AL Mahmud
 * Author URI:        https://khalifalmahmud.xyz/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kbugger
 * Domain Path:       /languages
 */
// If this file is called directly, abort.

if (!defined('WPINC')) {
    die;
}
if (!function_exists('get_plugins')) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
require_once dirname(__FILE__) . '/tgm/tgm.php';
require_once dirname(__FILE__) . '/functions.php';
function activation()
{
    BeforeKbuggerActive();
}
register_activation_hook(__FILE__, 'activation');

function deactivation()
{
    add_action('update_option_active_plugins', function () {
        runWhenDeactivationHookTrigger();
    });
}
register_deactivation_hook(__FILE__, 'deactivation');
AfterKbuggerActive();
