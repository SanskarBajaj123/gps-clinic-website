using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

[Route("blog")]
public class BlogController : Controller
{
    private readonly ApplicationDbContext _db;
    public BlogController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        var posts = await _db.BlogPosts.Where(p => p.IsPublished).OrderByDescending(p => p.PublishedAt).ToListAsync();
        return View(posts);
    }

    [HttpGet("{slug}")]
    public async Task<IActionResult> Detail(string slug)
    {
        var post = await _db.BlogPosts.FirstOrDefaultAsync(p => p.Slug == slug && p.IsPublished);
        if (post == null) return NotFound();
        return View(post);
    }
}
