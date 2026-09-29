using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

/// <summary>
/// Uploaded image bytes stored in the database instead of the web server's disk.
/// Render's free-tier disk is ephemeral and wipes on every restart/redeploy, so a
/// path under wwwroot/uploads would silently 404 after the next deploy even though
/// the referencing HardwareProduct/SolutionProduct row still points at it.
/// </summary>
public class MediaFile
{
    [Key, MaxLength(32)]
    public string Id { get; set; } = Guid.NewGuid().ToString("N");

    [MaxLength(100)]
    public string ContentType { get; set; } = "application/octet-stream";

    public byte[] Data { get; set; } = Array.Empty<byte>();

    public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
}
