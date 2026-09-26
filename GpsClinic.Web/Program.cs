using GpsClinic.Web.Data;
using GpsClinic.Web.Data.Seed;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;

var builder = WebApplication.CreateBuilder(args);

// ─── Database ───────────────────────────────────────────────────────────────
// Dev/prototype: SQLite (file-based, zero setup). Production (BigRock/Plesk):
// set ConnectionStrings:SqlServer and Database:Provider=SqlServer in config to
// switch providers without touching application code.
var dbProvider = builder.Configuration["Database:Provider"] ?? "Sqlite";
builder.Services.AddDbContext<ApplicationDbContext>(options =>
{
    if (dbProvider.Equals("SqlServer", StringComparison.OrdinalIgnoreCase))
    {
        options.UseSqlServer(builder.Configuration.GetConnectionString("SqlServer"));
    }
    else
    {
        var sqlitePath = builder.Configuration.GetConnectionString("Sqlite") ?? "Data Source=gpsclinic.db";
        options.UseSqlite(sqlitePath);
    }
});

// ─── Identity (admin login) ─────────────────────────────────────────────────
builder.Services.AddIdentity<ApplicationUser, IdentityRole>(options =>
{
    options.Password.RequireNonAlphanumeric = false;
    options.Password.RequiredLength = 8;
    options.SignIn.RequireConfirmedAccount = false;
})
    .AddEntityFrameworkStores<ApplicationDbContext>()
    .AddDefaultTokenProviders();

builder.Services.ConfigureApplicationCookie(options =>
{
    options.LoginPath = "/admin/login";
    options.AccessDeniedPath = "/admin/login";
    options.Cookie.Name = "GpsClinicAdminAuth";
});

builder.Services.AddControllersWithViews();

var app = builder.Build();

// ─── Migrate + seed on startup ──────────────────────────────────────────────
using (var scope = app.Services.CreateScope())
{
    var db = scope.ServiceProvider.GetRequiredService<ApplicationDbContext>();
    var userManager = scope.ServiceProvider.GetRequiredService<UserManager<ApplicationUser>>();
    var roleManager = scope.ServiceProvider.GetRequiredService<RoleManager<IdentityRole>>();
    await DbSeeder.SeedAsync(db, userManager, roleManager);
}

// Render terminates SSL at the edge and forwards plain HTTP — trust the
// forwarded proto so redirects/links don't loop (same fix as the old WP app).
app.Use((context, next) =>
{
    if (context.Request.Headers["X-Forwarded-Proto"] == "https")
        context.Request.Scheme = "https";
    return next();
});

if (!app.Environment.IsDevelopment())
{
    app.UseExceptionHandler("/Home/Error");
    app.UseHsts();
}

app.UseStaticFiles();

app.UseRouting();

app.UseAuthentication();
app.UseAuthorization();

app.MapControllerRoute(
    name: "areas",
    pattern: "{area:exists}/{controller=Dashboard}/{action=Index}/{id?}");

app.MapControllerRoute(
    name: "default",
    pattern: "{controller=Home}/{action=Index}/{id?}");

app.Run();
