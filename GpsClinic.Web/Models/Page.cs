using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

/// <summary>Generic editable content page: About, Terms, Privacy, Industries, etc.</summary>
public class Page
{
    public int Id { get; set; }

    [Required, MaxLength(160)]
    public string Title { get; set; } = string.Empty;

    [Required, MaxLength(160)]
    public string Slug { get; set; } = string.Empty;

    [MaxLength(300)]
    public string? Subtitle { get; set; }

    public string ContentHtml { get; set; } = string.Empty;

    [MaxLength(300)]
    public string? MetaDescription { get; set; }

    public DateTime UpdatedAt { get; set; } = DateTime.UtcNow;
}
