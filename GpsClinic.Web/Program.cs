using GpsClinic.Web.Data;
using GpsClinic.Web.Data.Seed;
using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;

var builder = WebApplication.CreateBuilder(args);

// ─── Database ───────────────────────────────────────────────────────────────
// Dev/prototype: SQLite (file-based, zero setup). Render: Postgres (persists
// across restarts/spin-downs, unlike the web service's own ephemeral disk).
// Production (BigRock/Plesk): set ConnectionStrings:SqlServer and
// Database:Provider=SqlServer to switch again without touching this code.
var dbProvider = builder.Configuration["Database:Provider"] ?? "Sqlite";
builder.Services.AddDbContext<ApplicationDbContext>(options =>
{
    if (dbProvider.Equals("SqlServer", StringComparison.OrdinalIgnoreCase))
    {
        options.UseSqlServer(builder.Configuration.GetConnectionString("SqlServer"));
    }
    else if (dbProvider.Equals("Postgres", StringComparison.OrdinalIgnoreCase))
    {
        var databaseUrl = builder.Configuration["DATABASE_URL"]
            ?? throw new InvalidOperationException("Database:Provider is Postgres but DATABASE_URL is not set.");
        options.UseNpgsql(BuildNpgsqlConnectionString(databaseUrl));
    }
    else
    {
        var sqlitePath = builder.Configuration.GetConnectionString("Sqlite") ?? "Data Source=gpsclinic.db";
        options.UseSqlite(sqlitePath);
    }
});

// Render's DATABASE_URL is a "postgresql://user:pass@host/db" URI; Npgsql wants
// a keyword connection string, so convert it once here.
static string BuildNpgsqlConnectionString(string databaseUrl)
{
    var uri = new Uri(databaseUrl);
    var userInfo = uri.UserInfo.Split(':', 2);
    var csb = new Npgsql.NpgsqlConnectionStringBuilder
    {
        Host = uri.Host,
        Port = uri.IsDefaultPort ? 5432 : uri.Port,
        Username = Uri.UnescapeDataString(userInfo[0]),
        Password = userInfo.Length > 1 ? Uri.UnescapeDataString(userInfo[1]) : string.Empty,
        Database = uri.AbsolutePath.TrimStart('/'),
        SslMode = Npgsql.SslMode.Prefer,
    };
    return csb.ConnectionString;
}

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
