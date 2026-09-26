using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class Testimonial
{
    public int Id { get; set; }

    [Required, MaxLength(120)]
    public string Name { get; set; } = string.Empty;

    [MaxLength(160)]
    public string? Role { get; set; }

    [Required]
    public string Quote { get; set; } = string.Empty;

    public int Rating { get; set; } = 5;

    public int SortOrder { get; set; }
}
