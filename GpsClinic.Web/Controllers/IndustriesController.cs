using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

[Route("industries")]
public class IndustriesController : Controller
{
    private readonly ApplicationDbContext _db;
    public IndustriesController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        var items = await _db.Industries.OrderBy(i => i.SortOrder).ThenBy(i => i.Name).ToListAsync();
        return View(items);
    }
}
