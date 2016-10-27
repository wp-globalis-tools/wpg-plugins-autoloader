<?php
/*
Plugin Name:  WPG Plugins Autoloader
Description:  Force enable/disable plugins with environment config
Author:       GLOBALIS media systems
Author URI:   http://globalis-ms.com/
Version:      1.0
*/

namespace WPG\PluginsAutoloader;

// SINGLE SITE PLUGINS :
add_filter('option_active_plugins', __NAMESPACE__ . '\\enable_plugins', 99);
add_filter('option_active_plugins', __NAMESPACE__ . '\\disable_plugins', 99);

// MULTISITE NETWORK-WIDE PLUGINS :
add_filter('site_option_active_sitewide_plugins', __NAMESPACE__ . '\\enable_plugins_multisite', 99);
add_filter('site_option_active_sitewide_plugins', __NAMESPACE__ . '\\disable_plugins_multisite', 99);

function enable_plugins($plugins) {
	if(!defined('WPG_FORCE_PLUGINS_ENABLE') || !is_serialized(WPG_FORCE_PLUGINS_ENABLE)) {
		return $plugins;
	}
	return array_merge($plugins, unserialize(WPG_FORCE_PLUGINS_ENABLE));
}

function disable_plugins($plugins) {
	if(!defined('WPG_FORCE_PLUGINS_DISABLE') || !is_serialized(WPG_FORCE_PLUGINS_DISABLE)) {
		return $plugins;
	}
	return array_diff($plugins, unserialize(WPG_FORCE_PLUGINS_DISABLE));
}

function enable_plugins_multisite($plugins) {
	if(!defined('WPG_FORCE_PLUGINS_NETWORK_ENABLE') || !is_serialized(WPG_FORCE_PLUGINS_NETWORK_ENABLE)) {
		return $plugins;
	}
	foreach(unserialize(WPG_FORCE_PLUGINS_NETWORK_ENABLE) as $force_plugin) {
		if(!isset($plugins[$force_plugin])) {
			$plugins[$force_plugin] = time();
		}
	}
	return $plugins;
}

function disable_plugins_multisite($plugins) {
	if(!defined('WPG_FORCE_PLUGINS_NETWORK_DISABLE') || !is_serialized(WPG_FORCE_PLUGINS_NETWORK_DISABLE)) {
		return $plugins;
	}
	return array_diff_key($plugins, array_flip(unserialize(WPG_FORCE_PLUGINS_NETWORK_DISABLE)));
}
