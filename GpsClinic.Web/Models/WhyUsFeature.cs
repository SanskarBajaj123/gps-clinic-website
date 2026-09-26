using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class WhyUsFeature
{
    public int Id { get; set; }

    public string IconKey { get; set; } = "gps";

    [Required, MaxLength(160)]
    public string Title { get; set; } = string.Empty;

    [Required, MaxLength(400)]
    public string Description { get; set; } = string.Empty;

    public int SortOrder { get; set; }
}
