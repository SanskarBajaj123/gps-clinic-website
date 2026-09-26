using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

[Route("solutions")]
public class SolutionsController : Controller
{
    private readonly ApplicationDbContext _db;
    public SolutionsController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        var items = await _db.Solutions.Where(s => s.IsPublished).OrderBy(s => s.SortOrder).ToListAsync();
        return View(items);
    }

    [HttpGet("{slug}")]
    public async Task<IActionResult> Detail(string slug)
    {
        var item = await _db.Solutions.FirstOrDefaultAsync(s => s.Slug == slug && s.IsPublished);
        if (item == null) return NotFound();
        return View(item);
    }
}
