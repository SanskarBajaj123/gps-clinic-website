<?php
/**
 * GPS Clinic - single.php (blog post)
 */
get_header();
the_post();
?>
<section class="single-post-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb"><?php gpsclinic_breadcrumb(); ?></nav>
    <span style="font-size:12px;color:rgba(255,255,255,0.45);"><?php echo get_the_date(); ?> &middot; <?php echo get_the_category_list(', '); ?></span>
    <h1 style="margin-top:10px;"><?php the_title(); ?></h1>
  </div>
</section>

<section class="single-post-body">
  <div class="container">
    <?php if (has_post_thumbnail()) : ?>
    <div style="max-width:820px;margin:0 auto 40px;border-radius:12px;overflow:hidden;">
      <?php the_post_thumbnail('blog-featured', ['loading' => 'eager', 'alt' => get_the_title()]); ?>
    </div>
    <?php endif; ?>
    <div class="post-content">
      <?php the_content(); ?>
    </div>
  </div>
</section>

<section style="background:var(--bg);padding:56px 24px;">
  <div class="container-narrow" style="text-align:center;">
    <span class="section-label section-label--orange">Want to track your vehicles?</span>
    <h2 style="font-family:'Outfit',sans-serif;font-size:28px;font-weight:800;color:var(--text);margin:10px 0 20px;">GPS Clinic - Your Local Tracking Partner</h2>
    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange">Get a Free Demo</a>
    &nbsp;
    <a href="https://wa.me/919260202020" class="btn btn--green" target="_blank" rel="noopener">WhatsApp Us</a>
  </div>
</section>
<?php get_footer(); ?>
