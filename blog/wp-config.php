<?php
define('WP_CACHE', true); // Added by SpeedyCache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'giftemgl_wp497' );

/** Database username */
define( 'DB_USER', 'giftemgl_wp497' );

/** Database password */
define( 'DB_PASSWORD', '16.1]8pINS' );

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
define( 'AUTH_KEY',         '7kejpjdyuyakhxa88txcvg6suybeyaqkawfbcxterkuaft19n2zq9ecascclxg3m' );
define( 'SECURE_AUTH_KEY',  '7ayjfpwcuzwiyvsi4jizw2qubijybfhjez8fz3zoyplkkovxjnfmzawt33amjmfr' );
define( 'LOGGED_IN_KEY',    'w4r2kw4qqsourtg3vfnbbok6zonjf0w1xjxupfso5k7iyfqb336k8uwd8pfyw6cv' );
define( 'NONCE_KEY',        'coahqgu4aubryat9pgnwuatru9hz7ypc3ovbfibarqjjyjmicg2mkmf7cxs9eoyt' );
define( 'AUTH_SALT',        'sepnokt8gatetoan7m4vvdumlf7pmflmuagawv9clhx5pv8a4ugbaupe5t4n3lfz' );
define( 'SECURE_AUTH_SALT', '1wcpbk3fvvpbdege1uyksy2kesvkspi6bv20nkvrjnbqn6pymbk91wtnzuean0ua' );
define( 'LOGGED_IN_SALT',   'o9ga3412z9lbejyivzewpoyyjtgglkfmxfjmht5pnjrdurzodkwx0ei8ppu4jzw6' );
define( 'NONCE_SALT',       'dklqcoawn18dt8atqpdij4e0wvqjs6yfadopbf2cwmzpcmssywzelt3bcp4ayrvr' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wpbg_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
