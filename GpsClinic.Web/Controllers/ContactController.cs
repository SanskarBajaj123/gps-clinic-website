using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;

namespace GpsClinic.Web.Controllers;

[Route("contact")]
public class ContactController : Controller
{
    private readonly ApplicationDbContext _db;
    public ContactController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public IActionResult Index() => View();

    [HttpPost("submit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Submit([FromForm] string name, [FromForm] string mobile, [FromForm] string? email,
        [FromForm] string? city, [FromForm] string? product, [FromForm] int? vehicles, [FromForm] string? message)
    {
        if (string.IsNullOrWhiteSpace(name) || string.IsNullOrWhiteSpace(mobile))
            return Json(new { success = false, message = "Name and mobile are required." });

        var submission = new ContactSubmission
        {
            Name = name.Trim(),
            Mobile = mobile.Trim(),
            Email = email?.Trim(),
            City = city?.Trim(),
            Product = product?.Trim(),
            Vehicles = vehicles ?? 0,
            Message = message?.Trim(),
        };
        _db.ContactSubmissions.Add(submission);
        await _db.SaveChangesAsync();

        return Json(new { success = true, message = "Thank you! We will call you back within 24 hours." });
    }
}
