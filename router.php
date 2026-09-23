<?php
/**
 * PHP built-in server router for WordPress.
 * Handles pretty permalinks without Apache mod_rewrite.
 */
$request = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// Serve static files from wp-content, wp-includes, wp-admin directly
if ($request !== '/' && file_exists(__DIR__ . $request)) {
    // Skip .php files — let PHP handle those
    if (!str_ends_with($request, '.php')) {
        return false;
    }
}

// Route everything else through WordPress
$_SERVER['SCRIPT_FILENAME'] = __DIR__ . '/index.php';
include __DIR__ . '/index.php';
