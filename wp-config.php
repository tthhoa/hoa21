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
define('DB_NAME', 'tccenter_H1008_dev2');

/** MySQL database username */
define('DB_USER', 'tccen_dev2');

/** MySQL database password */
define('DB_PASSWORD', 'admin123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'kp<^qW`lEV|m=.Dl/jDacNS)<@o@Pr-X|aar^obWusmF+?fV6{XQ:$g*rsJG<dc4');
define('SECURE_AUTH_KEY',  'skPctUBk0A*/>/v>zdkCMx.2QeC!zVX9Ag(8W+mn<.+UEfz&kayy59|/3-_:&@!2');
define('LOGGED_IN_KEY',    'C]- yzKAAUUMT?{PdKjg`hW,9GA__=!)gta.FL1}YRh-tM8__t;R.Bt[):cB}`V!');
define('NONCE_KEY',        'E?&4@9jX#iwX$FoEyO6);b?UQ1=<Nmit<h^ellnLic_+u;jp$+A]Ih7OH/oq5H@ ');
define('AUTH_SALT',        'M)3z=MqJ8W,7vi Hg2{:0R8]E9uD+! 8{%Ui1|4D+wySTzxM@J,p%-gCOYa;#N,O');
define('SECURE_AUTH_SALT', 'z*o;X!lR5<r*tiFgwE5P!FIm}2d_4HZl-3cEe(FfqA3x?U4M-G4JCE[c9c@x|RjS');
define('LOGGED_IN_SALT',   'nFNo,S`=z,lFM>?1Ei$^C`//CSN)o(om8[P(n99@LpLe:FMU#`<7B0B-F!{ FT>d');
define('NONCE_SALT',       'n)|NCU_-#3gqhms1?0/8l~Y=,nAruDB!Hf,1vCU4R([30MKs8zrX#}]6-n4DC,!B');

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
