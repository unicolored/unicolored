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


define( 'WP_MEMORY_LIMIT', '128M' );
 //define('WP_ALLOW_REPAIR', true);

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'wpunicolored');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'root');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'localhost');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a*yH;+{7^D7]^?o|T.&s0`DLl7W_rcn%T#qs~h}Xp;J!^+??8Q{2jA%Yr^W8+[S3');
define('SECURE_AUTH_KEY',  'f jRO-h+1u)1M;-WQMUHZ{i{T%0yU[M!sC/8}*GSeD_q=uX$/;&0wfDRBr|-Z0|P');
define('LOGGED_IN_KEY',    '0RW,iJx$nV>lkdx5|zlH|t*ILN<}pq^*Xps-ZT-uYJd[[]ukIQw]VG+<e[e{<!w ');
define('NONCE_KEY',        'aYw~tzEsrV)!D{S/9%m^!qB/6@,p5{N~CayN79F5}TG(3hCY+.4g2&&~ 7GM#J5o');
define('AUTH_SALT',        'u%,<HQF68`Po}$ @Jr0Ak22vC,3h:%|t/qye-aG6:H7jL `9oFC&KgEE^n=-6#~%');
define('SECURE_AUTH_SALT', 'Ov`E6b)=o--eQy!|_{82~w[dx,i^W1K}IvKv@9Gaknis~eUS+2BPm<P6d{|$T.Kg');
define('LOGGED_IN_SALT',   'y<|_r*e`Ju<E>@3UwjYv0TEXjCP=hw+ea=J,N[bTM+W^d6cNI.G,*+GWkF+JepXC');
define('NONCE_SALT',       'Ova`(OiE<t=-_47h)FcNMt`a?|%;E+9*qW~.g %iwC+TJ*uqxx4B8lH<ADa|T*)i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpunicolored_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
