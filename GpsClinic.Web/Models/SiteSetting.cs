using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

/// <summary>Simple editable key/value text used for singleton copy blocks (hero headline, stats, contact info, etc).</summary>
public class SiteSetting
{
    [Key, MaxLength(160)]
    public string Key { get; set; } = string.Empty;

    public string Value { get; set; } = string.Empty;
}

public static class SiteSettingKeys
{
    // ─── Hero ───────────────────────────────────────────────────────────────
    public const string HeroEyebrow = "hero.eyebrow";
    public const string HeroHeadline = "hero.headline";
    public const string HeroHeadlineAccent = "hero.headline_accent";
    public const string HeroSubheadline = "hero.subheadline";
    public const string HeroCtaDemo = "hero.cta_demo";
    public const string HeroCtaViewProducts = "hero.cta_view_products";

    // ─── Stats ──────────────────────────────────────────────────────────────
    public const string StatVehicles = "stat.vehicles";
    public const string StatHardware = "stat.hardware_models";
    public const string StatSoftware = "stat.software_solutions";
    public const string StatIndustries = "stat.industries";
    public const string StatSupport = "stat.support";

    // ─── Contact info ───────────────────────────────────────────────────────
    public const string ContactPhone = "contact.phone";
    public const string ContactWhatsApp = "contact.whatsapp";
    public const string ContactEmail = "contact.email";
    public const string ContactSupportEmail = "contact.support_email";
    public const string ContactAddress = "contact.address";
    public const string ContactHours = "contact.hours";

    // ─── Login menu ─────────────────────────────────────────────────────────
    public const string LoginFleetTrackingUrl = "login.fleet_tracking_url";
    public const string LoginFuelSystemUrl = "login.fuel_system_url";
    public const string LoginRtoChallanUrl = "login.rto_challan_url";
    public const string LoginTrackbeeSchoolUrl = "login.trackbee_school_url";
    public const string LoginFleetTrackingLabel = "login.fleet_tracking_label";
    public const string LoginFuelSystemLabel = "login.fuel_system_label";
    public const string LoginRtoChallanLabel = "login.rto_challan_label";
    public const string LoginTrackbeeSchoolLabel = "login.trackbee_school_label";

    // ─── Social links ───────────────────────────────────────────────────────
    public const string SocialFacebookUrl = "social.facebook_url";
    public const string SocialInstagramUrl = "social.instagram_url";
    public const string SocialGoogleUrl = "social.google_url";
    public const string SocialLinkedInUrl = "social.linkedin_url";
    public const string SocialXUrl = "social.x_url";
    public const string SocialIndiaMartUrl = "social.indiamart_url";

    // ─── Navigation & footer ────────────────────────────────────────────────
    public const string NavHome = "nav.home";
    public const string NavAbout = "nav.about";
    public const string NavHardware = "nav.hardware";
    public const string NavSolutions = "nav.solutions";
    public const string NavIndustries = "nav.industries";
    public const string NavBlog = "nav.blog";
    public const string NavContact = "nav.contact";
    public const string NavQuoteButton = "nav.quote_button";
    public const string FooterDescription = "footer.description";
    public const string FooterHardwareHeading = "footer.hardware_heading";
    public const string FooterSolutionsHeading = "footer.solutions_heading";
    public const string FooterCompanyHeading = "footer.company_heading";
    public const string FooterCopyright = "footer.copyright";

    // ─── Home page sections ─────────────────────────────────────────────────
    public const string HomeHwEyebrow = "home.hw.eyebrow";
    public const string HomeHwHeading = "home.hw.heading";
    public const string HomeHwIntro = "home.hw.intro";
    public const string HomeSolEyebrow = "home.sol.eyebrow";
    public const string HomeSolHeading = "home.sol.heading";
    public const string HomeSolIntro = "home.sol.intro";
    public const string HomeIndEyebrow = "home.ind.eyebrow";
    public const string HomeIndHeading = "home.ind.heading";
    public const string HomeIndIntro = "home.ind.intro";
    public const string HomeWhyEyebrow = "home.why.eyebrow";
    public const string HomeWhyHeading = "home.why.heading";
    public const string HomeTestimonialsEyebrow = "home.testimonials.eyebrow";
    public const string HomeTestimonialsHeading = "home.testimonials.heading";
    public const string HomeFaqEyebrow = "home.faq.eyebrow";
    public const string HomeFaqHeading = "home.faq.heading";
    public const string HomeFinalCtaHeading = "home.final_cta_heading";
    public const string HomeSupportCardTitle = "home.support_card_title";
    public const string HomeSupportPhoneLabel = "home.support_phone_label";
    public const string HomeSupportPhoneHours = "home.support_phone_hours";
    public const string HomeSupportVisitLabel = "home.support_visit_label";
    public const string HomeSupportVisitArea = "home.support_visit_area";
    public const string HomeSupportWhatsAppLabel = "home.support_whatsapp_label";
    public const string HomeSupportDemoButton = "home.support_demo_button";
    public const string HomeContactHeading = "home.contact_heading_line2";
    public const string HomeContactReplyNote = "home.contact_reply_note";

    // ─── Hardware list page ─────────────────────────────────────────────────
    public const string PageHardwareEyebrow = "page.hardware.eyebrow";
    public const string PageHardwareHeading = "page.hardware.heading";
    public const string PageHardwareIntro = "page.hardware.intro";
    public const string PageHardwareEmpty = "page.hardware.empty";
    public const string CtaHardwareListTitle = "cta.hardware_list.title";
    public const string CtaHardwareListSubtitle = "cta.hardware_list.subtitle";
    public const string CtaHardwareListButton = "cta.hardware_list.button";

    // ─── Hardware detail page ───────────────────────────────────────────────
    public const string HwDetailBadge = "hw_detail.badge";
    public const string HwDetailWhatsAppCta = "hw_detail.whatsapp_cta";
    public const string HwDetailQuoteCta = "hw_detail.quote_cta";
    public const string HwDetailBackCta = "hw_detail.back_cta";
    public const string HwDetailImagePlaceholder = "hw_detail.image_placeholder";
    public const string HwDetailDisclaimer = "hw_detail.disclaimer";
    public const string HwDetailFormHeading = "hw_detail.form_heading";
    public const string HwDetailFormSub = "hw_detail.form_sub";
    public const string HwDetailFormSubmit = "hw_detail.form_submit";
    public const string HwDetailCtaTitleTemplate = "hw_detail.cta_title_template";
    public const string HwDetailCtaSubtitle = "hw_detail.cta_subtitle";
    public const string HwDetailCtaWhatsApp = "hw_detail.cta_whatsapp";
    public const string HwDetailCtaQuote = "hw_detail.cta_quote";
    public const string HwDetailCtaAllProducts = "hw_detail.cta_allproducts";

    // ─── Solutions list page ────────────────────────────────────────────────
    public const string PageSolutionsEyebrow = "page.solutions.eyebrow";
    public const string PageSolutionsHeading = "page.solutions.heading";
    public const string PageSolutionsIntro = "page.solutions.intro";
    public const string PageSolutionsEmpty = "page.solutions.empty";
    public const string CtaSolutionsListTitle = "cta.solutions_list.title";
    public const string CtaSolutionsListSubtitle = "cta.solutions_list.subtitle";
    public const string CtaSolutionsListButton = "cta.solutions_list.button";

    // ─── Solutions detail page ──────────────────────────────────────────────
    public const string SolDetailDisclaimer = "sol_detail.disclaimer";
    public const string SolDetailFormHeading = "sol_detail.form_heading";
    public const string SolDetailFormSub = "sol_detail.form_sub";
    public const string SolDetailFormSubmit = "sol_detail.form_submit";
    public const string SolDetailCtaTitleTemplate = "sol_detail.cta_title_template";
    public const string SolDetailCtaSubtitle = "sol_detail.cta_subtitle";
    public const string SolDetailCtaWhatsApp = "sol_detail.cta_whatsapp";
    public const string SolDetailCtaContact = "sol_detail.cta_contact";
    public const string SolDetailCtaAllSolutions = "sol_detail.cta_allsolutions";

    // ─── Industries page ─────────────────────────────────────────────────────
    public const string PageIndustriesEyebrow = "page.industries.eyebrow";
    public const string PageIndustriesHeading = "page.industries.heading";
    public const string PageIndustriesIntro = "page.industries.intro";
    public const string CtaIndustriesTitle = "cta.industries.title";
    public const string CtaIndustriesSubtitle = "cta.industries.subtitle";
    public const string CtaIndustriesButton = "cta.industries.button";

    // ─── Blog pages ──────────────────────────────────────────────────────────
    public const string PageBlogHeading = "page.blog.heading";
    public const string PageBlogIntro = "page.blog.intro";
    public const string PageBlogEmpty = "page.blog.empty";
    public const string CtaBlogTitle = "cta.blog.title";
    public const string CtaBlogSubtitle = "cta.blog.subtitle";

    // ─── Contact page ────────────────────────────────────────────────────────
    public const string PageContactHeading = "page.contact.heading";
    public const string PageContactIntro = "page.contact.intro";
    public const string ContactTile1Title = "contact.tile1_title";
    public const string ContactTile1Desc = "contact.tile1_desc";
    public const string ContactTile2Title = "contact.tile2_title";
    public const string ContactTile2Desc = "contact.tile2_desc";
    public const string ContactTile3Title = "contact.tile3_title";
    public const string ContactTile3Desc = "contact.tile3_desc";
    public const string ContactTile4Title = "contact.tile4_title";
    public const string ContactTile4Desc = "contact.tile4_desc";
    public const string ContactFormHeading = "contact.form_heading";
    public const string ContactFormSub = "contact.form_sub";
    public const string ContactOfficeLabel = "contact.office_label";
    public const string ContactWhatsAppLabel = "contact.whatsapp_label";
    public const string ContactMapUrl = "contact.map_url";
    public const string ContactForm2Heading = "contact.form2_heading";
    public const string ContactForm2Sub = "contact.form2_sub";

    // ─── FAQ page ────────────────────────────────────────────────────────────
    public const string PageFaqHeading = "page.faq.heading";
    public const string PageFaqIntro = "page.faq.intro";
    public const string FaqStillHeading = "faq.still_heading";
    public const string FaqStillText = "faq.still_text";
    public const string FaqStillContactLabel = "faq.still_contact_label";
    public const string FaqStillWhatsAppLabel = "faq.still_whatsapp_label";
    public const string CtaFaqTitle = "cta.faq.title";
    public const string CtaFaqSubtitle = "cta.faq.subtitle";
    public const string CtaFaqButton = "cta.faq.button";

    // ─── About page extras ──────────────────────────────────────────────────
    public const string AboutBrandsEyebrow = "about.brands_eyebrow";
    public const string AboutBrandsHeading = "about.brands_heading";
    public const string AboutBrandsDisclaimer = "about.brands_disclaimer";

    // ─── Shared CTA defaults ────────────────────────────────────────────────
    public const string CtaPagesTitle = "cta.pages.title";
    public const string CtaPagesSubtitle = "cta.pages.subtitle";
    public const string CtaDefaultTitle = "cta.default.title";
    public const string CtaDefaultSubtitle = "cta.default.subtitle";
    public const string CtaDefaultButton = "cta.default.button";
    public const string CtaWhatsAppButtonLabel = "cta.whatsapp_button_label";

    // ─── Enquiry form defaults ──────────────────────────────────────────────
    public const string EnquiryDefaultHeading = "enquiry.default_heading";
    public const string EnquiryDefaultSub = "enquiry.default_sub";
    public const string EnquiryDefaultSubmit = "enquiry.default_submit";
    public const string EnquiryConsentText = "enquiry.consent_text";

    public static readonly (string Key, string Category, string Label, string Default, bool Multiline)[] All =
    {
        // Hero
        (HeroEyebrow, "Hero", "Hero Eyebrow", "India's Trusted GPS Tracking Partner", false),
        (HeroHeadline, "Hero", "Hero Headline", "Track Every Vehicle. Control Every", false),
        (HeroHeadlineAccent, "Hero", "Hero Headline Accent Word", "Route.", false),
        (HeroSubheadline, "Hero", "Hero Subheadline", "AIS 140 compliant GPS hardware + powerful fleet software. Serving schools, logistics, construction & 17+ industries across Maharashtra and beyond.", true),
        (HeroCtaDemo, "Hero", "Hero Button: Free Demo", "Get a Free Demo", false),
        (HeroCtaViewProducts, "Hero", "Hero Button: View Products", "View Products", false),

        // Stats
        (StatVehicles, "Stats", "Stat: Vehicles Tracked", "500+", false),
        (StatHardware, "Stats", "Stat: Hardware Models", "7+", false),
        (StatSoftware, "Stats", "Stat: Software Solutions", "13", false),
        (StatIndustries, "Stats", "Stat: Industries Served", "17+", false),
        (StatSupport, "Stats", "Stat: Support", "24/7", false),

        // Contact info
        (ContactPhone, "Contact Info", "Contact Phone", "+91 9260202020", false),
        (ContactWhatsApp, "Contact Info", "WhatsApp Number (digits only, with country code)", "919260202020", false),
        (ContactEmail, "Contact Info", "Contact Email", "info@gpsclinic.co.in", false),
        (ContactSupportEmail, "Contact Info", "Technical Support Email", "support@gpsclinic.co.in", false),
        (ContactAddress, "Contact Info", "Contact Address", "Shop No. 110, Kailash Market, Padampura Circle, Railway Station Road, Chhatrapati Sambhajinagar, Maharashtra 431005", true),
        (ContactHours, "Contact Info", "Business Hours", "Mon – Sat, 9 AM – 7 PM", false),

        // Login menu
        (LoginFleetTrackingUrl, "Login Menu", "Fleet Tracking Portal URL", "https://fleettracking.gpsclinic.co.in", false),
        (LoginFleetTrackingLabel, "Login Menu", "Fleet Tracking Tab Label", "Fleet Tracking", false),
        (LoginFuelSystemUrl, "Login Menu", "Fuel Tracking Portal URL", "http://gpsclinic.asymbix.net/", false),
        (LoginFuelSystemLabel, "Login Menu", "Fuel Tracking Tab Label", "Fuel Tracking", false),
        (LoginRtoChallanUrl, "Login Menu", "RTO Challan Nigraani Portal URL", "https://challan.nigraani.com/", false),
        (LoginRtoChallanLabel, "Login Menu", "RTO Challan Tab Label", "RTO Challan Nigraani", false),
        (LoginTrackbeeSchoolUrl, "Login Menu", "Trackbee School Portal URL", "https://trackbeeschool.gpsclinic.co.in", false),
        (LoginTrackbeeSchoolLabel, "Login Menu", "Trackbee School Tab Label", "Trackbee School", false),

        // Social links
        (SocialFacebookUrl, "Social Links", "Facebook URL", "https://www.facebook.com/gpsclinicIndia/", false),
        (SocialInstagramUrl, "Social Links", "Instagram URL", "https://www.instagram.com/gpsclinic_official/", false),
        (SocialGoogleUrl, "Social Links", "Google Business URL", "https://share.google/1MOJKwqwGvPF3GFVG", false),
        (SocialLinkedInUrl, "Social Links", "LinkedIn URL", "https://linkedin.com/company/gpsclinic", false),
        (SocialXUrl, "Social Links", "X (Twitter) URL", "https://x.com/gpsclinicindia", false),
        (SocialIndiaMartUrl, "Social Links", "IndiaMART URL", "https://www.indiamart.com/gps-clinic-aurangabad/", false),

        // Navigation & footer
        (NavHome, "Navigation & Footer", "Nav Link: Home", "Home", false),
        (NavAbout, "Navigation & Footer", "Nav Link: About", "About", false),
        (NavHardware, "Navigation & Footer", "Nav Link: Hardware", "Hardware", false),
        (NavSolutions, "Navigation & Footer", "Nav Link: Solutions", "Solutions", false),
        (NavIndustries, "Navigation & Footer", "Nav Link: Industries", "Industries", false),
        (NavBlog, "Navigation & Footer", "Nav Link: Blog", "Blog", false),
        (NavContact, "Navigation & Footer", "Nav Link: Contact", "Contact", false),
        (NavQuoteButton, "Navigation & Footer", "Nav Button: Get a Quote", "Get a Quote", false),
        (FooterDescription, "Navigation & Footer", "Footer Description", "India's trusted GPS tracking partner. AIS 140 compliant hardware, custom software, and 24/7 support from Chhatrapati Sambhajinagar.", true),
        (FooterHardwareHeading, "Navigation & Footer", "Footer Column: Hardware Heading", "Hardware Products", false),
        (FooterSolutionsHeading, "Navigation & Footer", "Footer Column: Solutions Heading", "Software Solutions", false),
        (FooterCompanyHeading, "Navigation & Footer", "Footer Column: Company Heading", "Company", false),
        (FooterCopyright, "Navigation & Footer", "Footer Copyright Text (year is added automatically)", "GPS Clinic. All rights reserved.", false),

        // Home page sections
        (HomeHwEyebrow, "Home Page", "Hardware Section Eyebrow", "Hardware Products", false),
        (HomeHwHeading, "Home Page", "Hardware Section Heading", "GPS Trackers for Every Vehicle", false),
        (HomeHwIntro, "Home Page", "Hardware Section Intro", "From basic wired trackers to AIS 140 certified devices - plug in and start tracking within hours.", true),
        (HomeSolEyebrow, "Home Page", "Solutions Section Eyebrow", "Software Solutions", false),
        (HomeSolHeading, "Home Page", "Solutions Section Heading", "Purpose-Built Tracking Platforms", false),
        (HomeSolIntro, "Home Page", "Solutions Section Intro", "One platform, many verticals. School buses, ambulances, fleets, or employees - we have a solution built for your workflow.", true),
        (HomeIndEyebrow, "Home Page", "Industries Section Eyebrow", "Industries We Serve", false),
        (HomeIndHeading, "Home Page", "Industries Section Heading", "GPS Tracking Across 17+ Sectors", false),
        (HomeIndIntro, "Home Page", "Industries Section Intro", "Whether you manage school buses or construction equipment - GPS Clinic has an industry-specific solution.", true),
        (HomeWhyEyebrow, "Home Page", "Why Us Section Eyebrow", "Why GPS Clinic", false),
        (HomeWhyHeading, "Home Page", "Why Us Section Heading", "Your Local GPS Partner - Not Just a Vendor", false),
        (HomeTestimonialsEyebrow, "Home Page", "Testimonials Section Eyebrow", "Customer Stories", false),
        (HomeTestimonialsHeading, "Home Page", "Testimonials Section Heading", "Trusted Across Maharashtra", false),
        (HomeFaqEyebrow, "Home Page", "FAQ Section Eyebrow", "FAQ", false),
        (HomeFaqHeading, "Home Page", "FAQ Section Heading", "Common Questions", false),
        (HomeFinalCtaHeading, "Home Page", "Final CTA Heading Line 1", "Ready to Track Your Fleet?", false),
        (HomeSupportCardTitle, "Home Page", "Support Card Title", "Always Reachable", false),
        (HomeSupportPhoneLabel, "Home Page", "Support Card: Phone Label", "Phone Support", false),
        (HomeSupportPhoneHours, "Home Page", "Support Card: Phone Hours", "Mon – Sat, 9 AM – 7 PM", false),
        (HomeSupportVisitLabel, "Home Page", "Support Card: Visit Label", "On-Site Visits", false),
        (HomeSupportVisitArea, "Home Page", "Support Card: Visit Area", "Chhatrapati Sambhajinagar & nearby districts", false),
        (HomeSupportWhatsAppLabel, "Home Page", "Support Card: WhatsApp Label", "WhatsApp Support", false),
        (HomeSupportDemoButton, "Home Page", "Support Card: Demo Button", "Book a Free Demo", false),
        (HomeContactHeading, "Home Page", "Contact Section Heading Accent Word (after \"Let's\")", "Talk.", false),
        (HomeContactReplyNote, "Home Page", "Contact Section: Email Reply Note", "We reply within 4 hours", false),

        // Hardware list
        (PageHardwareEyebrow, "Hardware List Page", "Eyebrow", "Hardware", false),
        (PageHardwareHeading, "Hardware List Page", "Heading", "GPS Tracking Hardware", false),
        (PageHardwareIntro, "Hardware List Page", "Intro", "AIS 140 certified devices for every vehicle type. Wired, OBD, solar, and 4G - all with same-day installation across Maharashtra.", true),
        (PageHardwareEmpty, "Hardware List Page", "Empty State Message", "Hardware products coming soon. Contact us to enquire.", false),
        (CtaHardwareListTitle, "Hardware List Page", "CTA Band Title", "Not Sure Which Device You Need?", false),
        (CtaHardwareListSubtitle, "Hardware List Page", "CTA Band Subtitle", "Tell us your vehicle type and use case - we will recommend the right hardware and install it for you.", true),
        (CtaHardwareListButton, "Hardware List Page", "CTA Band Button", "Get a Recommendation", false),

        // Hardware detail
        (HwDetailBadge, "Hardware Detail Page", "Category Badge Text", "Hardware Product", false),
        (HwDetailWhatsAppCta, "Hardware Detail Page", "WhatsApp Button", "Enquire on WhatsApp", false),
        (HwDetailQuoteCta, "Hardware Detail Page", "Quote Button", "Get a Quote", false),
        (HwDetailBackCta, "Hardware Detail Page", "Back Button", "← All Hardware", false),
        (HwDetailImagePlaceholder, "Hardware Detail Page", "Image Placeholder Text", "Product image coming soon", false),
        (HwDetailDisclaimer, "Hardware Detail Page", "GPS Accuracy Disclaimer (shown after a bold \"GPS Accuracy Notice:\" label)", "GPS tracking accuracy is dependent on satellite signal availability, environmental factors (tall buildings, tunnels, dense vegetation), and device firmware. Typical accuracy is 5-10 metres under open-sky conditions. GPS Clinic does not guarantee exact real-time positioning in all conditions.", true),
        (HwDetailFormHeading, "Hardware Detail Page", "Enquiry Form Heading", "Enquire About This Product", false),
        (HwDetailFormSub, "Hardware Detail Page", "Enquiry Form Subtitle", "We'll call you back within 4 hours.", false),
        (HwDetailFormSubmit, "Hardware Detail Page", "Enquiry Form Submit Label", "Send Enquiry", false),
        (HwDetailCtaTitleTemplate, "Hardware Detail Page", "Bottom CTA Title (use {0} for product name)", "Ready to Install {0}?", false),
        (HwDetailCtaSubtitle, "Hardware Detail Page", "Bottom CTA Subtitle", "Our technicians cover Chhatrapati Sambhajinagar and surrounding districts.", true),
        (HwDetailCtaWhatsApp, "Hardware Detail Page", "Bottom CTA: WhatsApp Button", "WhatsApp Us", false),
        (HwDetailCtaQuote, "Hardware Detail Page", "Bottom CTA: Quote Button", "Get a Quote", false),
        (HwDetailCtaAllProducts, "Hardware Detail Page", "Bottom CTA: All Products Button", "View All Hardware", false),

        // Solutions list
        (PageSolutionsEyebrow, "Solutions List Page", "Eyebrow", "Software", false),
        (PageSolutionsHeading, "Solutions List Page", "Heading", "GPS Tracking Solutions", false),
        (PageSolutionsIntro, "Solutions List Page", "Intro", "Purpose-built platforms for schools, logistics, healthcare, government, and 17+ industries. Powered by GPS Clinic.", true),
        (PageSolutionsEmpty, "Solutions List Page", "Empty State Message", "Solutions coming soon. Contact us to enquire.", false),
        (CtaSolutionsListTitle, "Solutions List Page", "CTA Band Title", "Need a Custom Solution?", false),
        (CtaSolutionsListSubtitle, "Solutions List Page", "CTA Band Subtitle", "We integrate and configure GPS software for your specific workflow. Let us build the right solution for your fleet.", true),
        (CtaSolutionsListButton, "Solutions List Page", "CTA Band Button", "Discuss Your Needs", false),

        // Solutions detail
        (SolDetailDisclaimer, "Solutions Detail Page", "GPS Accuracy Disclaimer (shown after a bold \"GPS Accuracy Notice:\" label)", "GPS tracking accuracy is dependent on satellite signal availability, environmental factors (tall buildings, tunnels, dense vegetation), and device firmware. Typical accuracy is 5-10 metres under open-sky conditions. GPS Clinic does not guarantee exact real-time positioning in all conditions.", true),
        (SolDetailFormHeading, "Solutions Detail Page", "Enquiry Form Heading", "Get a Demo", false),
        (SolDetailFormSub, "Solutions Detail Page", "Enquiry Form Subtitle", "We'll set up a live demo for your team.", false),
        (SolDetailFormSubmit, "Solutions Detail Page", "Enquiry Form Submit Label", "Request Demo", false),
        (SolDetailCtaTitleTemplate, "Solutions Detail Page", "Bottom CTA Title (use {0} for solution name)", "Interested in {0}?", false),
        (SolDetailCtaSubtitle, "Solutions Detail Page", "Bottom CTA Subtitle", "Let's set up a live demo. No commitment required.", true),
        (SolDetailCtaWhatsApp, "Solutions Detail Page", "Bottom CTA: WhatsApp Button", "WhatsApp Us", false),
        (SolDetailCtaContact, "Solutions Detail Page", "Bottom CTA: Contact Button", "Contact Us", false),
        (SolDetailCtaAllSolutions, "Solutions Detail Page", "Bottom CTA: All Solutions Button", "All Solutions", false),

        // Industries
        (PageIndustriesEyebrow, "Industries Page", "Eyebrow", "Industries", false),
        (PageIndustriesHeading, "Industries Page", "Heading", "Industries We Serve", false),
        (PageIndustriesIntro, "Industries Page", "Intro", "GPS Clinic configures tracking solutions for 17+ industries across Maharashtra. Each deployment is set up for the specific workflows, compliance requirements, and reporting needs of that sector.", true),
        (CtaIndustriesTitle, "Industries Page", "CTA Band Title", "Do Not See Your Industry?", false),
        (CtaIndustriesSubtitle, "Industries Page", "CTA Band Subtitle", "We configure solutions for any business that operates vehicles or mobile assets. Call us to discuss your requirements.", true),
        (CtaIndustriesButton, "Industries Page", "CTA Band Button", "Discuss Your Requirements", false),

        // Blog
        (PageBlogHeading, "Blog Page", "Heading", "GPS Clinic Blog", false),
        (PageBlogIntro, "Blog Page", "Intro", "News, guides, and updates on GPS tracking, fleet management, and AIS 140 compliance.", true),
        (PageBlogEmpty, "Blog Page", "Empty State Message", "No blog posts yet - check back soon.", false),
        (CtaBlogTitle, "Blog Page", "CTA Band Title", "Ready to Track Your Fleet?", false),
        (CtaBlogSubtitle, "Blog Page", "CTA Band Subtitle", "Get a free demo, site visit, or same-day quote from our local team.", true),

        // Contact
        (PageContactHeading, "Contact Page", "Heading", "Get in Touch", false),
        (PageContactIntro, "Contact Page", "Intro", "Whether you need a quote, a demo, or on-site support - our team is ready to help. Reach us by phone, WhatsApp, or walk into our office.", true),
        (ContactTile1Title, "Contact Page", "Tile 1 Title", "Phone", false),
        (ContactTile1Desc, "Contact Page", "Tile 1 Description", "Mon – Sat, 9 AM – 7 PM", false),
        (ContactTile2Title, "Contact Page", "Tile 2 Title", "WhatsApp", false),
        (ContactTile2Desc, "Contact Page", "Tile 2 Description", "Quickest response", false),
        (ContactTile3Title, "Contact Page", "Tile 3 Title", "Sales Enquiry", false),
        (ContactTile3Desc, "Contact Page", "Tile 3 Description", "New products & quotes", false),
        (ContactTile4Title, "Contact Page", "Tile 4 Title", "Technical Support", false),
        (ContactTile4Desc, "Contact Page", "Tile 4 Description", "Existing customers", false),
        (ContactFormHeading, "Contact Page", "Form Heading", "Send Us a Message", false),
        (ContactFormSub, "Contact Page", "Form Subtitle", "Fill in the form and we'll call you back within 24 hours.", false),
        (ContactOfficeLabel, "Contact Page", "Office Label", "Visit Our Office", false),
        (ContactWhatsAppLabel, "Contact Page", "WhatsApp Row Label", "WhatsApp (Fastest)", false),
        (ContactMapUrl, "Contact Page", "Embedded Map URL", "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.5!2d75.3433!3d19.8762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sKailash+Market+Chhatrapati+Sambhajinagar!5e0!3m2!1sen!2sin!4v1", true),
        (ContactForm2Heading, "Contact Page", "Sidebar Form Heading", "Enquiry Form", false),
        (ContactForm2Sub, "Contact Page", "Sidebar Form Subtitle", "Tell us about your requirements and we'll recommend the right solution.", false),

        // FAQ
        (PageFaqHeading, "FAQ Page", "Heading", "Frequently Asked Questions", false),
        (PageFaqIntro, "FAQ Page", "Intro", "Everything you need to know about GPS tracking hardware, software, installation, and pricing.", true),
        (FaqStillHeading, "FAQ Page", "\"Still Have a Question\" Heading", "Still have a question?", false),
        (FaqStillText, "FAQ Page", "\"Still Have a Question\" Text", "Our team is happy to answer specific queries about your fleet size, vehicle types, or budget.", true),
        (FaqStillContactLabel, "FAQ Page", "\"Still Have a Question\" Contact Button", "Contact Us", false),
        (FaqStillWhatsAppLabel, "FAQ Page", "\"Still Have a Question\" WhatsApp Button", "WhatsApp", false),
        (CtaFaqTitle, "FAQ Page", "Bottom CTA Title", "Still Have Questions?", false),
        (CtaFaqSubtitle, "FAQ Page", "Bottom CTA Subtitle", "Our team is on-call. WhatsApp us, call, or drop a message - we reply within 4 hours.", true),
        (CtaFaqButton, "FAQ Page", "Bottom CTA Button", "Send Us a Message", false),

        // About page extras
        (AboutBrandsEyebrow, "About Page", "Brands Section Eyebrow", "Hardware Partners", false),
        (AboutBrandsHeading, "About Page", "Brands Section Heading", "Trusted Brands We Supply", false),
        (AboutBrandsDisclaimer, "About Page", "Brands Section Disclaimer", "Brand names are used for identification only. GPS Clinic is an independent reseller and integrator.", true),

        // Shared CTA defaults
        (CtaPagesTitle, "Shared CTA Defaults", "About/Privacy/Terms Band Title", "Ready to Get Started?", false),
        (CtaPagesSubtitle, "Shared CTA Defaults", "About/Privacy/Terms Band Subtitle", "Get a free site visit, device demo, or same-day quotation from our local team.", true),
        (CtaDefaultTitle, "Shared CTA Defaults", "Fallback CTA Title", "Ready to Track Your Fleet?", false),
        (CtaDefaultSubtitle, "Shared CTA Defaults", "Fallback CTA Subtitle", "Get a free demo, site visit, or same-day quote from our local team.", true),
        (CtaDefaultButton, "Shared CTA Defaults", "Fallback CTA Button", "Get a Free Quote", false),
        (CtaWhatsAppButtonLabel, "Shared CTA Defaults", "CTA Band: WhatsApp Button Label", "WhatsApp Us", false),

        // Enquiry form
        (EnquiryDefaultHeading, "Enquiry Form Defaults", "Default Heading", "Get a Free Quote", false),
        (EnquiryDefaultSub, "Enquiry Form Defaults", "Default Subtitle", "Fill in your details and we'll call you back within 24 hours.", false),
        (EnquiryDefaultSubmit, "Enquiry Form Defaults", "Default Submit Label", "Send Enquiry", false),
        (EnquiryConsentText, "Enquiry Form Defaults", "Consent Checkbox Text", "I consent to GPS Clinic contacting me via phone or WhatsApp regarding my enquiry. My details will not be shared with third parties.", true),
    };
}
