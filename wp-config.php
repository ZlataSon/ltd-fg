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
define('DB_NAME', 'apple3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '662775');

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
define('AUTH_KEY',         'Vp>^IkAvbksX|+5A{` 5=S:aLRGSOKWp%na*HR7=f,ms?;3cZ<l #|uv}{={,<Zt');
define('SECURE_AUTH_KEY',  '!tBJGc];ufACpUg@>-e25tqlG0$>-dTNmqe[Yn*x:tNpdzh;8uC/M;<-u,->>kkX');
define('LOGGED_IN_KEY',    '){kn:Z4rs9x6Z&& 0rqTOtsn|Cw)w3u0g/mF&FK5*xml*VoPY^k j-4*p/yU,_Z&');
define('NONCE_KEY',        'p|1DRCs]UX6A6ZXS-I8,s`3JY6CPuEJ_;)zhg|CF%fT-7|<~D)=x?Z8{^{4pO:S`');
define('AUTH_SALT',        '>;{s#(KSgc+sW|_k 5xU-R/0Dw/8*#/zA4!v ->R*jo{/T5p+TWITXn?(!dk/Dt;');
define('SECURE_AUTH_SALT', 'Rw~<p&QW/wh/ANj#D8qd>YS+;Inn.C86,CHk@[ym9|,tpcLs98,QH8v1*#WWlw2A');
define('LOGGED_IN_SALT',   't*Qtwn;!id*33u3z4]Yu{86A;%Of?3.|(Ga@6&=I|jLUz$leRC% -!1VfdBeAV!`');
define('NONCE_SALT',       '!tF|32M]vzZ|vcZ?r_lc(@|,gr]IW$Fy-$x.<i;2Ll$U<3~+4,={;fyCFQP=lkeo');

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
