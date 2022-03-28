<?php
// This is an example of how to include a plugin bundled with a theme.
// array(
// 	'source'             => dirname(__FILE__) . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
// 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
// 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
// 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
// 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
// 	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
// ),
// This is an example of how to include a plugin from an arbitrary external source in your theme.
// array(
// 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
// 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
// ),
// This is an example of how to include a plugin from a GitHub repository in your theme.
// This presumes that the plugin code is based in the root of the GitHub repository
// and not in a subdirectory ('/src') of the repository.
// array(
// 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
// ),
// 	'is_callable' => 'wpseo_init',

$GLOBALS['WP_Debugger_Plugins'] = [
    "wp-rollback",
    "core-rollback",
    "rollback-update-failure",
    "wp-asset-clean-up",
    "filester",
    "wp-optimize",
    "blackbox-debug-bar",
];
