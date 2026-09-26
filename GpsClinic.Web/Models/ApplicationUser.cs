using Microsoft.AspNetCore.Identity;

namespace GpsClinic.Web.Models;

public class ApplicationUser : IdentityUser
{
    public string? DisplayName { get; set; }
}
