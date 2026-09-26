using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/testimonials")]
public class TestimonialsController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public TestimonialsController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Testimonials";
        var items = await _db.Testimonials.OrderBy(t => t.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Testimonial";
        return RenderPartialOrPage("_Form", new Testimonial { Rating = 5, SortOrder = 99 });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(Testimonial model)
    {
        _db.Testimonials.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.Testimonials.FindAsync(id);
        if (item == null) return NotFound();
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, Testimonial model)
    {
        var item = await _db.Testimonials.FindAsync(id);
        if (item == null) return NotFound();
        item.Name = model.Name;
        item.Role = model.Role;
        item.Quote = model.Quote;
        item.Rating = model.Rating;
        item.SortOrder = model.SortOrder;
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpPost("{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Delete(int id)
    {
        var item = await _db.Testimonials.FindAsync(id);
        if (item != null) { _db.Testimonials.Remove(item); await _db.SaveChangesAsync(); }
        return await Index();
    }
}
