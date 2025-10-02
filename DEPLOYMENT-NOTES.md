# Virginia Policy Review - Complete Deployment Documentation

## Session Date: October 2, 2025

---

## Overview
Successfully deployed the Virginia Policy Review WordPress site from local XAMPP to live Bluehost hosting and established a Git-based deployment workflow.

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
3. Upload `deploy-from-github.php` to Bluehost `public_html/` (if not already there)
4. Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
5. Refresh your live site to see changes

**Security**: Delete deployment script after each use, or keep it but ensure it's not publicly accessible

### 6. Submissions Page Redesign

#### Initial Issue
- Submissions page had card-based layout that user didn't want
- User wanted simple text layout matching their original content

#### First Attempt
- Created simple text-only layout with hero image
- Still didn't match homepage aesthetic

#### Final Solution
- Matched homepage Cornell-style banner design:
  - Large "Virginia Policy Review" header
  - Navigation menu with active state on Submissions
  - Lawn background with transparent overlay
  - "SUBMISSION GUIDELINES" label (matching "FEATURED" style from homepage)
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

---

## Files Created During Session

### Deployment Scripts (in Desktop folder)
1. **create-pages.php** - Creates missing WordPress pages with templates
2. **deploy-from-github.php** - Pulls latest theme files from GitHub
3. **fix-submissions.php** - Attempted to fix submissions page template (deprecated)
4. **update-submissions.php** - Direct file update script (deprecated)
5. **enable-page-editing.php** - Makes pages editable via WordPress admin (not used)

### Template Files Modified
- `page-journal-submissions.php` - Redesigned to match homepage style

---

## Key Learnings

### What Worked
1. **Git + GitHub deployment** - Clean, trackable, repeatable
2. **PHP scripts via browser** - Easy way to run one-time operations without SSH
3. **Direct template editing** - Faster than trying to use WordPress page editor for complex layouts

### What Didn't Work
1. **SSH access** - Timeout issues, not reliable for this hosting environment
2. **Database import for pages** - Pages didn't transfer properly, had to recreate
3. **Initial deployment scripts** - Had to adjust paths when discovered theme folder name difference

### Critical Details to Remember
- Theme folder is `vpr-theme` on server, not `virginia-policy-review`
- Always test deployment script path detection before assuming locations
- Bluehost directory structure: `/home3/keqlpfmy/public_html/`
- Hard refresh (Ctrl+F5) needed to see changes due to caching

---

## Ongoing Workflow for Team

### For Content Editors (Non-Technical)
**Option 1: WordPress Admin (Recommended)**
- Go to https://keq.lpf.mybluehost.me/wp-admin
- Navigate to Pages → Edit page
- Use visual editor to modify content
- Click "Update" to publish changes

**Option 2: Theme File Editor**
- Go to WordPress Admin → Appearance → Theme File Editor
- Select template file to edit
- Modify and click "Update File"
- **Caution**: Breaking syntax will break the page

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
   - Verify changes on live site

---

## Two Working Directories

### Local Development
1. **XAMPP Theme**: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`
   - This is the Git repository
   - Make all edits here

2. **Desktop Folder**: `C:\Users\bh4hb\OneDrive - University of Virginia\Desktop\AI_Working\VPRWordpress\`
   - Helper scripts and documentation
   - Not part of the theme itself

### Live Server
- **Theme**: `/home3/keqlpfmy/public_html/wp-content/themes/vpr-theme/`
- **Scripts**: `/home3/keqlpfmy/public_html/` (root, where deploy script lives)

---

## Troubleshooting

### Pages Not Updating After Deployment
1. Clear browser cache (Ctrl+Shift+Delete)
2. Hard refresh page (Ctrl+F5)
3. Check if deployment script ran successfully
4. Verify GitHub has latest commits

### Deployment Script Not Working
1. Check file uploaded to correct location (public_html root)
2. Verify theme folder name is `vpr-theme` not `virginia-policy-review`
3. Check script output for error messages
4. Ensure GitHub repository is accessible (public or credentials configured)

### Changes Not Showing Locally
1. Restart Apache in XAMPP
2. Clear browser cache
3. Check if editing correct file in correct directory

---

## Next Steps for Team

### Immediate
1. Delete sensitive deployment scripts from live server (or password-protect)
2. Set up WordPress user accounts for team members
3. Document which pages can be edited via WordPress admin vs need template changes

### Future Improvements
1. Set up automatic deployment (GitHub webhooks)
2. Create staging environment for testing
3. Implement proper backup system
4. Consider using WordPress page builder for easier content editing
5. Set up SSL certificate for https (if not already configured by Bluehost)

---

## Contact Information
- **Live Site**: https://keq.lpf.mybluehost.me/
- **WordPress Admin**: https://keq.lpf.mybluehost.me/wp-admin
- **GitHub Repository**: https://github.com/behartless67-a11y/VPRMigration
- **Hosting**: Bluehost (cPanel access via hosting dashboard)

---

## Important Security Notes
1. Never commit database passwords to GitHub
2. Delete deployment scripts from public_html after use
3. Use strong passwords for WordPress admin accounts
4. Keep WordPress core and plugins updated
5. Regular backups of both database and files

---

## Template Structure Reference

### Page Templates
- `front-page.php` - Homepage (Cornell-style with slideshow)
- `page-about-us.php` - About Us page
- `page-third-rail.php` - The Third Rail blog
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
- `images/` - Images including lawn background, article images
- `js/` - JavaScript files including slideshow.js

---

**Document Created**: October 2, 2025
**Last Updated**: October 2, 2025
**Status**: Deployment Complete and Functional
