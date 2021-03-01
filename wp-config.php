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



 * @link https://wordpress.org/support/article/editing-wp-config-php/



 *



 * @package WordPress



 */




// ** MySQL settings - You can get this info from your web host ** //



/** The name of the database for WordPress */



define( 'DB_NAME', "00381766_umbrella_dev" );




/** MySQL database username */



define( 'DB_USER', "00381766_umbrella_dev" );




/** MySQL database password */



define( 'DB_PASSWORD', "Micepower88@" );




/** MySQL hostname */



define( 'DB_HOST', "localhost" );




/** Database Charset to use in creating database tables. */



define( 'DB_CHARSET', 'utf8mb4' );




/** The Database Collate type. Don't change this if in doubt. */



define( 'DB_COLLATE', '' );



/** The Memory Limit error fix*/



define( 'WP_MEMORY_LIMIT', '512M' );



/**#@+



 * Authentication Unique Keys and Salts.



 *



 * Change these to different unique phrases!



 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}



 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.



 *



 * @since 2.6.0



 */



define( 'AUTH_KEY',         'hriudxestlapa2u0elouq5xh3kgc3guegndewykyujgjsjv0k4jfsuu11014ntdt' );



define( 'SECURE_AUTH_KEY',  'qfadwnxzo9h53v1bmx3kfgntiwpeb4thnhvibzn4tmvfivvdgjqbosjq5zxwr0bg' );



define( 'LOGGED_IN_KEY',    'pkpkthb0o3muimywimsbcq39o3k0mqncnozvvs6f6q06i145ysmcvm5nokipprq6' );



define( 'NONCE_KEY',        'li4ynp3h53d7pemthyi7ki8vis1a6l672dkp90lkwmvx0rvfvx973nrr60mxeiro' );



define( 'AUTH_SALT',        'vre7digwgg2bropenvtqwklukwxxabgnyibmck4zqsho4cjttnqbbjyqpufgtw7t' );



define( 'SECURE_AUTH_SALT', 'zuho8hepf7exyqrtbgzzvykl3lluqyqycizookysd5cby7nhkezahycb0cqfr6rv' );



define( 'LOGGED_IN_SALT',   'jdi9prhpryg5bbn1pkua8sclh3jstkr4iyaf5tvx7loyehyplknrh26z78j9vqlk' );



define( 'NONCE_SALT',       'nksypztsugjel8uvq3o5nugh1i1ap4iunogwnvivgjxhsoasyip7yuvrwjyccpoe' );




/**#@-*/




/**



 * WordPress Database Table prefix.



 *



 * You can have multiple installations in one database if you give each



 * a unique prefix. Only numbers, letters, and underscores please!



 */



$table_prefix = 'wph0_';




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




/* That's all, stop editing! Happy publishing. */




/** Absolute path to the WordPress directory. */



if ( ! defined( 'ABSPATH' ) ) {



	define( 'ABSPATH', __DIR__ . '/' );



}




/** Sets up WordPress vars and included files. */



require_once ABSPATH . 'wp-settings.php';



