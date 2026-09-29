using GpsClinic.Web.Data;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Controllers;

/// <summary>Serves images uploaded through the admin panel and stored in the database.</summary>
[Route("media")]
public class MediaFilesController : Controller
{
    private readonly ApplicationDbContext _db;
    public MediaFilesController(ApplicationDbContext db) => _db = db;

    [HttpGet("{id}")]
    [ResponseCache(Duration = 31536000, Location = ResponseCacheLocation.Any)]
    public async Task<IActionResult> Get(string id)
    {
        var media = await _db.MediaFiles.AsNoTracking().FirstOrDefaultAsync(m => m.Id == id);
        if (media == null) return NotFound();
        return File(media.Data, media.ContentType);
    }
}
