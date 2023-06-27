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
define( 'DB_NAME', 'woocommerce_db' );

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
define( 'AUTH_KEY',         'uj?3cLF.AoBg32Sn+[.R)YJ;+G=!7tPX6s;R(+jcBFMCS8T4oK?R2@2f;LVl)EDy' );
define( 'SECURE_AUTH_KEY',  '$a]eS0ytgknj<fjvTi1.l@s,rw{Re205TsT9=J3FGATds_,/t|YOA/o|//7j7M G' );
define( 'LOGGED_IN_KEY',    '+%e0]Rs)D*r]!t{)[F^7D+kxjaHUS7Jmc&j{//gO.u!tqptQzv h1u!T@Wao6Zlg' );
define( 'NONCE_KEY',        'g_E~E!$yv[%}B3@d$AA!*T:_/v52!yNqptipt sfox In!a>?/<^<l&7[ZaXlL!p' );
define( 'AUTH_SALT',        '`V5Z;<i]lwcW0t:!*fR&SEQO8s}c-vW[4%qJk8+1P-5-==4IB$bR=(frf$N/#Uv`' );
define( 'SECURE_AUTH_SALT', 'w0T?c.z./GiG9,l,G{MX{(13YTMAdR08Tyr(27jaQ_.*TE&JD>f<d%j`*.yuy RU' );
define( 'LOGGED_IN_SALT',   '{RDt1fx)zT&-B* d{SfjZ$WQ%zX#Jml$}kMf#40`hZK>iNX-04^S&J1>,IaY{]*[' );
define( 'NONCE_SALT',       'aVQse*Qz@kPB0#vtQqTdc6]bWDM}q[W1dt=?jy7wH0VE_J&0tE.3IF[`[.Drvv;q' );

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
