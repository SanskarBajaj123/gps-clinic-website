using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class Industry
{
    public int Id { get; set; }

    [Required, MaxLength(160)]
    public string Name { get; set; } = string.Empty;

    [Required, MaxLength(160)]
    public string Slug { get; set; } = string.Empty;

    [MaxLength(200)]
    public string? Tagline { get; set; }

    public string? Description { get; set; }

    /// <summary>Newline-separated bullet features shown on the industries page.</summary>
    public string? Features { get; set; }

    public string IconKey { get; set; } = "logistics";

    public int SortOrder { get; set; }
    public bool ShowOnHome { get; set; }
}
