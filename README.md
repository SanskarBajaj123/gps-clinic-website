# GPS Clinic — Website

GPS tracking solutions provider based in Maharashtra, India. This repository contains the WordPress-based website with a fully custom theme built for the India market.

## Tech Stack

- **CMS:** WordPress 6.x
- **Database:** SQLite via [sqlite-database-integration](https://wordpress.org/plugins/sqlite-database-integration/) plugin (no MySQL required)
- **PHP:** 8.3+
- **Theme:** Custom — `wp-content/themes/gps-clinic/`
- **Hosting:** Vercel (PHP runtime)

## Local Development

### Prerequisites

- PHP 8.1+
- No database server required (SQLite is bundled)

### Setup

```bash
# Clone the repo
git clone <repo-url>
cd gps-clinic

# Copy and configure wp-config
cp wp-config.php.example wp-config.php
# Edit wp-config.php — set WP_HOME, WP_SITEURL, and security keys

# Start the local server
php -S localhost:8080 router.php
```

The site will be available at `http://localhost:8080`.

### Windows

Double-click `start-wp-local.bat` (starts PHP built-in server on port 8080).

## Theme Structure

```
wp-content/themes/gps-clinic/
├── assets/
│   ├── css/main.css        # All styles
│   ├── js/main.js          # Client-side scripts
│   └── images/             # Theme images & logo
├── inc/
│   └── custom-post-types.php   # Hardware & Solution CPTs
├── template-parts/
│   └── cta-band.php        # Reusable CTA section
├── functions.php            # Theme setup, helpers, hooks
├── front-page.php           # Home page
├── archive-hardware.php     # Hardware listing
├── archive-solution.php     # Software solutions listing
├── single-hardware.php      # Individual hardware page
├── single-solution.php      # Individual solution page
├── page-about-us.php        # About page
├── page-contact.php         # Contact page
├── page-industries.php      # Industries page
├── page-faq.php             # FAQ page
└── style.css                # Theme declaration header
```

## Custom Post Types

| CPT | Purpose |
|-----|---------|
| `hardware` | GPS devices and hardware products (7+ models) |
| `solution` | Software solutions for different industries (13 solutions) |

## Deployment on Vercel

1. Push this repo to GitHub
2. Import the project in [Vercel](https://vercel.com)
3. Vercel auto-detects `vercel.json` and uses the PHP runtime
4. Set environment variables for `WP_HOME`, `WP_SITEURL`, and database credentials in the Vercel dashboard

> **Note:** WordPress on Vercel's serverless PHP runtime works for read-heavy sites. For write operations (admin, forms, file uploads) a persistent database (PlanetScale, Supabase, or standard MySQL host) is recommended over SQLite.

## Design Tokens

| Token | Value | Use |
|-------|-------|-----|
| `--navy` | `#0B1D35` | Primary dark background |
| `--orange` | `#F26419` | Primary accent / CTA |
| `--teal` | `#00A49A` | Secondary accent |
| `--bg` | `#F3F6FA` | Light section background |

## Industries Served

Schools, logistics, healthcare, government, construction, ambulance services, mining, agriculture, waste management, and 8+ more across Maharashtra.
