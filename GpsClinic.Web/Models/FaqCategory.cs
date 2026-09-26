using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class FaqCategory
{
    public int Id { get; set; }

    [Required, MaxLength(160)]
    public string Name { get; set; } = string.Empty;

    public int SortOrder { get; set; }

    public List<FaqItem> Items { get; set; } = new();
}
