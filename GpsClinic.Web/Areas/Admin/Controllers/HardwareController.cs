using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/hardware")]
public class HardwareController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public HardwareController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Hardware Products";
        var items = await _db.HardwareProducts.OrderBy(h => h.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Hardware Product";
        return RenderPartialOrPage("_Form", new HardwareProduct { SortOrder = 99, IsPublished = true });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(HardwareProduct model)
    {
        model.Slug = Slugify(model.Slug, model.Title);
        model.CreatedAt = DateTime.UtcNow;
        model.UpdatedAt = DateTime.UtcNow;
        _db.HardwareProducts.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.HardwareProducts.FindAsync(id);
        if (item == null) return NotFound();
        ViewData["Title"] = $"Edit {item.Title}";
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, HardwareProduct model)
    {
        var item = await _db.HardwareProducts.FindAsync(id);
        if (item == null) return NotFound();

        item.Title = model.Title;
        item.Slug = Slugify(model.Slug, model.Title);
        item.Tagline = model.Tagline;
        item.Excerpt = model.Excerpt;
        item.ContentHtml = model.ContentHtml;
        item.Tags = model.Tags;
        item.BandItems = model.BandItems;
        item.IconKey = model.IconKey;
        item.HeroImagePath = model.HeroImagePath;
        item.CardImagePath = model.CardImagePath;
        item.SortOrder = model.SortOrder;
        item.IsPublished = model.IsPublished;
        item.UpdatedAt = DateTime.UtcNow;
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpPost("{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Delete(int id)
    {
        var item = await _db.HardwareProducts.FindAsync(id);
        if (item != null)
        {
            _db.HardwareProducts.Remove(item);
            await _db.SaveChangesAsync();
        }
        return await Index();
    }

    public static string Slugify(string? explicitSlug, string title)
    {
        var basis = !string.IsNullOrWhiteSpace(explicitSlug) ? explicitSlug : title;
        var slug = basis.Trim().ToLowerInvariant();
        slug = System.Text.RegularExpressions.Regex.Replace(slug, @"[^a-z0-9]+", "-");
        return slug.Trim('-');
    }
}
