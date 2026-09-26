using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class ContactSubmission
{
    public int Id { get; set; }

    [Required, MaxLength(120)]
    public string Name { get; set; } = string.Empty;

    [Required, MaxLength(20)]
    public string Mobile { get; set; } = string.Empty;

    [MaxLength(160)]
    public string? Email { get; set; }

    [MaxLength(120)]
    public string? City { get; set; }

    [MaxLength(160)]
    public string? Product { get; set; }

    public int Vehicles { get; set; }

    public string? Message { get; set; }

    public DateTime SubmittedAt { get; set; } = DateTime.UtcNow;

    public bool IsRead { get; set; }
}
