using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/blog")]
public class BlogController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public BlogController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Blog Posts";
        var items = await _db.BlogPosts.OrderByDescending(p => p.PublishedAt).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpGet("create")]
    public IActionResult Create()
    {
        ViewData["Title"] = "New Blog Post";
        return RenderPartialOrPage("_Form", new BlogPost { PublishedAt = DateTime.UtcNow, IsPublished = true });
    }

    [HttpPost("create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Create(BlogPost model)
    {
        model.Slug = HardwareController.Slugify(model.Slug, model.Title);
        model.UpdatedAt = DateTime.UtcNow;
        _db.BlogPosts.Add(model);
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpGet("{id:int}/edit")]
    public async Task<IActionResult> Edit(int id)
    {
        var item = await _db.BlogPosts.FindAsync(id);
        if (item == null) return NotFound();
        ViewData["Title"] = $"Edit {item.Title}";
        return RenderPartialOrPage("_Form", item);
    }

    [HttpPost("{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Edit(int id, BlogPost model)
    {
        var item = await _db.BlogPosts.FindAsync(id);
        if (item == null) return NotFound();

        item.Title = model.Title;
        item.Slug = HardwareController.Slugify(model.Slug, model.Title);
        item.Excerpt = model.Excerpt;
        item.ContentHtml = model.ContentHtml;
        item.FeaturedImagePath = model.FeaturedImagePath;
        item.Author = model.Author;
        item.IsPublished = model.IsPublished;
        item.UpdatedAt = DateTime.UtcNow;
        await _db.SaveChangesAsync();
        return await Index();
    }

    [HttpPost("{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Delete(int id)
    {
        var item = await _db.BlogPosts.FindAsync(id);
        if (item != null)
        {
            _db.BlogPosts.Remove(item);
            await _db.SaveChangesAsync();
        }
        return await Index();
    }
}
