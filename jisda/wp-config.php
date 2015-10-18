<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'jisdaweb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '7063253');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '}6}=aH]j!p7@9hc0`ORr.vQqvAO`O}5cC4Bh-+r*yI_wR2IW(>Y#rk z~5.nR(;v');
define('SECURE_AUTH_KEY',  '*+{Cr$7<X@pSmB$*&+X;Qzir=?,sz)#7$ekvjSOFO/b{<cJT:=--MXItHgw]JG)k');
define('LOGGED_IN_KEY',    'DwkS>^!,ivz<=+}^Pg+3T,1V?WK[|^H?IPI!~4mLU@C.nzPInu+<(C`)|z~0ti8I');
define('NONCE_KEY',        '#.T#35d?L%evJL-*cNoqf,wot7<5hg|?^vC6wtSs3pM>VKupL@|lR`zhA^xCtZr2');
define('AUTH_SALT',        '^/(l408))=Px4AYq<OXE-H*2c0tV+-PEa]c?]fSwTDujFd])^%h_B/IFgknbaY3k');
define('SECURE_AUTH_SALT', '9n?6Io*w:vP_z9ttY}mY{|[= dFmga)UMb4S^!gPmZBE:cEKChR[0y!?h]5+n@r&');
define('LOGGED_IN_SALT',   'L/%K|b+9U1.W,^.:Av8fJZXXHv<xJvmx<MWq6;;5Sp_-qrd38viv3@fL/1lt;Cn&');
define('NONCE_SALT',       'xfL*,cQF@L?6Ik#zH>y0Xx<p&~/{T%s;]v+|m!K0*o4_c[{KXK&Ouy95+]ps{|_M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

