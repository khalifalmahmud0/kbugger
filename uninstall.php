<?php
// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
	exit;
}
require_once dirname(__FILE__) . '/functions.php';
runWhenUninstallHookTrigger();
delete_option('BeforeKbuggerActive');
delete_option('AfterKbuggerActive');
