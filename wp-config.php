<?php
define('WP_CACHE', false);

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
define('DB_NAME', 'affiliate_app');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'K%{o+@[mUV?Y8fZ5$ph*NuH8bmv*Vqk/jOGGrfp-;tvL]iFxU83=vydPV3Ic/;S[');
define('SECURE_AUTH_KEY',  'P}cY|yu6@m2&]BbGo=kG0LUv3v7G|N!uE&h4$Zv|$d`cn&u:bY|[NP5?K,Y#(ka-');
define('LOGGED_IN_KEY',    'Y<VVSoJMl!~N:,*e&FV$(;`kR%Fk+;Ezj_ugA6z_YnV[X5VZ-2GG03Un50jp;%V-');
define('NONCE_KEY',        '_xZ:0T[p<5G=!NjCL%Zz,!dIn$c6xT yz417uxqcmc*u/`Ql?qOMb#?@nSC-wU,j');
define('AUTH_SALT',        '6n}s?9SfsLv 7SLNk<BivTN|d_8,r&M{j5IKq&Y8t&C3p$JdQm[YZcD<^pEGF8d|');
define('SECURE_AUTH_SALT', 'b$1Y>k}bGLqVtJi(HK~#q,6azWagg8I p[|G@1#||j&2*{7Z+?R8n!.F#n6u^Gg~');
define('LOGGED_IN_SALT',   'eU1=CSph5)TG-~!vt]SCATh0UZHEr h5Xr*c:v][F)Gba,lx`c-{:P4tv{,*&@Il');
define('NONCE_SALT',       'X~6LXg%^NE~!A@#@rfhO2BE%1) aX#88o_}Z2q|QB1^jEVgSNs:}ViC~&`S*;q3V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'aff_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
