using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Area("Admin")]
[Authorize]
[Route("admin/[controller]")]
public abstract class AdminControllerBase : Controller
{
    /// <summary>True when the request came from an htmx panel swap (not a full page load).</summary>
    protected bool IsHtmx => Request.Headers.ContainsKey("HX-Request");

    /// <summary>
    /// htmx swap -> just the partial (no layout). Direct navigation/refresh -> the same partial
    /// rendered as a full View, which picks up _ViewStart's _AdminLayout automatically, so every
    /// screen works both ways.
    /// </summary>
    protected IActionResult RenderPartialOrPage(string partialName, object? model)
    {
        if (IsHtmx) return PartialView(partialName, model);
        return View(partialName, model);
    }
}
