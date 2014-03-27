<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'ldsclient_wordpress_ouagll8bo2o2wy');

/** MySQL database username */
define('DB_USER', 'wpuserymqj9skd38');

/** MySQL database password */
define('DB_PASSWORD', 'klzSdigCKb');

/** MySQL hostname */
define('DB_HOST', 'localhost:/tmp/mysql.sock');

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
define('AUTH_KEY',         'r5aqui0hhxqa8rj03s58l2gnkjovnvjhdhix91aayu3j590031mmtmbahyu49ykw');
define('SECURE_AUTH_KEY',  'hra731499v8o0gqx38u4rp75akr0q6a8r7w7x85hslgfbfaqn164cnnx4bp77g3d');
define('LOGGED_IN_KEY',    'ymkucnf4rnlgv159y7xmigkw45xfafm8jq27jj4usj0sc93jc2pwuk9o9cmdu7xh');
define('NONCE_KEY',        'hvjfvyyqwujuub0oym1nwbr28s56yyljnriycbx0ll45qwfo8vglbskafnwk63fo');
define('AUTH_SALT',        'qksu6ipddcf27am37809ib9jkuy87271s627544jifw2hidhnjbj6jw1y5u6w5iy');
define('SECURE_AUTH_SALT', 'n20o1bspvk83f4asjjuaj53r8sc3lnwbnqcjvnpigytbvfqlm5ro5uk9cqcqlsgw');
define('LOGGED_IN_SALT',   'a8bbfdf6muu6l4c2vp1lgg5gkqrkblowf7y672uo61ijgcfvt99s7voairhxl1yq');
define('NONCE_SALT',       '0m1xykjh7djcrbhyown9d98n2ac0462gmokqn984n51js1r4m4i0ydrsn3fuo17v');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wordpress_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
