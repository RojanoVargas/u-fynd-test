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
define('AUTH_KEY',         'Vo1w3JzjzHS/uBXN8zDjFgLIQhLNwZ4q2PNgdiSSOe0ogfdvhTzrRJ1rvRXRhb3qphDBLVR7jVKEEtatJC4S8g==');
define('SECURE_AUTH_KEY',  'EpI/djuKovk72KdsLd7e2yLXpBOxfLRzjelGM2lyoGrN15v6vyw7Iq2DMNkXECqKwM6WkNGPgWBg3z1zpvDISQ==');
define('LOGGED_IN_KEY',    'IA4xTPTViRWeIDmeHv+Y6NEKJSjOp9nMI7AigL1W8Lb9ayLc9VzVvmsljF8zCjDEbWhMJryMBo36B6jbn430Tg==');
define('NONCE_KEY',        'm5X2t6cbpInbGPZp4svIHl+vPtiYXnH+ArPAGIaZne1JuvXW+ifI/FnCPHfpYsSIog6MI3tKNmSxrKMcq96u5g==');
define('AUTH_SALT',        'P3DmMELfeVKiOiG2jSBlkuPCYm7KGexKgky+vQ3ovRkgYaEN/WXpSs0pSNYpMa9/DOG5UUPA3cmriQxAK9QU1A==');
define('SECURE_AUTH_SALT', 'ub+aNuli3c8dwXDMNweVu6J3HfJRV2mLv3+yJbzxApx5Uj6II0XtGIhhIiH2DMUYRhxG+MaE8t2lT+eefuw6Gg==');
define('LOGGED_IN_SALT',   'T48LDvNfn+Ydghfj51EnIm0mboCkU9sCc8m09+vS3bN0sUB1iIj5S7J52n9ufePozPMmMfsxhUL8PrMS2xEhhQ==');
define('NONCE_SALT',       'BSwPRULu8oa0pdVZV3xxfTnKo193mJQBpc/nHkbtPMd9FX1+f+zZSxZlIWv29kZI88VbQWRUMTuNdM8+KwLf6A==');

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
