using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

[Route("hardware")]
public class HardwareController : Controller
{
    private readonly ApplicationDbContext _db;
    public HardwareController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        var items = await _db.HardwareProducts.Where(h => h.IsPublished).OrderBy(h => h.SortOrder).ToListAsync();
        return View(items);
    }

    [HttpGet("{slug}")]
    public async Task<IActionResult> Detail(string slug)
    {
        var item = await _db.HardwareProducts.FirstOrDefaultAsync(h => h.Slug == slug && h.IsPublished);
        if (item == null) return NotFound();
        return View(item);
    }
}
