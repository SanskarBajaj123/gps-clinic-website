using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/solutions")]
public class SolutionsController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public SolutionsController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Software Solutions";
        var items = await _db.Solutions.OrderBy(s => s.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Solution";
        return RenderPartialOrPage("_Form", new SolutionProduct { SortOrder = 99, IsPublished = true });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(SolutionProduct model)
    {
        model.Slug = HardwareController.Slugify(model.Slug, model.Title);
        model.CreatedAt = DateTime.UtcNow;
        model.UpdatedAt = DateTime.UtcNow;
        _db.Solutions.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.Solutions.FindAsync(id);
        if (item == null) return NotFound();
        ViewData["Title"] = $"Edit {item.Title}";
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, SolutionProduct model)
    {
        var item = await _db.Solutions.FindAsync(id);
        if (item == null) return NotFound();

        item.Title = model.Title;
        item.Slug = HardwareController.Slugify(model.Slug, model.Title);
        item.Tagline = model.Tagline;
        item.Excerpt = model.Excerpt;
        item.ContentHtml = model.ContentHtml;
        item.Tags = model.Tags;
        item.Industry = model.Industry;
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
        var item = await _db.Solutions.FindAsync(id);
        if (item != null)
        {
            _db.Solutions.Remove(item);
            await _db.SaveChangesAsync();
        }
        return await Index();
    }
}
