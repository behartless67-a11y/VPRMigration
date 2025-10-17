# Virginia Policy Review WordPress Site - Complete Handoff Documentation

## Executive Summary

This is a **custom WordPress website** for the **Virginia Policy Review**, a student-run policy journal at the University of Virginia founded in 2009. The site features a sophisticated Cornell University-inspired magazine layout with custom post types, automated content migration tools, and a carefully designed UVA-branded theme.

**Project Status:** ✅ **LIVE AND DEPLOYED ON BLUEHOST**

**Live Site:** https://keq.lpf.mybluehost.me/
**WordPress Admin:** https://keq.lpf.mybluehost.me/wp-admin
**Hosting:** Bluehost cPanel

---

## Table of Contents

1. [What This Site Is](#what-this-site-is)
2. [Technical Architecture](#technical-architecture)
3. [Bluehost Hosting Details](#bluehost-hosting-details) ⭐ **NEW**
4. [File Structure & Organization](#file-structure--organization)
5. [Theme Design System](#theme-design-system)
6. [Content Types & Management](#content-types--management)
7. [Database Configuration](#database-configuration)
8. [Utility Scripts Reference](#utility-scripts-reference)
9. [Development Workflow](#development-workflow)
10. [Deployment Guide](#deployment-guide)
11. [Troubleshooting & Common Issues](#troubleshooting--common-issues)
12. [Maintenance Checklist](#maintenance-checklist)

---

## What This Site Is

### Organization Background
- **Name:** Virginia Policy Review (VPR)
- **Founded:** 2009
- **Affiliation:** University of Virginia (independent student organization)
- **Mission:** Publish work that impacts wider policy dialogue through multiple journalistic mediums

### Content Channels

#### 1. The Third Rail (Blog/Articles)
- Student-written policy analysis and commentary
- 9 categories: Domestic, International, Economics, Education, Environment, Healthcare, Social Policy, Security, Technology
- Search and filter functionality
- Auto-categorization based on keywords

#### 2. Academical Podcast
- Policy leader interviews
- 8+ episodes featuring high-profile guests including:
  - Matthew Olsen (former NCTC Director)
  - Daniel Carey (VA Secretary of Health)
  - Ned Price (National Security Action)
  - Chris Lu (former Deputy Secretary of Labor)
- Hosted on Anchor FM with embedded players

#### 3. Journal Issues
- Annual print + digital journal publication
- Current: Volume XVI - "Policy for the Public Good"
- Downloadable PDFs (9.8 MB)
- Archived by year

#### 4. About/Staff Pages
- Staff profiles with photo slideshow
- Mission statement
- University policies and disclaimers

---

## Technical Architecture

### Core Technology Stack

| Component | Technology | Version/Details |
|-----------|-----------|-----------------|
| **CMS** | WordPress | Full installation |
| **Theme Type** | Custom PHP | No framework dependencies |
| **Frontend** | HTML5/CSS3/Vanilla JS | No build process |
| **Database** | MySQL | `vprjournal` database |
| **Version Control** | Git | GitHub repository |
| **Local Development** | XAMPP | Apache + MySQL |
| **Hosting** | **Bluehost (LIVE)** | https://keq.lpf.mybluehost.me/ |

### Key Specifications
- **Custom Post Types:** 3 (journal_issue, podcast_episode, team_member)
- **Custom Taxonomies:** 2 (article_category, journal_year)
- **PHP Files:** 40+ templates and utilities
- **Total Code:** ~5,500 lines (PHP), 553 lines (CSS), 222 lines (JS)
- **Images:** 26+ assets (3.3 MB lawn.jpg, 9.8 MB journal PDF)

---

## Bluehost Hosting Details

### Live Site Information

**Primary URLs:**
- **Live Site:** https://keq.lpf.mybluehost.me/
- **WordPress Admin:** https://keq.lpf.mybluehost.me/wp-admin
- **cPanel:** Access via Bluehost account dashboard
- **phpMyAdmin:** Available through cPanel → Databases section

**Site Status:**
- ✅ **LIVE AND OPERATIONAL**
- ✅ SSL Certificate installed (HTTPS enabled)
- ✅ 105+ articles migrated from old site
- ✅ All custom post types active (Journal Issues, Podcast Episodes, Team Members)
- ✅ Cornell-style theme fully functional
- ✅ Git deployment workflow configured

### Accessing Bluehost

**cPanel Access:**
1. Log into Bluehost account at: https://my.bluehost.com/
2. Navigate to "Advanced" or "cPanel"
3. From cPanel, you can access:
   - **File Manager** - Browse and edit files directly
   - **phpMyAdmin** - Database management
   - **MySQL Databases** - Create/manage databases and users
   - **Error Logs** - View PHP and Apache error logs
   - **Softaculous** - WordPress installer (if needed for new sites)
   - **Terminal** - SSH access (if enabled)

**FTP Access:**
- **Host:** ftp.keq.lpf.mybluehost.me (or use IP address)
- **Username:** Your Bluehost cPanel username
- **Password:** Your Bluehost cPanel password
- **Port:** 21 (FTP) or 22 (SFTP - more secure)
- **Recommended Client:** FileZilla, WinSCP, or Cyberduck

**SSH Access (if enabled):**
```bash
ssh username@keq.lpf.mybluehost.me
# Or use IP address:
ssh username@[IP_ADDRESS]
```

**Note:** SSH may have timeout issues on Bluehost shared hosting. If SSH is unreliable, use the Git deployment script instead.

### File Locations on Bluehost Server

**WordPress Installation:**
```
/home/[username]/public_html/
├── wp-admin/
├── wp-content/
│   ├── themes/
│   │   └── virginia-policy-review/    ← Theme files here
│   ├── plugins/
│   └── uploads/                        ← Media library
├── wp-includes/
├── wp-config.php                       ← Database credentials
├── .htaccess                           ← URL rewrite rules
└── index.php
```

**Theme Directory:**
```
/home/[username]/public_html/wp-content/themes/virginia-policy-review/
```

**Utility Scripts Location:**
```
/home/[username]/public_html/
├── deploy-from-github.php              ← Git deployment
├── set-live-featured-images.php        ← Image assignment
├── fix-article-titles.php              ← Title cleanup
├── categorize-articles.php             ← Auto-categorization
├── create-pages.php                    ← Page creation
└── flush-rewrite-rules.php             ← Permalink fix
```

### Database Configuration on Bluehost

**Database Details:**
- **Database Name:** Check wp-config.php on server (likely: `username_vprjournal`)
- **Database User:** Check wp-config.php on server (likely: `username_vprwp`)
- **Database Host:** `localhost` (standard for Bluehost)
- **Table Prefix:** `wp_` (WordPress default)

**Accessing Database:**
1. Log into cPanel
2. Navigate to phpMyAdmin
3. Select the database (look for name with "vpr" or "journal")
4. Browse tables: wp_posts, wp_postmeta, wp_options, etc.

**Database Backup:**
```
Method 1: cPanel Backup
- cPanel → Backup → Download Database Backup
- Saves .sql.gz file

Method 2: phpMyAdmin
- Select database → Export tab
- Quick export → SQL format → Go
- Save .sql file

Method 3: SSH/Command Line (if SSH enabled)
ssh username@host
mysqldump -u [db_user] -p [db_name] > backup.sql
```

### Git Deployment on Bluehost

**How It Works:**

The site uses a custom PHP script (`deploy-from-github.php`) to pull latest code from GitHub without requiring SSH access.

**Deployment Script Location:**
```
https://keq.lpf.mybluehost.me/deploy-from-github.php
```

**Script Functionality:**
```php
// Executes on server:
cd /home/[username]/public_html/wp-content/themes/virginia-policy-review
git pull origin master
```

**Usage Workflow:**
1. Make changes locally in XAMPP
2. Test at http://localhost/vpr/
3. Copy files back to project directory
4. Commit and push:
   ```bash
   git add .
   git commit -m "Update header navigation"
   git push origin master
   ```
5. Visit deployment script:
   ```
   https://keq.lpf.mybluehost.me/deploy-from-github.php
   ```
6. View deployment log (success/errors)
7. Refresh live site to see changes

**Advantages of This Method:**
- ✅ No SSH required (Bluehost SSH can timeout)
- ✅ Simple one-click deployment
- ✅ Shows real-time output/errors
- ✅ Version controlled via Git
- ✅ Easy rollback (just `git revert` and redeploy)

**Security Consideration:**
- The script is publicly accessible
- Consider adding password protection or secret key
- Or delete after major deployments are complete

### Bluehost-Specific Considerations

#### 1. SSH Timeout Issues
**Problem:** Bluehost shared hosting may have SSH connection timeouts

**Solution:** Use the `deploy-from-github.php` script instead of direct SSH git pulls

#### 2. PHP Version
**Check Current Version:**
- cPanel → MultiPHP Manager
- Should be PHP 7.4 or higher
- WordPress recommends PHP 8.0+

**To Change PHP Version:**
- cPanel → MultiPHP Manager
- Select domain
- Choose PHP version
- Apply

#### 3. Memory Limits
**Current Limits:**
- Default: 128M (usually sufficient)
- If needed, increase in wp-config.php:
```php
define('WP_MEMORY_LIMIT', '256M');
define('WP_MAX_MEMORY_LIMIT', '512M');
```

#### 4. File Permissions
**Standard Permissions:**
- Directories: `755` (rwxr-xr-x)
- Files: `644` (rw-r--r--)
- wp-config.php: `600` or `640` (more restrictive)

**Fix Permissions via SSH:**
```bash
find /home/username/public_html -type d -exec chmod 755 {} \;
find /home/username/public_html -type f -exec chmod 644 {} \;
chmod 600 /home/username/public_html/wp-config.php
```

**Fix Permissions via File Manager:**
- cPanel → File Manager
- Select files/folders → Right-click → Permissions
- Set appropriate numbers

#### 5. .htaccess Configuration
**Location:** `/home/username/public_html/.htaccess`

**Standard WordPress .htaccess:**
```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress

# Force HTTPS
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

**If permalinks break:**
- Visit: https://keq.lpf.mybluehost.me/wp-admin/options-permalink.php
- Click "Save Changes" without changing anything
- This regenerates .htaccess

#### 6. SSL Certificate
**Status:** ✅ Installed and active

**Free SSL via Bluehost:**
- Bluehost includes free SSL certificates
- Auto-renews every 90 days
- Verify at: cPanel → SSL/TLS Status

**Force HTTPS:**
Already configured (see .htaccess above)

#### 7. Email Configuration
**Bluehost Email:**
- Create email accounts: cPanel → Email Accounts
- Example: contact@virginiapolicyreview.org
- Configure SMTP for WordPress contact forms

**WordPress Email Settings:**
- Use plugin: WP Mail SMTP or Post SMTP
- SMTP Host: mail.yourdomain.com
- Port: 465 (SSL) or 587 (TLS)
- Authentication: Yes, use email account credentials

#### 8. Cron Jobs
**WordPress Cron:**
- Runs on page loads by default
- For busy sites, disable WP-Cron and use real cron

**Setup Real Cron on Bluehost:**
- cPanel → Cron Jobs
- Add:
  ```
  */15 * * * * wget -q -O - https://keq.lpf.mybluehost.me/wp-cron.php?doing_wp_cron >/dev/null 2>&1
  ```
- Runs every 15 minutes

- Add to wp-config.php:
  ```php
  define('DISABLE_WP_CRON', true);
  ```

#### 9. Backups on Bluehost
**Automatic Backups:**
- Bluehost includes backup service
- Access: cPanel → Backup → Restore

**Manual Backups:**
- **Full Account Backup:** cPanel → Backup → Download Full Account Backup
- **Database Only:** phpMyAdmin → Export
- **Files Only:** File Manager → Compress → Download

**Recommended Backup Schedule:**
- Daily: Database (via plugin or cPanel)
- Weekly: Full site backup
- Before major updates: Manual snapshot

**Backup Plugins:**
- UpdraftPlus (free/premium)
- BackupBuddy (premium)
- Duplicator (free/premium)

#### 10. Error Logs
**Viewing Error Logs:**
- cPanel → Metrics → Errors
- Shows recent Apache and PHP errors
- Useful for debugging 500 errors, PHP warnings

**Enable WordPress Debug Log:**
Edit wp-config.php:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);
```

View log at: `/wp-content/debug.log`

### Performance Optimization on Bluehost

**Caching:**
- Install plugin: WP Super Cache or W3 Total Cache
- Configure browser caching in .htaccess
- Use Bluehost's CDN (CloudFlare integration)

**Image Optimization:**
- Plugin: Smush or ShortPixel
- Compress images before upload
- Use WebP format when possible

**Database Optimization:**
- Plugin: WP-Optimize
- Clean up post revisions, spam comments, transients
- Run monthly

**Content Delivery:**
- Enable Bluehost's CloudFlare CDN
- cPanel → CloudFlare
- Free tier available

### Monitoring & Analytics

**Google Analytics:**
- Add tracking code via plugin: MonsterInsights or GA Google Analytics
- Or add manually to header.php (before </head>)

**Uptime Monitoring:**
- UptimeRobot (free): https://uptimerobot.com/
- Monitors site availability
- Email alerts if site goes down

**Performance Monitoring:**
- GTmetrix: https://gtmetrix.com/
- Test page load speeds
- Receive weekly reports

---

## File Structure & Organization

### Project Directory Layout

```
VPRWordpress/
├── .git/                           # Git repository
├── .claude/                        # AI assistant configuration
│   └── settings.local.json
├── wordpress/                      # Full WordPress installation
│   ├── wp-admin/
│   ├── wp-content/
│   │   ├── themes/
│   │   ├── plugins/
│   │   └── uploads/
│   ├── wp-includes/
│   └── wp-config.php              # Database credentials
├── VPRMigration/                  # Legacy backup files
│   └── wordpress-theme/           # OLD theme files (DO NOT USE)
├── images/                        # All site images
│   ├── lawn.jpg                   # 3.3 MB UVA Lawn background
│   ├── sudan.jpg                  # Article thumbnails
│   ├── syria.jpg
│   ├── undersea-cable.jpg
│   ├── currentissue.png           # Journal cover
│   ├── sarah-king-executive-editor.jpg
│   ├── george-langhammer-managing-editor.jpg
│   └── [20+ other images]
├── js/                            # JavaScript files
│   ├── main.js                    # Site interactions (109 lines)
│   └── slideshow.js               # Carousel functionality (113 lines)
├── [THEME ROOT FILES]             # Active theme templates
│   ├── header.php                 # Site header with nav (6.5 KB)
│   ├── footer.php                 # Site footer (10.5 KB)
│   ├── functions.php              # Theme setup (13.2 KB, 427 lines)
│   ├── style.css                  # Main stylesheet (553 lines)
│   ├── front-page.php             # Homepage (25 KB, 822 lines)
│   ├── single.php                 # Single article (7.5 KB, 338 lines)
│   ├── index.php                  # Fallback template (15 KB)
│   ├── page-about-us.php          # About page (18 KB, 345 lines)
│   ├── page-the-third-rail.php    # Blog listing (3.4 KB)
│   ├── page-third-rail.php        # Enhanced blog (402 lines, Cornell style)
│   ├── page-academical.php        # Podcast page (15 KB, 278 lines)
│   ├── page-submissions.php       # Submissions (8.5 KB)
│   ├── page-journal-issues.php    # Archive (12 KB)
│   ├── page-contact.php           # Contact (9.1 KB)
│   └── [8+ other templates]
├── [UTILITY SCRIPTS]              # PHP management tools
│   ├── migrate-all-articles.php   # Content migration (7.5 KB)
│   ├── categorize-articles.php    # Auto-categorization (4.8 KB)
│   ├── set-featured-images.php    # Image assignment (1.4 KB)
│   ├── create-pages.php           # Page creation (2.9 KB)
│   ├── flush-rewrite-rules.php    # URL structure fix (982 bytes)
│   └── [20+ other scripts]
└── [DOCUMENTATION]
    ├── COMPUTER-SYNC-NOTES.md     # Git workflow (356 lines)
    ├── DEPLOYMENT_GUIDE.md        # Hosting setup (9.9 KB)
    └── PROJECT-HANDOFF-DOCUMENTATION.md  # This file
```

### Important File Locations

**Theme Files:** Root directory (NOT in wordpress-theme subfolder)
**WordPress Core:** `/wordpress/` directory
**Database Config:** `/wordpress/wp-config.php`
**Deployment Target:** Theme files copy to `/wordpress/wp-content/themes/virginia-policy-review/`

---

## Theme Design System

### Cornell-Style Magazine Layout

The theme is inspired by Cornell University's magazine aesthetics:

1. **Custom banner on each page** (not default WordPress header)
   - Large centered serif title (5rem font)
   - Navigation links beneath title
   - Full-width UVA Lawn background with overlay
   - Fixed positioning with fade-in effect

2. **Full-width responsive containers**
   - Max-width: 1600px for content
   - Max-width: 1200px for text-heavy sections
   - Clean serif typography throughout

3. **Floating social media icons**
   - Fixed right side of screen
   - Instagram, Facebook, Twitter, LinkedIn
   - SVG icons with hover effects

### Color Palette

```css
/* Primary Colors */
--primary-color: #232D4B;    /* UVA Blue (text, headers, accents) */
--accent-color: #E57200;     /* UVA Orange (links, highlights) */
--white: #ffffff;            /* Backgrounds */
--secondary-color: #f8f8f8;  /* Alternate sections */

/* Text Colors */
--text-primary: #232D4B;     /* Body text */
--text-secondary: #666666;   /* Muted text */
--text-light: #999999;       /* Captions, dates */

/* Utility Colors */
--border-color: #e0e0e0;     /* Borders, dividers */
```

**Color Usage:**
- Blue (#232D4B): Headers, navigation, footer, body text
- Orange (#E57200): Hover states, "Virginia" text outline, CTA buttons, active links
- Gray: Subtle backgrounds, borders, secondary text

### Typography System

**Fonts:**
- **Inter** (sans-serif): UI elements, buttons, metadata
- **Crimson Text** (serif): Headings, body text, navigation, article content

**Font Loading:**
```html
<!-- In header.php -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
```

**Typography Scale:**
```css
/* Headlines */
h1: clamp(2.5rem, 5vw, 5rem);           /* Large banner titles */
h2: clamp(1.5rem, 3vw, 2rem);           /* Section headings */
h3: clamp(1.2rem, 2.5vw, 1.5rem);       /* Subsection headings */

/* Body Text */
body: clamp(1rem, 1.5vw, 1.125rem);     /* Responsive base size */
p: 1.125rem (18px);                     /* Standard paragraph */

/* Special */
.tagline: 1.25rem;                      /* Page subtitles */
.nav-link: 1.125rem;                    /* Navigation items */
```

### Layout Components

**Container Widths:**
```css
.container { max-width: 1200px; }        /* Standard content */
.container-wide { max-width: 1600px; }   /* Wide layouts */
```

**Spacing System:**
```css
--spacing-xs: 0.5rem;    /* 8px */
--spacing-sm: 1rem;      /* 16px */
--spacing-md: 2rem;      /* 32px */
--spacing-lg: 4rem;      /* 64px */
--spacing-xl: 6rem;      /* 96px */
```

**Border Radius:**
```css
--border-radius: 8px;    /* Standard rounded corners */
```

**Transitions:**
```css
--transition: cubic-bezier(0.4, 0, 0.2, 1);  /* Smooth easing */
transition: all 0.3s var(--transition);      /* Standard animation */
```

### Responsive Breakpoints

```css
/* Mobile First Approach */
@media (max-width: 600px)  { /* Mobile phones */ }
@media (max-width: 768px)  { /* Tablets */ }
@media (max-width: 900px)  { /* Small laptops */ }
@media (max-width: 1100px) { /* Standard laptops */ }
```

**Grid Behavior:**
- **4-column grid** (desktop) → **2-column** (tablet) → **1-column** (mobile)
- Featured articles section uses CSS Grid with automatic reflow

### Animations

```css
/* Defined in style.css */
@keyframes slideInLeft {
    from { transform: translateX(-100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes slideInRight {
    from { transform: translateX(100%); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
}

@keyframes fadeInUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
```

**Animation Usage:**
- Article cards: `fadeInUp` on scroll (Intersection Observer)
- Header: Fixed positioning with shadow on scroll
- Slideshow: Automatic transitions every 5 seconds

---

## Content Types & Management

### Standard WordPress Posts

**Purpose:** The Third Rail blog articles

**Fields:**
- Title
- Content (WordPress editor)
- Featured Image (required for grid display)
- Categories (auto-assigned or manual)
- Publication Date
- Author

**Custom Meta Fields (functions.php:254-306):**
- `_vpr_featured` (checkbox): Mark article as featured for homepage slideshow
- `_vpr_author_bio` (textarea): Author biography displayed on single article page

**Categories (9 pre-defined):**
1. Domestic
2. International
3. Economics
4. Education
5. Environment
6. Healthcare
7. Social Policy
8. Security
9. Technology

### Custom Post Type: Journal Issues

**Registration:** functions.php:108-126

```php
register_post_type('journal_issue', array(
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-book-alt',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'journal-issues'),
));
```

**Fields:**
- Title (e.g., "Volume XVI - Policy for the Public Good")
- Content (journal description)
- Featured Image (journal cover)
- Custom Fields:
  - `pdf_url`: Link to PDF file
  - `publication_year`: Year published
  - `volume_number`: Volume number

**Taxonomy:** `journal_year` (for organizing by publication year)

### Custom Post Type: Podcast Episodes

**Registration:** functions.php:129-147

```php
register_post_type('podcast_episode', array(
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-microphone',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
    'rewrite' => array('slug' => 'podcast'),
));
```

**Fields:**
- Title (episode title)
- Content (episode description)
- Featured Image (guest photo or episode thumbnail)
- Custom Fields:
  - `guest_name`: Guest's name
  - `guest_title`: Guest's professional title
  - `anchor_url`: Link to episode on Anchor FM
  - `episode_number`: Episode number
  - `air_date`: Publication date

**Current Episodes (8 total):**
1. Matthew Olsen - Former Director, NCTC
2. Daniel Carey - Virginia Secretary of Health & Human Resources
3. Robert Zullo - Virginia Mercury Editor
4. Ned Price - National Security Action
5. Chris Lu - Former Deputy Secretary of Labor
6. Michael Finnegan - President, Atlantic Media
7. Kate Addleson - Sierra Club Virginia
8. Melody Barnes - UVA Democracy Initiative

### Custom Post Type: Team Members

**Registration:** functions.php:150-167

```php
register_post_type('team_member', array(
    'public' => false,        // Not public-facing
    'show_ui' => true,        // Show in admin only
    'menu_icon' => 'dashicons-groups',
    'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
));
```

**Purpose:** Staff profile management for About page

**Fields:**
- Title (staff member name)
- Content (biography)
- Featured Image (profile photo)
- Custom Fields:
  - `position`: Role (e.g., "Executive Editor")
  - `email`: Contact email
  - `class_year`: Graduation year

**Featured Staff:**
- Sarah King (Executive Editor)
- George Langhammer (Managing Editor)

### Pages with Custom Templates

WordPress pages use slug-based template matching:

| Page Title | Slug | Template File | Purpose |
|------------|------|---------------|---------|
| Home | (front page) | `front-page.php` | Homepage with slideshow + latest articles |
| About Us | `/about-us/` | `page-about-us.php` | Mission, staff, policies |
| The Third Rail | `/the-third-rail/` | `page-the-third-rail.php` | Blog listing with search/filter |
| Academical | `/academical/` | `page-academical.php` | Podcast episodes |
| Submissions | `/submissions/` | `page-submissions.php` | Submission guidelines |
| Journal Issues | `/journal-issues/` | `page-journal-issues.php` | Archive of past journals |
| Contact | `/contact/` | `page-contact.php` | Contact info + form |

**Creating Pages:**
Use `create-pages.php` utility script or manually create in WordPress admin with exact slugs.

---

## Database Configuration

### Local Development Database

**Configuration File:** `/wordpress/wp-config.php`

```php
// Local XAMPP settings
define('DB_NAME', 'vprjournal');
define('DB_USER', 'root');
define('DB_PASSWORD', '232323');
define('DB_HOST', 'localhost');
```

**Database Access:**
- **Tool:** phpMyAdmin
- **URL:** http://localhost/phpmyadmin/
- **Tables:** Standard WordPress tables (wp_posts, wp_postmeta, wp_users, etc.)

### Key Database Tables

**wp_posts** - All content (posts, pages, custom post types)
```sql
-- Check Third Rail articles
SELECT ID, post_title, post_name, post_status
FROM wp_posts
WHERE post_type='post' AND post_status='publish';

-- Check pages
SELECT ID, post_title, post_name, post_status
FROM wp_posts
WHERE post_type='page' AND post_name='the-third-rail';
```

**wp_postmeta** - Custom fields
```sql
-- Find featured articles
SELECT post_id, meta_key, meta_value
FROM wp_postmeta
WHERE meta_key='_vpr_featured' AND meta_value='1';
```

**wp_terms & wp_term_taxonomy** - Categories and taxonomies
```sql
-- View all categories
SELECT t.term_id, t.name, t.slug, tt.taxonomy
FROM wp_terms t
JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
WHERE tt.taxonomy='category';
```

### Database Backup & Export

**Export (Local):**
```bash
C:/xampp/mysql/bin/mysqldump -uroot -p232323 vprjournal > vprjournal_backup.sql
```

**Import (Hosting):**
```bash
mysql -u[username] -p[password] [database_name] < vprjournal_backup.sql
```

**Via phpMyAdmin:**
1. Select database
2. Export tab → Quick export → SQL
3. Save file
4. On new server: Import tab → Choose file → Go

### URL Updates After Deployment

**After moving to live hosting, update URLs:**

```sql
-- Update site URL
UPDATE wp_options
SET option_value = 'https://yourdomain.com'
WHERE option_name = 'siteurl' OR option_name = 'home';

-- Update post content URLs (if needed)
UPDATE wp_posts
SET post_content = REPLACE(post_content, 'http://localhost/vpr', 'https://yourdomain.com');

-- Update post GUIDs (optional)
UPDATE wp_posts
SET guid = REPLACE(guid, 'http://localhost/vpr', 'https://yourdomain.com');
```

---

## Utility Scripts Reference

### Content Migration Scripts

#### migrate-all-articles.php (7.5 KB, 216 lines)

**Purpose:** Migrate articles from old VPR website to new WordPress site

**How It Works:**
1. Fetches HTML from old site (http://www.virginiapolicyreview.org)
2. Parses 13 categories: Domestic, Economics, Education, Electoral Politics, Environment, Gun Rights, Health, International, Justice, Law, Politics, Social, Urban
3. Extracts title, date, content, category for each article
4. Creates WordPress posts with proper formatting
5. Prevents duplicates by checking existing titles
6. Auto-assigns categories

**Usage:**
```bash
# Copy to WordPress root
cp migrate-all-articles.php /xampp/htdocs/vpr/

# Visit URL once
http://localhost/vpr/migrate-all-articles.php

# DELETE IMMEDIATELY after use (security)
rm migrate-all-articles.php
```

**Performance:**
- Takes ~10 minutes to complete
- Processes all categories sequentially
- 0.5-second delay between requests (be nice to old server)
- Shows real-time progress with color-coded status

**Output:**
- ✓ Green: Successfully imported
- ⚠ Orange: Already exists (skipped)
- ✗ Red: Failed to import

#### categorize-articles.php (4.8 KB, 112 lines)

**Purpose:** Auto-categorize articles based on keyword analysis

**Keyword Mapping:**
```php
$keyword_categories = array(
    'International' => array('syria', 'israel', 'russia', 'ukraine', 'crimea', 'nato', 'erdogan', 'turkey', 'foreign', 'assad', 'middle east', 'asia', 'diplomatic', 'kremlin'),
    'Domestic' => array('voter', 'election', 'presidential', 'congress', 'trump', 'welfare', 'immigration', 'virginia'),
    'Economics' => array('economic', 'income', 'inequality', 'manufacturing', 'employment', 'job', 'worker', 'union', 'finance', 'poverty'),
    'Education' => array('education', 'school', 'university', 'student', 'academic', 'college', 'grit', 'classroom', 'policy school'),
    'Social Policy' => array('welfare', 'justice', 'judge', 'social', 'civil rights', 'discrimination', 'color-blind', 'marriage', 'spousal'),
    'Healthcare' => array('health', 'medical', 'hospital', 'disease', 'famine', 'humanitarian'),
    'Technology' => array('cable', 'infrastructure', 'cyber', 'internet', 'fiber optic', 'undersea', 'twitter', 'social media'),
    'Environment' => array('coastal', 'resiliency', 'climate', 'environment', 'sea level'),
    'Security' => array('nato', 'security', 'military', 'defense', 'terrorism')
);
```

**How It Works:**
1. Creates 9 categories if they don't exist
2. Finds all uncategorized posts
3. Analyzes title + content for keywords
4. Assigns category with most keyword matches
5. Removes "Uncategorized" tag

**Usage:**
```bash
cp categorize-articles.php /xampp/htdocs/vpr/
http://localhost/vpr/categorize-articles.php
rm categorize-articles.php
```

### Featured Image Scripts

#### set-featured-images.php (1.4 KB)

**Purpose:** Assign featured images to articles in bulk

**Usage:**
```php
// Edit the script to map article IDs to image filenames
$image_mappings = array(
    123 => 'sudan.jpg',
    124 => 'syria.jpg',
    125 => 'undersea-cable.jpg',
    // etc.
);
```

**Run:**
```bash
http://localhost/vpr/set-featured-images.php
```

#### simple-set-images.php (3.4 KB)

**Purpose:** Simplified version for quick image assignment

**Features:**
- Auto-uploads images to WordPress media library
- Sets as featured image
- Handles duplicates

#### update-featured-images.php (4.2 KB)

**Purpose:** Update existing featured images (replace old with new)

### Configuration Scripts

#### create-pages.php (2.9 KB)

**Purpose:** Automatically create required WordPress pages with correct slugs

**Creates:**
- About Us (`/about-us/`)
- The Third Rail (`/the-third-rail/`)
- Submissions (`/submissions/`)
- Academical (`/academical/`)
- Contact (`/contact/`)
- Journal Issues (`/journal-issues/`)

**Usage:**
```bash
http://localhost/vpr/create-pages.php
```

**Note:** Pages are created with empty content. You must assign templates in WordPress admin.

#### flush-rewrite-rules.php (982 bytes)

**Purpose:** Fix URL structure issues (404 errors on custom post types)

**When to Use:**
- After activating theme
- After registering custom post types
- When permalinks break
- After changing URL structure

**Usage:**
```bash
http://localhost/vpr/flush-rewrite-rules.php
```

**What It Does:**
```php
flush_rewrite_rules(true);  // Regenerates .htaccess rules
```

#### enable-page-editing.php (2.3 KB)

**Purpose:** Enable editing capabilities for specific pages

**Usage:**
Run once if pages are locked or not editable.

### Inspection & Debug Scripts

#### check-article-dates.php (2.9 KB)

**Purpose:** Verify article publication dates are correct

**Output:**
```
ID: 123 | Title: Syria Policy Analysis | Date: 2024-03-15
ID: 124 | Title: Economics Update | Date: 2024-03-14
```

#### check-active-template.php (2.2 KB)

**Purpose:** Verify which theme is currently active

**Output:**
```
Active Theme: Virginia Policy Review
Template Directory: /xampp/htdocs/vpr/wp-content/themes/virginia-policy-review
```

#### check-live-theme.php (1.6 KB)

**Purpose:** Check theme status on live server

#### check-third-rail-slug.php (1 KB)

**Purpose:** Verify "The Third Rail" page slug and template

**Output:**
```
Page ID: 42
Slug: the-third-rail
Template: page-the-third-rail.php
Status: publish
```

#### debug-third-rail.php (1.3 KB)

**Purpose:** Debug output for Third Rail page queries

**Shows:**
- Query parameters
- Found posts
- SQL query
- Template file being used

#### get-recent-8-posts.php (1.3 KB)

**Purpose:** Test homepage query (get latest 8 articles)

**Output:**
Lists 8 most recent posts with titles, dates, and thumbnails.

### Article Management Scripts

#### fix-article-titles.php (3.2 KB)

**Purpose:** Correct article title formatting issues

**Fixes:**
- Remove HTML entities
- Trim whitespace
- Fix encoding issues
- Standardize punctuation

#### update-submissions.php (4.4 KB)

**Purpose:** Update submission page content programmatically

#### fix-submissions.php (758 bytes)

**Purpose:** Quick fix for submission-related data issues

### Deployment Scripts

#### deploy-from-github.php (2.6 KB)

**Purpose:** Webhook listener for automatic GitHub deployments

**Setup:**
1. Place in WordPress root
2. Configure secret key
3. Add webhook in GitHub settings
4. Push to GitHub → auto-deploy

**Security:** Uses secret key to prevent unauthorized deployments

---

## Development Workflow

### Git Branch Structure

**Two Branches:**

1. **`master` branch** (CURRENT, ACTIVE)
   - Cornell-style layout
   - All theme files in ROOT directory
   - Latest features and fixes
   - **USE THIS BRANCH**

2. **`main` branch** (OLD, LEGACY)
   - Early development work
   - Button-style navigation (outdated)
   - Files in wordpress-theme subfolder
   - **DO NOT USE**

**Why Two Branches?**
- Development evolved from `main` to `master`
- `master` has 20+ commits ahead with Cornell redesign
- Keep `main` for historical reference

### Local Development Setup

**Requirements:**
- XAMPP (Apache + MySQL + PHP)
- Git
- Text editor (VS Code, Sublime, etc.)
- Web browser with dev tools

**XAMPP Configuration:**
1. Install XAMPP to `C:\xampp\`
2. Start Apache and MySQL
3. WordPress installed at: `C:\xampp\htdocs\vpr\`
4. Theme files at: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`

**Access Points:**
- **Site:** http://localhost/vpr/
- **Admin:** http://localhost/vpr/wp-admin/
- **phpMyAdmin:** http://localhost/phpmyadmin/

### Making Changes Workflow

**Step 1: Pull Latest Changes**
```bash
cd /c/Users/[YourUsername]/OneDrive\ -\ University\ of\ Virginia/Desktop/AI_Working/VPRWordpress

# IMPORTANT: Make sure you're on master branch
git branch  # Should show * master

# If not on master:
git checkout master

# Pull latest
git pull origin master
```

**Step 2: Copy Theme Files to XAMPP**
```bash
# From project root
cp *.php /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp *.css /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r images /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r js /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
```

**Step 3: Make Your Edits**
Edit files in: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`

**Step 4: Test Locally**
- Visit http://localhost/vpr/
- Hard refresh: `Ctrl + Shift + R`
- Check all pages
- Verify responsive design (mobile view)

**Step 5: Copy Back to Project**
```bash
cd /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review

cp *.php *.css /c/Users/[YourUsername]/OneDrive\ -\ University\ of\ Virginia/Desktop/AI_Working/VPRWordpress/
cp -r images js /c/Users/[YourUsername]/OneDrive\ -\ University\ of\ Virginia/Desktop/AI_Working/VPRWordpress/
```

**Step 6: Commit and Push**
```bash
cd /c/Users/[YourUsername]/OneDrive\ -\ University\ of\ Virginia/Desktop/AI_Working/VPRWordpress

git add .
git commit -m "Descriptive commit message about what changed"
git push origin master
```

### Multi-Computer Workflow

**Computer A (where you made changes):**
```bash
# After editing
git add .
git commit -m "Update header navigation"
git push origin master
```

**Computer B (pulling changes):**
```bash
cd [project-directory]
git checkout master
git pull origin master

# Copy to XAMPP
cp *.php *.css /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r images js /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# Hard refresh browser
# Ctrl + Shift + R
```

### Recent Commit History

```
0513814 - Change outline to drop-shadow for outside-only effect
37401ee - Reduce Virginia text outline from 2px to 1px for subtler effect
14c7590 - Add orange outline to 'Virginia' text for visual interest
82d8876 - Fix Third Rail search by changing parameter from 's' to 'search'
869a829 - Remove obsolete JavaScript from Third Rail search
4a8f9f9 - Convert Third Rail search to HTML form submission
0e68059 - Fix 404 error on Third Rail search by allowing query vars on pages
5c3bd23 - Add high-res Unsplash images for 8 latest articles grid
4cd7148 - Replace slideshow images with high-res Unsplash photos
b5a502b - Add missing tagline to Submissions page header
b18a7ab - Fix header consistency across all pages
```

**Pattern:** Frequent commits with descriptive messages focusing on specific fixes/features.

---

## Deployment Guide

### ✅ DEPLOYMENT STATUS: **COMPLETED**

**The site is already deployed and live on Bluehost!**

- **Live URL:** https://keq.lpf.mybluehost.me/
- **WordPress Admin:** https://keq.lpf.mybluehost.me/wp-admin
- **Hosting Provider:** Bluehost
- **Deployment Method:** Git-based workflow with `deploy-from-github.php` script
- **105+ articles migrated** from old site
- **All pages functional** (Home, About, Third Rail, Academical, Submissions, Journal Issues, Contact)

### Current Deployment Configuration

✅ All theme files tested locally
✅ Database exported and imported to Bluehost
✅ Images optimized for web
✅ Hosting account created (Bluehost)
✅ cPanel access available
✅ SSL certificate installed (HTTPS enabled)
✅ Git deployment script active: https://keq.lpf.mybluehost.me/deploy-from-github.php

### Current Hosting Environment

**✅ LIVE on Bluehost**

**Current Configuration:**
- **Hosting:** Bluehost cPanel
- **Live URL:** https://keq.lpf.mybluehost.me/
- **Server:** PHP 7.4+, MySQL, Apache
- **SSL:** Enabled (HTTPS)
- **Access:** cPanel dashboard for file management, database, etc.

**Server Meets Requirements:**
- ✅ PHP 7.4 or higher
- ✅ MySQL 5.7 or higher
- ✅ Apache web server
- ✅ mod_rewrite enabled
- ✅ SSL certificate installed

### How the Current Deployment Works

**The site is already deployed! Here's the workflow:**

#### Current Deployment Workflow

1. **Make changes locally** in XAMPP (`C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`)
2. **Test locally** at http://localhost/vpr/
3. **Copy files back to project directory** (root of VPRWordpress)
4. **Commit and push to GitHub:**
   ```bash
   git add .
   git commit -m "Description of changes"
   git push origin master
   ```
5. **Deploy to Bluehost** by visiting:
   ```
   https://keq.lpf.mybluehost.me/deploy-from-github.php
   ```
6. **Refresh live site** to see changes

#### Git-Based Deployment Script

The site uses `deploy-from-github.php` (already on Bluehost server) to pull latest changes from GitHub:

**Location:** `/public_html/deploy-from-github.php`

**What it does:**
- Pulls latest code from GitHub repository (master branch)
- Updates theme files in `/public_html/wp-content/themes/virginia-policy-review/`
- Shows deployment log with success/error messages

**Usage:**
```
Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
```

---

### Original Deployment Steps (Already Completed)

#### Phase 1: Database Setup (COMPLETED ✅)

**✅ Completed - Database is live on Bluehost**

- Database exported from local XAMPP
- Imported to Bluehost phpMyAdmin
- URLs updated to: `https://keq.lpf.mybluehost.me/`
- All 105+ articles migrated from old site
- Categories, images, and metadata preserved

**SQL commands that were run:**
```sql
UPDATE wp_options SET option_value = 'https://keq.lpf.mybluehost.me' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'https://keq.lpf.mybluehost.me' WHERE option_name = 'home';
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
```

#### Phase 2: File Upload (COMPLETED ✅)

**✅ Completed - All files uploaded to Bluehost**

Theme files uploaded via FTP to:
```
/public_html/wp-content/themes/virginia-policy-review/
```

All images, PHP templates, CSS, and JavaScript files are live.

---

### Additional Deployment Scripts on Live Server

Several utility scripts are available on the live Bluehost server:

1. **deploy-from-github.php** - Pull latest code from GitHub
   - URL: https://keq.lpf.mybluehost.me/deploy-from-github.php
   - Use this after every `git push` to update live site

2. **set-live-featured-images.php** - Set featured images for articles
   - URL: https://keq.lpf.mybluehost.me/set-live-featured-images.php
   - Run once after adding new articles

3. **fix-article-titles.php** - Fix article title formatting
   - URL: https://keq.lpf.mybluehost.me/fix-article-titles.php

4. **categorize-articles.php** - Auto-categorize uncategorized articles
   - URL: https://keq.lpf.mybluehost.me/categorize-articles.php

**⚠️ Security Note:** Delete these scripts after use or protect with password.

---

### Original FTP Upload Instructions (For Reference)

**Option A: FTP Upload**

1. **Connect via FTP**
   - Host: ftp.yourdomain.com
   - Username: Your cPanel username
   - Password: Your cPanel password
   - Port: 21 (or 22 for SFTP)

2. **Upload WordPress Files**
   - Local: `C:\xampp\htdocs\vpr\*`
   - Remote: `/public_html/` (or subdirectory)
   - Upload all files and folders
   - Time: 15-30 minutes depending on connection

3. **Upload Theme Files**
   - Local: `C:\Users\...\VPRWordpress\*.php`, `*.css`, `images/`, `js/`
   - Remote: `/public_html/wp-content/themes/virginia-policy-review/`

**Option B: SSH + Git (Faster for Updates)**

1. **SSH into Server**
```bash
ssh yourusername@yourdomain.com
```

2. **Navigate to Theme Directory**
```bash
cd public_html/wp-content/themes/
```

3. **Clone Repository**
```bash
git clone https://github.com/behartless67-a11y/VPRMigration.git virginia-policy-review
cd virginia-policy-review
git checkout master
```

4. **Set Permissions**
```bash
chmod -R 755 /home/username/public_html
```

#### Phase 3: Configuration

**1. Update wp-config.php on Server**

Edit `/public_html/wp-config.php`:

```php
define('DB_NAME', 'youruser_vprjournal');
define('DB_USER', 'youruser_vprwp');
define('DB_PASSWORD', 'your_secure_password');
define('DB_HOST', 'localhost');  // Usually localhost

// Add these for security
define('DISALLOW_FILE_EDIT', true);  // Disable theme/plugin editor
define('WP_POST_REVISIONS', 5);      // Limit post revisions
```

**2. Update .htaccess**

Create or verify `/public_html/.htaccess`:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

**3. Flush Permalinks**

- Visit: `https://yourdomain.com/wp-admin`
- Settings → Permalinks
- Click "Save Changes" (even without changing anything)
- Or run: `flush-rewrite-rules.php`

**4. Test Site**

Visit all pages:
- [ ] Homepage: https://yourdomain.com
- [ ] About Us
- [ ] The Third Rail
- [ ] Academical
- [ ] Submissions
- [ ] Journal Issues
- [ ] Contact
- [ ] Single article pages
- [ ] Search functionality
- [ ] Mobile responsive design

#### Phase 4: Automatic Deployment (Optional)

**Setup Git Auto-Deploy**

**1. Create Deploy Script on Server**

`/home/username/deploy-vpr.sh`:

```bash
#!/bin/bash
cd ~/public_html/wp-content/themes/virginia-policy-review
git pull origin master
echo "Deployment complete: $(date)" >> ~/deploy-log.txt
```

**2. Make Executable**
```bash
chmod +x ~/deploy-vpr.sh
```

**3. Test Manual Deploy**
```bash
~/deploy-vpr.sh
```

**4. Setup GitHub Webhook (Automatic)**

Create `/public_html/deploy.php`:

```php
<?php
// Secret key (change this!)
$secret = 'your_random_secret_key_12345';

if (!isset($_GET['secret']) || $_GET['secret'] !== $secret) {
    http_response_code(403);
    die('Forbidden');
}

// Execute git pull
$output = shell_exec('cd wp-content/themes/virginia-policy-review && git pull origin master 2>&1');

// Log deployment
$log = date('Y-m-d H:i:s') . " - Deployment triggered\n" . $output . "\n\n";
file_put_contents('deploy-log.txt', $log, FILE_APPEND);

echo "<pre>$output</pre>";
?>
```

**5. Configure GitHub Webhook**

- Go to: https://github.com/behartless67-a11y/VPRMigration/settings/hooks
- Add webhook
- Payload URL: `https://yourdomain.com/deploy.php?secret=your_random_secret_key_12345`
- Content type: `application/json`
- Events: Just the push event
- Active: ✅
- Save

**6. Test Automatic Deployment**

```bash
# Make a small change locally
echo "// Test" >> style.css

git add style.css
git commit -m "Test automatic deployment"
git push origin master

# Check deploy log on server
ssh yourusername@yourdomain.com
cat ~/public_html/deploy-log.txt
```

### SSL Certificate Setup

**Free SSL with Let's Encrypt (cPanel):**

1. cPanel → SSL/TLS Status
2. Click "Run AutoSSL"
3. Wait for certificate issuance
4. Update WordPress URLs to `https://`

**Force HTTPS in .htaccess:**

Add to top of `/public_html/.htaccess`:

```apache
# Force HTTPS
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

### Post-Deployment Verification

**1. Site Health Check**
- WordPress Admin → Tools → Site Health
- Should show green checkmark

**2. Performance Check**
- Test page load speed: https://gtmetrix.com
- Test mobile performance: https://pagespeed.web.dev

**3. Security Scan**
- Check for vulnerabilities: https://sitecheck.sucuri.net
- Verify SSL: https://www.ssllabs.com/ssltest/

**4. Backup Configuration**
- Install plugin: UpdraftPlus or BackupBuddy
- Configure daily database backups
- Configure weekly file backups
- Test restore process

---

## Troubleshooting & Common Issues

### Issue: Pages Show White Screen

**Cause:** PHP error, usually in theme files

**Solution:**
1. Enable error reporting in `wp-config.php`:
```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```
2. Check error log: `/wp-content/debug.log`
3. Fix PHP syntax errors

### Issue: 404 Error on The Third Rail with Search Parameters

**Cause:** WordPress doesn't recognize custom query variables

**Solution:**
This is already fixed in `functions.php:390-413`:

```php
// Allow query vars
function vpr_add_query_vars($vars) {
    $vars[] = 'search';
    $vars[] = 'cat';
    $vars[] = 'year';
    return $vars;
}
add_filter('query_vars', 'vpr_add_query_vars');

// Prevent 404 on pages with query strings
function vpr_fix_third_rail_404($query) {
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->is_page() && (isset($_GET['search']) || isset($_GET['cat']) || isset($_GET['year']))) {
        $query->set('post_type', 'page');
        $query->is_404 = false;
    }
}
add_action('pre_get_posts', 'vpr_fix_third_rail_404');

// Force status 200
function vpr_status_200_on_page_search() {
    global $wp_query;
    if (is_page() && (isset($_GET['search']) || isset($_GET['cat']) || isset($_GET['year']))) {
        $wp_query->is_404 = false;
        status_header(200);
    }
}
add_action('wp', 'vpr_status_200_on_page_search', 999);
```

**If still broken:**
- Run `flush-rewrite-rules.php`
- Check `.htaccess` exists
- Verify `mod_rewrite` is enabled

### Issue: Featured Images Not Displaying

**Causes & Solutions:**

1. **Missing file permissions:**
```bash
chmod -R 755 /public_html/wp-content/uploads
```

2. **Wrong image path:**
Check in template files for hardcoded paths like:
```php
// WRONG
<img src="images/lawn.jpg">

// CORRECT
<img src="<?php echo get_template_directory_uri(); ?>/images/lawn.jpg">
```

3. **No featured image set:**
- WordPress Admin → Posts
- Edit post → Featured Image → Set image

4. **Run image assignment script:**
```bash
http://localhost/vpr/set-featured-images.php
```

### Issue: Cornell-Style Layout Not Appearing

**Cause:** Using wrong branch or wrong template files

**Solution:**

1. **Check Git Branch:**
```bash
git branch
# Should show: * master
```

2. **Verify Template Files:**
```bash
# These files MUST exist in theme root:
ls -la *.php
# front-page.php (822 lines)
# page-third-rail.php (402 lines, NOT page-the-third-rail.php)
# page-about-us.php
```

3. **Copy from ROOT directory:**
```bash
# Files are in ROOT of project, not in wordpress-theme subfolder
cd VPRWordpress/
cp *.php /xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
```

4. **Hard Refresh Browser:**
- `Ctrl + Shift + R` (Windows/Linux)
- `Cmd + Shift + R` (Mac)

### Issue: Slideshow Not Auto-Advancing

**Cause:** JavaScript not loading or articles not marked as featured

**Solution:**

1. **Check JS is enqueued:**
Verify in `functions.php:59-72`:
```php
wp_enqueue_script('vpr-script', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
```

2. **Verify featured articles exist:**
```sql
SELECT p.ID, p.post_title
FROM wp_posts p
JOIN wp_postmeta pm ON p.ID = pm.post_id
WHERE pm.meta_key = '_vpr_featured' AND pm.meta_value = '1';
```

3. **Check browser console for JS errors:**
- Right-click → Inspect → Console tab
- Look for 404 errors on `slideshow.js` or `main.js`

4. **Verify slideshow.js is loaded:**
View page source, search for:
```html
<script src="[...]/js/slideshow.js"></script>
```

### Issue: Categories Not Showing on Articles

**Cause:** Articles still in "Uncategorized" category

**Solution:**

1. **Run auto-categorization:**
```bash
http://localhost/vpr/categorize-articles.php
```

2. **Manual categorization:**
- WordPress Admin → Posts → All Posts
- Quick Edit → Category → Select category → Update

3. **Verify categories exist:**
```sql
SELECT * FROM wp_terms t
JOIN wp_term_taxonomy tt ON t.term_id = tt.term_id
WHERE tt.taxonomy = 'category';
```

### Issue: Database Connection Error

**Error Message:** "Error establishing a database connection"

**Causes & Solutions:**

1. **Wrong credentials in wp-config.php:**
```php
// Double-check these match your database
define('DB_NAME', 'vprjournal');
define('DB_USER', 'root');
define('DB_PASSWORD', '232323');
define('DB_HOST', 'localhost');
```

2. **MySQL not running:**
```bash
# Windows (XAMPP)
# Open XAMPP Control Panel
# Click "Start" next to MySQL

# Linux
sudo systemctl start mysql
```

3. **Database doesn't exist:**
```sql
-- Create database if missing
CREATE DATABASE vprjournal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

4. **User doesn't have permissions:**
```sql
GRANT ALL PRIVILEGES ON vprjournal.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
```

### Issue: Styles Not Loading

**Symptoms:** Site appears unstyled, plain HTML

**Causes & Solutions:**

1. **Stylesheet not enqueued:**
Verify in `functions.php:59-62`:
```php
wp_enqueue_style('vpr-style', get_stylesheet_uri(), array(), '1.0');
```

2. **Wrong file path:**
```php
// Check style.css is in theme root
get_stylesheet_uri();  // Should return: .../virginia-policy-review/style.css
```

3. **Browser cache:**
- `Ctrl + Shift + R` (hard refresh)
- `Ctrl + Shift + Delete` → Clear cached images and files

4. **File permissions:**
```bash
chmod 644 style.css
```

5. **Missing style.css header:**
Verify first 10 lines of `style.css`:
```css
/*
Theme Name: Virginia Policy Review
Theme URI: https://virginiapolicyreview.org
Version: 1.0
*/
```

### Issue: Git Pull Fails on Server

**Error:** "Your local changes would be overwritten"

**Solution:**

```bash
# Stash local changes
git stash

# Pull from remote
git pull origin master

# Reapply local changes (if needed)
git stash pop

# Or force overwrite (caution!)
git reset --hard origin/master
```

### Issue: Permalink 404 Errors

**Symptom:** Homepage works, but all other pages show 404

**Causes & Solutions:**

1. **Rewrite rules not flushed:**
```bash
# Visit this URL:
http://localhost/vpr/flush-rewrite-rules.php

# Or in WordPress admin:
# Settings → Permalinks → Save Changes
```

2. **Missing .htaccess:**
Create `/public_html/.htaccess`:
```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

3. **mod_rewrite disabled (Apache):**
```bash
# Enable mod_rewrite
sudo a2enmod rewrite
sudo systemctl restart apache2
```

---

## Maintenance Checklist

### Daily Tasks (Content Editors)

- [ ] Check for new article submissions
- [ ] Publish approved articles
- [ ] Assign featured images
- [ ] Categorize new posts
- [ ] Respond to contact form submissions

### Weekly Tasks (Developers)

- [ ] Review WordPress updates (core, plugins, themes)
- [ ] Check site health (WordPress Admin → Tools → Site Health)
- [ ] Review error logs (`/wp-content/debug.log`)
- [ ] Monitor site performance (page load times)
- [ ] Check broken links (use plugin: Broken Link Checker)
- [ ] Verify SSL certificate validity
- [ ] Review git commit history

### Monthly Tasks

- [ ] Apply WordPress core updates
- [ ] Update plugins (test on staging first)
- [ ] Review and optimize database (use plugin: WP-Optimize)
- [ ] Check site backups are running
- [ ] Test backup restoration process
- [ ] Review analytics (traffic, popular posts)
- [ ] Audit user accounts (remove inactive users)
- [ ] Review and update content (remove outdated articles)
- [ ] Check mobile responsiveness on real devices

### Quarterly Tasks

- [ ] Security audit (use plugin: Wordfence or Sucuri)
- [ ] Performance audit (GTmetrix, PageSpeed Insights)
- [ ] SEO audit (check meta descriptions, titles, alt text)
- [ ] Accessibility audit (use WAVE or axe DevTools)
- [ ] Review hosting plan (disk space, bandwidth usage)
- [ ] Update documentation (this file!)
- [ ] Review and update privacy policy
- [ ] Test contact forms and newsletter signup

### Annual Tasks

- [ ] Renew domain registration
- [ ] Renew hosting plan
- [ ] Renew SSL certificate (if not auto-renewing)
- [ ] Review team member access (revoke old accounts)
- [ ] Major design refresh (if needed)
- [ ] Content audit (archive or delete very old posts)
- [ ] Compliance review (GDPR, accessibility standards)

### Emergency Procedures

**Site Down:**
1. Check hosting status (cPanel or hosting dashboard)
2. Check DNS propagation (https://dnschecker.org)
3. Check database connection (wp-config.php credentials)
4. Check disk space (cPanel → File Manager)
5. Contact hosting support

**Site Hacked:**
1. Take site offline (maintenance mode)
2. Change all passwords (WordPress, database, FTP, hosting)
3. Scan for malware (plugin: Wordfence, Sucuri)
4. Restore from clean backup
5. Update all software (WordPress, plugins, themes)
6. Review file permissions (directories: 755, files: 644)
7. Implement security hardening (see below)

**Data Loss:**
1. Restore from most recent backup
2. Check backup integrity before restoring
3. Test restored site on staging URL first
4. Review backup strategy (increase frequency?)
5. Document what was lost (if anything)

### Security Hardening

**wp-config.php additions:**

```php
// Disable file editing
define('DISALLOW_FILE_EDIT', true);

// Limit post revisions
define('WP_POST_REVISIONS', 5);

// Force SSL admin
define('FORCE_SSL_ADMIN', true);

// Change database table prefix (if installing fresh)
$table_prefix = 'vpr_';  // Instead of default 'wp_'
```

**.htaccess additions:**

```apache
# Protect wp-config.php
<files wp-config.php>
order allow,deny
deny from all
</files>

# Disable directory browsing
Options -Indexes

# Block access to xmlrpc.php (prevents DDoS)
<files xmlrpc.php>
order allow,deny
deny from all
</files>
```

**Recommended Security Plugins:**
- Wordfence Security
- iThemes Security
- Sucuri Security

**Two-Factor Authentication:**
- Plugin: Two Factor Authentication
- Enable for all admin accounts

---

## Additional Resources

### Documentation Files

- **COMPUTER-SYNC-NOTES.md** (356 lines): Git workflow, branch structure, file sync process
- **DEPLOYMENT_GUIDE.md** (9.9 KB): Detailed hosting deployment instructions
- **DEPLOYMENT-NOTES.md** (18 KB): Additional deployment notes and configurations
- **PROJECT-HANDOFF-DOCUMENTATION.md** (This file): Complete project reference

### External Links

**WordPress Resources:**
- Official Documentation: https://wordpress.org/documentation/
- Developer Reference: https://developer.wordpress.org/
- Theme Handbook: https://developer.wordpress.org/themes/

**Git & GitHub:**
- Repository: https://github.com/behartless67-a11y/VPRMigration
- Git Documentation: https://git-scm.com/doc
- GitHub Guides: https://guides.github.com/

**Design Resources:**
- Google Fonts (Inter, Crimson Text): https://fonts.google.com/
- UVA Brand Guidelines: https://brand.virginia.edu/
- CSS Variables Reference: https://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties

**Performance Tools:**
- GTmetrix: https://gtmetrix.com/
- PageSpeed Insights: https://pagespeed.web.dev/
- WebPageTest: https://www.webpagetest.org/

**Security Tools:**
- Sucuri SiteCheck: https://sitecheck.sucuri.net/
- SSL Labs Test: https://www.ssllabs.com/ssltest/
- Security Headers: https://securityheaders.com/

### Contact Information

**GitHub Repository:**
https://github.com/behartless67-a11y/VPRMigration

**Organization Contact:**
- Email: contact@virginiapolicyreview.org
- Social Media: @VaPolicyReview (Instagram, Facebook, Twitter, LinkedIn)

**Current Team:**
- Executive Editor: Sarah King
- Managing Editor: George Langhammer

---

## Key Takeaways for New Developers

### What You MUST Know

1. **Git Branch:** Always use `master` branch (not `main`)
2. **File Location:** Theme files are in ROOT directory (not wordpress-theme subfolder)
3. **Template Priority:** Use `page-third-rail.php` (402 lines), NOT `page-the-third-rail.php` (69 lines)
4. **Database:** Local DB name is `vprjournal`, credentials in `wp-config.php`
5. **Design System:** Cornell-style layout with UVA colors (Blue #232D4B, Orange #E57200)

### What Makes This Project Unique

1. **Custom from scratch** - No premium theme, no page builders
2. **Cornell-inspired design** - Elegant magazine layout unlike typical WordPress sites
3. **Multiple content types** - Articles, podcasts, journals, staff profiles
4. **Automated migration** - PHP scripts to import content from old site
5. **Auto-categorization** - Keyword-based article classification
6. **Query parameter handling** - Special 404 fixes for search/filter functionality

### What's Already Implemented

✅ Responsive design (mobile, tablet, desktop)
✅ Custom post types (3)
✅ Custom taxonomies (2)
✅ Featured article system
✅ Homepage slideshow with auto-advance
✅ Search and filter for articles
✅ Social media integration
✅ Newsletter subscription form
✅ Git version control
✅ Content migration scripts
✅ Deployment automation (webhook-ready)

### What's NOT Included

❌ User registration/membership system
❌ E-commerce functionality
❌ Comments system (disabled)
❌ Multilingual support
❌ Page builder (Elementor, etc.)
❌ Advanced analytics (use Google Analytics plugin)
❌ Email marketing (use Mailchimp plugin)
❌ Form builder (use Contact Form 7 or Gravity Forms)

### Quick Start Commands

```bash
# Clone project
git clone https://github.com/behartless67-a11y/VPRMigration.git
cd VPRMigration
git checkout master

# Copy to XAMPP
cp *.php *.css /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r images js /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# Start XAMPP
# Open XAMPP Control Panel
# Start Apache and MySQL

# Visit site
http://localhost/vpr/

# Login to WordPress admin
http://localhost/vpr/wp-admin/
# Username: (ask current admin)
# Password: (ask current admin)
```

---

## Final Notes

This documentation was created to ensure smooth project handoff and ongoing maintenance. The Virginia Policy Review WordPress site represents 15+ years of student journalism (since 2009) and is a critical platform for the organization.

**Key Principles:**
- **Quality over quantity** - Well-crafted custom code beats bloated plugins
- **Performance matters** - Fast load times improve user experience
- **Accessibility first** - Semantic HTML, proper alt text, keyboard navigation
- **Security always** - Regular updates, strong passwords, backups
- **Documentation is essential** - Future developers will thank you

**When in Doubt:**
1. Check this documentation first
2. Review COMPUTER-SYNC-NOTES.md for workflow issues
3. Check DEPLOYMENT_GUIDE.md for hosting questions
4. Review git commit history for recent changes
5. Ask current team members

**Good Luck!**

---

**Document Version:** 1.0
**Last Updated:** October 2024
**Author:** Project Handoff Team
**Status:** Complete and ready for production deployment
