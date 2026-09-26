using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class BlogPost
{
    public int Id { get; set; }

    [Required, MaxLength(200)]
    public string Title { get; set; } = string.Empty;

    [Required, MaxLength(200)]
    public string Slug { get; set; } = string.Empty;

    [MaxLength(500)]
    public string? Excerpt { get; set; }

    public string ContentHtml { get; set; } = string.Empty;

    public string? FeaturedImagePath { get; set; }

    [MaxLength(120)]
    public string Author { get; set; } = "GPS Clinic Team";

    public bool IsPublished { get; set; } = true;
    public DateTime PublishedAt { get; set; } = DateTime.UtcNow;
    public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;
}
