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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'TY_9BAcQr9hTJYJbqwPBkbpa' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'R~bL<Ic|jZ#rutf~rY >Q=bh0@^HJ=0!iSlrd|6o;cbxFNkJOb-3Q[8mY+@8O~d6' );
define( 'SECURE_AUTH_KEY',   'EQa[ 4?1}>+j{[91=vO-!m])%6~J}$^61T[ddJ@j%$cE}$?4]|RJgoT3Ui*{G[M4' );
define( 'LOGGED_IN_KEY',     ',AoLZg{}&kM/*m,z;7  <?/X0{M|^fx,XNef)es4i%6${AhWi1XG@Hf7KO(3+5hV' );
define( 'NONCE_KEY',         'b5:/x-1rxbRN5dmtuUR~6rYR)NV$-2*+c!uwO-!Q^t!KW>71-n:-]zKOgTEF~z*,' );
define( 'AUTH_SALT',         'YY`,_P~zu*CUTq!f32AhZ,;3y ZML)TZ7)QG7 EN!Lk3gT~0~3yVBP`S*X5/&k^?' );
define( 'SECURE_AUTH_SALT',  'A*|*I7kll[?EhdCrYZmqA)|Bzw.x%D1qxZH. ^50y2v pL+!sk{kOm/g*EHLh#e1' );
define( 'LOGGED_IN_SALT',    '8ih/*gKrWDIxnU;m[B2M4zZolQ6wG#Q2!=v7NX*s0er <4_XSUE9&eGB,COI/:Y%' );
define( 'NONCE_SALT',        'D cgH3mZ8-rV;f3Gubz*NcQhYrpt&WOSqGUVkg@QXxd0kf`i]]eX93?W?5CO=;1K' );
define( 'WP_CACHE_KEY_SALT', 'y<a2VQ,<x]JV4TY7+YN5eswFSOlR [cOppBkcE0X4bd3EU7]}&L`14D`t:<wO2m;' );


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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
