using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/enquiries")]
public class EnquiriesController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public EnquiriesController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "Enquiries";
        var items = await _db.ContactSubmissions.OrderByDescending(c => c.SubmittedAt).ToListAsync();
        return RenderPartialOrPage("_List", items);
    }

    [HttpPost("{id:int}/read")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> MarkRead(int id)
    {
        var item = await _db.ContactSubmissions.FindAsync(id);
        if (item != null) { item.IsRead = true; await _db.SaveChangesAsync(); }
        return await Index();
    }
}
