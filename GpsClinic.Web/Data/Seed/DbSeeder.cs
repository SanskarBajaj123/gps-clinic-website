using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Identity;

namespace GpsClinic.Web.Data.Seed;

public static class DbSeeder
{
    public static async Task SeedAsync(ApplicationDbContext db, UserManager<ApplicationUser> userManager, RoleManager<IdentityRole> roleManager)
    {
        db.Database.EnsureCreated();

        await SeedAdminAsync(userManager, roleManager);

        if (!db.SiteSettings.Any())
        {
            foreach (var (key, _, def) in SiteSettingKeys.All)
                db.SiteSettings.Add(new SiteSetting { Key = key, Value = def });
        }

        if (!db.HardwareProducts.Any())
        {
            db.HardwareProducts.AddRange(
                Hw(1, "Basic GPS Tracker", "basic-gps-tracker", "Reliable tracking for everyday fleet needs", "2G,Budget-Friendly,Real-Time", "video"),
                Hw(2, "4G GPS Tracker", "4g-gps-tracker", "High-speed 4G LTE tracking for urban fleets", "4G LTE,Fast Updates,Live Track", "map"),
                Hw(3, "AIS 140 GPS Device", "ais-140-gps-device", "Government-approved AIS 140 compliant tracker", "AIS 140,VAHAN,Panic Button", "bell"),
                Hw(4, "OBD GPS Tracker", "obd-gps-tracker", "Plug-and-play OBD port tracker with diagnostics", "OBD-II,Plug & Play,Diagnostics", "gps"),
                Hw(5, "Solar GPS Tracker", "solar-gps-tracker", "Battery-free solar tracking for remote assets", "Solar,No Wiring,Remote Assets", "box"),
                Hw(6, "Bike GPS Tracker", "bike-gps-tracker", "Compact theft-prevention tracker for 2-wheelers", "2-Wheeler,Anti-Theft,Compact", "lock"),
                Hw(7, "Asset GPS Tracker", "asset-gps-tracker", "Ruggedised long-life tracker for non-powered assets", "Waterproof,Long Battery,Asset Track", "box")
            );
        }

        if (!db.Solutions.Any())
        {
            db.Solutions.AddRange(
                Sol(1, "Fleet Management Software", "fleet-management-software", "Complete visibility over your entire vehicle fleet", "Fleet,Dashboard,Reports", "Fleet Management", "map"),
                Sol(2, "School Bus Tracking", "school-bus-tracking", "Real-time safety monitoring for school transport", "Schools,RFID,Parent App", "Schools & Buses", "bus"),
                Sol(3, "Employee Tracking System", "employee-tracking-system", "Live field-force visibility and attendance management", "Field Staff,Attendance,Mileage", "Field Force", "group"),
                Sol(4, "Ambulance Tracking", "ambulance-tracking", "Rapid emergency response with real-time ambulance tracking", "Emergency,Dispatch,Healthcare", "Healthcare", "cross"),
                Sol(5, "Fuel Monitoring System", "fuel-monitoring-system", "Eliminate fuel theft with precise consumption analytics", "Fuel Sensor,Anti-Theft,Analytics", "Logistics", "fuel"),
                Sol(6, "Container Tracking", "container-tracking", "End-to-end visibility for cargo containers in transit", "Cargo,Ports,Solar", "Logistics", "box"),
                Sol(7, "Temperature Monitoring", "temperature-monitoring", "Cold-chain compliance for pharma and food logistics", "Cold Chain,Pharma,Compliance", "Pharma & Cold Chain", "thermo"),
                Sol(8, "Driver Behaviour Monitoring", "driver-behaviour-monitoring", "Reduce accidents with AI-powered driving analytics", "Safety,AI Analytics,Scoring", "Fleet Management", "user"),
                Sol(9, "Route Optimisation", "route-optimisation", "Cut fuel costs with intelligent route planning", "Routes,Fuel Savings,Logistics", "Logistics", "map"),
                Sol(10, "Geo-Fencing Alerts", "geo-fencing-alerts", "Instant alerts when vehicles leave designated zones", "Geofence,Alerts,Security", "Security", "pin"),
                Sol(11, "Vehicle Immobilisation", "vehicle-immobilisation", "Remote engine cut-off to prevent unauthorised use", "Anti-Theft,Remote Cutoff,Security", "Security", "lock"),
                Sol(12, "Panic Button & SOS", "panic-button-sos", "One-touch emergency alert for driver safety", "SOS,Safety,Emergency", "Security", "bell"),
                Sol(13, "Live Video Surveillance (MDVR)", "live-video-surveillance-mdvr", "In-cabin video recording and live streaming", "MDVR,Video,Surveillance", "Fleet Management", "video")
            );
        }

        if (!db.Industries.Any())
        {
            db.Industries.AddRange(
                Ind("Schools & Buses", "schools-buses", "school", "Student safety, RFID boarding, parent app",
                    "Real-time school bus tracking with live location sharing for parents. Features include RFID boarding confirmations, route deviation alerts, panic button for drivers, and automatic attendance reporting. Compliant with Maharashtra School Transport Safety norms.",
                    new[] { "Live bus location for parents via SMS or app", "RFID tap-in / tap-out boarding records", "Panic button with instant admin alert", "Overspeeding alert (configurable limit)", "Route deviation notification", "Daily trip reports for school admin" }, true),
                Ind("Logistics & Courier", "logistics-courier", "logistics", "Route optimisation, delivery proof, fuel savings",
                    "End-to-end visibility for delivery fleets. Track parcels from warehouse to doorstep, optimise routes dynamically, capture digital proof of delivery, and monitor fuel consumption per trip.",
                    new[] { "Real-time vehicle tracking dashboard", "Route optimisation with traffic data", "Electronic Proof of Delivery (ePOD)", "Fuel consumption monitoring", "Driver performance scoring", "Customer ETA SMS notifications" }, true),
                Ind("Construction", "construction", "construction", "Heavy machinery, idle-time control, site security",
                    "Protect JCBs, cranes, and heavy machinery. Monitor site entry/exit, reduce idle time (a major fuel cost driver), and receive instant alerts if equipment moves outside authorised zones at night.",
                    new[] { "Geofence around construction site", "Idle-time reporting per machine", "Night movement alerts (theft prevention)", "Fuel level monitoring for generators", "Equipment utilisation reports", "Asset GPS for non-powered trailers" }, true),
                Ind("Ambulance & Health", "ambulance-health", "ambulance", "Emergency dispatch, response-time analytics",
                    "Improve emergency response times with real-time ambulance dispatch. Dispatch the nearest available unit, share live location with hospitals, and generate response-time reports for compliance audits.",
                    new[] { "Nearest available vehicle dispatch", "Live location to hospital control room", "Response-time analytics by shift", "Panic button for paramedic safety", "AIS 140 compliant devices", "24/7 monitoring dashboard" }, true),
                Ind("Fuel & Tanker", "fuel-tanker", "fuel", "Fuel theft prevention, delivery verification",
                    "Eliminate fuel siphoning and short deliveries. Flow-meter integration tracks exact litres loaded and delivered. Compare dispatch-vs-delivery quantities and flag discrepancies automatically.",
                    new[] { "Flow-meter integration", "Dispatch vs delivery comparison", "Fuel level sensor (tank monitoring)", "Unauthorised stop detection", "Customer delivery confirmation", "Tamper alert on fuel cap" }, false),
                Ind("Container & Cargo", "container-cargo", "container", "End-to-end cargo visibility without battery wiring",
                    "Solar and battery-powered asset trackers for containers, flatbeds, and trailers that have no permanent power source. Track from port to warehouse to factory with 90-day battery standby.",
                    new[] { "Solar or battery tracker (no wiring needed)", "Port-to-destination tracking", "Geofence alerts at warehouses", "Temperature monitoring for reefer containers", "Shock/tilt alerts for fragile cargo", "Custom API for logistics software integration" }, false),
                Ind("Pharma & Cold Chain", "pharma-cold-chain", "pharma", "Temperature compliance for medicines and food",
                    "Maintain cold-chain integrity with real-time temperature logging. Receive alerts when reefer units deviate from safe ranges. Produce compliance reports for FSSAI, CDSCO, and WHO-GDP audits.",
                    new[] { "Real-time temperature sensor data", "Configurable min/max alerts", "Automated compliance PDF reports", "Dual-probe support (ambient + cargo)", "Temperature excursion log with timestamps", "Integration with pharma ERP systems" }, false),
                Ind("Employee & Field Force", "employee-field-force", "employee", "Live attendance, visit verification, mileage claims",
                    "Track field sales teams, service engineers, and delivery staff. Verify client visit check-ins, automate mileage reimbursements, and eliminate manual attendance sheets.",
                    new[] { "Live location of field staff", "Client visit geo-verification", "Automatic mileage log for claims", "Working-hours report", "Route playback per employee", "Beat plan vs actual comparison" }, false),
                Ind("Municipal & Government", "municipal-government", "municipal", "Garbage trucks, water tankers, public transport",
                    "Public-sector fleet accountability. Monitor garbage collection routes, water tanker deliveries, and municipal bus services. Exportable reports for council audits.",
                    new[] { "Route completion verification", "Public dashboard for citizens", "Attendance-linked driver ID", "AIS 140 compliant for public buses", "Daily route adherence report", "Escalation alerts for missed zones" }, false),
                Ind("Manufacturing & FMCG", "manufacturing-fmcg", "fmcg", "Primary and secondary distribution tracking",
                    "Visibility from factory gate to distributor to retailer. Monitor primary distribution trucks and secondary delivery vans, integrate with ERP for dispatch-vs-delivery reconciliation.",
                    new[] { "Multi-level fleet hierarchy", "ERP / SAP integration API", "Delivery confirmation with photo", "Distributor beat planning", "Stockist visit verification", "Vehicle utilisation optimisation" }, false),
                Ind("Mining & Quarry", "mining-quarry", "mining", "Payload monitoring, restricted-zone alerts",
                    "Track dumpers, excavators, and haul trucks in remote quarry environments. Monitor payload per trip (with load sensor integration), control site access, and track equipment utilisation.",
                    new[] { "Payload / trip count monitoring", "Restricted zone geofence", "Remote site connectivity (4G)", "Equipment ignition hours tracking", "Fuel tank monitoring for machinery", "Night-shift activity report" }, false),
                Ind("Agriculture & Agri-Logistics", "agriculture-agri-logistics", "agriculture", "Tractor tracking, produce transport, rural coverage",
                    "Track tractors, combine harvesters, and agri-logistics vehicles. Solar trackers work without wiring. Coverage extends to rural areas where 4G signal is available.",
                    new[] { "Solar tracker for tractors (no wiring)", "Rural area 4G / 2G coverage", "Field boundary geofence", "Equipment rental hour logging", "Produce transport route tracking", "Theft alert for parked equipment" }, false),
                Ind("Hospitality & Tourism", "hospitality-tourism", "hospitality", "Guest transport safety, cab fleet management",
                    "Give hotel guests and tour operators real-time visibility of pickup vehicles. Monitor cab fleets, verify driver identity, and share live tracking links with guests via SMS.",
                    new[] { "Shareable live-tracking link for guests", "Driver ID verification", "Panic button for passenger safety", "Trip report per booking", "Speed limit enforcement", "Night shift monitoring" }, false),
                Ind("Utilities & Energy", "utilities-energy", "utilities", "Electricity board, gas pipelines, telecoms",
                    "Track utility field teams, service vans, and equipment. Assign and verify service calls by location, track material deliveries, and monitor generator fleet fuel consumption.",
                    new[] { "Field engineer dispatch by proximity", "Service call geo-verification", "Fuel monitoring for DG sets", "Equipment movement alert", "Preventive maintenance reminders", "SLA compliance reporting" }, false),
                Ind("Security & Cash-in-Transit", "security-cash-in-transit", "security", "Armoured vehicle tracking, panic escalation",
                    "High-security tracking for cash-in-transit and security patrol vehicles. Double-layer authentication, stealth reporting mode, and instant escalation to control-room on panic.",
                    new[] { "Stealth GPS mode (no visible device)", "Panic button with escalation call", "Covert reporting intervals", "Geofence around vault / branch", "Live control-room dashboard", "Tamper-proof device installation" }, false),
                Ind("Universities & Colleges", "universities-colleges", "university", "Campus buses, staff vehicles, student safety",
                    "Extend school bus tracking capabilities to college campuses. Monitor hostel pickup buses, track staff vehicles, and integrate with campus safety systems.",
                    new[] { "Multi-route bus management", "RFID boarding for students", "Parent / guardian app", "Night route monitoring", "Driver attendance", "Emergency alert to campus security" }, false),
                Ind("Healthcare & Diagnostics", "healthcare-diagnostics", "healthcare", "Sample collection, mobile clinic, biomedical waste",
                    "Track sample collection vans with temperature monitoring, schedule mobile clinic routes efficiently, and verify biomedical waste vehicle compliance with CPCB disposal routes.",
                    new[] { "Temperature monitoring for samples", "Route compliance for bio-waste vehicles", "Mobile clinic scheduling", "Collection vs dispatch verification", "CPCB reporting export", "Driver SOS button" }, false)
            );
        }

        if (!db.WhyUsFeatures.Any())
        {
            db.WhyUsFeatures.AddRange(
                new WhyUsFeature { Title = "AIS 140 Government Compliant", Description = "All devices meet Ministry of Road Transport (MoRTH) AIS 140 standards - mandatory for commercial vehicles in India.", SortOrder = 1 },
                new WhyUsFeature { Title = "Same-Day On-Site Installation", Description = "Our trained technicians are available across Maharashtra. Installation is done in 1-2 hours with zero downtime.", SortOrder = 2 },
                new WhyUsFeature { Title = "24/7 Technical Support", Description = "Dedicated helpline, WhatsApp support, and on-site visits. We do not disappear after the sale.", SortOrder = 3 },
                new WhyUsFeature { Title = "Custom Software, Not Off-the-Shelf", Description = "Each solution is configured for your industry. School buses get RFID boarding; logistics gets ePOD; fleets get driver scoring.", SortOrder = 4 },
                new WhyUsFeature { Title = "No Hidden Costs", Description = "Transparent pricing. Hardware, SIM, software, and installation - all quoted upfront with no surprise renewals.", SortOrder = 5 }
            );
        }

        if (!db.Testimonials.Any())
        {
            db.Testimonials.AddRange(
                new Testimonial { Name = "Rajesh Patil", Role = "Principal, Sunrise School, CSN", Quote = "GPS Clinic installed trackers on all 8 school buses in one day. Parents love the live tracking app and our teachers feel much safer knowing where every bus is.", SortOrder = 1 },
                new Testimonial { Name = "Sanjay Deshmukh", Role = "Fleet Owner, Deshmukh Logistics", Quote = "We run 40+ trucks across Marathwada. Since switching to GPS Clinic, fuel theft dropped by 18% and our drivers are far more disciplined on routes.", SortOrder = 2 },
                new Testimonial { Name = "Meena Kulkarni", Role = "Operations Manager, Municipal Corporation", Quote = "The AIS 140 compliance was a must for our government contract. GPS Clinic handled everything - devices, paperwork, and integration. Excellent service.", SortOrder = 3 }
            );
        }

        if (!db.FaqCategories.Any())
        {
            var hw = new FaqCategory
            {
                Name = "Hardware & Devices",
                SortOrder = 1,
                Items = new List<FaqItem>
                {
                    new() { Question = "What is the difference between a 2G and 4G GPS tracker?", Answer = "A 2G tracker uses the GPRS/EDGE network, which is slower and may lose signal in areas where 2G networks are being phased out. A 4G LTE tracker uses faster data networks for near-real-time updates (every 5-10 seconds) and is more reliable in urban areas. We recommend 4G for all new installations.", SortOrder = 1 },
                    new() { Question = "What is AIS 140 and why is it mandatory?", Answer = "AIS 140 is a standard set by the Ministry of Road Transport and Highways (MoRTH) under the VAHAN scheme. It mandates that all commercial vehicles (buses, trucks, taxis) must have a government-approved GPS device with a panic button and emergency tracking. Non-compliance can result in permit cancellations. GPS Clinic supplies AIS 140 certified devices.", SortOrder = 2 },
                    new() { Question = "Can the GPS device work without a power supply (e.g., for containers)?", Answer = "Yes. Our Solar GPS Tracker and Asset GPS Tracker have built-in batteries (up to 90 days standby) and are designed for non-powered assets like containers, equipment, and trailers. The solar model recharges passively in daylight.", SortOrder = 3 },
                    new() { Question = "How do you install the device? Does it require vehicle downtime?", Answer = "Our certified technicians perform hardwired installations. The process takes 1-2 hours per vehicle and requires the ignition to be off during wiring. For OBD plug-in trackers, installation takes under 5 minutes with zero downtime.", SortOrder = 4 },
                    new() { Question = "What happens if the device is tampered with or the wire is cut?", Answer = "The device sends an immediate tamper alert to the dashboard and admin phone number. Our AIS 140 devices also report to the government VAHAN portal on tamper events.", SortOrder = 5 },
                }
            };
            var sw = new FaqCategory
            {
                Name = "Software & Platform",
                SortOrder = 2,
                Items = new List<FaqItem>
                {
                    new() { Question = "Do I need to install software on my computer?", Answer = "No. The GPS Clinic tracking platform is entirely web-based. You access it from any browser at our secure portal URL. We also provide Android and iOS apps for mobile monitoring.", SortOrder = 1 },
                    new() { Question = "How many users can access the platform?", Answer = "There is no limit on viewer accounts. You can set up separate logins for drivers, supervisors, clients, or transport managers - each with customised access levels.", SortOrder = 2 },
                    new() { Question = "Can I receive alerts on WhatsApp?", Answer = "Yes. Alerts for overspeeding, geofence violations, panic button presses, and ignition events can be sent directly to WhatsApp numbers or SMS. This is included in the standard plan.", SortOrder = 3 },
                    new() { Question = "How far back can I view historical trip data?", Answer = "By default, trip history is stored for 90 days on the standard plan. Extended storage up to 3 years is available on the enterprise plan.", SortOrder = 4 },
                    new() { Question = "Is the software customised for my industry?", Answer = "Yes. We configure the software specifically for your use case - school bus operators get RFID boarding and parent app integration; logistics clients get ePOD and route optimisation; construction firms get idle-time reporting and zone control.", SortOrder = 5 },
                }
            };
            var pricing = new FaqCategory
            {
                Name = "Pricing & Plans",
                SortOrder = 3,
                Items = new List<FaqItem>
                {
                    new() { Question = "What is included in the price?", Answer = "Our quote includes: the GPS device, a dedicated SIM card (with data plan), software licence, and on-site installation. There are no surprise add-on fees. Annual subscription renewal covers SIM data and software hosting.", SortOrder = 1 },
                    new() { Question = "Is there a monthly or annual contract?", Answer = "We offer both. Monthly plans are available for smaller fleets. Annual plans include a discount of up to 15% and are recommended for fleets of 5 or more vehicles.", SortOrder = 2 },
                    new() { Question = "What is the warranty on the hardware?", Answer = "All devices carry a 12-month manufacturer warranty. GPS Clinic also provides a 6-month service warranty covering installation defects - if a device fails due to installation error, we replace it at no charge.", SortOrder = 3 },
                }
            };
            var support = new FaqCategory
            {
                Name = "Support & Service",
                SortOrder = 4,
                Items = new List<FaqItem>
                {
                    new() { Question = "What are your support hours?", Answer = "Our helpline and WhatsApp support operate 24/7. On-site technical visits are scheduled Monday-Saturday, 9 AM-7 PM, with emergency visits available on request.", SortOrder = 1 },
                    new() { Question = "How quickly do you respond to tickets?", Answer = "We aim to respond to all support queries within 4 hours. Critical issues (device offline, panic button not working) are escalated immediately and get a call-back within 30 minutes.", SortOrder = 2 },
                    new() { Question = "Do you service areas outside Aurangabad?", Answer = "We currently cover all major cities in Maharashtra including Mumbai, Pune, Nashik, Nagpur, and Kolhapur through our partner technician network. Contact us to confirm coverage for your location.", SortOrder = 3 },
                }
            };
            db.FaqCategories.AddRange(hw, sw, pricing, support);
        }

        if (!db.Pages.Any())
        {
            db.Pages.AddRange(
                new Page
                {
                    Title = "About Us",
                    Slug = "about-us",
                    Subtitle = "Maharashtra's most trusted GPS tracking partner - built on a simple promise: devices that work, software that makes sense, and support that actually picks up the phone.",
                    ContentHtml = AboutUsHtml,
                },
                new Page
                {
                    Title = "Terms & Conditions",
                    Slug = "terms-conditions",
                    Subtitle = "Last updated: September 2024",
                    ContentHtml = TermsHtml,
                },
                new Page
                {
                    Title = "Privacy Policy",
                    Slug = "privacy-policy",
                    Subtitle = "Last updated: September 2024",
                    ContentHtml = PrivacyHtml,
                }
            );
        }

        await db.SaveChangesAsync();
    }

    private static async Task SeedAdminAsync(UserManager<ApplicationUser> userManager, RoleManager<IdentityRole> roleManager)
    {
        const string role = "Admin";
        if (!await roleManager.RoleExistsAsync(role))
            await roleManager.CreateAsync(new IdentityRole(role));

        const string adminEmail = "admin@gpsclinic.co.in";
        var existing = await userManager.FindByEmailAsync(adminEmail);
        if (existing == null)
        {
            var user = new ApplicationUser { UserName = adminEmail, Email = adminEmail, DisplayName = "GPS Clinic Admin", EmailConfirmed = true };
            var result = await userManager.CreateAsync(user, "GpsClinic@2026");
            if (result.Succeeded)
                await userManager.AddToRoleAsync(user, role);
        }
    }

    private static HardwareProduct Hw(int order, string title, string slug, string tagline, string tags, string icon) => new()
    {
        Title = title,
        Slug = slug,
        Tagline = tagline,
        Tags = tags,
        IconKey = icon,
        BandItems = "1-2 Hour Installation,No SIM Required,AIS 140 Compliant",
        ContentHtml = DefaultFeaturesHtml,
        SortOrder = order,
    };

    private static SolutionProduct Sol(int order, string title, string slug, string tagline, string tags, string industry, string icon) => new()
    {
        Title = title,
        Slug = slug,
        Tagline = tagline,
        Tags = tags,
        Industry = industry,
        IconKey = icon,
        ContentHtml = $"<p>{tagline}. GPS Clinic configures this solution specifically for your fleet, with onboarding support and a live demo before you commit.</p>",
        SortOrder = order,
    };

    private static Industry Ind(string name, string slug, string icon, string tagline, string description, string[] features, bool showOnHome) => new()
    {
        Name = name,
        Slug = slug,
        IconKey = icon,
        Tagline = tagline,
        Description = description,
        Features = string.Join('\n', features),
        ShowOnHome = showOnHome,
    };

    private const string DefaultFeaturesHtml = """
        <h2>Product Features</h2>
        <p>Engineered for reliability on Indian roads.</p>
        <ul>
          <li><strong>Real-Time Location</strong> - GPS/GLONASS dual positioning with updates every 10 seconds.</li>
          <li><strong>Geofencing Alerts</strong> - Set virtual boundaries and get instant SMS/app alerts on entry or exit.</li>
          <li><strong>Overspeed Alerts</strong> - Configurable speed threshold alerts sent to fleet manager and driver.</li>
          <li><strong>Engine Cut Remote</strong> - Remotely cut vehicle ignition via app in case of theft or emergency.</li>
          <li><strong>Trip History Replay</strong> - 90-day trip history with stop analysis, idle time, and distance reports.</li>
          <li><strong>Tamper Alert</strong> - Immediate alert if device is disconnected or moved without authorisation.</li>
        </ul>
        """;

    private const string AboutUsHtml = """
        <h2>Our Story</h2>
        <p>GPS Clinic started when our founders - fleet operators themselves - kept running into the same wall: generic GPS devices that shipped from overseas, helplines that rang out, and software dashboards built for IT teams, not drivers or dispatchers.</p>
        <p>So in 2018 we set up a small operations centre in Aurangabad and began supplying the Maharashtra market with hardware that was actually meant for Indian road conditions - dust, heat, intermittent power - paired with software configured for the specific way local fleets work.</p>
        <p>Today we serve 500+ vehicles across 17 industries, with a local team that does same-day installation and a support desk that replies within 4 hours.</p>
        <h2>Our Values</h2>
        <ul>
          <li><strong>Local First</strong> - Our team lives in the same cities as our clients. Same-day visits, local-language support, Maharashtra-wide coverage.</li>
          <li><strong>Honest Pricing</strong> - No hidden SIM fees, no forced annual renewals, no upsell calls.</li>
          <li><strong>Data Privacy</strong> - Your fleet data is yours. We do not sell location data to third parties.</li>
          <li><strong>Fast Support</strong> - Every ticket is answered within 4 hours. Critical issues get a call-back within 30 minutes, 24/7.</li>
          <li><strong>AIS 140 Compliant</strong> - Every commercial-vehicle device we supply meets MoRTH AIS 140 standards.</li>
          <li><strong>Long-Term Partner</strong> - We still support devices installed in 2019. We do not abandon clients when newer models arrive.</li>
        </ul>
        <h2>Our Team</h2>
        <ul>
          <li><strong>Rajesh Sharma</strong> - Founder &amp; CEO. 15 years in fleet telematics.</li>
          <li><strong>Priya Deshpande</strong> - Head of Operations. Manages installation scheduling and client onboarding.</li>
          <li><strong>Vikram Jadhav</strong> - Lead Field Technician. Certified in AIS 140 device installation.</li>
        </ul>
        """;

    private const string TermsHtml = """
        <h2>1. Parties and Agreement</h2>
        <p>These Terms and Conditions ("Terms") constitute an agreement between GPS Clinic ("Company", "we", "us") and the individual or business entity ("Client", "you") purchasing or subscribing to our GPS tracking hardware, software, installation, and related services.</p>
        <p>By placing an order, signing a quotation, or using our tracking platform, you agree to be bound by these Terms.</p>
        <h2>2. Services Provided</h2>
        <ul>
          <li>Supply and installation of GPS tracking hardware</li>
          <li>SIM card provisioning with data plan for device communication</li>
          <li>Access to our web-based and mobile tracking platform</li>
          <li>Alert configuration and reporting as agreed during onboarding</li>
          <li>Technical support as described under the Support clause</li>
        </ul>
        <h2>3. Hardware Supply and Warranty</h2>
        <p>All hardware supplied by GPS Clinic carries a 12-month manufacturer warranty against manufacturing defects, subject to fair-use conditions. GPS Clinic also provides a 6-month installation warranty covering wiring faults attributable to our technician.</p>
        <h2>4. Installation</h2>
        <p>Installation will be carried out by GPS Clinic's certified technicians at a mutually agreed time and location. The client must ensure the vehicle is available with the ignition off at the agreed time.</p>
        <h2>5. Software and Platform Access</h2>
        <p>Software access is provided on a subscription basis. Access is licensed, not sold, for the duration of the active subscription.</p>
        <h2>6. GPS Accuracy Disclaimer</h2>
        <p>GPS tracking accuracy is dependent on satellite signal availability, environmental factors, and device firmware. Typical accuracy is 5-10 metres under open-sky conditions.</p>
        <h2>7. Payment Terms</h2>
        <p>Hardware and installation charges are due as specified in the quotation. Software subscription fees are billed monthly or annually as agreed.</p>
        <h2>8. Cancellation and Termination</h2>
        <p>Either party may terminate the subscription with 30 days written notice. On termination, the client's data will be exported on request within 14 days.</p>
        <h2>9. Limitation of Liability</h2>
        <p>GPS Clinic's total liability shall not exceed the total amount paid by the client in the 12 months preceding the claim.</p>
        <h2>10. Data Ownership</h2>
        <p>Vehicle tracking data generated by devices installed in the client's vehicles is owned by the client.</p>
        <h2>11. AIS 140 / VAHAN Compliance</h2>
        <p>Certain device data is transmitted to the Government of India's VAHAN portal in compliance with MoRTH AIS 140 regulations.</p>
        <h2>12. Governing Law and Dispute Resolution</h2>
        <p>These Terms are governed by the laws of India. Disputes are subject to the exclusive jurisdiction of the courts in Chhatrapati Sambhajinagar (Aurangabad), Maharashtra.</p>
        <h2>13. Amendments</h2>
        <p>GPS Clinic may update these Terms from time to time, with 30 days advance notice of material changes.</p>
        <h2>14. Contact</h2>
        <address>GPS Clinic<br>Shop No. 110, Kailash Market<br>Padampura Circle, Railway Station Road<br>Chhatrapati Sambhajinagar (Aurangabad) - 431005<br>Maharashtra, India<br>Email: legal@gpsclinic.co.in</address>
        """;

    private const string PrivacyHtml = """
        <h2>1. Introduction</h2>
        <p>GPS Clinic ("we", "us", "our") is committed to protecting the personal information of our clients, website visitors, and users of our GPS tracking services.</p>
        <h2>2. Information We Collect</h2>
        <p>Name, mobile number, email address, and business name submitted via enquiry forms; vehicle registration numbers and fleet details provided during onboarding; vehicle GPS coordinates, speed, heading, and ignition status from installed tracking devices.</p>
        <h2>3. How We Use Your Information</h2>
        <ul>
          <li>To provide and operate the GPS tracking service you have subscribed to</li>
          <li>To respond to enquiries and provide customer support</li>
          <li>To comply with AIS 140 / VAHAN data-sharing obligations to the Government of India</li>
        </ul>
        <h2>4. Vehicle Location Data</h2>
        <p>Vehicle location data belongs to the registered fleet operator (our client). We do not sell, share, or transfer vehicle location data to third parties except where required by law.</p>
        <h2>5. Data Retention</h2>
        <p>Trip history and location data is retained for 90 days on standard plans; up to 3 years on enterprise plans. Invoice and payment records are retained for 7 years.</p>
        <h2>6. Data Security</h2>
        <p>We implement industry-standard security measures including HTTPS-only access and encrypted storage of credentials.</p>
        <h2>7. Your Rights</h2>
        <p>You have the right to request access, correction, or deletion of your data, and to withdraw consent for marketing communications. Contact privacy@gpsclinic.co.in.</p>
        <h2>8. Cookies</h2>
        <p>Our website uses essential session cookies only.</p>
        <h2>9. Third-Party Services</h2>
        <p>Google Maps API, payment gateways, and SMS / WhatsApp API providers may process data on our behalf.</p>
        <h2>10. Children</h2>
        <p>Our services are not directed at individuals under 18.</p>
        <h2>11. Changes to This Policy</h2>
        <p>We may update this policy periodically, notifying active subscribers of material changes.</p>
        <h2>12. Contact</h2>
        <address>GPS Clinic<br>Shop No. 110, Kailash Market<br>Padampura Circle, Railway Station Road<br>Chhatrapati Sambhajinagar (Aurangabad) - 431005<br>Maharashtra, India<br>Email: privacy@gpsclinic.co.in</address>
        """;
}
