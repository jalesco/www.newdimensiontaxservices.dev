<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'newdimenDBebh9l');

/** MySQL database username */
define('DB_USER', 'newdimenDBebh9l');

/** MySQL database password */
define('DB_PASSWORD', '1wC4kZocfX');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5wO-[Zs4Nw[Vk[8l-GV!1_#et9DS~;Ti2Hi+HLe15l-~Od~:Wlp9Op_OSh$^MfjI');
define('SECURE_AUTH_KEY',  'MY,3fvBQz>QgFrv1Gs!Od[:ds9O-[Vl8Nz[Vg}ChwCd[8kzl+HW_1dh#6ixDS~;h');
define('LOGGED_IN_KEY',    ';AeuAP+6Xm@}Yn3Jv,Jc>4gvFU>7jyEUX<7cr7Bn$IY-[VZ04gw5O-[Vl14z>VY04');
define('NONCE_KEY',        'j>7jzFU^3n$IX.3f3Iu,Qf{ARg}CzFJZ@:ZoGsw|Yo4Jz>Uk>8kzFV!,_1dh9C');
define('AUTH_SALT',        '*Pp]Lx+Hh#6ixDT*]BQ${XnEInFU^3rET*bq6Lq^Mb<7jy>4gvBR@}Rg}Nz[Vk7');
define('SECURE_AUTH_SALT', '9x_Oe]9et9P+]Wl${Xn3Iu.IY,3juAU<{Xq6ATu.Mbf3iy$IbgvFJc>}Yrv4No!N');
define('LOGGED_IN_SALT',   '8@[Vk0Fs|GZ|4gs8RixDS~;ap]Dp+HW#69w#Gad[9ps1LO~;Oe:1Hbq{EIu<TX^3');
define('NONCE_SALT',       '[Gs!Nd[Vl5Kw!Xm2Iu.Pq3f*Lb<6p*La#6ix2Ht.Pe]AQf}Bn$Uz@}j3Jv,Xn3M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
