<?php
/**
 * GPS Clinic - page.php (generic page template)
 */
get_header();
the_post();
?>
<section class="page-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb"><?php gpsclinic_breadcrumb(); ?></nav>
    <h1><?php the_title(); ?></h1>
    <?php if (get_the_excerpt()) : ?><p><?php the_excerpt(); ?></p><?php endif; ?>
  </div>
</section>

<section style="background:var(--white);padding:72px 24px;">
  <div class="container-narrow post-content">
    <?php the_content(); ?>
  </div>
</section>
<?php get_footer(); ?>
