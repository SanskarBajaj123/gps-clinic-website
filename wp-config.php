<?php
/**
 * GPS Clinic — WordPress configuration
 * Sensitive values are read from environment variables (set in Vercel dashboard).
 * For local development, create a .env.local file or set them in your shell.
 */

/* ── Database ── */
define( 'DB_NAME',     getenv('DB_NAME')     ?: 'gps_clinic_local' );
define( 'DB_USER',     getenv('DB_USER')     ?: 'root' );
define( 'DB_PASSWORD', getenv('DB_PASSWORD') ?: '' );
define( 'DB_HOST',     getenv('DB_HOST')     ?: 'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

/* ── SQLite (used locally; disable on Vercel if using MySQL) ── */
define( 'DB_DIR',  __DIR__ . '/wp-content/database/' );
define( 'DB_FILE', 'gps-clinic.db' );

$table_prefix = 'wp_';

/* ── Site URL (set WP_HOME and WP_SITEURL in Vercel environment variables) ── */
define( 'WP_HOME',    getenv('WP_HOME')    ?: 'http://localhost:8080' );
define( 'WP_SITEURL', getenv('WP_SITEURL') ?: 'http://localhost:8080' );

define( 'WP_CONTENT_DIR', __DIR__ . '/wp-content' );
define( 'WP_CONTENT_URL', (getenv('WP_HOME') ?: 'http://localhost:8080') . '/wp-content' );

/* ── Debug (off in production) ── */
define( 'WP_DEBUG',         (bool) getenv('WP_DEBUG') );
define( 'WP_DEBUG_LOG',     false );
define( 'WP_DEBUG_DISPLAY', false );

/* ── Security keys (set all eight in Vercel environment variables) ── */
define( 'AUTH_KEY',         getenv('AUTH_KEY')         ?: 'gps-clinic-local-auth-key' );
define( 'SECURE_AUTH_KEY',  getenv('SECURE_AUTH_KEY')  ?: 'gps-clinic-local-secure-auth-key' );
define( 'LOGGED_IN_KEY',    getenv('LOGGED_IN_KEY')    ?: 'gps-clinic-local-logged-in-key' );
define( 'NONCE_KEY',        getenv('NONCE_KEY')        ?: 'gps-clinic-local-nonce-key' );
define( 'AUTH_SALT',        getenv('AUTH_SALT')        ?: 'gps-clinic-local-auth-salt' );
define( 'SECURE_AUTH_SALT', getenv('SECURE_AUTH_SALT') ?: 'gps-clinic-local-secure-auth-salt' );
define( 'LOGGED_IN_SALT',   getenv('LOGGED_IN_SALT')   ?: 'gps-clinic-local-logged-in-salt' );
define( 'NONCE_SALT',       getenv('NONCE_SALT')       ?: 'gps-clinic-local-nonce-salt' );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
