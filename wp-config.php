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
define('DB_NAME', 'pilipinas2016');

/** MySQL database username */
define('DB_USER', 'pilipinasadmin');

/** MySQL database password */
define('DB_PASSWORD', 'p1l!p1n@sd3@dm!n');

/** MySQL hostname */
define('DB_HOST', 'mysql.pili-pinas2016.com');

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
define('AUTH_KEY',         'V8*+j~S;/ryTVJA&oSe~L2r^#~Sr&~T|w}#P/I3Of,y#)4$5p&cYP*D)$o ji&|z');
define('SECURE_AUTH_KEY',  'k)KWd`Ct+I@Q_h:?$nL(i`Bl8IQ3jq<09@!W>[UHSdZW:<P ;KS~Phk533ZNKN*u');
define('LOGGED_IN_KEY',    'oM:]>s+-T(V}5?sujeslqz|=l#20I1v>s@H4Go=ukF{W<[@a}!ve[9m5HS_|g3&S');
define('NONCE_KEY',        '7hyE,z)9P${rYPy*!)jW|S~D0I|7mvwji OfKb+e|XC`]`lEjIy8Bx~D|W(CTwWb');
define('AUTH_SALT',        '}S^{.#iq-4Ax<<O6i{XKEl<UcN=]sDln92#@9TsKB1~Zb`hg2n%sjt(Cr>[:Qnh0');
define('SECURE_AUTH_SALT', 'NS-sD{H[[+qp)Tuu(IP{Us1iV(=BT&`qn,EhD=8_jmg -h;i+(1OaF%)h;=>|Dj)');
define('LOGGED_IN_SALT',   'V|`ona<q>ULNTZ3.T5Kn`!!aY;12Kl|NsV$.<X:T$lm@DvGQ(`fn![LpOa#OnKL|');
define('NONCE_SALT',       'iL!INZ[LpL;}=O`8wR:9#A`K4O{kzi{Tp<h:mOb./?<(3u+J{eBOx*F7QH=+~[8/');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'css_';

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
