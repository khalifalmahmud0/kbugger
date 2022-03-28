<?php
// BEFORE 
function BeforeKbuggerActive()
{
    foreach (get_plugins() as $key => $value) {
        $installed[] = strtok($key, '/');
    }
    foreach (get_option('active_plugins') as $key => $value) {
        $activated[] = strtok($value, '/');
    }
    $deactivated = array_diff($installed, $activated);
    $BeforeKbuggerActive = [
        "installed" => $installed,
        "activated" => $activated,
        "deactivated" => $deactivated
    ];
    update_option('BeforeKbuggerActive', $BeforeKbuggerActive);
}
// AFTER 
function AfterKbuggerActive()
{
    foreach (get_plugins() as $key => $value) {
        $installed[] = strtok($key, '/');
    }
    foreach (get_option('active_plugins') as $key => $value) {
        $activated[] = strtok($value, '/');
    }
    $deactivated = array_diff($installed, $activated);
    $AfterKbuggerActive = [
        "installed" => $installed,
        "activated" => $activated,
        "deactivated" => $deactivated
    ];
    update_option('AfterKbuggerActive', $AfterKbuggerActive);
}
// DEACTIVATE 
function runWhenDeactivationHookTrigger()
{
    $pluginList = $GLOBALS['WP_Debugger_Plugins'];
    $result = [];
    $PuranActivePLugin = get_option('BeforeKbuggerActive')['activated'];
    $notunActivePLugin = get_option('AfterKbuggerActive')['activated'];
    $notunPuranActivePluginDiffer = array_diff($notunActivePLugin, $PuranActivePLugin);
    foreach ($notunPuranActivePluginDiffer as $key) {
        if (in_array($key, $pluginList)) {
            array_push($result, $key);
        }
    }
    update_option('KbuggerUninstallLists', $result);
    $DeactivatePluginList = getPLuginCorePathFromSlug($result);
    foreach ($DeactivatePluginList as $key) {
        if (is_plugin_active($key)) {
            deactivate_plugins($key);
        }
    }
}
// UNINSTALL 
function runWhenUninstallHookTrigger()
{
    $result = [];
    $DeletePluginList = get_option('KbuggerUninstallLists');
    $previousDeactivated = get_option('BeforeKbuggerActive')['deactivated'];
    foreach ($DeletePluginList as $key) {
        if (!in_array($key, $previousDeactivated)) {
            array_push($result, $key);
        }
    }
    $UninstallPluginListPath = getPLuginCorePathFromSlug($result);
    foreach ($UninstallPluginListPath as $key) {
        delete_plugins([$key]);
    }
}
// GET FULL PATH 
function getPLuginCorePathFromSlug($arr)
{
    $result = [];
    foreach ($arr as $key) {
        foreach (get_plugins() as $keyFromPlugin => $value) {
            if (str_contains($keyFromPlugin, $key)) {
                array_push($result, $keyFromPlugin);
            }
        }
    }
    return $result;
}
