<?php
/**
 * GPS Clinic - front-page.php (Home)
 */
get_header();
gpsclinic_schema_organization();
?>

<!-- ─── HERO ────────────────────────────────────────────────── -->
<section class="home-hero">
  <div class="hero-glow-orange"></div>
  <div class="hero-glow-teal"></div>
  <div class="container hero-flex">

    <div class="hero-left">
      <span class="hero-eyebrow">India's Trusted GPS Tracking Partner</span>
      <h1 class="hero-h1">Track Every Vehicle.<br>Control Every <span class="accent">Route.</span></h1>
      <p class="hero-sub">AIS 140 compliant GPS hardware + powerful fleet software. Serving schools, logistics, construction &amp; 17+ industries across Maharashtra and beyond.</p>
      <div class="hero-ctas">
        <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange">Get a Free Demo</a>
        <a href="https://wa.me/919260202020" class="btn btn--green" target="_blank" rel="noopener">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
          Chat on WhatsApp
        </a>
        <a href="<?php echo get_post_type_archive_link('hardware'); ?>" class="btn btn--ghost">View Products</a>
      </div>
    </div>

    <div class="hero-right">
      <div class="dashboard-card">
        <div class="dashboard-card-header">
          <span class="dashboard-card-title">Live Fleet Tracker</span>
          <span class="live-badge"><span class="live-dot"></span> Live</span>
        </div>
        <div class="vehicle-row">
          <div class="vehicle-info">
            <span class="vehicle-dot vehicle-dot--green"></span>
            <div>
              <div class="vehicle-name">MH-20-AB-1234</div>
              <div class="vehicle-loc">Aurangabad Bypass, NH52</div>
            </div>
          </div>
          <span class="vehicle-speed">62 km/h</span>
        </div>
        <div class="vehicle-row">
          <div class="vehicle-info">
            <span class="vehicle-dot vehicle-dot--orange"></span>
            <div>
              <div class="vehicle-name">MH-20-CD-5678</div>
              <div class="vehicle-loc">Cidco Bus Stand, CSN</div>
            </div>
          </div>
          <span class="vehicle-speed">0 km/h</span>
        </div>
        <div class="vehicle-row">
          <div class="vehicle-info">
            <span class="vehicle-dot vehicle-dot--teal"></span>
            <div>
              <div class="vehicle-name">MH-20-EF-9012</div>
              <div class="vehicle-loc">Waluj MIDC, Industrial Zone</div>
            </div>
          </div>
          <span class="vehicle-speed">38 km/h</span>
        </div>
        <div class="dashboard-stats">
          <div class="dash-stat">
            <div class="dash-stat-num">500+</div>
            <div class="dash-stat-lbl">Vehicles</div>
          </div>
          <div class="dash-stat">
            <div class="dash-stat-num">99.9%</div>
            <div class="dash-stat-lbl">Uptime</div>
          </div>
          <div class="dash-stat">
            <div class="dash-stat-num">24/7</div>
            <div class="dash-stat-lbl">Support</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ─── TRUST BAR ───────────────────────────────────────────── -->
<section class="trust-bar">
  <div class="container trust-bar-inner">
    <div class="trust-stat">
      <div class="trust-stat-num">500+</div>
      <div class="trust-stat-lbl">Vehicles Tracked</div>
    </div>
    <div class="trust-stat">
      <div class="trust-stat-num">7+</div>
      <div class="trust-stat-lbl">Hardware Models</div>
    </div>
    <div class="trust-stat">
      <div class="trust-stat-num">13</div>
      <div class="trust-stat-lbl">Software Solutions</div>
    </div>
    <div class="trust-stat">
      <div class="trust-stat-num">17+</div>
      <div class="trust-stat-lbl">Industries Served</div>
    </div>
    <div class="trust-stat">
      <div class="trust-stat-num">24/7</div>
      <div class="trust-stat-lbl">Customer Support</div>
    </div>
  </div>
</section>

<!-- ─── HARDWARE PRODUCTS ───────────────────────────────────── -->
<section class="section-hw" id="hardware">
  <div class="container">
    <div class="section-header">
      <span class="section-label section-label--orange">Hardware Products</span>
      <h2 class="section-h2 section-h2--dark">GPS Trackers for Every Vehicle</h2>
      <p>From basic wired trackers to AIS 140 certified devices - plug in and start tracking within hours.</p>
    </div>
    <div class="g-products">
      <?php
      $hw_args = [
        'post_type'      => 'hardware',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ];
      $hw_query = new WP_Query($hw_args);
      if ($hw_query->have_posts()) :
        while ($hw_query->have_posts()) : $hw_query->the_post();
          $tags     = get_post_meta(get_the_ID(), '_hw_tags', true);
          $tagline  = get_post_meta(get_the_ID(), '_hw_tagline', true);
          $icon_svg = get_post_meta(get_the_ID(), '_hw_icon_svg', true);
          $tags_arr = $tags ? array_slice(array_map('trim', explode(',', $tags)), 0, 3) : [];
      ?>
      <article class="product-card">
        <div class="product-card-img">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('card-thumb', ['alt' => get_the_title(), 'loading' => 'lazy']); ?>
          <?php else : ?>
            <div class="product-card-img-fallback">
              <div class="icon-circle">
                <?php if ($icon_svg) : ?>
                  <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="<?php echo esc_attr($icon_svg); ?>"/></svg>
                <?php else : ?>
                  <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
                <?php endif; ?>
              </div>
            </div>
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
      <?php endwhile; wp_reset_postdata();
      else : ?>
      <p style="grid-column:1/-1;text-align:center;color:var(--muted);padding:40px 0;">Hardware products coming soon. <a href="<?php echo home_url('/contact/'); ?>">Contact us</a> for details.</p>
      <?php endif; ?>
    </div>
    <div style="text-align:center;margin-top:36px;">
      <a href="<?php echo get_post_type_archive_link('hardware'); ?>" class="btn btn--ghost-dark">View All Hardware Products</a>
    </div>
  </div>
</section>

<!-- ─── SOFTWARE SOLUTIONS ─────────────────────────────────── -->
<section class="section-sol" id="solutions">
  <div class="container">
    <div class="section-header">
      <span class="section-label section-label--teal">Software Solutions</span>
      <h2 class="section-h2 section-h2--white">Purpose-Built Tracking Platforms</h2>
      <p style="color:rgba(255,255,255,0.5);">One platform, many verticals. School buses, ambulances, fleets, or employees - we have a solution built for your workflow.</p>
    </div>
    <div class="sol-grid sol-grid--home">
      <?php
      $sol_query = new WP_Query([
        'post_type'      => 'solution',
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ]);
      if ($sol_query->have_posts()) :
        while ($sol_query->have_posts()) : $sol_query->the_post();
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
      <?php endwhile; wp_reset_postdata();
      else : ?>
      <p style="grid-column:1/-1;text-align:center;color:rgba(255,255,255,0.4);padding:40px 0;">Solutions coming soon.</p>
      <?php endif; ?>
    </div>
    <div class="section-sol-footer">
      <a href="<?php echo get_post_type_archive_link('solution'); ?>" class="btn btn--ghost">Explore All Solutions</a>
    </div>
  </div>
</section>

<!-- ─── INDUSTRIES ─────────────────────────────────────────── -->
<section class="section-industries" id="industries">
  <div class="container">
    <div class="section-header">
      <span class="section-label section-label--orange">Industries We Serve</span>
      <h2 class="section-h2 section-h2--dark">GPS Tracking Across 17+ Sectors</h2>
      <p>Whether you manage school buses or construction equipment - GPS Clinic has an industry-specific solution.</p>
    </div>
    <div class="g-industries">
      <?php
      $industries = [
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="36" height="20" rx="3"/><path d="M12 20V14a12 12 0 0 1 24 0v6"/><circle cx="18" cy="30" r="3"/><circle cx="30" cy="30" r="3"/><line x1="24" y1="20" x2="24" y2="40"/></svg>','title'=>'Schools & Buses',     'desc'=>'Student safety, RFID boarding, parent app'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="16" width="28" height="20" rx="2"/><path d="M30 22h8l6 8v6H30V22z"/><circle cx="10" cy="38" r="4"/><circle cx="38" cy="38" r="4"/></svg>','title'=>'Logistics & Courier', 'desc'=>'Route optimisation, delivery proof, fuel savings'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38h36"/><rect x="10" y="28" width="14" height="10"/><path d="M24 28V14l14 8v6"/><circle cx="36" cy="14" r="4"/></svg>','title'=>'Construction',        'desc'=>'Heavy machinery, idle-time control, site security'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="18" width="32" height="18" rx="2"/><path d="M34 26h6l6 6v6H34V26z"/><circle cx="10" cy="38" r="4"/><circle cx="38" cy="38" r="4"/><line x1="14" y1="25" x2="14" y2="33"/><line x1="10" y1="29" x2="18" y2="29"/></svg>','title'=>'Ambulance & Health',  'desc'=>'Emergency dispatch, response-time analytics'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="36" r="8"/><circle cx="36" cy="36" r="6"/><path d="M20 36h10M20 28V20h16l4 8"/><path d="M24 20V10c0 0 6-4 10-4"/></svg>','title'=>'Agriculture',         'desc'=>'Tractor tracking, field coverage, theft alerts'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="14" height="22" rx="2"/><rect x="26" y="14" width="16" height="28" rx="2"/><path d="M6 26h14M26 20h16"/><path d="M16 20V14l10-6v6"/></svg>','title'=>'Manufacturing & MIDC','desc'=>'Plant vehicles, shift-based tracking'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L6 26h14v18l18-22H24V4z"/></svg>','title'=>'Utility & Municipal', 'desc'=>'Garbage trucks, water tankers, govt fleets'],
        ['svg'=>'<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L8 10v14c0 10.5 7 20.2 16 22.9C33 44.2 40 34.5 40 24V10L24 4z"/><path d="M16 24l6 6 10-12"/></svg>','title'=>'Security & Patrol',   'desc'=>'Guard vehicles, patrol routes, incident logs'],
      ];
      foreach ($industries as $ind) : ?>
      <div class="industry-card">
        <div class="industry-icon" style="color:var(--orange);"><?php echo $ind['svg']; ?></div>
        <h3><?php echo esc_html($ind['title']); ?></h3>
        <p><?php echo esc_html($ind['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <div style="text-align:center;margin-top:32px;">
      <a href="<?php echo home_url('/industries/'); ?>" class="btn btn--ghost-dark">See All 17+ Industries</a>
    </div>
  </div>
</section>

<!-- ─── WHY GPS CLINIC ─────────────────────────────────────── -->
<section class="section-why" id="why-us">
  <div class="container">
    <div class="section-header" style="text-align:left;max-width:none;">
      <span class="section-label section-label--orange">Why GPS Clinic</span>
      <h2 class="section-h2 section-h2--dark">Your Local GPS Partner - Not Just a Vendor</h2>
    </div>
    <div class="split-flex" style="align-items:stretch;">
      <div style="flex:1;">
        <div class="why-benefits">
          <?php
          $benefits = [
            ['title' => 'AIS 140 Government Compliant',      'desc' => 'All devices meet Ministry of Road Transport (MoRTH) AIS 140 standards - mandatory for commercial vehicles in India.'],
            ['title' => 'Same-Day On-Site Installation',     'desc' => 'Our trained technicians are available across Maharashtra. Installation is done in 1–2 hours with zero downtime.'],
            ['title' => '24/7 Technical Support',            'desc' => 'Dedicated helpline, WhatsApp support, and on-site visits. We do not disappear after the sale.'],
            ['title' => 'Custom Software, Not Off-the-Shelf','desc' => 'Each solution is configured for your industry. School buses get RFID boarding; logistics gets ePOD; fleets get driver scoring.'],
            ['title' => 'No Hidden Costs',                   'desc' => 'Transparent pricing. Hardware, SIM, software, and installation - all quoted upfront with no surprise renewals.'],
          ];
          foreach ($benefits as $b) : ?>
          <div class="benefit-item">
            <div class="benefit-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <div class="benefit-text">
              <h4><?php echo esc_html($b['title']); ?></h4>
              <p><?php echo esc_html($b['desc']); ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div style="flex:0 0 320px;">
        <div class="support-card">
          <h3>Always Reachable</h3>
          <div class="support-item">
            <div class="support-item-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
            </div>
            <div class="support-item-text">
              <strong>WhatsApp Support</strong>
              <span>+91 92602 02020</span>
            </div>
            <span class="badge-live"><span class="live-dot"></span>Live</span>
          </div>
          <div class="support-item">
            <div class="support-item-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.28h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            </div>
            <div class="support-item-text">
              <strong>Phone Support</strong>
              <span>Mon – Sat, 9 AM – 7 PM</span>
            </div>
          </div>
          <div class="support-item">
            <div class="support-item-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="support-item-text">
              <strong>On-Site Visits</strong>
              <span>Chhatrapati Sambhajinagar &amp; nearby districts</span>
            </div>
          </div>
          <div style="margin-top:24px;">
            <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange" style="width:100%;justify-content:center;">Book a Free Demo</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── TESTIMONIALS ───────────────────────────────────────── -->
<section class="section-testimonials">
  <div class="container">
    <div class="section-header">
      <span class="section-label section-label--orange">Customer Stories</span>
      <h2 class="section-h2 section-h2--dark">Trusted Across Maharashtra</h2>
    </div>
    <div class="g-3cols">
      <?php
      $testimonials = [
        ['quote' => 'GPS Clinic installed trackers on all 8 school buses in one day. Parents love the live tracking app and our teachers feel much safer knowing where every bus is.', 'name' => 'Rajesh Patil', 'role' => 'Principal, Sunrise School, CSN'],
        ['quote' => 'We run 40+ trucks across Marathwada. Since switching to GPS Clinic, fuel theft dropped by 18% and our drivers are far more disciplined on routes.', 'name' => 'Sanjay Deshmukh', 'role' => 'Fleet Owner, Deshmukh Logistics'],
        ['quote' => 'The AIS 140 compliance was a must for our government contract. GPS Clinic handled everything - devices, paperwork, and integration. Excellent service.', 'name' => 'Meena Kulkarni', 'role' => 'Operations Manager, Municipal Corporation'],
      ];
      foreach ($testimonials as $t) : ?>
      <div class="testimonial-card">
        <div class="stars">★★★★★</div>
        <blockquote>"<?php echo esc_html($t['quote']); ?>"</blockquote>
        <div class="testimonial-author">
          <div class="avatar"><?php echo esc_html(substr($t['name'], 0, 1)); ?></div>
          <div>
            <div class="author-name"><?php echo esc_html($t['name']); ?></div>
            <div class="author-role"><?php echo esc_html($t['role']); ?></div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─── FAQ ────────────────────────────────────────────────── -->
<section class="section-faq" id="faq">
  <div class="container-narrow">
    <div class="section-header">
      <span class="section-label section-label--orange">FAQ</span>
      <h2 class="section-h2 section-h2--dark">Common Questions</h2>
    </div>
    <?php
    $faqs = [
      ['q' => 'What is AIS 140 and do I need it?', 'a' => 'AIS 140 is the Indian government standard (under MoRTH) for vehicle tracking devices used in commercial and public transport vehicles. It is mandatory for school buses, commercial goods vehicles, and government fleet in India. All GPS Clinic trackers used for compliant applications are AIS 140 certified.'],
      ['q' => 'How long does installation take?', 'a' => 'A standard vehicle takes 1–2 hours. Our trained technicians handle wiring, SIM activation, and platform registration on the same visit. We service Chhatrapati Sambhajinagar, Aurangabad district, and surrounding areas.'],
      ['q' => 'What is the monthly cost after buying the device?', 'a' => 'Monthly charges typically cover SIM data and platform subscription. Exact pricing depends on the plan and number of vehicles. Contact us for a transparent quote - we provide all costs upfront with no hidden fees.'],
      ['q' => 'Can I track my vehicles on a mobile phone?', 'a' => 'Yes. Our platform has a web dashboard for desktops and a mobile app for Android and iOS. Parents using our school bus solution get a dedicated parent app with live location and boarding alerts.'],
      ['q' => 'Do you provide support after installation?', 'a' => 'Yes - 24/7 WhatsApp support and phone support Monday to Saturday. We also do on-site visits for hardware issues within our service areas. Most software queries are resolved the same day.'],
    ];
    foreach ($faqs as $i => $faq) : ?>
    <div class="faq-item">
      <button class="faq-question" aria-expanded="false" aria-controls="faq-ans-<?php echo $i; ?>">
        <?php echo esc_html($faq['q']); ?>
        <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
      </button>
      <div class="faq-answer" id="faq-ans-<?php echo $i; ?>"><?php echo esc_html($faq['a']); ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- ─── CONTACT CTA ────────────────────────────────────────── -->
<section class="section-cta-contact" id="contact">
  <div class="container split-flex" style="position:relative;z-index:1;">

    <div class="cta-left" style="flex:1;">
      <h2>Ready to Track Your Fleet?<br>Let's <span>Talk.</span></h2>
      <div class="contact-detail">
        <div class="contact-detail-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.28h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div class="contact-detail-text">
          <strong>+91 92602 02020</strong>
          <span>Mon – Sat, 9 AM – 7 PM</span>
        </div>
      </div>
      <div class="contact-detail">
        <div class="contact-detail-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <div class="contact-detail-text">
          <strong>info@gpsclinic.co.in</strong>
          <span>We reply within 4 hours</span>
        </div>
      </div>
      <div class="contact-detail">
        <div class="contact-detail-icon">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.6)" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div class="contact-detail-text">
          <strong>Shop No. 110, Kailash Market</strong>
          <span>Padampura Circle, Railway Station Road, CSN - 431005</span>
        </div>
      </div>
    </div>

    <div style="flex:0 0 440px;">
      <div class="enquiry-form-card">
        <h3>Get a Free Quote</h3>
        <p class="form-sub">Fill in your details and we'll call you back within 24 hours.</p>
        <form class="js-contact-form" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="enq-name">Full Name *</label>
              <input type="text" id="enq-name" name="name" placeholder="Rajesh Patil" required>
            </div>
            <div class="form-group">
              <label for="enq-mobile">Mobile Number *</label>
              <input type="tel" id="enq-mobile" name="mobile" placeholder="+91 98765 43210" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="enq-city">City</label>
              <input type="text" id="enq-city" name="city" placeholder="Aurangabad">
            </div>
            <div class="form-group">
              <label for="enq-product">Product Interest</label>
              <select id="enq-product" name="product">
                <option value="">Select…</option>
                <option>Basic GPS Tracker</option>
                <option>4G GPS Tracker</option>
                <option>AIS 140 Device</option>
                <option>Fleet Management</option>
                <option>School Bus Tracking</option>
                <option>Other</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="enq-msg">Message (optional)</label>
            <textarea id="enq-msg" name="message" placeholder="Number of vehicles, special requirements…"></textarea>
          </div>
          <div class="form-consent">
            <input type="checkbox" id="enq-consent" name="consent" required>
            <label for="enq-consent">I consent to GPS Clinic contacting me via phone or WhatsApp regarding my enquiry. My details will not be shared with third parties.</label>
          </div>
          <div class="form-success"></div>
          <button type="submit" class="btn btn--orange js-submit-btn" style="width:100%;justify-content:center;">Send Enquiry</button>
        </form>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
