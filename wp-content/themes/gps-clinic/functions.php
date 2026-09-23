<?php
/**
 * GPS Clinic Theme - functions.php
 */

define( 'GPSCLINIC_VERSION', '1.0.0' );

// ─── Theme Setup ────────────────────────────────────────────────────────────
function gpsclinic_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'woocommerce' ); // ready for future e-commerce

    // Set default thumbnail size
    set_post_thumbnail_size( 800, 500, true );
    add_image_size( 'hardware-hero', 880, 560, true );
    add_image_size( 'card-thumb', 480, 300, true );
    add_image_size( 'blog-featured', 1200, 630, true );

    // Navigation menus
    register_nav_menus( [
        'primary'   => 'Primary Navigation',
        'footer-hw' => 'Footer: Hardware Products',
        'footer-sw' => 'Footer: Software Solutions',
        'footer-co' => 'Footer: Company Links',
    ] );
}
add_action( 'after_setup_theme', 'gpsclinic_setup' );


// ─── Enqueue Assets ─────────────────────────────────────────────────────────
function gpsclinic_enqueue() {
    // Google Fonts
    wp_enqueue_style(
        'gpsclinic-fonts',
        'https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700;800&family=DM+Sans:wght@400;500;600&display=swap',
        [],
        null
    );

    // Main stylesheet
    wp_enqueue_style(
        'gpsclinic-main',
        get_template_directory_uri() . '/assets/css/main.css',
        [ 'gpsclinic-fonts' ],
        GPSCLINIC_VERSION
    );

    // Main JS
    wp_enqueue_script(
        'gpsclinic-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        GPSCLINIC_VERSION,
        true
    );

    // Localize for AJAX form submissions
    wp_localize_script( 'gpsclinic-main', 'gpsclinicAjax', [
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'gpsclinic_contact_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'gpsclinic_enqueue' );


// ─── Custom Post Types ───────────────────────────────────────────────────────
require get_template_directory() . '/inc/custom-post-types.php';


// ─── Contact Form AJAX Handler ───────────────────────────────────────────────
function gpsclinic_handle_contact() {
    check_ajax_referer( 'gpsclinic_contact_nonce', 'nonce' );

    $name    = sanitize_text_field( $_POST['name'] ?? '' );
    $mobile  = sanitize_text_field( $_POST['mobile'] ?? '' );
    $email   = sanitize_email( $_POST['email'] ?? '' );
    $city    = sanitize_text_field( $_POST['city'] ?? '' );
    $product = sanitize_text_field( $_POST['product'] ?? '' );
    $vehicles = absint( $_POST['vehicles'] ?? 0 );
    $message = sanitize_textarea_field( $_POST['message'] ?? '' );

    if ( empty( $name ) || empty( $mobile ) ) {
        wp_send_json_error( [ 'message' => 'Name and mobile are required.' ] );
    }

    // Build email
    $to      = get_option( 'admin_email' );
    $subject = "New Enquiry from $name - GPS Clinic Website";
    $body    = "Name: $name\nMobile: $mobile\nEmail: $email\nCity: $city\nProduct: $product\nVehicles: $vehicles\nMessage:\n$message";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8' ];
    if ( $email ) {
        $headers[] = "Reply-To: $name <$email>";
    }

    $sent = wp_mail( $to, $subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( [ 'message' => 'Thank you! We will call you back within 24 hours.' ] );
    } else {
        wp_send_json_error( [ 'message' => 'Could not send. Please call us on +91 9260202020.' ] );
    }
}
add_action( 'wp_ajax_gpsclinic_contact', 'gpsclinic_handle_contact' );
add_action( 'wp_ajax_nopriv_gpsclinic_contact', 'gpsclinic_handle_contact' );


// ─── Breadcrumb Helper ───────────────────────────────────────────────────────
function gpsclinic_breadcrumb() {
    $crumbs = [];
    $crumbs[] = '<a href="' . home_url('/') . '">Home</a>';

    if ( is_singular('hardware') ) {
        $crumbs[] = '<a href="' . get_post_type_archive_link('hardware') . '">Hardware</a>';
        $crumbs[] = '<span>' . get_the_title() . '</span>';
    } elseif ( is_singular('solution') ) {
        $crumbs[] = '<a href="' . get_post_type_archive_link('solution') . '">Solutions</a>';
        $crumbs[] = '<span>' . get_the_title() . '</span>';
    } elseif ( is_singular('post') ) {
        $crumbs[] = '<a href="' . get_permalink( get_option('page_for_posts') ) . '">Blog</a>';
        $crumbs[] = '<span>' . get_the_title() . '</span>';
    } elseif ( is_page() ) {
        $crumbs[] = '<span>' . get_the_title() . '</span>';
    } elseif ( is_post_type_archive('hardware') ) {
        $crumbs[] = '<span>Hardware Products</span>';
    } elseif ( is_post_type_archive('solution') ) {
        $crumbs[] = '<span>Software Solutions</span>';
    } elseif ( is_archive() || is_home() ) {
        $crumbs[] = '<span>Blog</span>';
    }

    echo implode( '<span class="bc-sep">›</span>', $crumbs );
}


// ─── Excerpt Length ──────────────────────────────────────────────────────────
function gpsclinic_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'gpsclinic_excerpt_length' );

function gpsclinic_excerpt_more( $more ) {
    return '…';
}
add_filter( 'excerpt_more', 'gpsclinic_excerpt_more' );


// ─── Schema Markup Helper ────────────────────────────────────────────────────
function gpsclinic_schema_organization() {
    $schema = [
        '@context'  => 'https://schema.org',
        '@type'     => ['Organization', 'LocalBusiness'],
        'name'      => 'GPS Clinic',
        'url'       => 'https://gpsclinic.co.in',
        'logo'      => get_template_directory_uri() . '/assets/images/logo-transparent.png',
        'telephone' => '+919260202020',
        'email'     => 'info@gpsclinic.co.in',
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => 'Shop No. 110, Kailash Market, Padampura Circle, Railway Station Road',
            'addressLocality' => 'Chhatrapati Sambhajinagar',
            'addressRegion'   => 'Maharashtra',
            'postalCode'      => '431005',
            'addressCountry'  => 'IN',
        ],
        'sameAs' => [
            'https://wa.me/919260202020',
        ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}


// ─── Prevent admin bar from pushing sticky nav ───────────────────────────────
function gpsclinic_adminbar_fix() {
    if ( is_user_logged_in() ) {
        echo '<style>body.admin-bar .site-header { top: 32px; } @media screen and (max-width: 782px) { body.admin-bar .site-header { top: 46px; } }</style>';
    }
}
add_action( 'wp_head', 'gpsclinic_adminbar_fix' );


// ─── Solution tile helpers ───────────────────────────────────────────────────
function gpsclinic_sol_style(string $title): array {
    $t = strtolower($title);
    if (str_contains($t, 'video') || str_contains($t, 'mdvr'))
        return ['grad' => 'linear-gradient(140deg,#0B1D35 0%,#1a4a7a 55%,#00A49A 100%)', 'icon' => 'video'];
    if (str_contains($t, 'panic') || str_contains($t, 'sos'))
        return ['grad' => 'linear-gradient(140deg,#6b0f0f 0%,#b71c1c 55%,#e53935 100%)', 'icon' => 'bell'];
    if (str_contains($t, 'immobil'))
        return ['grad' => 'linear-gradient(140deg,#0B1D35 0%,#1e2f45 55%,#2c3e50 100%)', 'icon' => 'lock'];
    if (str_contains($t, 'geo') || str_contains($t, 'fence'))
        return ['grad' => 'linear-gradient(140deg,#7d3a00 0%,#c85a00 55%,#F26419 100%)', 'icon' => 'pin'];
    if (str_contains($t, 'route') || str_contains($t, 'optim'))
        return ['grad' => 'linear-gradient(140deg,#0a2f5c 0%,#1565c0 55%,#1e88e5 100%)', 'icon' => 'map'];
    if (str_contains($t, 'driver') || str_contains($t, 'behav'))
        return ['grad' => 'linear-gradient(140deg,#0d4a1e 0%,#1b6b30 55%,#2e7d32 100%)', 'icon' => 'user'];
    if (str_contains($t, 'temp'))
        return ['grad' => 'linear-gradient(140deg,#0a2f5c 0%,#1976d2 55%,#42a5f5 100%)', 'icon' => 'thermo'];
    if (str_contains($t, 'container') || str_contains($t, 'cargo'))
        return ['grad' => 'linear-gradient(140deg,#004d5c 0%,#007a8a 55%,#00A49A 100%)', 'icon' => 'box'];
    if (str_contains($t, 'fuel'))
        return ['grad' => 'linear-gradient(140deg,#4a1a00 0%,#bf360c 55%,#F26419 100%)', 'icon' => 'fuel'];
    if (str_contains($t, 'ambu') || str_contains($t, 'emerg'))
        return ['grad' => 'linear-gradient(140deg,#5c0000 0%,#b71c1c 55%,#d32f2f 100%)', 'icon' => 'cross'];
    if (str_contains($t, 'school') || str_contains($t, 'bus'))
        return ['grad' => 'linear-gradient(140deg,#5d3a00 0%,#e65100 55%,#f57c00 100%)', 'icon' => 'bus'];
    if (str_contains($t, 'employee') || str_contains($t, 'staff') || str_contains($t, 'field'))
        return ['grad' => 'linear-gradient(140deg,#1a3a6b 0%,#1565c0 55%,#1e88e5 100%)', 'icon' => 'group'];
    return ['grad' => 'linear-gradient(140deg,#0B1D35 0%,#1a4a7a 55%,#00A49A 100%)', 'icon' => 'gps'];
}

function gpsclinic_sol_icon(string $key): string {
    $icons = [
        'video'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
        'bell'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>',
        'lock'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>',
        'pin'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
        'map'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>',
        'user'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>',
        'thermo' => '<path stroke-linecap="round" stroke-linejoin="round" d="M14 14.76V3.5a2.5 2.5 0 00-5 0v11.26a4.5 4.5 0 105 0z"/>',
        'box'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>',
        'fuel'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>',
        'cross'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/><circle cx="12" cy="12" r="9"/>',
        'bus'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M8 17h8M8 17v3m8-3v3M3 8h18v9a1 1 0 01-1 1H4a1 1 0 01-1-1V8zM3 8V6a2 2 0 012-2h14a2 2 0 012 2v2M8 8v5m4-5v5m4-5v5"/>',
        'group'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
        'gps'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/>',
    ];
    return $icons[$key] ?? $icons['gps'];
}

// ─── Clean up wp_head ────────────────────────────────────────────────────────
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
