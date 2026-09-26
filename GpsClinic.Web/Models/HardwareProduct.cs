using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class HardwareProduct
{
    public int Id { get; set; }

    [Required, MaxLength(160)]
    public string Title { get; set; } = string.Empty;

    [Required, MaxLength(160)]
    public string Slug { get; set; } = string.Empty;

    [MaxLength(300)]
    public string? Tagline { get; set; }

    [MaxLength(500)]
    public string? Excerpt { get; set; }

    public string? ContentHtml { get; set; }

    /// <summary>Comma-separated tags, e.g. "Cars & SUVs, Bikes & Scooters"</summary>
    public string? Tags { get; set; }

    /// <summary>Comma-separated feature chips shown in the orange band on the detail page.</summary>
    public string? BandItems { get; set; }

    /// <summary>Key into the shared icon set (video, bell, lock, pin, map, ...)</summary>
    public string IconKey { get; set; } = "gps";

    public string? HeroImagePath { get; set; }
    public string? CardImagePath { get; set; }

    public int SortOrder { get; set; }
    public bool IsPublished { get; set; } = true;

    public DateTime CreatedAt { get; set; } = DateTime.UtcNow;
    public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;
}
