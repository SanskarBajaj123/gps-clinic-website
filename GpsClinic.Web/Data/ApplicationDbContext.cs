using GpsClinic.Web.Models;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore;

namespace GpsClinic.Web.Data;

public class ApplicationDbContext : IdentityDbContext<ApplicationUser>
{
    public ApplicationDbContext(DbContextOptions<ApplicationDbContext> options) : base(options) { }

    public DbSet<HardwareProduct> HardwareProducts => Set<HardwareProduct>();
    public DbSet<SolutionProduct> Solutions => Set<SolutionProduct>();
    public DbSet<BlogPost> BlogPosts => Set<BlogPost>();
    public DbSet<Page> Pages => Set<Page>();
    public DbSet<FaqCategory> FaqCategories => Set<FaqCategory>();
    public DbSet<FaqItem> FaqItems => Set<FaqItem>();
    public DbSet<WhyUsFeature> WhyUsFeatures => Set<WhyUsFeature>();
    public DbSet<Testimonial> Testimonials => Set<Testimonial>();
    public DbSet<SiteSetting> SiteSettings => Set<SiteSetting>();
    public DbSet<ContactSubmission> ContactSubmissions => Set<ContactSubmission>();
    public DbSet<Industry> Industries => Set<Industry>();

    protected override void OnModelCreating(ModelBuilder builder)
    {
        base.OnModelCreating(builder);

        builder.Entity<HardwareProduct>().HasIndex(x => x.Slug).IsUnique();
        builder.Entity<SolutionProduct>().HasIndex(x => x.Slug).IsUnique();
        builder.Entity<BlogPost>().HasIndex(x => x.Slug).IsUnique();
        builder.Entity<Page>().HasIndex(x => x.Slug).IsUnique();
        builder.Entity<Industry>().HasIndex(x => x.Slug).IsUnique();

        builder.Entity<FaqCategory>()
            .HasMany(c => c.Items)
            .WithOne(i => i.FaqCategory)
            .HasForeignKey(i => i.FaqCategoryId)
            .OnDelete(DeleteBehavior.Cascade);
    }
}
