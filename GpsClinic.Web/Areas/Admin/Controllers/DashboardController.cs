using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin")]
public class DashboardController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public DashboardController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    [HttpGet("dashboard")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Overview";
        var vm = new DashboardViewModel
        {
            HardwareCount = await _db.HardwareProducts.CountAsync(),
            SolutionCount = await _db.Solutions.CountAsync(),
            BlogCount = await _db.BlogPosts.CountAsync(),
            IndustryCount = await _db.Industries.CountAsync(),
            UnreadEnquiries = await _db.ContactSubmissions.CountAsync(c => !c.IsRead),
            RecentEnquiries = await _db.ContactSubmissions.OrderByDescending(c => c.SubmittedAt).Take(5).ToListAsync(),
        };
        return RenderPartialOrPage("_Overview", vm);
    }
}

public class DashboardViewModel
{
    public int HardwareCount { get; set; }
    public int SolutionCount { get; set; }
    public int BlogCount { get; set; }
    public int IndustryCount { get; set; }
    public int UnreadEnquiries { get; set; }
    public List<ContactSubmission> RecentEnquiries { get; set; } = new();
}
