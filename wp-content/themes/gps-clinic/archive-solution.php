<?php
/**
 * GPS Clinic - archive-solution.php
 */
get_header();
?>
<section class="page-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?php echo home_url('/'); ?>">Home</a><span class="bc-sep">›</span><span>Software Solutions</span>
    </nav>
    <span class="section-label section-label--teal" style="font-size:11px;letter-spacing:0.1em;">Software</span>
    <h1>GPS Tracking <span>Solutions</span></h1>
    <p>Purpose-built platforms for schools, logistics, healthcare, government, and 17+ industries. Powered by GPS Clinic.</p>
  </div>
</section>

<section class="archive-section">
  <div class="container">
    <?php
    $sol_query = new WP_Query([
      'post_type'      => 'solution',
      'posts_per_page' => -1,
      'orderby'        => 'menu_order',
      'order'          => 'ASC',
      'post_status'    => 'publish',
    ]);

    if ($sol_query->have_posts()) : ?>
    <div class="sol-grid">
      <?php while ($sol_query->have_posts()) : $sol_query->the_post();
        $title    = get_the_title();
        $tags     = get_post_meta(get_the_ID(), '_sol_tags', true);
        $tags_arr = $tags ? array_slice(array_map('trim', explode(',', $tags)), 0, 3) : [];
        $style    = gpsclinic_sol_style($title);
      ?>
      <article class="sol-tile">
        <a href="<?php the_permalink(); ?>" class="sol-tile-top" style="background:<?php echo esc_attr($style['grad']); ?>;" aria-hidden="true" tabindex="-1">
          <div class="sol-tile-circle sol-tile-circle--1"></div>
          <div class="sol-tile-circle sol-tile-circle--2"></div>
          <svg class="sol-tile-icon" width="52" height="52" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.95)" stroke-width="1.6" aria-hidden="true">
            <?php echo gpsclinic_sol_icon($style['icon']); ?>
          </svg>
        </a>
        <div class="sol-tile-body">
          <h3><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h3>
          <?php if ($tags_arr) : ?>
          <div class="card-tags" style="margin-top:auto;padding-top:8px;">
            <?php foreach ($tags_arr as $tag) : ?>
              <span class="card-tag"><?php echo esc_html($tag); ?></span>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </div>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <?php else : ?>
    <p style="text-align:center;padding:60px 0;color:var(--muted);">Solutions coming soon. <a href="<?php echo home_url('/contact/'); ?>">Contact us</a> to enquire.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_template_part('template-parts/cta-band', null, [
  'title'    => 'Need a Custom Solution?',
  'subtitle' => 'We integrate and configure GPS software for your specific workflow. Let us build the right solution for your fleet.',
  'cta_label'=> 'Discuss Your Needs',
]); ?>

<?php get_footer(); ?>
