<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '&D/tHkP&e-)<oe;y>pW2-]eTPcjGiHxF.4 ;&Y&C8dl<mL*bh#s9/.vpz0-3zt@0' );
define( 'SECURE_AUTH_KEY',  'wGl})(+*Pi}Z`-]aOiL~`Utg$#nbnl{0Du|[$w0vVyG)/Rm5~%|n]4J7nz.>4m[k' );
define( 'LOGGED_IN_KEY',    'o<+gkwHr9];ZWwJ-<eK>D?B^!&x$dM[KlG-:Z , [@;@o%,t7|rYk#^TPl..2DAI' );
define( 'NONCE_KEY',        ',r3}Qe!xD%v93}xsDgs)TIi@z^:>/aS&j_xvAAOT5Md4u}7.G3lo!zVUj/,.<`?X' );
define( 'AUTH_SALT',        'vb^4&8|}TD1m.&6s6@Sj[@z=P0R0KqGS^!_ru<No0#~@rr7bXfk-3F.|Id&9wM!_' );
define( 'SECURE_AUTH_SALT', '),ULqo@F[OgawCQv+9+->;oRZeFGb4V!-Uatuz_dJlFYYEto?$VM2OdS+*:KC;D]' );
define( 'LOGGED_IN_SALT',   'cgard#3ElZTJs]{h&2S<+HDSccuL#ETvQ.q@jQ$5$aE_T}kmU?+Fv]fge24rk|)z' );
define( 'NONCE_SALT',       '_e69#z>l%=RU`>v+-L7OZowF,p+y.$%zc*M(2H=gIw0/JW^TgM/^Ctx|vHi<MKAI' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
