<?php
/**
* The base configurations of the WordPress.
*
* This file has the following configurations: MySQL settings, Table Prefix,
* Secret Keys, WordPress Language, and ABSPATH. You can find more information
* by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
* wp-config.php} Codex page. You can get the MySQL settings from your web host.
*
* This file is used by the wp-config.php creation script during the
* installation. You don't have to use the web site, you can just copy this file
* to "wp-config.php" and fill in the values.
*
* @package WordPress
*/

// Database parameters - defined through Environment variables.
define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('MYSQL_DATABASE'));
define('DB_USER', getenv('MYSQL_USER'));
define('DB_PASSWORD', getenv('MYSQL_PASSWORD'));

// Set to equal the settings in the SQL file
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_general_ci');

$table_prefix = 'dwp_';

/**#@+
* Authentication Unique Keys and Salts.
*
* Change these to different unique phrases!
* You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
* You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
*
* @since 2.6.0
*/

// Generated with `openssl rand 65 -hex`
define('AUTH_KEY', getenv('AUTH_KEY'));
define('SECURE_AUTH_KEY', getenv('SECURE_AUTH_KEY'));
define('LOGGED_IN_KEY', getenv('LOGGED_IN_KEY'));
define('NONCE_KEY', getenv('NONCE_KEY'));
define('AUTH_SALT', getenv('AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT', getenv('LOGGED_IN_SALT'));
define('NONCE_SALT', getenv('NONCE_SALT'));

$is_ssl = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

define('PROTOCOL', $is_ssl ? 'https' : 'http');
define('ENVIRONMENT', getenv('PHP_ENV') ?: 'production');

define('SERVER_NAME', $_SERVER['SERVER_NAME']);

// URL to blog (w/o) trailing slash
define('WP_HOME', PROTOCOL . '://' . SERVER_NAME);

// URL to core files (w/o trailing slash)
define('WP_SITEURL', PROTOCOL . '://' . SERVER_NAME . '/wordpress');

// Local path to `wp-content`
define('WP_CONTENT_DIR', dirname(__FILE__) . '/content' );
// URL to `wp-content`
define('WP_CONTENT_URL', WP_HOME . '/content');

// Output all possible errors while in development
define('WP_DEBUG', ENVIRONMENT === 'development');
define('WP_CACHE', ENVIRONMENT === 'production');

define('WP_AUTO_UPDATE_CORE', false);

if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/wordpress/');

/** Sets up WordPress vars and included files. */
require_once (ABSPATH . '/wp-settings.php');
