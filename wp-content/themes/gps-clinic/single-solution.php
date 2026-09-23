<?php
/**
 * GPS Clinic - single-solution.php
 */
get_header();
the_post();

$tagline  = get_post_meta(get_the_ID(), '_sol_tagline', true);
$tags     = get_post_meta(get_the_ID(), '_sol_tags', true);
$industry = get_post_meta(get_the_ID(), '_sol_industry', true);
$icon_svg = get_post_meta(get_the_ID(), '_sol_icon_svg', true);
$tags_arr = $tags ? array_map('trim', explode(',', $tags)) : [];
?>

<section class="page-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb"><?php gpsclinic_breadcrumb(); ?></nav>
    <?php if ($industry) : ?>
      <span style="display:inline-block;font-size:11px;font-weight:700;color:var(--teal);text-transform:uppercase;letter-spacing:0.1em;margin-bottom:10px;background:rgba(0,164,154,0.12);border:1px solid rgba(0,164,154,0.28);border-radius:20px;padding:4px 12px;"><?php echo esc_html($industry); ?></span>
    <?php endif; ?>
    <h1><?php the_title(); ?></h1>
    <?php if ($tagline) : ?><p><?php echo esc_html($tagline); ?></p><?php endif; ?>
    <?php if ($tags_arr) : ?>
    <div class="card-tags" style="margin-top:16px;">
      <?php foreach ($tags_arr as $tag) : ?>
        <span class="card-tag" style="background:rgba(255,255,255,0.08);border-color:rgba(255,255,255,0.15);color:rgba(255,255,255,0.7);"><?php echo esc_html($tag); ?></span>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>

<section style="background:var(--bg);padding:72px 24px;">
  <div class="container">
    <div class="split-flex">
      <div style="flex:1;" class="post-content">
        <?php the_content(); ?>

        <div class="gps-disclaimer" style="margin-top:32px;">
          <p><strong>GPS Accuracy Notice:</strong> GPS tracking accuracy depends on satellite signal availability and environmental conditions. Typical accuracy is 5–10 metres under open-sky conditions. GPS Clinic does not guarantee exact real-time positioning in all conditions.</p>
        </div>
      </div>

      <div style="flex:0 0 300px;">
        <div class="enquiry-form-card">
          <h3 style="font-size:17px;">Get a Demo</h3>
          <p class="form-sub">We'll set up a live demo for your team.</p>
          <form class="js-contact-form" novalidate>
            <input type="hidden" name="product" value="<?php echo esc_attr(get_the_title()); ?> (Solution)">
            <div class="form-group">
              <label for="sol-name">Name *</label>
              <input type="text" id="sol-name" name="name" required placeholder="Your name">
            </div>
            <div class="form-group">
              <label for="sol-mobile">Mobile *</label>
              <input type="tel" id="sol-mobile" name="mobile" required placeholder="+91 98765 43210">
            </div>
            <div class="form-group">
              <label for="sol-msg">Tell us more</label>
              <textarea id="sol-msg" name="message" placeholder="Fleet size, industry, requirements…" rows="3"></textarea>
            </div>
            <div class="form-consent">
              <input type="checkbox" id="sol-consent" name="consent" required>
              <label for="sol-consent">I consent to GPS Clinic contacting me about this enquiry.</label>
            </div>
            <div class="form-success"></div>
            <button type="submit" class="btn btn--orange js-submit-btn" style="width:100%;justify-content:center;">Request Demo</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="hw-cta-band">
  <h2>Interested in <?php the_title(); ?>?</h2>
  <p>Let's set up a live demo. No commitment required.</p>
  <div class="btn-row">
    <a href="https://wa.me/919260202020" class="btn btn--green" target="_blank" rel="noopener">WhatsApp Us</a>
    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange">Contact Us</a>
    <a href="<?php echo get_post_type_archive_link('solution'); ?>" class="btn btn--ghost">All Solutions</a>
  </div>
</section>

<?php get_footer(); ?>
