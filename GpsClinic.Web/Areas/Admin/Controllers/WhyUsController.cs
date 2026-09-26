using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/whyus")]
public class WhyUsController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public WhyUsController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Why Us Features";
        var items = await _db.WhyUsFeatures.OrderBy(f => f.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Feature";
        return RenderPartialOrPage("_Form", new WhyUsFeature { SortOrder = 99 });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(WhyUsFeature model)
    {
        _db.WhyUsFeatures.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.WhyUsFeatures.FindAsync(id);
        if (item == null) return NotFound();
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, WhyUsFeature model)
    {
        var item = await _db.WhyUsFeatures.FindAsync(id);
        if (item == null) return NotFound();
        item.Title = model.Title;
        item.Description = model.Description;
        item.SortOrder = model.SortOrder;
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpPost("{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Delete(int id)
    {
        var item = await _db.WhyUsFeatures.FindAsync(id);
        if (item != null) { _db.WhyUsFeatures.Remove(item); await _db.SaveChangesAsync(); }
        return await Index();
    }
}
