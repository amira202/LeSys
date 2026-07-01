<?php
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
define( 'DB_NAME', 'lesys_web' );

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
define( 'AUTH_KEY',         'qf20P^v7CL7w|U|jZ)y~hJ[f82@l,/A =`mwg^o|qJ.Ot^*UJ_veFWMWI82A#BGg' );
define( 'SECURE_AUTH_KEY',  '%-#8{JNP6p=e2{kv0FU^#<+N]CyGF`AfayH>5UOQkOY7j<P<$1vxLf4_I,PJ/S7E' );
define( 'LOGGED_IN_KEY',    'vnT;Qj0pa]Wpd7zpy!|aa@-HBkX~Ce01M7O+*Rc_|x~!(hnGA]MZb]T%#|IWe)pg' );
define( 'NONCE_KEY',        'b5+~(+RZBcElFBa@6%5ZcLn:Cpv=s/5;=mD-Demm%=?hB;=Yv3n:f1o+ 8ql5~mc' );
define( 'AUTH_SALT',        '@UF~$d~v#4^3H:wydPNqe<D%@*9etvusdIjxViUY!#j|A<vK_N4t<]#bIz*!!1ls' );
define( 'SECURE_AUTH_SALT', '>x;cXd-3V^=U>?Uz5%7EQ.]-Z0K[>*Q:L8`+Axmk@ZeM;_qI@]?OJN-C}r~-~?Q)' );
define( 'LOGGED_IN_SALT',   'G0wVP=$6K6GB}}WcZ6T~E2=C);BWICUrzvh8z_:EA3]/+-H1ALJkKWk:t#|EczDe' );
define( 'NONCE_SALT',       '<a=|| wm{9a4;Cl]}2^<V?X3B]vlWq}p(chRE7Eb&k8K;-|R%O|E[G&x5u*s!kf#' );

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
$table_prefix = 'LeSys_';

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
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */
define( 'WPCF7_AUTOP', false );



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
