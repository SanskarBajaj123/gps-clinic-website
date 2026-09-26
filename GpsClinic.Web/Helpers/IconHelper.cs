namespace GpsClinic.Web.Helpers;

/// <summary>Shared icon-set + gradient styling for hardware/solution card tiles (ported from the WP theme's functions.php).</summary>
public static class IconHelper
{
    private static readonly Dictionary<string, string> Icons = new()
    {
        ["video"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.89L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z\"/>",
        ["bell"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9\"/>",
        ["lock"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z\"/>",
        ["pin"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z\"/><path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M15 11a3 3 0 11-6 0 3 3 0 016 0z\"/>",
        ["map"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7\"/>",
        ["user"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z\"/>",
        ["thermo"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M14 14.76V3.5a2.5 2.5 0 00-5 0v11.26a4.5 4.5 0 105 0z\"/>",
        ["box"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4\"/>",
        ["fuel"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01\"/>",
        ["cross"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 6v6m0 0v6m0-6h6m-6 0H6\"/><circle cx=\"12\" cy=\"12\" r=\"9\"/>",
        ["bus"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M8 17h8M8 17v3m8-3v3M3 8h18v9a1 1 0 01-1 1H4a1 1 0 01-1-1V8zM3 8V6a2 2 0 012-2h14a2 2 0 012 2v2M8 8v5m4-5v5m4-5v5\"/>",
        ["group"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z\"/>",
        ["gps"] = "<path stroke-linecap=\"round\" stroke-linejoin=\"round\" d=\"M12 22s-8-4.5-8-11.8A8 8 0 0112 2a8 8 0 018 8.2c0 7.3-8 11.8-8 11.8z\"/><circle cx=\"12\" cy=\"10\" r=\"3\"/>",
    };

    private static readonly Dictionary<string, string> Gradients = new()
    {
        ["video"] = "linear-gradient(140deg,#0B1D35 0%,#1a4a7a 55%,#00A49A 100%)",
        ["bell"] = "linear-gradient(140deg,#6b0f0f 0%,#b71c1c 55%,#e53935 100%)",
        ["lock"] = "linear-gradient(140deg,#0B1D35 0%,#1e2f45 55%,#2c3e50 100%)",
        ["pin"] = "linear-gradient(140deg,#7d3a00 0%,#c85a00 55%,#F26419 100%)",
        ["map"] = "linear-gradient(140deg,#0a2f5c 0%,#1565c0 55%,#1e88e5 100%)",
        ["user"] = "linear-gradient(140deg,#0d4a1e 0%,#1b6b30 55%,#2e7d32 100%)",
        ["thermo"] = "linear-gradient(140deg,#0a2f5c 0%,#1976d2 55%,#42a5f5 100%)",
        ["box"] = "linear-gradient(140deg,#004d5c 0%,#007a8a 55%,#00A49A 100%)",
        ["fuel"] = "linear-gradient(140deg,#4a1a00 0%,#bf360c 55%,#F26419 100%)",
        ["cross"] = "linear-gradient(140deg,#5c0000 0%,#b71c1c 55%,#d32f2f 100%)",
        ["bus"] = "linear-gradient(140deg,#5d3a00 0%,#e65100 55%,#f57c00 100%)",
        ["group"] = "linear-gradient(140deg,#1a3a6b 0%,#1565c0 55%,#1e88e5 100%)",
        ["gps"] = "linear-gradient(140deg,#0B1D35 0%,#1a4a7a 55%,#00A49A 100%)",
    };

    public static string Path(string key) => Icons.TryGetValue(key, out var p) ? p : Icons["gps"];

    public static string Gradient(string key) => Gradients.TryGetValue(key, out var g) ? g : Gradients["gps"];
}
