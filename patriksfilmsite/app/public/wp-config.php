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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+eY8d9UiOQWkzFr69MVET0hzJ6BPOauwkZOLy3JsXLnUvfSm0RvfwBW8VXNmsQCNSKoQ0CII3231Fpo+RkUxCw==');
define('SECURE_AUTH_KEY',  '1TH6okavepcd59jOLaqk++QOWqWZGdlYdAc2FvQHI1eGHfL4GNSSDoP6Tf5E0hIywOqPWOsF0BhNtYDSONwomA==');
define('LOGGED_IN_KEY',    'AtsbJLFtA5YP0ThpUGLPjZHewTuA0EGK1vqxd4b1qHaoax43So6apM9vxKMMwS9kb+5AuGgMBmuncszth+xlqw==');
define('NONCE_KEY',        'qDbFf2TXM1HG1jOhAgJw0ElItITJDZFhtFfz0TSEZmUAOVIJij5I4P+mUlpzY/V+oABYJW9HEEWnnMUa9vW7/Q==');
define('AUTH_SALT',        '85Gj6lc5w06GmEz8AyZ0VncVZ9mesc8sjr5MQI2eHO44D68OfHglH3krixWEwZvDaWae9Pq0ebXDxjnoruvVIg==');
define('SECURE_AUTH_SALT', 'Bek4KfWMAWCvvMA/Hnd5zDl3f7DvbFN9gtCzCbCSDm6/hXvzPQ/INuCLsS4oAfGOwyse2/Fk+H5hRTBMcDZYfw==');
define('LOGGED_IN_SALT',   '7Ng0hMwEJ+xQmPRdVUqQwvPbjMhEvmx3DhQqWgsIqI2RDaAd+bzc9CenSJ5e0CTl7jpvhJt2UVdxxmaVv3BH2Q==');
define('NONCE_SALT',       '/gqeDEuGKEHhXlu4Nt+eu0xHtq63GPGPsdjMx9/kk5JIVPgSgcPryDbMhP6UgVTMNZ8wnm7pT3EFcIXf48+XPA==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
