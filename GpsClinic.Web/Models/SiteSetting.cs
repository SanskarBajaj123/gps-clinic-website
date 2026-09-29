using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

/// <summary>Simple editable key/value text used for singleton copy blocks (hero headline, stats, contact info, etc).</summary>
public class SiteSetting
{
    [Key, MaxLength(120)]
    public string Key { get; set; } = string.Empty;

    public string Value { get; set; } = string.Empty;
}

public static class SiteSettingKeys
{
    public const string HeroEyebrow = "hero.eyebrow";
    public const string HeroHeadline = "hero.headline";
    public const string HeroHeadlineAccent = "hero.headline_accent";
    public const string HeroSubheadline = "hero.subheadline";

    public const string StatVehicles = "stat.vehicles";
    public const string StatHardware = "stat.hardware_models";
    public const string StatSoftware = "stat.software_solutions";
    public const string StatIndustries = "stat.industries";
    public const string StatSupport = "stat.support";

    public const string ContactPhone = "contact.phone";
    public const string ContactWhatsApp = "contact.whatsapp";
    public const string ContactEmail = "contact.email";
    public const string ContactAddress = "contact.address";

    public const string LoginFleetTrackingUrl = "login.fleet_tracking_url";
    public const string LoginFuelSystemUrl = "login.fuel_system_url";
    public const string LoginRtoChallanUrl = "login.rto_challan_url";
    public const string LoginTrackbeeSchoolUrl = "login.trackbee_school_url";

    public const string SocialFacebookUrl = "social.facebook_url";
    public const string SocialInstagramUrl = "social.instagram_url";
    public const string SocialGoogleUrl = "social.google_url";
    public const string SocialLinkedInUrl = "social.linkedin_url";
    public const string SocialXUrl = "social.x_url";
    public const string SocialIndiaMartUrl = "social.indiamart_url";

    public static readonly (string Key, string Label, string Default)[] All =
    {
        (HeroEyebrow, "Hero Eyebrow", "India's Trusted GPS Tracking Partner"),
        (HeroHeadline, "Hero Headline", "Track Every Vehicle. Control Every"),
        (HeroHeadlineAccent, "Hero Headline Accent Word", "Route."),
        (HeroSubheadline, "Hero Subheadline", "AIS 140 compliant GPS hardware + powerful fleet software. Serving schools, logistics, construction & 17+ industries across Maharashtra and beyond."),
        (StatVehicles, "Stat: Vehicles Tracked", "500+"),
        (StatHardware, "Stat: Hardware Models", "7+"),
        (StatSoftware, "Stat: Software Solutions", "13"),
        (StatIndustries, "Stat: Industries Served", "17+"),
        (StatSupport, "Stat: Support", "24/7"),
        (ContactPhone, "Contact Phone", "+91 9260202020"),
        (ContactWhatsApp, "WhatsApp Number (digits only, with country code)", "919260202020"),
        (ContactEmail, "Contact Email", "info@gpsclinic.co.in"),
        (ContactAddress, "Contact Address", "Shop No. 110, Kailash Market, Padampura Circle, Railway Station Road, Chhatrapati Sambhajinagar, Maharashtra 431005"),
        (LoginFleetTrackingUrl, "Login Menu: Fleet Tracking Portal URL", "https://fleettracking.gpsclinic.co.in"),
        (LoginFuelSystemUrl, "Login Menu: Fuel Tracking Portal URL", "http://gpsclinic.asymbix.net/"),
        (LoginRtoChallanUrl, "Login Menu: RTO Challan Nigraani Portal URL", "https://challan.nigraani.com/"),
        (LoginTrackbeeSchoolUrl, "Login Menu: Trackbee School Portal URL", "https://trackbeeschool.gpsclinic.co.in"),
        (SocialFacebookUrl, "Social: Facebook URL", "https://www.facebook.com/gpsclinicIndia/"),
        (SocialInstagramUrl, "Social: Instagram URL", "https://www.instagram.com/gpsclinic_official/"),
        (SocialGoogleUrl, "Social: Google Business URL", "https://share.google/1MOJKwqwGvPF3GFVG"),
        (SocialLinkedInUrl, "Social: LinkedIn URL", "https://linkedin.com/company/gpsclinic"),
        (SocialXUrl, "Social: X (Twitter) URL", "https://x.com/gpsclinicindia"),
        (SocialIndiaMartUrl, "Social: IndiaMART URL", "https://www.indiamart.com/gps-clinic-aurangabad/"),
    };
}
