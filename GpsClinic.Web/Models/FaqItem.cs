using System.ComponentModel.DataAnnotations;

namespace GpsClinic.Web.Models;

public class FaqItem
{
    public int Id { get; set; }

    public int FaqCategoryId { get; set; }
    public FaqCategory? FaqCategory { get; set; }

    [Required, MaxLength(300)]
    public string Question { get; set; } = string.Empty;

    [Required]
    public string Answer { get; set; } = string.Empty;

    public int SortOrder { get; set; }
}
