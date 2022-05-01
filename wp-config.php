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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'defaultdb' );

/** MySQL database username */
define( 'DB_USER', 'doadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'AVNS_JcIMRNaubiUgyx5' );

/** MySQL hostname */
define( 'DB_HOST', 'dbaas-db-8299011-do-user-5104806-0.b.db.ondigitalocean.com:25060' );

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
define( 'AUTH_KEY',         '^_=;LNY;v3L Ky=4S34EfwmScb1B#Hh3ty1H<-`e;8wb9TB]J(EkOVT$hK%4*%;n' );
define( 'SECURE_AUTH_KEY',  'TDv$3%=9n0)&MoVRGP; X1c8QFwv?|05V9|X{2q0j}v~E^5SX@.o|i7*LlTvPaUB' );
define( 'LOGGED_IN_KEY',    '#r)SZ$;!4mm*0 p_YR8ykT{Ph4Sk{unr#jEfH>0w+eLK/f&Z2*sZd7M1fA>mCUQ`' );
define( 'NONCE_KEY',        '81_K?bF^M!;P4EFe6.`P|9.-~T!5|1/P$` yse*>CI|cAQPJ[>)t/d16MLGu=T`q' );
define( 'AUTH_SALT',        'N?- 93PMVA<35[|iqz[>36fnc[=@wa1=)Zz<MelNI*3tRps<.]:.,A_bm]+~;,-8' );
define( 'SECURE_AUTH_SALT', '=JD1yhV%Pw&fs^$xrr7d4Mh,.m1*u8cK~R4#gn,aKq4:{(D:YXlV2r,dQP(2Wjn[' );
define( 'LOGGED_IN_SALT',   '$r:nlP$OWBpGrVBtBOWa6<e{Fn^5/nddpTca~M)nS/Rhi_]61yo5#tXaJRcen:W=' );
define( 'NONCE_SALT',       'fJ<Hjk3FxoX1mQ&U(*NVo_0M.#8S7h?59`Q4|KGI0yCMov{]BI]1Tur^,!R`[*pQ' );

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
/** Connect to MySQL cluster over SSL **/
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );
