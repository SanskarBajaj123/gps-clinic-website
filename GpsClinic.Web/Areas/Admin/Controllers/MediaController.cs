using Microsoft.AspNetCore.Mvc;

namespace GpsClinic.Web.Areas.Admin.Controllers;

public class MediaController : AdminControllerBase
{
    private readonly IWebHostEnvironment _env;
    private static readonly HashSet<string> AllowedExtensions = new(StringComparer.OrdinalIgnoreCase) { ".jpg", ".jpeg", ".png", ".webp", ".svg", ".gif" };

    public MediaController(IWebHostEnvironment env) => _env = env;

    [HttpPost("upload")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> Upload(IFormFile file, string folder = "general")
    {
        if (file == null || file.Length == 0)
            return Json(new { success = false, message = "No file received." });

        var ext = Path.GetExtension(file.FileName);
        if (!AllowedExtensions.Contains(ext))
            return Json(new { success = false, message = "Unsupported file type." });

        folder = folder switch { "hardware" or "solutions" or "blog" => folder, _ => "general" };

        var fileName = $"{Guid.NewGuid():N}{ext}";
        var dir = Path.Combine(_env.WebRootPath, "uploads", folder);
        Directory.CreateDirectory(dir);
        var fullPath = Path.Combine(dir, fileName);

        using (var stream = new FileStream(fullPath, FileMode.Create))
            await file.CopyToAsync(stream);

        var url = $"/uploads/{folder}/{fileName}";
        return Json(new { success = true, url });
    }
}
