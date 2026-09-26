using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/settings")]
public class SettingsController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public SettingsController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Site Settings";
        var settings = await _db.SiteSettings.ToDictionaryAsync(s => s.Key, s => s.Value);
        return RenderPartialOrPage("_Form", settings);
    }

    [HttpPost("")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Save()
    {
        foreach (var (key, _, _) in SiteSettingKeys.All)
        {
            if (!Request.Form.TryGetValue(key, out var value)) continue;
            var row = await _db.SiteSettings.FindAsync(key);
            if (row == null) { row = new SiteSetting { Key = key }; _db.SiteSettings.Add(row); }
            row.Value = value.ToString();
        }
        await _db.SaveChangesAsync();
        ViewData["Saved"] = true;
        return await Index();
    }
}
