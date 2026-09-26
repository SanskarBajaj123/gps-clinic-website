using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/pages")]
public class PagesController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public PagesController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Pages";
        var items = await _db.Pages.OrderBy(p => p.Title).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.Pages.FindAsync(id);
        if (item == null) return NotFound();
        ViewData["Title"] = $"Edit {item.Title}";
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, Page model)
    {
        var item = await _db.Pages.FindAsync(id);
        if (item == null) return NotFound();

        item.Subtitle = model.Subtitle;
        item.ContentHtml = model.ContentHtml;
        item.MetaDescription = model.MetaDescription;
        item.UpdatedAt = DateTime.UtcNow;
        await _db.SaveChangesAsync();
        return await Index();
    }
}
