using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;

namespace GpsClinic.Web.Areas.Admin.Controllers;

public class MediaController : AdminControllerBase
{
    private static readonly HashSet<string> AllowedExtensions = new(StringComparer.OrdinalIgnoreCase) { ".jpg", ".jpeg", ".png", ".webp", ".svg", ".gif" };
    private static readonly Dictionary<string, string> ContentTypes = new(StringComparer.OrdinalIgnoreCase)
    {
        [".jpg"] = "image/jpeg",
        [".jpeg"] = "image/jpeg",
        [".png"] = "image/png",
        [".webp"] = "image/webp",
        [".svg"] = "image/svg+xml",
        [".gif"] = "image/gif",
    };

    private readonly ApplicationDbContext _db;
    public MediaController(ApplicationDbContext db) => _db = db;

    // Stored in the database (not wwwroot/uploads) because Render's free-tier disk
    // is ephemeral and wipes on every restart/redeploy - a filesystem path would
    // silently 404 after the next deploy even though the DB row still referenced it.
    [HttpPost("upload")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Upload(IFormFile file, string folder = "general")
    {
        if (file == null || file.Length == 0)
            return Json(new { success = false, message = "No file received." });

        var ext = Path.GetExtension(file.FileName);
        if (!AllowedExtensions.Contains(ext))
            return Json(new { success = false, message = "Unsupported file type." });

        using var ms = new MemoryStream();
        await file.CopyToAsync(ms);

        var media = new MediaFile
        {
            ContentType = ContentTypes.TryGetValue(ext, out var ct) ? ct : "application/octet-stream",
            Data = ms.ToArray(),
        };
        _db.MediaFiles.Add(media);
        await _db.SaveChangesAsync();

        return Json(new { success = true, url = $"/media/{media.Id}" });
    }
}
