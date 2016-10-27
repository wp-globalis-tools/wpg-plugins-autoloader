# Force enable/disable plugins with environment config

## Installation

- Parse below code to your wp-config/< WP_ENV >/options.php file.

```PHP
// WPG PLUGINS AUTOLADER : FORCE ENABLE
$wpg_force_plugins_enable = [
	'redis-cache/redis-cache.php',
];
define('WPG_FORCE_PLUGINS_ENABLE', serialize($wpg_force_plugins_enable));

// WPG PLUGINS AUTOLADER : FORCE DISABLE
$wpg_force_plugins_disable = [
	'bwp-minify/bwp-minify.php',
];
define('WPG_FORCE_PLUGINS_DISABLE', serialize($wpg_force_plugins_disable));

// WPG PLUGINS AUTOLADER : FORCE ENABLE NETWORK-WIDE
$wpg_force_plugins_enable_multiste = [
	'multisite-clone-duplicator/multisite-clone-duplicator.php',
];
define('WPG_FORCE_PLUGINS_NETWORK_ENABLE', serialize($wpg_force_plugins_enable_multiste));

// WPG PLUGINS AUTOLADER : FORCE DISABLE NETWORK-WIDE
$wpg_force_plugins_disable_multiste = [
    'wordpress-mu-domain-mapping/domain_mapping.php',
];
define('WPG_FORCE_PLUGINS_NETWORK_DISABLE', serialize($wpg_force_plugins_disable_multiste));
```

- Modify $wpg_force_plugins_enable and $wpg_force_plugins_disable as you wish.
