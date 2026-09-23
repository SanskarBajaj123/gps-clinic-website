<?php
/**
 * GPS Clinic - archive-hardware.php
 */
get_header();
?>
<section class="page-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo home_url('/'); ?>">Home</a><span class="bc-sep">›</span><span>Hardware Products</span>
    </nav>
    <span class="section-label section-label--orange" style="font-size:11px;letter-spacing:0.1em;">Hardware</span>
    <h1>GPS Tracking <span>Hardware</span></h1>
    <p>AIS 140 certified devices for every vehicle type. Wired, OBD, solar, and 4G - all with same-day installation across Maharashtra.</p>
  </div>
</section>

<section class="archive-section">
  <div class="container">
    <?php if (have_posts()) : ?>
    <div class="g-products">
      <?php while (have_posts()) : the_post();
        $tags    = get_post_meta(get_the_ID(), '_hw_tags', true);
        $tagline = get_post_meta(get_the_ID(), '_hw_tagline', true);
        $tags_arr = $tags ? array_slice(array_map('trim', explode(',', $tags)), 0, 3) : [];
      ?>
      <article class="product-card">
        <div class="product-card-img">
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb', ['loading' => 'lazy', 'alt' => get_the_title()]); ?></a>
          <?php else : ?>
            <a href="<?php the_permalink(); ?>" class="product-card-img-fallback">
              <div class="icon-circle">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
              </div>
            </a>
          <?php endif; ?>
        </div>
        <div class="product-card-body">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php echo $tagline ? esc_html($tagline) : wp_trim_words(get_the_excerpt(), 16, '…'); ?></p>
          <?php if ($tags_arr) : ?>
          <div class="card-tags">
            <?php foreach ($tags_arr as $i => $tag) : ?>
              <span class="card-tag<?php echo $i === 0 ? ' card-tag--orange' : ''; ?>"><?php echo esc_html($tag); ?></span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
    <div class="pagination"><?php the_posts_pagination(['mid_size' => 2]); ?></div>
    <?php else : ?>
    <p style="text-align:center;padding:60px 0;color:var(--muted);">Hardware products coming soon. <a href="<?php echo home_url('/contact/'); ?>">Contact us</a> to enquire.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_template_part('template-parts/cta-band', null, [
  'title'    => 'Not Sure Which Device You Need?',
  'subtitle' => 'Tell us your vehicle type and use case - we will recommend the right hardware and install it for you.',
  'cta_label'=> 'Get a Recommendation',
]); ?>

<?php get_footer(); ?>
