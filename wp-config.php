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
define( 'DB_HOST', 'localhost:3325' );

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
define( 'AUTH_KEY',         '&bymQJ<ud!8q42y27NZYqEdSCyA$d,&e XMn?k=1nK@1@$di/:/!^A:]D$gVth@ ' );
define( 'SECURE_AUTH_KEY',  'v^Vt_e,-]@y}3>@ U{@^UN^`5&DWy)@gt_kf>J_e?/3#!PeoTDg=ZLR-6<1`FGxM' );
define( 'LOGGED_IN_KEY',    'XkZiIxoTnA~,SpWH2X7|ocM:}X$j_ZcDeMV[{E dJ,%ME0x<8%JN!EJ=VcN <&Aw' );
define( 'NONCE_KEY',        'kM)GQ+Lfjzpy$j[yL!T|mS/ X$MC|/*[+h=+ he@1WQ84O^4%T<N%<j^W+s=}fY;' );
define( 'AUTH_SALT',        'Nr{OU:mpB8,jqY[[2T/UTPpWx_%D.? BL &&#LP)Fdxl}{J-@p|^7gb4Q]F8x@>D' );
define( 'SECURE_AUTH_SALT', ';y+I~}Vb%?<%U3we]!.J;;> K{,G8p_lOx.iq`(STD?(C|,aZo#Y!s]O8{bGv?}g' );
define( 'LOGGED_IN_SALT',   'c]%e1yD3>sn_***dnm!0v~Csx^[j!V8-,:Vs+f>nD,=IHPz+_+>Bd7_itk?&J/zr' );
define( 'NONCE_SALT',       'kWuI$e>,):X#-cNt{yInzZ.[!eFJ8)Y G`JRXm]$rkkO3;{A| OX]Wm_f3p!2bBO' );

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
