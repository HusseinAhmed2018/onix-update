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
define('WP_CACHE', true);
define( 'WPCACHEHOME', 'C:\xampp\htdocs\onix\wp-content\plugins\wp-super-cache/' );
define('DB_NAME', 'onix');

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
define('AUTH_KEY',         'S}HU5I^*kh_m*H,j$N[>?!4]@Q*v8r5XQ@z1[{&kyQkn:a&zdSUk<o`ge@e<nbV=');
define('SECURE_AUTH_KEY',  'r+E<cm*X.92^s_YUr{V<iA<-L]>eCQ4.C1%gkHO&&0$%k>-U  _oL:lH_1S5]NKG');
define('LOGGED_IN_KEY',    'kD}H$ut-E-gi?Ax%v?a[sNG.xlsd,f6UHFYAeF<a[GDgjWipKgJTju,%F;Q?!6m6');
define('NONCE_KEY',        ':oa:i#-K&[<Qufhl:eo.!$AfCI$p~8h]mz`z}G)Tr;_,zPKAyGls5keV?/N@PAm:');
define('AUTH_SALT',        'r+aXG/W2/;p5/=Z4cUJ$]@ZenLNIYK4)fRj 8x(8gE7ZL{y%Z;iu:)#y<e=3(S/1');
define('SECURE_AUTH_SALT', 'i`T.1b=o(eZmcBEW0GfWCZ*{mo;ue-/7@GM=cy[P,3fmK,I*WQxxsx1u-^nvRU5c');
define('LOGGED_IN_SALT',   'ji,6A7y`&CfB2!c}f&<dhvRm3(I~ KYQpG*L(-rdKTB-NC$zk4rhnMgII`C5e(}}');
define('NONCE_SALT',       'V@p=jAj#4 1mwBs!CkRz`n Md*>8mG%*<clsa|g`86o]BxDD6N!A.go2+]Sg3 1+');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_onix';

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
