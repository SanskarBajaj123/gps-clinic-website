<?php
/**
 * GPS Clinic - single-hardware.php
 */
get_header();
the_post();

$tagline    = get_post_meta(get_the_ID(), '_hw_tagline', true);
$tags       = get_post_meta(get_the_ID(), '_hw_tags', true);
$band_items = get_post_meta(get_the_ID(), '_hw_band_items', true);
$icon_svg   = get_post_meta(get_the_ID(), '_hw_icon_svg', true);
$tags_arr   = $tags ? array_map('trim', explode(',', $tags)) : [];
$band_arr   = $band_items ? array_map('trim', explode(',', $band_items)) : [];
?>

<!-- ─── PRODUCT HERO ───────────────────────────────────────── -->
<section class="hw-hero-section">
  <div class="container hw-hero-inner">

    <nav class="breadcrumb" aria-label="Breadcrumb">
      <?php gpsclinic_breadcrumb(); ?>
    </nav>

    <div class="hero-flex" style="align-items:flex-end;">
      <div class="hero-left" style="padding-bottom:48px;">
        <span class="hw-category-badge">
          <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><circle cx="12" cy="12" r="10"/></svg>
          Hardware Product
        </span>

        <h1 class="hero-h1" style="margin-bottom:14px;"><?php the_title(); ?></h1>

        <?php if ($tagline) : ?>
          <p class="hero-sub"><?php echo esc_html($tagline); ?></p>
        <?php endif; ?>

        <?php if ($tags_arr) : ?>
        <div class="card-tags" style="margin-bottom:28px;">
          <?php foreach ($tags_arr as $i => $tag) : ?>
            <span style="font-size:12px;font-weight:600;padding:5px 14px;border-radius:20px;
              <?php if ($i === 0) echo 'background:rgba(242,100,25,0.12);border:1px solid rgba(242,100,25,0.25);color:#F26419;';
                    else          echo 'background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.12);color:rgba(255,255,255,0.7);'; ?>">
              <?php echo esc_html($tag); ?>
            </span>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="hero-ctas">
          <a href="https://wa.me/919260202020?text=I+am+interested+in+<?php echo rawurlencode(get_the_title()); ?>" class="btn btn--green" target="_blank" rel="noopener">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
            Enquire on WhatsApp
          </a>
          <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange">Get a Quote</a>
          <a href="<?php echo get_post_type_archive_link('hardware'); ?>" class="btn btn--ghost">← All Hardware</a>
        </div>
      </div>

      <div class="hero-right hw-hero-img-wrap">
        <?php if (has_post_thumbnail()) : ?>
          <?php the_post_thumbnail('hardware-hero', ['alt' => get_the_title(), 'loading' => 'eager']); ?>
        <?php else : ?>
          <div class="hw-hero-img-placeholder">
            <span>Product image coming soon</span>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── ORANGE FEATURE BAND ────────────────────────────────── -->
<?php if ($band_arr) : ?>
<div class="orange-band">
  <div class="container orange-band-inner">
    <?php foreach ($band_arr as $item) : ?>
    <div class="orange-band-item">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
      <?php echo esc_html($item); ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<!-- ─── PRODUCT CONTENT + FEATURES ───────────────────────── -->
<section class="hw-features-section">
  <div class="container">
    <div class="split-flex">

      <div style="flex:1;">
        <?php if (get_the_content()) : ?>
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        <?php else : ?>
          <h2>Product Features</h2>
          <p class="section-sub">Engineered for reliability on Indian roads.</p>
          <div class="g-2cols" style="margin-top:24px;">
            <?php
            $default_features = [
              ['title' => 'Real-Time Location',     'desc' => 'GPS/GLONASS dual positioning with updates every 10 seconds.'],
              ['title' => 'Geofencing Alerts',      'desc' => 'Set virtual boundaries and get instant SMS/app alerts on entry or exit.'],
              ['title' => 'Overspeed Alerts',       'desc' => 'Configurable speed threshold alerts sent to fleet manager and driver.'],
              ['title' => 'Engine Cut Remote',      'desc' => 'Remotely cut vehicle ignition via app in case of theft or emergency.'],
              ['title' => 'Trip History Replay',    'desc' => '90-day trip history with stop analysis, idle time, and distance reports.'],
              ['title' => 'Tamper Alert',           'desc' => 'Immediate alert if device is disconnected or moved without authorisation.'],
            ];
            foreach ($default_features as $f) : ?>
            <div class="feature-item">
              <div class="feature-check">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--teal)" stroke-width="2.5" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
              </div>
              <div>
                <h4><?php echo esc_html($f['title']); ?></h4>
                <p><?php echo esc_html($f['desc']); ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <!-- GPS Accuracy Disclaimer -->
        <div class="gps-disclaimer" style="margin-top:32px;">
          <p><strong>GPS Accuracy Notice:</strong> GPS tracking accuracy is dependent on satellite signal availability, environmental factors (tall buildings, tunnels, dense vegetation), and device firmware. Typical accuracy is 5–10 metres under open-sky conditions. Accuracy may vary in urban canyons or indoors. GPS Clinic does not guarantee exact real-time positioning in all conditions.</p>
        </div>
      </div>

      <div style="flex:0 0 300px;">
        <div class="enquiry-form-card">
          <h3 style="font-size:17px;">Enquire About This Product</h3>
          <p class="form-sub">We'll call you back within 4 hours.</p>
          <form class="js-contact-form" novalidate>
            <input type="hidden" name="product" value="<?php echo esc_attr(get_the_title()); ?>">
            <div class="form-group">
              <label for="hw-name">Your Name *</label>
              <input type="text" id="hw-name" name="name" required placeholder="Full name">
            </div>
            <div class="form-group">
              <label for="hw-mobile">Mobile *</label>
              <input type="tel" id="hw-mobile" name="mobile" required placeholder="+91 98765 43210">
            </div>
            <div class="form-group">
              <label for="hw-city">City</label>
              <input type="text" id="hw-city" name="city" placeholder="Your city">
            </div>
            <div class="form-group">
              <label for="hw-msg">Message</label>
              <textarea id="hw-msg" name="message" placeholder="No. of vehicles, queries…" rows="3"></textarea>
            </div>
            <div class="form-consent">
              <input type="checkbox" id="hw-consent" name="consent" required>
              <label for="hw-consent">I consent to GPS Clinic contacting me about this enquiry.</label>
            </div>
            <div class="form-success"></div>
            <button type="submit" class="btn btn--orange js-submit-btn" style="width:100%;justify-content:center;">Send Enquiry</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ─── BOTTOM CTA BAND ────────────────────────────────────── -->
<section class="hw-cta-band">
  <h2>Ready to Install <?php the_title(); ?>?</h2>
  <p>Our technicians cover Chhatrapati Sambhajinagar and surrounding districts.</p>
  <div class="btn-row">
    <a href="https://wa.me/919260202020" class="btn btn--green" target="_blank" rel="noopener">WhatsApp Us</a>
    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange">Get a Quote</a>
    <a href="<?php echo get_post_type_archive_link('hardware'); ?>" class="btn btn--ghost">View All Hardware</a>
  </div>
</section>

<?php get_footer(); ?>
