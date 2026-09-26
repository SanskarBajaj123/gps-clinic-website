using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/industries")]
public class IndustriesController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public IndustriesController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Industries";
        var items = await _db.Industries.OrderBy(i => i.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Industry";
        return RenderPartialOrPage("_Form", new Industry { SortOrder = 99 });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(Industry model)
    {
        model.Slug = HardwareController.Slugify(model.Slug, model.Name);
        _db.Industries.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.Industries.FindAsync(id);
        if (item == null) return NotFound();
        ViewData["Title"] = $"Edit {item.Name}";
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, Industry model)
    {
        var item = await _db.Industries.FindAsync(id);
        if (item == null) return NotFound();

        item.Name = model.Name;
        item.Slug = HardwareController.Slugify(model.Slug, model.Name);
        item.Tagline = model.Tagline;
        item.Description = model.Description;
        item.Features = model.Features;
        item.IconKey = model.IconKey;
        item.SortOrder = model.SortOrder;
        item.ShowOnHome = model.ShowOnHome;
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpPost("{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Delete(int id)
    {
        var item = await _db.Industries.FindAsync(id);
        if (item != null)
        {
            _db.Industries.Remove(item);
            await _db.SaveChangesAsync();
        }
        return await Index();
    }
}
