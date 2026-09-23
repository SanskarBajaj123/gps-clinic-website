<?php
/**
 * Template Name: Industries Page
 */
get_header();

/* ── Monochromatic SVG icons - one per industry ── */
function gpsclinic_industry_icon($key) {
  $icons = [
    'school'       => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="36" height="20" rx="3"/><path d="M12 20V14a12 12 0 0 1 24 0v6"/><circle cx="18" cy="30" r="3"/><circle cx="30" cy="30" r="3"/><path d="M18 30h-4M30 30h4"/><line x1="24" y1="20" x2="24" y2="40"/></svg>',
    'logistics'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="16" width="28" height="20" rx="2"/><path d="M30 22h8l6 8v6h-14V22z"/><circle cx="10" cy="38" r="4"/><circle cx="38" cy="38" r="4"/><path d="M6 22V12h22v4"/></svg>',
    'construction' => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 38h36"/><rect x="10" y="28" width="14" height="10"/><path d="M24 28V14l14 8v6"/><path d="M14 28V20"/><path d="M20 28V20"/><circle cx="36" cy="14" r="4"/><line x1="36" y1="4" x2="36" y2="10"/><line x1="36" y1="18" x2="36" y2="24"/></svg>',
    'ambulance'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="18" width="32" height="18" rx="2"/><path d="M34 26h6l6 6v6H34V26z"/><circle cx="10" cy="38" r="4"/><circle cx="38" cy="38" r="4"/><line x1="14" y1="25" x2="14" y2="33"/><line x1="10" y1="29" x2="18" y2="29"/></svg>',
    'fuel'         => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="6" width="22" height="34" rx="3"/><path d="M30 14h4a4 4 0 0 1 4 4v10a4 4 0 0 0 4 4"/><line x1="8" y1="22" x2="30" y2="22"/><line x1="16" y1="30" x2="22" y2="30"/><circle cx="38" cy="32" r="4"/></svg>',
    'container'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="12" width="40" height="26" rx="2"/><line x1="14" y1="12" x2="14" y2="38"/><line x1="24" y1="12" x2="24" y2="38"/><line x1="34" y1="12" x2="34" y2="38"/><path d="M4 22h40M4 28h40"/></svg>',
    'pharma'       => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="10" y="6" width="28" height="36" rx="4"/><path d="M18 6v4a6 6 0 0 0 12 0V6"/><line x1="19" y1="24" x2="29" y2="24"/><line x1="24" y1="19" x2="24" y2="29"/><circle cx="24" cy="36" r="2" fill="currentColor" stroke="none"/></svg>',
    'employee'     => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="24" cy="14" r="8"/><path d="M8 42c0-8.8 7.2-16 16-16s16 7.2 16 16"/><path d="M30 26l4 8-10 4-10-4 4-8"/><circle cx="24" cy="34" r="2" fill="currentColor" stroke="none"/></svg>',
    'municipal'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="18" width="36" height="24" rx="2"/><path d="M2 42h44"/><path d="M14 18V10h20v8"/><line x1="24" y1="10" x2="24" y2="4"/><line x1="18" y1="6" x2="30" y2="6"/><rect x="18" y="28" width="12" height="14"/></svg>',
    'fmcg'         => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="20" width="14" height="22" rx="2"/><rect x="26" y="14" width="16" height="28" rx="2"/><path d="M6 26h14M26 20h16"/><circle cx="13" cy="36" r="2" fill="currentColor" stroke="none"/><circle cx="34" cy="36" r="2" fill="currentColor" stroke="none"/><path d="M16 20V14l10-6v6"/></svg>',
    'mining'       => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 38h8l4-12h24l4 12h4"/><rect x="8" y="26" width="32" height="12" rx="2"/><circle cx="14" cy="42" r="4"/><circle cx="34" cy="42" r="4"/><path d="M24 26V14M18 18l6-8 6 8"/></svg>',
    'agriculture'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="36" r="8"/><circle cx="36" cy="36" r="6"/><path d="M20 36h10"/><path d="M20 28V20h16l4 8"/><path d="M24 20V10c0 0 6-4 10-4"/></svg>',
    'hospitality'  => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 42V14a2 2 0 0 1 2-2h32a2 2 0 0 1 2 2v28"/><line x1="2" y1="42" x2="46" y2="42"/><rect x="16" y="26" width="16" height="16"/><path d="M24 12V6M18 8l6-4 6 4"/><line x1="14" y1="22" x2="34" y2="22"/></svg>',
    'utilities'    => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L6 26h14v18l18-22H24V4z"/></svg>',
    'security'     => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 4L8 10v14c0 10.5 7 20.2 16 22.9C33 44.2 40 34.5 40 24V10L24 4z"/><path d="M16 24l6 6 10-12"/></svg>',
    'university'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M24 6L4 18l20 12 20-12L24 6z"/><path d="M8 22v12"/><path d="M16 26v10a8 8 0 0 0 16 0V26"/><path d="M40 22v12"/><line x1="4" y1="42" x2="10" y2="42"/></svg>',
    'healthcare'   => '<svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="8" y="14" width="32" height="26" rx="3"/><path d="M18 14V10a6 6 0 0 1 12 0v4"/><line x1="24" y1="22" x2="24" y2="34"/><line x1="18" y1="28" x2="30" y2="28"/></svg>',
  ];
  $key = strtolower($key);
  return isset($icons[$key]) ? $icons[$key] : $icons['logistics'];
}
?>

<section class="page-hero" style="background:var(--navy);padding:80px 0 60px;">
  <div class="container">
    <?php echo gpsclinic_breadcrumb(); ?>
    <h1 style="color:var(--white);margin-top:16px;">Industries We <span style="color:var(--orange);">Serve</span></h1>
    <p style="color:var(--muted);font-size:1.1rem;max-width:600px;margin-top:12px;">GPS Clinic configures tracking solutions for 17+ industries across Maharashtra. Each deployment is set up for the specific workflows, compliance requirements, and reporting needs of that sector.</p>
  </div>
</section>

<section class="section" style="padding:72px 0;">
  <div class="container">

    <?php
    $industries = [
      ['key'=>'school',      'name'=>'Schools & Buses',           'tagline'=>'Student safety, RFID boarding, parent app',              'desc'=>'Real-time school bus tracking with live location sharing for parents. Features include RFID boarding confirmations, route deviation alerts, panic button for drivers, and automatic attendance reporting. Compliant with Maharashtra School Transport Safety norms.',         'features'=>['Live bus location for parents via SMS or app','RFID tap-in / tap-out boarding records','Panic button with instant admin alert','Overspeeding alert (configurable limit)','Route deviation notification','Daily trip reports for school admin']],
      ['key'=>'logistics',   'name'=>'Logistics & Courier',        'tagline'=>'Route optimisation, delivery proof, fuel savings',        'desc'=>'End-to-end visibility for delivery fleets. Track parcels from warehouse to doorstep, optimise routes dynamically, capture digital proof of delivery, and monitor fuel consumption per trip.',                                                                               'features'=>['Real-time vehicle tracking dashboard','Route optimisation with traffic data','Electronic Proof of Delivery (ePOD)','Fuel consumption monitoring','Driver performance scoring','Customer ETA SMS notifications']],
      ['key'=>'construction','name'=>'Construction',               'tagline'=>'Heavy machinery, idle-time control, site security',       'desc'=>'Protect JCBs, cranes, and heavy machinery. Monitor site entry/exit, reduce idle time (a major fuel cost driver), and receive instant alerts if equipment moves outside authorised zones at night.',                                                                         'features'=>['Geofence around construction site','Idle-time reporting per machine','Night movement alerts (theft prevention)','Fuel level monitoring for generators','Equipment utilisation reports','Asset GPS for non-powered trailers']],
      ['key'=>'ambulance',   'name'=>'Ambulance & Health',         'tagline'=>'Emergency dispatch, response-time analytics',             'desc'=>'Improve emergency response times with real-time ambulance dispatch. Dispatch the nearest available unit, share live location with hospitals, and generate response-time reports for compliance audits.',                                                           'features'=>['Nearest available vehicle dispatch','Live location to hospital control room','Response-time analytics by shift','Panic button for paramedic safety','AIS 140 compliant devices','24/7 monitoring dashboard']],
      ['key'=>'fuel',        'name'=>'Fuel & Tanker',              'tagline'=>'Fuel theft prevention, delivery verification',            'desc'=>'Eliminate fuel siphoning and short deliveries. Flow-meter integration tracks exact litres loaded and delivered. Compare dispatch-vs-delivery quantities and flag discrepancies automatically.',                                                                    'features'=>['Flow-meter integration','Dispatch vs delivery comparison','Fuel level sensor (tank monitoring)','Unauthorised stop detection','Customer delivery confirmation','Tamper alert on fuel cap']],
      ['key'=>'container',   'name'=>'Container & Cargo',          'tagline'=>'End-to-end cargo visibility without battery wiring',      'desc'=>'Solar and battery-powered asset trackers for containers, flatbeds, and trailers that have no permanent power source. Track from port to warehouse to factory with 90-day battery standby.',                                                              'features'=>['Solar or battery tracker (no wiring needed)','Port-to-destination tracking','Geofence alerts at warehouses','Temperature monitoring for reefer containers','Shock/tilt alerts for fragile cargo','Custom API for logistics software integration']],
      ['key'=>'pharma',      'name'=>'Pharma & Cold Chain',        'tagline'=>'Temperature compliance for medicines and food',           'desc'=>'Maintain cold-chain integrity with real-time temperature logging. Receive alerts when reefer units deviate from safe ranges. Produce compliance reports for FSSAI, CDSCO, and WHO-GDP audits.',                                                              'features'=>['Real-time temperature sensor data','Configurable min/max alerts','Automated compliance PDF reports','Dual-probe support (ambient + cargo)','Temperature excursion log with timestamps','Integration with pharma ERP systems']],
      ['key'=>'employee',    'name'=>'Employee & Field Force',      'tagline'=>'Live attendance, visit verification, mileage claims',    'desc'=>'Track field sales teams, service engineers, and delivery staff. Verify client visit check-ins, automate mileage reimbursements, and eliminate manual attendance sheets.',                                                                               'features'=>['Live location of field staff','Client visit geo-verification','Automatic mileage log for claims','Working-hours report','Route playback per employee','Beat plan vs actual comparison']],
      ['key'=>'municipal',   'name'=>'Municipal & Government',      'tagline'=>'Garbage trucks, water tankers, public transport',        'desc'=>'Public-sector fleet accountability. Monitor garbage collection routes, water tanker deliveries, and municipal bus services. Exportable reports for council audits.',                                                                               'features'=>['Route completion verification','Public dashboard for citizens','Attendance-linked driver ID','AIS 140 compliant for public buses','Daily route adherence report','Escalation alerts for missed zones']],
      ['key'=>'fmcg',        'name'=>'Manufacturing & FMCG',        'tagline'=>'Primary and secondary distribution tracking',            'desc'=>'Visibility from factory gate to distributor to retailer. Monitor primary distribution trucks and secondary delivery vans, integrate with ERP for dispatch-vs-delivery reconciliation.',                                                              'features'=>['Multi-level fleet hierarchy','ERP / SAP integration API','Delivery confirmation with photo','Distributor beat planning','Stockist visit verification','Vehicle utilisation optimisation']],
      ['key'=>'mining',      'name'=>'Mining & Quarry',             'tagline'=>'Payload monitoring, restricted-zone alerts',             'desc'=>'Track dumpers, excavators, and haul trucks in remote quarry environments. Monitor payload per trip (with load sensor integration), control site access, and track equipment utilisation.',                                                          'features'=>['Payload / trip count monitoring','Restricted zone geofence','Remote site connectivity (4G)','Equipment ignition hours tracking','Fuel tank monitoring for machinery','Night-shift activity report']],
      ['key'=>'agriculture', 'name'=>'Agriculture & Agri-Logistics','tagline'=>'Tractor tracking, produce transport, rural coverage',   'desc'=>'Track tractors, combine harvesters, and agri-logistics vehicles. Solar trackers work without wiring. Coverage extends to rural areas where 4G signal is available.',                                                                                   'features'=>['Solar tracker for tractors (no wiring)','Rural area 4G / 2G coverage','Field boundary geofence','Equipment rental hour logging','Produce transport route tracking','Theft alert for parked equipment']],
      ['key'=>'hospitality', 'name'=>'Hospitality & Tourism',       'tagline'=>'Guest transport safety, cab fleet management',           'desc'=>'Give hotel guests and tour operators real-time visibility of pickup vehicles. Monitor cab fleets, verify driver identity, and share live tracking links with guests via SMS.',                                                                          'features'=>['Shareable live-tracking link for guests','Driver ID verification','Panic button for passenger safety','Trip report per booking','Speed limit enforcement','Night shift monitoring']],
      ['key'=>'utilities',   'name'=>'Utilities & Energy',          'tagline'=>'Electricity board, gas pipelines, telecoms',             'desc'=>'Track utility field teams, service vans, and equipment. Assign and verify service calls by location, track material deliveries, and monitor generator fleet fuel consumption.',                                                              'features'=>['Field engineer dispatch by proximity','Service call geo-verification','Fuel monitoring for DG sets','Equipment movement alert','Preventive maintenance reminders','SLA compliance reporting']],
      ['key'=>'security',    'name'=>'Security & Cash-in-Transit',  'tagline'=>'Armoured vehicle tracking, panic escalation',            'desc'=>'High-security tracking for cash-in-transit and security patrol vehicles. Double-layer authentication, stealth reporting mode, and instant escalation to control-room on panic.',                                                              'features'=>['Stealth GPS mode (no visible device)','Panic button with escalation call','Covert reporting intervals','Geofence around vault / branch','Live control-room dashboard','Tamper-proof device installation']],
      ['key'=>'university',  'name'=>'Universities & Colleges',     'tagline'=>'Campus buses, staff vehicles, student safety',           'desc'=>'Extend school bus tracking capabilities to college campuses. Monitor hostel pickup buses, track staff vehicles, and integrate with campus safety systems.',                                                                                    'features'=>['Multi-route bus management','RFID boarding for students','Parent / guardian app','Night route monitoring','Driver attendance','Emergency alert to campus security']],
      ['key'=>'healthcare',  'name'=>'Healthcare & Diagnostics',    'tagline'=>'Sample collection, mobile clinic, biomedical waste',     'desc'=>'Track sample collection vans with temperature monitoring, schedule mobile clinic routes efficiently, and verify biomedical waste vehicle compliance with CPCB disposal routes.',                                                           'features'=>['Temperature monitoring for samples','Route compliance for bio-waste vehicles','Mobile clinic scheduling','Collection vs dispatch verification','CPCB reporting export','Driver SOS button']],
    ];
    ?>

    <div class="g-2cols" style="gap:32px;">
      <?php foreach ($industries as $ind) : ?>
      <div class="card" style="padding:36px 32px;">
        <div style="display:flex;align-items:flex-start;gap:20px;">
          <div style="flex-shrink:0;width:52px;height:52px;color:var(--orange);opacity:.9;">
            <?php echo gpsclinic_industry_icon($ind['key']); ?>
          </div>
          <div style="min-width:0;">
            <h3 style="font-size:1.15rem;margin-bottom:4px;"><?php echo esc_html($ind['name']); ?></h3>
            <p style="color:var(--orange);font-size:.82rem;font-weight:600;margin-bottom:12px;text-transform:uppercase;letter-spacing:.04em;"><?php echo esc_html($ind['tagline']); ?></p>
            <p style="color:var(--mid);font-size:.88rem;line-height:1.65;margin-bottom:16px;"><?php echo esc_html($ind['desc']); ?></p>
            <ul style="list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:6px;">
              <?php foreach ($ind['features'] as $f) : ?>
              <li style="display:flex;align-items:flex-start;gap:8px;font-size:.84rem;color:var(--text);">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--orange)" stroke-width="2.5" style="flex-shrink:0;margin-top:2px;" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                <?php echo esc_html($f); ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<?php get_template_part('template-parts/cta-band', null, [
  'title'     => 'Do Not See Your Industry?',
  'subtitle'  => 'We configure solutions for any business that operates vehicles or mobile assets. Call us to discuss your requirements.',
  'cta_label' => 'Discuss Your Requirements',
]); ?>

<?php get_footer(); ?>
