using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

[Route("faq")]
public class FaqController : Controller
{
    private readonly ApplicationDbContext _db;
    public FaqController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        var categories = await _db.FaqCategories
            .Include(c => c.Items)
            .OrderBy(c => c.SortOrder)
            .ToListAsync();
        foreach (var c in categories) c.Items = c.Items.OrderBy(i => i.SortOrder).ToList();
        return View(categories);
    }
}
