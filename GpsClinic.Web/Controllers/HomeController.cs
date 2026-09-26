using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

public class HomeController : Controller
{
    private readonly ApplicationDbContext _db;
    public HomeController(ApplicationDbContext db) => _db = db;

    public async Task<IActionResult> Index()
    {
        var vm = new HomeViewModel
        {
            Settings = await _db.SiteSettings.ToDictionaryAsync(s => s.Key, s => s.Value),
            Hardware = await _db.HardwareProducts.Where(h => h.IsPublished).OrderBy(h => h.SortOrder).Take(6).ToListAsync(),
            Solutions = await _db.Solutions.Where(s => s.IsPublished).OrderBy(s => s.SortOrder).Take(6).ToListAsync(),
            Industries = await _db.Industries.Where(i => i.ShowOnHome).OrderBy(i => i.SortOrder).ToListAsync(),
            WhyUsFeatures = await _db.WhyUsFeatures.OrderBy(f => f.SortOrder).ToListAsync(),
            Testimonials = await _db.Testimonials.OrderBy(t => t.SortOrder).ToListAsync(),
            HomeFaqs = await _db.FaqItems.OrderBy(f => f.SortOrder).Take(5).ToListAsync(),
        };
        return View(vm);
    }

    public IActionResult Error() => View();
}

public class HomeViewModel
{
    public Dictionary<string, string> Settings { get; set; } = new();
    public List<HardwareProduct> Hardware { get; set; } = new();
    public List<SolutionProduct> Solutions { get; set; } = new();
    public List<Industry> Industries { get; set; } = new();
    public List<WhyUsFeature> WhyUsFeatures { get; set; } = new();
    public List<Testimonial> Testimonials { get; set; } = new();
    public List<FaqItem> HomeFaqs { get; set; } = new();

    public string Setting(string key, string fallback = "") => Settings.TryGetValue(key, out var v) ? v : fallback;
}
