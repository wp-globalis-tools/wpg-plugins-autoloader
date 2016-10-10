# Force enable/disable plugins with environment config

## Installation

Parse below code to your wp-config/< WP_ENV >/options.php file.

```PHP
$wpg_force_plugins_enable = [
	'redis-cache/redis-cache.php',
];
define('WPG_FORCE_PLUGINS_ENABLE', serialize($wpg_force_plugins_enable));

// WPG PLUGINS AUTOLADER : FORCE DISABLE
$wpg_force_plugins_disable = [
	'bwp-minify/bwp-minify.php',
];
define('WPG_FORCE_PLUGINS_DISABLE', serialize($wpg_force_plugins_disable));
```
Modify $wpg_force_plugins_enable and $wpg_force_plugins_disable as you wish.
