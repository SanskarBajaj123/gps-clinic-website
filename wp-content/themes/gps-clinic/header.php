<?php
/**
 * GPS Clinic - header.php
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header" role="banner">
  <div class="container nav-inner">

    <!-- Logo -->
    <a href="<?php echo home_url('/'); ?>" class="nav-logo" aria-label="<?php bloginfo('name'); ?> - Home">
      <div class="nav-logo-box">
        <img
          src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-transparent.png"
          alt="<?php bloginfo('name'); ?> Logo"
          width="130"
          height="52"
        >
      </div>
    </a>

    <!-- Primary nav -->
    <nav class="nav-links" role="navigation" aria-label="Primary">
      <a href="<?php echo home_url('/'); ?>">Home</a>
      <a href="<?php echo home_url('/about-us/'); ?>">About</a>
      <a href="<?php echo get_post_type_archive_link('hardware'); ?>">Hardware</a>
      <a href="<?php echo get_post_type_archive_link('solution'); ?>">Solutions</a>
      <a href="<?php echo home_url('/industries/'); ?>">Industries</a>
      <a href="<?php echo home_url('/blog/'); ?>">Blog</a>
      <a href="<?php echo home_url('/contact/'); ?>">Contact</a>
    </nav>

    <!-- Desktop CTA -->
    <div class="nav-cta">
      <a href="https://wa.me/919260202020" class="btn btn--green btn--sm" target="_blank" rel="noopener">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
        WhatsApp
      </a>
      <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange btn--sm">Get a Quote</a>
    </div>

    <!-- Mobile burger -->
    <button class="nav-burger" id="nav-burger" aria-expanded="false" aria-label="Toggle navigation">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
        <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
      </svg>
    </button>

  </div><!-- .nav-inner -->

  <!-- Mobile Nav dropdown -->
  <nav class="mobile-nav" id="mobile-nav" role="navigation" aria-label="Mobile">
    <a href="<?php echo home_url('/'); ?>">Home</a>
    <a href="<?php echo home_url('/about-us/'); ?>">About</a>
    <a href="<?php echo get_post_type_archive_link('hardware'); ?>">Hardware</a>
    <a href="<?php echo get_post_type_archive_link('solution'); ?>">Solutions</a>
    <a href="<?php echo home_url('/industries/'); ?>">Industries</a>
    <a href="<?php echo home_url('/blog/'); ?>">Blog</a>
    <a href="<?php echo home_url('/contact/'); ?>">Contact</a>
    <div style="display:flex;gap:10px;padding-top:8px;">
      <a href="https://wa.me/919260202020" class="btn btn--green btn--sm" target="_blank" rel="noopener" style="flex:1;justify-content:center;">WhatsApp</a>
      <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange btn--sm" style="flex:1;justify-content:center;">Get a Quote</a>
    </div>
  </nav>

</header><!-- .site-header -->
