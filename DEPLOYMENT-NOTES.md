# Virginia Policy Review - Complete Deployment Documentation

## Session Date: October 2, 2025

---

## Overview
Successfully deployed the Virginia Policy Review WordPress site from local XAMPP to live Bluehost hosting, established a Git-based deployment workflow, migrated 105+ articles from old site, and implemented dynamic content features.

---

## Deployment Steps Completed

### 1. Initial Site Setup on Bluehost
- **Hosting**: Bluehost account created
- **WordPress Installation**: Fresh WordPress install (not migration)
- **Live URL**: https://keq.lpf.mybluehost.me/
- **Theme Upload**: Uploaded custom theme via WordPress admin (zip file)
- **Database**:
  - Database name: `keqbfmy_WP1EP`
  - Exported from local XAMPP phpMyAdmin
  - Imported to Bluehost phpMyAdmin

### 2. Database Migration
- Cleared all default WordPress tables on Bluehost before import
- Ran SQL commands to update URLs from localhost to live domain:
```sql
UPDATE wp_options SET option_value = 'https://keq.lpf.mybluehost.me' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'https://keq.lpf.mybluehost.me' WHERE option_name = 'home';
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost/vpr', 'https://keq.lpf.mybluehost.me');
```

### 3. Missing Pages Fix
**Problem**: Custom pages (About Us, Third Rail, Academical, Submissions, Contact) didn't transfer from database import

**Solution**: Created PHP script to generate pages with correct templates
- Script: `create-pages.php`
- Created all 5 pages with proper template assignments
- Templates: `page-about-us.php`, `page-third-rail.php`, `page-academical.php`, `page-journal-submissions.php`, `page-contact.php`

### 4. SSH Setup (Attempted)
- **Issue**: SSH authentication timeout issues on Bluehost
- **Attempted**: SSH key generation and authorization
- **Result**: SSH not reliably working, switched to alternative deployment method

### 5. Git Deployment Workflow Established

#### Local Git Repository
- **Location**: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`
- **Remote**: https://github.com/behartless67-a11y/VPRMigration.git
- **Branch**: master

#### Bluehost Theme Location
- **Path**: `/home3/keqlpfmy/public_html/wp-content/themes/vpr-theme/`
- **Note**: Theme folder name is `vpr-theme` on server, NOT `virginia-policy-review`

#### Deployment Script Created
**File**: `deploy-from-github.php`

**What it does**:
1. Initializes git repository in theme folder (if needed)
2. Adds GitHub remote
3. Fetches latest changes from GitHub master branch
4. Resets local files to match GitHub (hard reset)

**How to use**:
1. Make changes locally in `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`
2. Commit and push to GitHub:
   ```bash
   git add .
   git commit -m "Description of changes"
   git push origin master
   ```
3. Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
4. Refresh your live site to see changes

**Security**: Keep deployment script but ensure it's not publicly indexed

### 6. Submissions Page Redesign

#### Final Solution
- Matched homepage Cornell-style banner design:
  - Large "Virginia Policy Review" header
  - Navigation menu with active state on Submissions
  - Lawn background with transparent overlay
  - "SUBMISSION GUIDELINES" label
  - Content in white card box with shadow
  - Clean, readable text layout

#### Content Structure
- Thank you message
- Research Article guidelines (max 7000 words)
- Commentary/Op-ed guidelines (max 2000 words)
- Citations (APA or Chicago)
- Style requirements (Times New Roman 12pt, double-spaced)
- 2025-2026 theme: "Policy for the Public Good"
- Contact information for editors

### 7. Article Template Creation

#### Single Post Template
**File**: `single.php`

**Features**:
- Cornell-style banner matching homepage
- Category badge display
- Article title and date
- Featured image support
- Full article content display
- Author bio section (placeholder)
- Clean typography with readable line height
- Responsive design

**Purpose**: Display individual blog articles with consistent branding

### 8. Content Migration from Old Site

#### Migration Process
**Old Site**: http://www.virginiapolicyreview.org/the-third-rail

**Script Created**: `migrate-complete-archive.php`

**What it does**:
1. Scrapes 50+ monthly archive pages (2014-2025)
2. Extracts article title, content, date, and category
3. Creates WordPress posts with proper metadata
4. Checks for duplicates before inserting
5. Uses cURL with proper user agent to bypass 406 errors

**Results**:
- ✅ Successfully imported 105 articles
- ✅ Articles span from 2014 to 2025
- ✅ Categories extracted where available
- ✅ Publication dates preserved from URLs

**Key Technical Details**:
- Used protocol-relative URL fix for links
- Extracted dates from archive URL patterns (YYYY/MM/DD)
- Direct database queries for duplicate checking
- HTML parsing with DOMDocument and DOMXPath

### 9. The Third Rail Dynamic Blog Page

#### Template: `page-third-rail.php`

**Features**:
- Dynamic WordPress query pulling all blog posts
- Category filter dropdown (excluding "Uncategorized")
- Article previews with first 100 words
- Author extraction from article content
- "Continue reading" links to full articles
- Pagination (20 articles per page)
- Article count display
- Clean card-based layout

**Author Extraction**:
- Regex pattern matches "by [Author Name]" at start of content
- Removes zero-width Unicode characters
- Displays author in italic below title
- Strips author byline from preview text

**JavaScript**:
- Client-side category filtering (reloads page with URL parameter)
- No AJAX required

### 10. Homepage Article Grid

#### Dynamic Content
**File**: `front-page.php` - Articles section

**Changed from**: Hardcoded 8 placeholder articles
**Changed to**: Dynamic WordPress query

**Features**:
- Pulls 8 most recent articles
- Displays featured image (or lawn.jpg fallback)
- Shows category badge
- Article title and excerpt (15 words)
- "Read More" links to full articles
- 4-column grid (responsive: 3-col, 2-col, 1-col)

**Load More Button**:
- Links to `/the-third-rail` page
- Shows all articles with filtering

### 11. Featured Images for Articles

#### Stock Images Downloaded
**Source**: Pexels.com (free for commercial use)

**8 Featured Article Images**:
1. **Hiring: Color-blind judge** → courthouse/justice
2. **Bureau of Spousal Assignment** → couple/marriage
3. **Ending the welfare cycle** → social services
4. **The problem with trying** → classroom/education
5. **Gritty educations** → student studying
6. **YES WE BAN** → social media/Twitter
7. **A cure for common Crimea** → Ukraine/Crimea
8. **Of unions and dictators** → sports/football

**Script**: `set-live-featured-images.php`
- Uploads images from theme directory to WordPress media library
- Sets as featured images for matching article titles
- Automatic attachment creation with metadata

### 12. Title Capitalization Fix

#### Script: `fix-article-titles.php`

**Purpose**: Convert all article titles to proper AP/Chicago title case

**Rules Applied**:
- Capitalizes first and last words always
- Capitalizes major words (nouns, verbs, adjectives, adverbs)
- Keeps small words lowercase (a, an, and, as, at, but, by, for, in, of, on, or, the, to, with)
- Preserves acronyms (NATO, HTS, USA, etc.)
- Handles hyphenated words properly

**Examples**:
- "ending the welfare cycle" → "Ending the Welfare Cycle"
- "A cure for the common Crimea" → "A Cure for the Common Crimea"

### 13. Article Categorization

#### Script: `categorize-articles.php`

**Purpose**: Auto-categorize uncategorized articles based on content

**Categories Created**:
1. **Domestic** - US policy and internal affairs
2. **International** - Foreign policy and relations
3. **Economics** - Economic policy, business, finance
4. **Education** - Education policy and academic issues
5. **Environment** - Environmental policy and climate
6. **Healthcare** - Healthcare and public health
7. **Social Policy** - Social welfare, equality, justice
8. **Security** - National security and defense
9. **Technology** - Technology policy and innovation

**How it works**:
- Scans article title and content for keywords
- Matches keywords to category themes
- Assigns best matching category
- Removes "Uncategorized" tag
- Shows summary of categorizations

**Keyword Examples**:
- International: syria, israel, russia, nato, foreign, diplomatic
- Economics: income, employment, manufacturing, poverty
- Education: school, university, student, academic
- Technology: cable, cyber, internet, twitter, social media

---

## Files Created During Session

### Deployment & Management Scripts (Desktop Folder)
1. **create-pages.php** - Creates missing WordPress pages with templates
2. **deploy-from-github.php** - Pulls latest theme files from GitHub ✅ ACTIVE
3. **migrate-complete-archive.php** - Migrates all articles from old site (2014-2025)
4. **set-live-featured-images.php** - Sets featured images for homepage articles ✅ ACTIVE
5. **fix-article-titles.php** - Fixes title capitalization to proper title case ✅ ACTIVE
6. **categorize-articles.php** - Auto-categorizes articles by keywords ✅ ACTIVE
7. **check-article-dates.php** - Checks date formats on old site articles
8. **get-recent-articles.php** - Gets list of recent articles
9. **get-all-titles.php** - Lists all article titles

### Template Files Modified/Created
- `single.php` - Individual article template (NEW)
- `page-journal-submissions.php` - Redesigned submission guidelines
- `page-third-rail.php` - Dynamic blog listing with filtering (UPDATED)
- `front-page.php` - Dynamic article grid (UPDATED)

### Image Assets Added
- Stock images for 8 homepage articles (Pexels.com)
- Various topical images: courthouse, education, welfare, social media, sports, etc.

---

## Key Learnings

### What Worked
1. **Git + GitHub deployment** - Clean, trackable, repeatable
2. **PHP scripts via browser** - Easy way to run one-time operations without SSH
3. **Web scraping for migration** - Successfully imported 105+ articles
4. **Dynamic WordPress queries** - Better than hardcoded content
5. **Keyword-based categorization** - Fast way to organize large content sets

### What Didn't Work
1. **SSH access** - Timeout issues, not reliable for this hosting
2. **Database import for pages** - Pages didn't transfer, had to recreate
3. **Date extraction from HTML** - Old site didn't have date elements, used URLs instead

### Critical Details to Remember
- Theme folder is `vpr-theme` on server, not `virginia-policy-review`
- Old site blocks requests without proper user agent header
- Zero-width Unicode characters in migrated content need stripping
- Featured images must be uploaded to media library, not just theme folder
- Hard refresh (Ctrl+F5) needed to see changes due to caching

---

## Ongoing Workflow for Team

### For Content Editors (Non-Technical)
**WordPress Admin (Recommended)**
- Go to https://keq.lpf.mybluehost.me/wp-admin
- Navigate to Posts → All Posts or Pages → All Pages
- Use visual editor to modify content
- Click "Update" to publish changes

**Adding Featured Images**:
1. Edit post in WordPress admin
2. Right sidebar → Featured Image → Set featured image
3. Upload or select from media library
4. Click "Update"

### For Developers (Technical)
1. Edit files locally in XAMPP theme folder
2. Test locally at http://localhost/vpr
3. Commit changes to Git:
   ```bash
   cd "C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review"
   git add .
   git commit -m "Description"
   git push origin master
   ```
4. Deploy to live site:
   - Visit https://keq.lpf.mybluehost.me/deploy-from-github.php

### Running Maintenance Scripts
Upload to `public_html/` and visit:
- Fix titles: `https://keq.lpf.mybluehost.me/fix-article-titles.php`
- Categorize: `https://keq.lpf.mybluehost.me/categorize-articles.php`
- Set images: `https://keq.lpf.mybluehost.me/set-live-featured-images.php`

---

## Two Working Directories

### Local Development
1. **XAMPP Theme**: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`
   - This is the Git repository
   - Make all edits here
   - Test at http://localhost/vpr

2. **Desktop Folder**: `C:\Users\bh4hb\OneDrive - University of Virginia\Desktop\AI_Working\VPRWordpress\`
   - Helper scripts and documentation
   - Not part of the theme itself
   - Scripts to upload to live server

### Live Server
- **Theme**: `/home3/keqlpfmy/public_html/wp-content/themes/vpr-theme/`
- **Scripts**: `/home3/keqlpfmy/public_html/` (root)
- **Uploads**: `/home3/keqlpfmy/public_html/wp-content/uploads/`

---

## Troubleshooting

### Pages Not Updating After Deployment
1. Clear browser cache (Ctrl+Shift+Delete)
2. Hard refresh page (Ctrl+F5)
3. Check if deployment script ran successfully
4. Verify GitHub has latest commits

### Images Not Showing
1. Check featured image is set in WordPress admin
2. Verify image exists in theme `images/` folder
3. Run `set-live-featured-images.php` script
4. Check file permissions on uploads folder

### Articles Still Uncategorized
1. Run `categorize-articles.php` script
2. Manually assign categories in WordPress admin
3. Check category exists (may need to create)

### Author Names Not Displaying
1. Verify article content starts with "By [Author Name]"
2. Check for zero-width Unicode characters
3. Review regex pattern in `page-third-rail.php`

---

## Template Structure Reference

### Page Templates
- `front-page.php` - Homepage (Cornell-style with slideshow + dynamic article grid)
- `single.php` - Individual article display (NEW)
- `page-about-us.php` - About Us page
- `page-third-rail.php` - The Third Rail blog listing (dynamic)
- `page-academical.php` - Academical section
- `page-journal-issues.php` - Journal Issues archive
- `page-journal-submissions.php` - Submission guidelines
- `page-contact.php` - Contact page

### Key Template Components
- `header.php` - Site header (hidden on pages with custom banners)
- `footer.php` - Site footer
- `style.css` - Main stylesheet with CSS variables
- `functions.php` - Theme functions

### Assets
- `images/` - Images including lawn background, article images, stock photos
- `js/` - JavaScript files including slideshow.js

---

## Migration Data Summary

### Content Migrated
- **Total Articles**: 105
- **Date Range**: 2014 - 2025
- **Source**: http://www.virginiapolicyreview.org/the-third-rail
- **Archives Scraped**: 50+ monthly archive pages

### Categories
- 9 policy categories created
- Auto-categorization based on keyword matching
- Manual review/adjustment possible in WordPress admin

### Featured Images
- 8 articles have featured images from Pexels
- All images free for commercial use
- Attribution: Pexels.com

---

## Active Maintenance Scripts

### On Live Server (public_html/)

1. **deploy-from-github.php**
   - URL: https://keq.lpf.mybluehost.me/deploy-from-github.php
   - Purpose: Deploy latest theme changes from GitHub
   - When to use: After pushing commits to GitHub

2. **set-live-featured-images.php**
   - URL: https://keq.lpf.mybluehost.me/set-live-featured-images.php
   - Purpose: Set featured images for 8 homepage articles
   - When to use: One-time after deployment, or when images change

3. **fix-article-titles.php**
   - URL: https://keq.lpf.mybluehost.me/fix-article-titles.php
   - Purpose: Fix capitalization of all article titles
   - When to use: One-time after migration, or when new articles added

4. **categorize-articles.php**
   - URL: https://keq.lpf.mybluehost.me/categorize-articles.php
   - Purpose: Auto-categorize uncategorized articles
   - When to use: After migration or when bulk articles imported

---

## Next Steps for Team

### Immediate
1. ✅ Run title capitalization script
2. ✅ Run categorization script
3. ✅ Set featured images for homepage articles
4. Review categories and adjust manually if needed
5. Add featured images to more articles via WordPress admin
6. Test all navigation links and buttons

### Content Management
1. Review imported articles for formatting issues
2. Add author bios to articles where available
3. Update article dates if needed (currently defaulted to import date)
4. Add more featured images to articles

### Future Improvements
1. Set up automatic deployment (GitHub webhooks)
2. Create staging environment for testing
3. Implement proper backup system
4. Add more categories as needed
5. Consider custom fields for article metadata
6. Set up RSS feed for Third Rail articles
7. Implement article search functionality

---

## Contact Information
- **Live Site**: https://keq.lpf.mybluehost.me/
- **WordPress Admin**: https://keq.lpf.mybluehost.me/wp-admin
- **GitHub Repository**: https://github.com/behartless67-a11y/VPRMigration
- **Hosting**: Bluehost (cPanel access via hosting dashboard)

---

## Important Security Notes
1. Never commit database passwords to GitHub
2. Keep WordPress core and plugins updated
3. Use strong passwords for WordPress admin accounts
4. Regular backups of both database and files
5. Monitor deployment scripts for unauthorized access

---

**Document Created**: October 2, 2025
**Last Updated**: October 2, 2025 (End of Day)
**Status**: Deployment Complete, Content Migrated, Dynamic Features Active
**Articles**: 105+ migrated and categorized
**Featured Images**: 8 articles configured
**Scripts Active**: 4 maintenance scripts ready for use
