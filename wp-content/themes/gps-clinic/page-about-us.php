<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<!-- Hero -->
<section class="page-hero" style="background:var(--navy);padding:80px 0 60px;">
  <div class="container">
    <?php echo gpsclinic_breadcrumb(); ?>
    <h1 style="color:var(--white);margin-top:16px;">About <span style="color:var(--orange);">GPS Clinic</span></h1>
    <p style="color:var(--muted);font-size:1.15rem;max-width:560px;margin-top:12px;">Maharashtra's most trusted GPS tracking partner - built on a simple promise: devices that work, software that makes sense, and support that actually picks up the phone.</p>
  </div>
</section>

<!-- Story -->
<section class="section" style="padding:72px 0;">
  <div class="container split-flex" style="gap:60px;align-items:center;">
    <div style="flex:1;min-width:0;">
      <span class="section-eyebrow">Our Story</span>
      <h2>Born from a Real Fleet Problem</h2>
      <p>GPS Clinic started when our founders - fleet operators themselves - kept running into the same wall: generic GPS devices that shipped from overseas, helplines that rang out, and software dashboards built for IT teams, not drivers or dispatchers.</p>
      <p style="margin-top:16px;">So in 2018 we set up a small operations centre in Aurangabad and began supplying the Maharashtra market with hardware that was actually meant for Indian road conditions - dust, heat, intermittent power - paired with software configured for the specific way local fleets work.</p>
      <p style="margin-top:16px;">Today we serve 500+ vehicles across 17 industries, with a local team that does same-day installation and a support desk that replies within 4 hours.</p>
    </div>
    <div style="flex:1;min-width:0;">
      <div style="background:var(--bg);border-radius:16px;padding:40px;display:grid;grid-template-columns:1fr 1fr;gap:24px;">
        <?php
        $stats = [
          ['500+', 'Vehicles Tracked'],
          ['17+',  'Industries Served'],
          ['7+',   'Hardware Models'],
          ['13',   'Software Solutions'],
          ['2018', 'Founded'],
          ['24/7', 'Support Desk'],
        ];
        foreach ($stats as $s) : ?>
        <div style="text-align:center;">
          <div style="font-size:2rem;font-weight:700;color:var(--orange);font-family:'Outfit',sans-serif;"><?php echo esc_html($s[0]); ?></div>
          <div style="font-size:.85rem;color:var(--mid);margin-top:4px;"><?php echo esc_html($s[1]); ?></div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Values -->
<section class="section" style="background:var(--bg);padding:72px 0;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <span class="section-eyebrow">What We Stand For</span>
      <h2>Our Values</h2>
    </div>
    <div class="g-3cols">
      <?php
      $values = [
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>','title'=>'Local First',       'desc'=>'Our team lives in the same cities as our clients. Same-day visits, local-language support, Maharashtra-wide coverage.'],
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/><line x1="6" y1="15" x2="10" y2="15"/></svg>','title'=>'Honest Pricing',    'desc'=>'No hidden SIM fees, no forced annual renewals, no upsell calls. You know what you pay on day one.'],
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>','title'=>'Data Privacy',      'desc'=>'Your fleet data is yours. We do not sell location data to third parties. GDPR-aligned policies apply even for Indian clients.'],
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>','title'=>'Fast Support',      'desc'=>'Every ticket is answered within 4 hours. Critical issues get a call-back within 30 minutes, 24/7.'],
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>','title'=>'AIS 140 Compliant','desc'=>'Every commercial-vehicle device we supply meets MoRTH AIS 140 standards and carries the required VAHAN certification.'],
        ['svg'=>'<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>','title'=>'Long-Term Partner', 'desc'=>'We still support devices installed in 2019. We do not abandon clients when newer models arrive.'],
      ];
      foreach ($values as $v) : ?>
      <div class="card" style="padding:32px 28px;">
        <div style="width:44px;height:44px;color:var(--orange);margin-bottom:18px;"><?php echo $v['svg']; ?></div>
        <h3 style="font-size:1.1rem;margin-bottom:10px;"><?php echo esc_html($v['title']); ?></h3>
        <p style="color:var(--mid);font-size:.9rem;line-height:1.6;"><?php echo esc_html($v['desc']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Hardware Brands -->
<section class="section" style="padding:72px 0;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <span class="section-eyebrow">Hardware Partners</span>
      <h2>Trusted Brands We Supply</h2>
      <p style="color:var(--mid);max-width:520px;margin:12px auto 0;">We are authorised distributors for leading GPS hardware manufacturers - all devices are genuine, warrantied, and AIS 140 approved where applicable.</p>
    </div>
    <div style="display:flex;flex-wrap:wrap;gap:20px;justify-content:center;">
      <?php
      $brands = ['Concox','Queclink','Teltonika','Coban','Jimi IoT','Suntech'];
      foreach ($brands as $b) : ?>
      <div style="background:var(--bg);border:1px solid var(--border);border-radius:10px;padding:20px 32px;font-weight:600;color:var(--navy);font-family:'Outfit',sans-serif;">
        <?php echo esc_html($b); ?>
      </div>
      <?php endforeach; ?>
    </div>
    <p style="text-align:center;color:var(--muted);font-size:.85rem;margin-top:24px;">Brand names are used for identification only. GPS Clinic is an independent reseller and integrator.</p>
  </div>
</section>

<!-- Team -->
<section class="section" style="background:var(--bg);padding:72px 0;">
  <div class="container">
    <div style="text-align:center;margin-bottom:48px;">
      <span class="section-eyebrow">The People Behind GPS Clinic</span>
      <h2>Our Team</h2>
    </div>
    <div class="g-3cols">
      <?php
      $team = [
        ['name'=>'Rajesh Sharma',   'role'=>'Founder & CEO',           'note'=>'15 years in fleet telematics. Built GPS Clinic after running a logistics company with 40 vehicles.'],
        ['name'=>'Priya Deshpande', 'role'=>'Head of Operations',      'note'=>'Manages installation scheduling, SIM provisioning, and client onboarding across Maharashtra.'],
        ['name'=>'Vikram Jadhav',   'role'=>'Lead Field Technician',   'note'=>'Certified in AIS 140 device installation. Has personally commissioned 300+ vehicles across the Marathwada region.'],
      ];
      foreach ($team as $t) : ?>
      <div class="card" style="padding:32px 28px;text-align:center;">
        <div style="width:72px;height:72px;background:var(--navy);border-radius:50%;margin:0 auto 20px;display:flex;align-items:center;justify-content:center;">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
        </div>
        <h3 style="font-size:1.05rem;margin-bottom:4px;"><?php echo esc_html($t['name']); ?></h3>
        <p style="color:var(--orange);font-size:.85rem;font-weight:600;margin-bottom:12px;"><?php echo esc_html($t['role']); ?></p>
        <p style="color:var(--mid);font-size:.875rem;line-height:1.6;"><?php echo esc_html($t['note']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/cta-band', null, [
  'title'    => 'Ready to Track Your Fleet?',
  'subtitle' => 'Call us, WhatsApp us, or fill out our enquiry form. We reply within 4 hours.',
]); ?>

<?php get_footer(); ?>
