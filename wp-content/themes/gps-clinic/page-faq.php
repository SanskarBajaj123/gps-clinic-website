<?php
/**
 * Template Name: FAQ Page
 */
get_header(); ?>

<section class="page-hero" style="background:var(--navy);padding:80px 0 60px;">
  <div class="container">
    <?php echo gpsclinic_breadcrumb(); ?>
    <h1 style="color:var(--white);margin-top:16px;">Frequently Asked <span style="color:var(--orange);">Questions</span></h1>
    <p style="color:var(--muted);font-size:1.1rem;max-width:540px;margin-top:12px;">Everything you need to know about GPS tracking hardware, software, installation, and pricing.</p>
  </div>
</section>

<section class="section" style="padding:72px 0;">
  <div class="container" style="max-width:800px;">

    <?php
    $categories = [
      'Hardware & Devices' => [
        ['q'=>'What is the difference between a 2G and 4G GPS tracker?','a'=>'A 2G tracker uses the GPRS/EDGE network, which is slower and may lose signal in areas where 2G networks are being phased out. A 4G LTE tracker uses faster data networks for near-real-time updates (every 5–10 seconds) and is more reliable in urban areas. We recommend 4G for all new installations.'],
        ['q'=>'What is AIS 140 and why is it mandatory?','a'=>'AIS 140 is a standard set by the Ministry of Road Transport and Highways (MoRTH) under the VAHAN scheme. It mandates that all commercial vehicles (buses, trucks, taxis) must have a government-approved GPS device with a panic button and emergency tracking. Non-compliance can result in permit cancellations. GPS Clinic supplies AIS 140 certified devices.'],
        ['q'=>'Can the GPS device work without a power supply (e.g., for containers)?','a'=>'Yes. Our Solar GPS Tracker and Asset GPS Tracker have built-in batteries (up to 90 days standby) and are designed for non-powered assets like containers, equipment, and trailers. The solar model recharges passively in daylight.'],
        ['q'=>'How do you install the device? Does it require vehicle downtime?','a'=>'Our certified technicians perform hardwired installations. The process takes 1–2 hours per vehicle and requires the ignition to be off during wiring. For OBD plug-in trackers, installation takes under 5 minutes with zero downtime.'],
        ['q'=>'What happens if the device is tampered with or the wire is cut?','a'=>'The device sends an immediate tamper alert to the dashboard and admin phone number. Our AIS 140 devices also report to the government VAHAN portal on tamper events.'],
      ],
      'Software & Platform' => [
        ['q'=>'Do I need to install software on my computer?','a'=>'No. The GPS Clinic tracking platform is entirely web-based. You access it from any browser at our secure portal URL. We also provide Android and iOS apps for mobile monitoring.'],
        ['q'=>'How many users can access the platform?','a'=>'There is no limit on viewer accounts. You can set up separate logins for drivers, supervisors, clients, or transport managers - each with customised access levels.'],
        ['q'=>'Can I receive alerts on WhatsApp?','a'=>'Yes. Alerts for overspeeding, geofence violations, panic button presses, and ignition events can be sent directly to WhatsApp numbers or SMS. This is included in the standard plan.'],
        ['q'=>'How far back can I view historical trip data?','a'=>'By default, trip history is stored for 90 days on the standard plan. Extended storage up to 3 years is available on the enterprise plan.'],
        ['q'=>'Is the software customised for my industry?','a'=>'Yes. We configure the software specifically for your use case - school bus operators get RFID boarding and parent app integration; logistics clients get ePOD and route optimisation; construction firms get idle-time reporting and zone control.'],
      ],
      'Pricing & Plans' => [
        ['q'=>'What is included in the price?','a'=>'Our quote includes: the GPS device, a dedicated SIM card (with data plan), software licence, and on-site installation. There are no surprise add-on fees. Annual subscription renewal covers SIM data and software hosting.'],
        ['q'=>'Is there a monthly or annual contract?','a'=>'We offer both. Monthly plans are available for smaller fleets. Annual plans include a discount of up to 15% and are recommended for fleets of 5 or more vehicles.'],
        ['q'=>'What is the warranty on the hardware?','a'=>'All devices carry a 12-month manufacturer warranty. GPS Clinic also provides a 6-month service warranty covering installation defects - if a device fails due to installation error, we replace it at no charge.'],
      ],
      'Support & Service' => [
        ['q'=>'What are your support hours?','a'=>'Our helpline and WhatsApp support operate 24/7. On-site technical visits are scheduled Monday–Saturday, 9 AM–7 PM, with emergency visits available on request.'],
        ['q'=>'How quickly do you respond to tickets?','a'=>'We aim to respond to all support queries within 4 hours. Critical issues (device offline, panic button not working) are escalated immediately and get a call-back within 30 minutes.'],
        ['q'=>'Do you service areas outside Aurangabad?','a'=>'We currently cover all major cities in Maharashtra including Mumbai, Pune, Nashik, Nagpur, and Kolhapur through our partner technician network. Contact us to confirm coverage for your location.'],
      ],
    ];

    foreach ($categories as $cat => $faqs) : ?>
    <div style="margin-bottom:48px;">
      <h2 style="font-size:1.3rem;border-bottom:2px solid var(--border);padding-bottom:12px;margin-bottom:24px;"><?php echo esc_html($cat); ?></h2>
      <div class="faq-list">
        <?php foreach ($faqs as $faq) : ?>
        <div class="faq-item">
          <button class="faq-question" aria-expanded="false">
            <?php echo esc_html($faq['q']); ?>
            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-answer">
            <p><?php echo esc_html($faq['a']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endforeach; ?>

    <div style="background:var(--bg);border-radius:16px;padding:40px;text-align:center;margin-top:48px;">
      <h3>Still have a question?</h3>
      <p style="color:var(--mid);margin:12px 0 24px;">Our team is happy to answer specific queries about your fleet size, vehicle types, or budget.</p>
      <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary">Contact Us</a>
        <a href="https://wa.me/919876543210" class="btn" style="background:var(--green);color:var(--white);">WhatsApp</a>
      </div>
    </div>

  </div>
</section>

<?php get_template_part('template-parts/cta-band', null, [
  'title'    => 'Still Have Questions?',
  'subtitle' => 'Our team is on-call. WhatsApp us, call, or drop a message - we reply within 4 hours.',
  'cta_label'=> 'Send Us a Message',
]); ?>

<?php get_footer(); ?>
