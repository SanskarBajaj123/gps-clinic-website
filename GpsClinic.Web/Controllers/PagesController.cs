using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

public class PagesController : Controller
{
    private readonly ApplicationDbContext _db;
    public PagesController(ApplicationDbContext db) => _db = db;

    [HttpGet("about-us")]
    public Task<IActionResult> About() => Show("about-us");

    [HttpGet("terms-conditions")]
    public Task<IActionResult> Terms() => Show("terms-conditions");

    [HttpGet("privacy-policy")]
    public Task<IActionResult> Privacy() => Show("privacy-policy");

    private async Task<IActionResult> Show(string slug)
    {
        var page = await _db.Pages.FirstOrDefaultAsync(p => p.Slug == slug);
        if (page == null) return NotFound();
        return View("Show", page);
    }
}
