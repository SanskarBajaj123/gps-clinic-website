using GpsClinic.Web.Data;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Areas.Admin.Controllers;

[Route("admin/faq")]
public class FaqController : AdminControllerBase
{
    private readonly ApplicationDbContext _db;
    public FaqController(ApplicationDbContext db) => _db = db;

    [HttpGet("")]
    public async Task<IActionResult> Index()
    {
        ViewData["Title"] = "FAQ";
        var categories = await _db.FaqCategories.Include(c => c.Items).OrderBy(c => c.SortOrder).ToListAsync();
        return RenderPartialOrPage("_List", categories);
    }

    [HttpPost("category/create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> CreateCategory(string name)
    {
        if (!string.IsNullOrWhiteSpace(name))
        {
            var maxOrder = await _db.FaqCategories.Select(c => (int?)c.SortOrder).MaxAsync() ?? 0;
            _db.FaqCategories.Add(new FaqCategory { Name = name.Trim(), SortOrder = maxOrder + 1 });
            await _db.SaveChangesAsync();
        }
        return await Index();
    }

    [HttpPost("category/{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> DeleteCategory(int id)
    {
        var cat = await _db.FaqCategories.FindAsync(id);
        if (cat != null) { _db.FaqCategories.Remove(cat); await _db.SaveChangesAsync(); }
        return await Index();
    }

    [HttpPost("category/{categoryId:int}/items/create")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> CreateItem(int categoryId, string question, string answer)
    {
        if (!string.IsNullOrWhiteSpace(question) && !string.IsNullOrWhiteSpace(answer))
        {
            var maxOrder = await _db.FaqItems.Where(i => i.FaqCategoryId == categoryId).Select(i => (int?)i.SortOrder).MaxAsync() ?? 0;
            _db.FaqItems.Add(new FaqItem { FaqCategoryId = categoryId, Question = question.Trim(), Answer = answer.Trim(), SortOrder = maxOrder + 1 });
            await _db.SaveChangesAsync();
        }
        return await Index();
    }

    [HttpPost("items/{id:int}/edit")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> EditItem(int id, string question, string answer)
    {
        var item = await _db.FaqItems.FindAsync(id);
        if (item != null && !string.IsNullOrWhiteSpace(question) && !string.IsNullOrWhiteSpace(answer))
        {
            item.Question = question.Trim();
            item.Answer = answer.Trim();
            await _db.SaveChangesAsync();
        }
        return await Index();
    }

    [HttpPost("items/{id:int}/delete")]
    [ValidateAntiForgeryToken]
    public async Task<IActionResult> DeleteItem(int id)
    {
        var item = await _db.FaqItems.FindAsync(id);
        if (item != null) { _db.FaqItems.Remove(item); await _db.SaveChangesAsync(); }
        return await Index();
    }
}
