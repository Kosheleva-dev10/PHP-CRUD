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
define('DB_NAME', 'fundwp');

/** MySQL database username */
define('DB_USER', 'fundusr');

/** MySQL database password */
define('DB_PASSWORD', 'Fund1234!');

/** MySQL hostname */
define('DB_HOST', 'mysqlcluster15');

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
define('AUTH_KEY',         '^&{6(u{LL$3,^JL%^=/!q5h6Ps;XFz!i.z]JY]:p@1646oiO?IYP[~38MHkk/DOH');
define('SECURE_AUTH_KEY',  '}f$.WTOw+P1X+gC?[H8(:: MJp<{ToiFUOq?S;ZBHwl9,e6|i`BPQ>n&aTIS[ZR<');
define('LOGGED_IN_KEY',    'eH>IAy4PHm$#iv)6~4MFD {2*W|$NP[ o`/ogef=L=6ror1w.}k#M+}NB8er)19<');
define('NONCE_KEY',        'ECkv}+gyrHa6m@-4ufxNhewC`8CFTlbt<&<}2:%FbFd#WM -)y91H&Tmy8m|#Q{q');
define('AUTH_SALT',        '6@$obz5EmES78~HkmEm//NG~:Utl]7,9:;3SY-zI`5U?v@Q=;fMXWJ-nghklEzL^');
define('SECURE_AUTH_SALT', '{Dw*oEd7x~-1KIZZH+Lto{>! Y..@P]q_f*hB=xIAMapS:pH&*j.8;wLyeDG0ia/');
define('LOGGED_IN_SALT',   '/z2Vs!MKlaqCl2waG$o/%bwJ>QWNmfL]2p?W-{L8EUZ<Z]kH=OABl(Wbt)a@XcRj');
define('NONCE_SALT',       'Udo?TgvdullLm{7nQ}UoL4G8|M#00W!PkuNt zA?tN,D%H&lE>>MLQGHr !*fcG2');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
