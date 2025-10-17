# VPR WordPress - Troubleshooting Guide

Quick fixes for common problems. Find your issue, follow the steps, get back to work!

---

## 🔍 Quick Problem Finder

**Click/search for your issue:**

### Website Display Issues
- [Site shows white screen / blank page](#site-shows-white-screen--blank-page)
- [CSS not loading / site looks unstyled](#css-not-loading--site-looks-unstyled)
- [Changes don't appear after deploying](#changes-dont-appear-after-deploying)
- [Images not loading / broken images](#images-not-loading--broken-images)
- [Mobile site looks broken](#mobile-site-looks-broken)

### Article / Content Issues
- [Featured image not showing on homepage](#featured-image-not-showing-on-homepage)
- [Article not appearing on The Third Rail page](#article-not-appearing-on-the-third-rail-page)
- [Category not assigned to article](#category-not-assigned-to-article)
- [Search not working on Third Rail](#search-not-working-on-third-rail)
- [Article shows 404 error](#article-shows-404-error)

### Admin / Login Issues
- [Can't log into WordPress admin](#cant-log-into-wordpress-admin)
- [Locked out after too many attempts](#locked-out-after-too-many-attempts)
- [Can't upload images (file too large)](#cant-upload-images-file-too-large)
- [Editor / Add New button missing](#editor--add-new-button-missing)

### Git / Deployment Issues
- [Deployment script shows error](#deployment-script-shows-error)
- [Git push fails / rejected](#git-push-fails--rejected)
- [Merge conflict after git pull](#merge-conflict-after-git-pull)
- [Changes pushed but not on live site](#changes-pushed-but-not-on-live-site)
- [Wrong branch (on main instead of master)](#wrong-branch-on-main-instead-of-master)

### Database Issues
- [Database connection error](#database-connection-error)
- [Error establishing database connection](#error-establishing-database-connection)
- [Local site shows old content](#local-site-shows-old-content)

### Hosting / Server Issues
- [Site is very slow](#site-is-very-slow)
- [500 Internal Server Error](#500-internal-server-error)
- [403 Forbidden Error](#403-forbidden-error)
- [Disk space quota exceeded](#disk-space-quota-exceeded)

### Email Issues
- [Contact form not sending emails](#contact-form-not-sending-emails)
- [Not receiving WordPress notifications](#not-receiving-wordpress-notifications)

---

## Website Display Issues

### Site Shows White Screen / Blank Page

**Symptoms:** Entire page is blank, no content visible

**Causes:** PHP error, plugin conflict, memory limit exceeded

**Quick Fix:**

1. **Enable error reporting to see what's wrong:**
   - cPanel → File Manager → public_html
   - Edit `wp-config.php`
   - Add before `/* That's all, stop editing! */`:
   ```php
   define('WP_DEBUG', true);
   define('WP_DEBUG_LOG', true);
   define('WP_DEBUG_DISPLAY', true);
   ```
   - Save file

2. **Check error log:**
   - cPanel → File Manager → wp-content
   - Open `debug.log`
   - Look for most recent error

3. **Common fixes based on error:**

   **If "PHP Fatal error: Out of memory":**
   - Edit `wp-config.php`
   - Add: `define('WP_MEMORY_LIMIT', '256M');`
   - Save file

   **If "Parse error" or "syntax error":**
   - Recent code change has PHP syntax error
   - Revert last Git commit:
     ```bash
     git revert HEAD
     git push origin master
     ```
   - Deploy: https://keq.lpf.mybluehost.me/deploy-from-github.php

   **If plugin-related error:**
   - cPanel → File Manager → wp-content/plugins
   - Rename problematic plugin folder (add `.disabled`)
   - Site should load now

4. **If still blank:**
   - Contact Bluehost support: 1-888-401-4678
   - Provide error log contents

**Prevention:**
- Always test changes locally first
- Keep plugins updated
- Monitor error logs regularly

---

### CSS Not Loading / Site Looks Unstyled

**Symptoms:** Site looks like plain HTML with no formatting

**Causes:** Stylesheet not loading, file permissions, caching

**Quick Fix:**

1. **Hard refresh browser:**
   - Windows: `Ctrl + Shift + R`
   - Mac: `Cmd + Shift + R`
   - Or clear cache: `Ctrl + Shift + Delete`

2. **Check if style.css exists:**
   - cPanel → File Manager
   - Navigate to: `public_html/wp-content/themes/virginia-policy-review/`
   - Look for `style.css` file
   - If missing, deploy from Git

3. **Check file permissions:**
   - Right-click `style.css` → Permissions
   - Should be `644` (rw-r--r--)
   - If not, change to 644 and save

4. **Check in browser:**
   - Right-click page → View Page Source
   - Search for "style.css"
   - Should see: `<link rel="stylesheet" href=".../style.css">`
   - Click link to see if CSS file loads
   - If shows 404, file path is wrong

5. **Fix file path in functions.php:**
   - If CSS 404s, check `functions.php` line ~61:
   ```php
   wp_enqueue_style('vpr-style', get_stylesheet_uri(), array(), '1.0');
   ```
   - Should use `get_stylesheet_uri()`

6. **Force refresh:**
   - Edit `functions.php` line 61
   - Change version number: `'1.0'` to `'1.1'`
   - This forces browser to reload CSS

**If Still Not Working:**
- Disable all plugins (one might be breaking CSS)
- Contact Bluehost support

**Prevention:**
- Always hard refresh after CSS changes
- Use versioning in `wp_enqueue_style()`

---

### Changes Don't Appear After Deploying

**Symptoms:** Pushed to Git, ran deploy script, but changes not visible

**Causes:** Browser cache, CDN cache, deploy didn't actually run

**Quick Fix:**

1. **Hard refresh browser:**
   - `Ctrl + Shift + R` (Windows)
   - `Cmd + Shift + R` (Mac)

2. **Clear browser cache completely:**
   - `Ctrl + Shift + Delete`
   - Check "Cached images and files"
   - Click "Clear data"

3. **Try incognito/private mode:**
   - `Ctrl + Shift + N` (Chrome)
   - `Ctrl + Shift + P` (Firefox)
   - If works in incognito, it's definitely cache

4. **Verify deploy actually ran:**
   - Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
   - Should show success message with recent changes
   - If shows errors, deploy didn't work (see [Deployment Issues](#deployment-script-shows-error))

5. **Check files on server:**
   - cPanel → File Manager
   - Navigate to theme directory
   - Open changed file
   - Verify your changes are actually there
   - If not, deploy failed silently

6. **If files aren't updated:**
   - SSH into server or use cPanel Terminal
   - Navigate to theme directory:
     ```bash
     cd /home/username/public_html/wp-content/themes/virginia-policy-review
     ```
   - Manually pull:
     ```bash
     git pull origin master
     ```

7. **Check file timestamps:**
   - cPanel → File Manager → Theme directory
   - Sort by "Last Modified"
   - Should show recent timestamp matching your deployment

**Prevention:**
- Always hard refresh after deploying
- Use versioning for CSS/JS files
- Test in incognito mode

---

### Images Not Loading / Broken Images

**Symptoms:** Images show as broken link icon or don't load

**Causes:** Wrong file path, missing file, permissions, moved file

**Quick Fix:**

1. **Check if image file exists:**
   - cPanel → File Manager
   - Navigate to: `public_html/wp-content/uploads/`
   - Look for your image file
   - If missing, re-upload via Media Library

2. **Check file path in code:**
   - If image is in theme (e.g., lawn.jpg background):
   - Should use: `<?php echo get_template_directory_uri(); ?>/images/lawn.jpg`
   - NOT: `images/lawn.jpg` (relative path won't work everywhere)

3. **Check file permissions:**
   - Right-click image → Permissions
   - Should be `644` (rw-r--r--)
   - If not, change and save

4. **Check uploads folder permissions:**
   - Navigate to `wp-content/uploads/`
   - Right-click → Permissions
   - Should be `755` (rwxr-xr-x)

5. **Verify URL is correct:**
   - Right-click broken image → "Open image in new tab"
   - Check URL - might show localhost or old domain
   - If wrong domain, database URLs need updating (see below)

6. **Fix URLs in database (if moved sites):**
   - cPanel → phpMyAdmin → Select database
   - Run SQL:
   ```sql
   UPDATE wp_posts
   SET post_content = REPLACE(post_content, 'http://old-url.com', 'https://keq.lpf.mybluehost.me');

   UPDATE wp_postmeta
   SET meta_value = REPLACE(meta_value, 'http://old-url.com', 'https://keq.lpf.mybluehost.me');
   ```

7. **Re-upload image:**
   - WordPress Admin → Media → Add New
   - Upload image again
   - Edit post/page → Set featured image

**Prevention:**
- Always use `get_template_directory_uri()` for theme images
- Don't hardcode domains in image paths
- Keep backups of uploads folder

---

### Mobile Site Looks Broken

**Symptoms:** Site looks fine on desktop but broken on phone/tablet

**Causes:** CSS media queries not loading, viewport meta tag missing

**Quick Fix:**

1. **Check on desktop first:**
   - Open site in Chrome
   - Press `F12` (Developer Tools)
   - Click "Toggle device toolbar" icon (phone/tablet icon)
   - Select iPhone or Android device
   - Reload page

2. **Check viewport meta tag:**
   - Right-click → View Page Source
   - Search for "viewport"
   - Should see:
   ```html
   <meta name="viewport" content="width=device-width, initial-scale=1">
   ```
   - If missing, add to `header.php` in `<head>` section

3. **Check media queries loading:**
   - Open Developer Tools (F12)
   - Console tab
   - Look for CSS errors
   - If style.css isn't loading, see [CSS Not Loading](#css-not-loading--site-looks-unstyled)

4. **Test specific breakpoints:**
   - In style.css, media queries are at:
     - 600px (phones)
     - 768px (tablets)
     - 900px (small laptops)
     - 1100px (standard laptops)
   - Check if CSS rules exist for these sizes

5. **Common mobile fixes:**

   **If text is too small:**
   - Edit `style.css`
   - Update base font size:
   ```css
   body {
       font-size: clamp(1rem, 2vw, 1.125rem);
   }
   ```

   **If layout doesn't stack:**
   - Check grid/flex containers have mobile rules:
   ```css
   @media (max-width: 768px) {
       .article-grid {
           grid-template-columns: 1fr; /* Single column on mobile */
       }
   }
   ```

**Prevention:**
- Always test mobile view before deploying
- Use responsive units (rem, em, %, vw/vh)
- Test on actual devices, not just browser DevTools

---

## Article / Content Issues

### Featured Image Not Showing on Homepage

**Symptoms:** Article published but no image shows in homepage grid

**Causes:** No featured image set, wrong size, file missing

**Quick Fix:**

1. **Check if featured image is actually set:**
   - WordPress Admin → Posts → Edit article
   - Right sidebar → Featured Image section
   - Should show image thumbnail
   - If says "Set featured image", click and select image

2. **Check image size:**
   - Image should be at least 800x600px
   - Recommended: 1200x800px (landscape)
   - If too small, upload larger version

3. **Check file format:**
   - Should be JPG, PNG, or WebP
   - Not: PDF, GIF, SVG (these might not work)

4. **Re-set featured image:**
   - Remove current featured image (click "Remove featured image")
   - Set featured image again
   - Update post

5. **Check theme code:**
   - In `front-page.php`, verify featured image code (~line 600):
   ```php
   <?php if (has_post_thumbnail()) : ?>
       <div class="article-image">
           <?php the_post_thumbnail('large'); ?>
       </div>
   <?php endif; ?>
   ```

6. **Regenerate thumbnails:**
   - Install plugin: "Regenerate Thumbnails"
   - Tools → Regenerate Thumbnails
   - Click "Regenerate All Thumbnails"
   - Wait for completion

**Prevention:**
- Always set featured image before publishing
- Use consistent image sizes (1200x800px)
- Check preview before publishing

---

### Article Not Appearing on The Third Rail Page

**Symptoms:** Article is published but doesn't show on blog page

**Causes:** Not categorized, wrong post type, scheduled for future

**Quick Fix:**

1. **Check article status:**
   - WordPress Admin → Posts → All Posts
   - Find your article
   - Status should be "Published" (not Draft or Pending)
   - If Draft, click "Quick Edit" → Status: Published → Update

2. **Check publish date:**
   - Edit article
   - Right sidebar → Publish → Edit (next to date)
   - Should be today or past date
   - If future date, change to today

3. **Check post type:**
   - Should be regular "Post", not "Page" or custom type
   - If wrong type, may need to recreate

4. **Check category:**
   - Edit article → Categories (right sidebar)
   - Should have at least one category checked
   - If "Uncategorized", run auto-categorization:
     - Visit: https://keq.lpf.mybluehost.me/categorize-articles.php
     - OR manually select category

5. **Check The Third Rail page query:**
   - Make sure page isn't filtering articles
   - Visit: https://keq.lpf.mybluehost.me/the-third-rail/
   - Try removing any search/category filters in URL

6. **Clear cache:**
   - If using caching plugin (WP Super Cache, W3 Total Cache):
     - WordPress Admin → Settings → [Cache Plugin]
     - Click "Clear All Cache"

**Prevention:**
- Always assign category before publishing
- Double-check status is "Published"
- Verify post type is "Post"

---

### Category Not Assigned to Article

**Symptoms:** Article shows "Uncategorized" or no category

**Causes:** No category selected, auto-categorization failed

**Quick Fix:**

1. **Manual assignment:**
   - WordPress Admin → Posts → Edit article
   - Right sidebar → Categories
   - Check appropriate category:
     - Domestic
     - International
     - Economics
     - Education
     - Environment
     - Healthcare
     - Social Policy
     - Security
     - Technology
   - Click "Update"

2. **Run auto-categorization script:**
   - Visit: https://keq.lpf.mybluehost.me/categorize-articles.php
   - Script analyzes keywords and assigns categories
   - Shows success message when done

3. **Bulk categorize multiple articles:**
   - WordPress Admin → Posts → All Posts
   - Check boxes for multiple articles
   - Bulk Actions dropdown → Edit
   - Click "Apply"
   - Categories: Select category
   - Click "Update"

4. **Create category if missing:**
   - WordPress Admin → Posts → Categories
   - Add New Category
   - Name: [Category Name]
   - Slug: [category-slug] (lowercase, hyphens)
   - Click "Add New Category"

**Prevention:**
- Always select category before publishing
- Use auto-categorization script periodically
- Train editors on category definitions

---

### Search Not Working on Third Rail

**Symptoms:** Searching articles returns no results or 404 error

**Causes:** Permalinks broken, query vars not registered

**Quick Fix:**

1. **Flush permalinks:**
   - Method 1: Visit https://keq.lpf.mybluehost.me/flush-rewrite-rules.php
   - Method 2: WordPress Admin → Settings → Permalinks → Save Changes

2. **Check .htaccess file:**
   - cPanel → File Manager → public_html
   - Look for `.htaccess` file
   - If missing or wrong, create with this content:
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

3. **Verify query vars registered:**
   - Check `functions.php` lines 390-426
   - Should have:
   ```php
   function vpr_add_query_vars($vars) {
       $vars[] = 'search';
       $vars[] = 'cat';
       $vars[] = 'year';
       return $vars;
   }
   add_filter('query_vars', 'vpr_add_query_vars');
   ```

4. **Check 404 fix is active:**
   - In `functions.php` lines 401-413:
   ```php
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
   ```

5. **Test search URL:**
   - Try: https://keq.lpf.mybluehost.me/the-third-rail/?search=policy
   - Should return results, not 404

**Prevention:**
- Don't edit permalinks unless necessary
- Keep .htaccess backed up
- Test search after any theme changes

---

### Article Shows 404 Error

**Symptoms:** Clicking article link shows "Page Not Found"

**Causes:** Permalinks not flushed, post deleted, wrong URL structure

**Quick Fix:**

1. **Flush permalinks:**
   - WordPress Admin → Settings → Permalinks
   - Click "Save Changes" (don't change anything)
   - This regenerates URL structure

2. **Check if post exists:**
   - WordPress Admin → Posts → All Posts
   - Search for article title
   - Check status: Published (not Trashed or Draft)

3. **Check permalink structure:**
   - WordPress Admin → Settings → Permalinks
   - Should be "Post name" (custom structure: `/%postname%/`)
   - If different, change to Post name and save

4. **Check post slug:**
   - Edit article
   - Under title, click "Edit" next to permalink
   - Slug should be short, lowercase, hyphens (no spaces)
   - Example: "future-climate-policy" not "The Future of Climate Policy!!"

5. **Verify .htaccess:**
   - See [Search Not Working](#search-not-working-on-third-rail) above

6. **Check database:**
   - cPanel → phpMyAdmin → Select database
   - Browse `wp_posts` table
   - Find article (search post_title)
   - Check `post_status` = 'publish'
   - Check `post_type` = 'post'

**Prevention:**
- Use simple, clean permalinks
- Don't change permalink structure
- Flush after activating theme

---

## Admin / Login Issues

### Can't Log Into WordPress Admin

**Symptoms:** Login fails, shows "incorrect password" or redirect loop

**Causes:** Wrong password, cookies, URL mismatch, plugin conflict

**Quick Fix:**

1. **Check URL:**
   - Make sure visiting: https://keq.lpf.mybluehost.me/wp-admin
   - NOT: http:// (without S)
   - NOT: localhost or old domain

2. **Clear browser cookies:**
   - `Ctrl + Shift + Delete`
   - Check "Cookies"
   - Clear from "All time"
   - Try logging in again

3. **Reset password:**
   - Click "Lost your password?"
   - Enter your email
   - Check email for reset link
   - Set new password
   - Try logging in

4. **Disable plugins (if redirect loop):**
   - cPanel → File Manager → public_html/wp-content
   - Rename `plugins` folder to `plugins.disabled`
   - Try logging in
   - If works, plugin is causing issue:
     - Rename back to `plugins`
     - Rename plugin folders one by one to find culprit

5. **Check wp-config.php URLs:**
   - cPanel → File Manager → public_html
   - Edit `wp-config.php`
   - Check if has hardcoded URLs
   - If using localhost or old domain, remove these lines:
   ```php
   define('WP_HOME', 'http://oldurl.com');
   define('WP_SITEURL', 'http://oldurl.com');
   ```

6. **Reset password via database:**
   - cPanel → phpMyAdmin → Select database
   - Browse `wp_users` table
   - Find your user
   - Edit `user_pass` field
   - Set value to: `$P$BqXQQNqKpJvGHnLwUv4f1JJ1gJ5bJ0/`
   - This sets password to: `password123`
   - Function: MD5
   - Click "Go"
   - Log in with: username / password123
   - Immediately change password!

**Prevention:**
- Use strong, memorable passwords
- Don't clear browser data during active session
- Keep backup admin account

---

### Locked Out After Too Many Attempts

**Symptoms:** "Too many failed login attempts" message

**Causes:** Security plugin (Wordfence, Limit Login Attempts)

**Quick Fix:**

1. **Wait it out:**
   - Lockouts usually expire after 30 minutes
   - Make coffee, come back later

2. **Use IP whitelist (if you have it):**
   - Some security plugins allow whitelisted IPs
   - Check plugin settings

3. **Disable security plugin via cPanel:**
   - cPanel → File Manager → wp-content/plugins
   - Find plugin folder (wordfence, limit-login-attempts, etc.)
   - Rename to `pluginname.disabled`
   - Try logging in
   - After login, rename back and configure properly

4. **Check .htaccess for IP blocks:**
   - cPanel → File Manager → public_html
   - Edit `.htaccess`
   - Look for lines like: `deny from 1.2.3.4`
   - Remove or comment out with `#`
   - Save

5. **Contact host if still locked:**
   - Bluehost support can check server-level blocks
   - Call: 1-888-401-4678

**Prevention:**
- Save correct password in password manager
- Whitelist your IP in security plugin
- Don't let others guess your login URL

---

### Can't Upload Images (File Too Large)

**Symptoms:** "The uploaded file exceeds the upload_max_filesize directive"

**Causes:** PHP upload limits set too low

**Quick Fix:**

1. **Compress image first:**
   - Use TinyPNG.com or Squoosh.app
   - Reduce file size to under 2 MB
   - Try uploading again

2. **Check current limits:**
   - WordPress Admin → Tools → Site Health → Info
   - Expand "Server" section
   - Note: `upload_max_filesize` and `post_max_size`

3. **Increase via wp-config.php:**
   - cPanel → File Manager → public_html
   - Edit `wp-config.php`
   - Add before `/* That's all, stop editing! */`:
   ```php
   @ini_set('upload_max_size', '64M');
   @ini_set('post_max_size', '64M');
   @ini_set('max_execution_time', '300');
   ```
   - Save

4. **Create/edit php.ini:**
   - cPanel → File Manager → public_html
   - Create file: `php.ini`
   - Add content:
   ```ini
   upload_max_filesize = 64M
   post_max_size = 64M
   max_execution_time = 300
   memory_limit = 256M
   ```
   - Save

5. **Contact Bluehost:**
   - If above doesn't work, host may have hard limits
   - Request increase to 64M or higher

**Prevention:**
- Compress images before uploading
- Resize images to appropriate dimensions
- Use WebP format for smaller file sizes

---

### Editor / Add New Button Missing

**Symptoms:** Can't see "Add New" button or editing options

**Causes:** Wrong user role, permissions issue

**Quick Fix:**

1. **Check user role:**
   - Ask administrator to check your account
   - WordPress Admin → Users → All Users
   - Find your username
   - Role should be "Editor" or "Administrator" (not Subscriber or Contributor)

2. **Have admin change role:**
   - Edit user → Role dropdown → Editor
   - Update User

3. **Check capability:**
   - If Editor role but still can't post:
   - May need plugin: User Role Editor
   - WordPress Admin → Plugins → Add New
   - Search "User Role Editor"
   - Install and activate
   - Users → User Role Editor → Editor
   - Verify "edit_posts" capability is checked

**Prevention:**
- Always assign correct role when creating users
- Document who has what access level

---

## Git / Deployment Issues

### Deployment Script Shows Error

**Symptoms:** Visiting deploy-from-github.php shows error message

**Causes:** Git not installed, authentication failure, file permissions

**Quick Fix:**

**Error: "git: command not found"**

1. Git not installed on server
2. Contact Bluehost support to install Git
3. Or use FTP upload method instead

**Error: "Permission denied (publickey)"**

1. SSH key not set up for GitHub access
2. Solution: Use HTTPS instead of SSH
3. On server, navigate to theme directory:
   ```bash
   cd /home/username/public_html/wp-content/themes/virginia-policy-review
   git remote -v
   ```
4. If shows SSH (git@github.com), change to HTTPS:
   ```bash
   git remote set-url origin https://github.com/behartless67-a11y/VPRMigration.git
   ```

**Error: "fatal: Not a git repository"**

1. Theme directory not initialized as Git repo
2. Solution: Re-clone from GitHub:
   ```bash
   cd /home/username/public_html/wp-content/themes/
   rm -rf virginia-policy-review
   git clone https://github.com/behartless67-a11y/VPRMigration.git virginia-policy-review
   cd virginia-policy-review
   git checkout master
   ```

**Error: "Your local changes would be overwritten"**

1. Files on server were edited directly
2. Solution: Stash or discard server changes:
   ```bash
   git stash
   git pull origin master
   ```

**Prevention:**
- Never edit files directly on server
- Always deploy through Git
- Test deploy script after server changes

---

### Git Push Fails / Rejected

**Symptoms:** `git push` shows error or rejected message

**Causes:** Out of sync, no permission, branch protection

**Quick Fix:**

**Error: "Updates were rejected because the tip of your current branch is behind"**

1. You need to pull first:
   ```bash
   git pull origin master
   ```
2. If merge conflict, resolve (see next section)
3. Then push:
   ```bash
   git push origin master
   ```

**Error: "Permission denied (publickey)"**

1. Not authenticated with GitHub
2. Solution: Use HTTPS instead:
   ```bash
   git remote set-url origin https://github.com/behartless67-a11y/VPRMigration.git
   git push origin master
   ```
3. Enter GitHub username and password (or personal access token)

**Error: "repository not found"**

1. Not a collaborator on repository
2. Ask project lead to add you as collaborator
3. Accept invitation email from GitHub

**Prevention:**
- Always `git pull` before starting work
- Set up SSH keys for easier authentication
- Stay in sync with team

---

### Merge Conflict After Git Pull

**Symptoms:** `git pull` shows "CONFLICT" message

**Causes:** You and someone else edited same file

**Quick Fix:**

1. **Don't panic!** Conflicts are normal and fixable.

2. **See which files have conflicts:**
   ```bash
   git status
   ```
   - Shows files marked as "both modified"

3. **Open conflicted file in text editor:**
   - Look for conflict markers:
   ```
   <<<<<<< HEAD
   Your changes
   =======
   Their changes
   >>>>>>> origin/master
   ```

4. **Resolve conflict manually:**
   - Decide which version to keep (or combine both)
   - Delete conflict markers (<<<, ===, >>>)
   - Keep final version you want
   - Save file

5. **Example conflict resolution:**

   **Before:**
   ```php
   <<<<<<< HEAD
   <h1>Welcome to VPR</h1>
   =======
   <h1>Virginia Policy Review</h1>
   >>>>>>> origin/master
   ```

   **After (keeping second version):**
   ```php
   <h1>Virginia Policy Review</h1>
   ```

6. **Mark as resolved:**
   ```bash
   git add front-page.php
   ```

7. **Complete merge:**
   ```bash
   git commit -m "Resolve merge conflict in front-page.php"
   git push origin master
   ```

**Prevention:**
- Communicate with team about who's working on what
- Pull frequently to stay in sync
- Work on different files when possible

---

### Changes Pushed But Not on Live Site

**Symptoms:** Git shows successful push, but live site unchanged

**Causes:** Forgot to deploy, deploy script didn't run

**Quick Fix:**

1. **Run deploy script:**
   - Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
   - Should show "Deployment successful"

2. **Verify files updated on server:**
   - cPanel → File Manager
   - Navigate to: public_html/wp-content/themes/virginia-policy-review
   - Open changed file
   - Check if your changes are there
   - Check "Last Modified" timestamp

3. **If files didn't update:**
   - See [Deployment Script Shows Error](#deployment-script-shows-error)

4. **Clear cache:**
   - Hard refresh: `Ctrl + Shift + R`
   - Try incognito mode
   - If works in incognito, it's browser cache

**Prevention:**
- Add deploy step to your checklist
- Verify changes on live site immediately after deploy
- Use bookmarks for quick access to deploy script

---

### Wrong Branch (on main instead of master)

**Symptoms:** Git shows you're on `main` branch instead of `master`

**Causes:** Accidentally checked out wrong branch

**Quick Fix:**

1. **Check current branch:**
   ```bash
   git branch
   ```
   - Shows `* main` instead of `* master`

2. **Switch to master:**
   ```bash
   git checkout master
   ```

3. **If you made changes on main:**
   ```bash
   # Stash changes
   git stash

   # Switch to master
   git checkout master

   # Apply changes
   git stash pop
   ```

4. **If you committed to main:**
   ```bash
   # Note the commit hash
   git log --oneline -1

   # Switch to master
   git checkout master

   # Cherry-pick the commit
   git cherry-pick [commit-hash]

   # Push to GitHub
   git push origin master
   ```

**Prevention:**
- Always check branch before starting work: `git branch`
- Add branch name to terminal prompt
- Bookmark: Always use master!

---

## Database Issues

### Database Connection Error

**Symptoms:** "Error establishing a database connection"

**Causes:** Wrong credentials, database server down, wp-config.php corrupted

**Quick Fix:**

1. **Check if database exists:**
   - cPanel → phpMyAdmin
   - Look for VPR database in left sidebar
   - If missing, restore from backup

2. **Verify credentials in wp-config.php:**
   - cPanel → File Manager → public_html
   - Edit `wp-config.php`
   - Check these lines:
   ```php
   define('DB_NAME', 'username_vprjournal');      // Exact database name
   define('DB_USER', 'username_vprwp');           // Database user
   define('DB_PASSWORD', 'your_password');        // Database password
   define('DB_HOST', 'localhost');                // Usually localhost
   ```

3. **Test database connection:**
   - Create file: `test-connection.php` in public_html:
   ```php
   <?php
   $connection = mysqli_connect('localhost', 'username_vprwp', 'password', 'username_vprjournal');
   if ($connection) {
       echo "Connection successful!";
   } else {
       echo "Connection failed: " . mysqli_connect_error();
   }
   ?>
   ```
   - Visit: https://keq.lpf.mybluehost.me/test-connection.php
   - If fails, credentials are wrong
   - Delete file after testing!

4. **Reset database password:**
   - cPanel → MySQL Databases
   - Find user → Change Password
   - Set new password
   - Update password in wp-config.php

5. **Check MySQL server status:**
   - Contact Bluehost support
   - They can verify MySQL is running

6. **Restore from backup:**
   - If database is corrupted:
   - cPanel → Backup
   - Restore database from most recent backup

**Prevention:**
- Never commit wp-config.php with real passwords
- Keep database backups
- Document correct credentials securely

---

### Local Site Shows Old Content

**Symptoms:** Local site (localhost) shows outdated articles/content

**Causes:** Local database not synced with live site

**Quick Fix:**

1. **Export fresh database from live site:**
   - Log into Bluehost cPanel
   - phpMyAdmin → Select database
   - Export tab → Quick export → Go
   - Save as `vprjournal_live.sql`

2. **Import to local database:**
   - Open http://localhost/phpmyadmin/
   - Select `vprjournal` database
   - Import tab
   - Choose file: `vprjournal_live.sql`
   - Click "Go"
   - Wait for completion

3. **Update URLs in local database:**
   - phpMyAdmin → vprjournal → SQL tab
   - Run these queries:
   ```sql
   UPDATE wp_options
   SET option_value = 'http://localhost/vpr'
   WHERE option_name = 'siteurl' OR option_name = 'home';

   UPDATE wp_posts
   SET post_content = REPLACE(post_content, 'https://keq.lpf.mybluehost.me', 'http://localhost/vpr');

   UPDATE wp_postmeta
   SET meta_value = REPLACE(meta_value, 'https://keq.lpf.mybluehost.me', 'http://localhost/vpr');
   ```

4. **Visit local site:**
   - http://localhost/vpr/
   - Should now show current content

**Prevention:**
- Sync database monthly
- Document when last synced
- Use staging environment for testing

---

## Hosting / Server Issues

### Site Is Very Slow

**Symptoms:** Pages take 5+ seconds to load

**Causes:** No caching, large images, plugin bloat, shared hosting limits

**Quick Fix:**

1. **Test actual speed:**
   - Visit: https://gtmetrix.com/
   - Enter: https://keq.lpf.mybluehost.me/
   - Click "Test your site"
   - Note load time and page size

2. **Install caching plugin:**
   - WordPress Admin → Plugins → Add New
   - Search "WP Super Cache"
   - Install and Activate
   - Settings → WP Super Cache
   - Click "Caching On"
   - Recommended settings → Update

3. **Optimize images:**
   - Install plugin: "Smush"
   - Media → Bulk Smush
   - Click "Bulk Smush Now"
   - Compresses all images

4. **Disable unused plugins:**
   - WordPress Admin → Plugins
   - Deactivate plugins you don't use
   - Delete completely

5. **Enable compression:**
   - Edit .htaccess in public_html:
   ```apache
   # Compress HTML, CSS, JavaScript
   <IfModule mod_deflate.c>
   AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css application/javascript
   </IfModule>
   ```

6. **Use CDN:**
   - cPanel → CloudFlare
   - Enable free CloudFlare CDN
   - Follow setup instructions

7. **Check resource usage:**
   - cPanel → CPU and Concurrent Connection Usage
   - If hitting limits, may need upgraded hosting plan

**Prevention:**
- Compress images before uploading
- Keep plugins minimal
- Use caching plugin
- Monitor performance monthly

---

### 500 Internal Server Error

**Symptoms:** Page shows "500 Internal Server Error" or blank white page

**Causes:** PHP error, .htaccess issue, memory limit, file permissions

**Quick Fix:**

1. **Check error logs:**
   - cPanel → Errors
   - View latest errors
   - Look for PHP errors or memory issues

2. **Check .htaccess:**
   - cPanel → File Manager → public_html
   - Rename `.htaccess` to `.htaccess.bak`
   - Try loading site
   - If works, .htaccess was the problem
   - Regenerate: WordPress Admin → Settings → Permalinks → Save

3. **Increase memory limit:**
   - Edit wp-config.php:
   ```php
   define('WP_MEMORY_LIMIT', '256M');
   ```

4. **Check file permissions:**
   - All directories should be 755
   - All files should be 644
   - Fix via cPanel File Manager → Select All → Permissions

5. **Disable plugins:**
   - Rename wp-content/plugins to plugins.disabled
   - Try loading site
   - If works, a plugin caused the issue

6. **Check PHP version:**
   - cPanel → MultiPHP Manager
   - Should be PHP 7.4 or 8.0+
   - If on PHP 5.6, upgrade to 7.4

**Prevention:**
- Monitor error logs regularly
- Test plugin updates before applying
- Keep .htaccess backed up

---

### 403 Forbidden Error

**Symptoms:** "403 Forbidden - You don't have permission to access this resource"

**Causes:** File permissions, .htaccess rules, security plugin

**Quick Fix:**

1. **Check file permissions:**
   - cPanel → File Manager → public_html
   - Right-click → Permissions
   - Should be: 755 (rwxr-xr-x)
   - Change and apply to subdirectories

2. **Check index file exists:**
   - Look for `index.php` in public_html
   - If missing, WordPress is broken
   - Restore from backup

3. **Check .htaccess:**
   - Look for deny/allow rules:
   ```apache
   Order deny,allow
   Deny from all
   ```
   - Comment out or remove restrictive rules

4. **Disable security plugin:**
   - Rename wp-content/plugins/[security-plugin] folder
   - Try accessing site

5. **Check IP not blocked:**
   - cPanel → IP Blocker
   - Make sure your IP isn't listed
   - Remove if blocked

**Prevention:**
- Don't manually edit file permissions unless needed
- Test .htaccess changes carefully
- Whitelist your IP in security plugins

---

### Disk Space Quota Exceeded

**Symptoms:** "Disk quota exceeded" error, can't upload files

**Causes:** Too many backups, large uploads folder, log files

**Quick Fix:**

1. **Check disk usage:**
   - cPanel → Disk Usage
   - See what's using space

2. **Delete old backups:**
   - cPanel → Backup
   - Delete old backup files

3. **Clean uploads folder:**
   - WordPress Admin → Media
   - Delete unused images
   - Or use plugin: "Media Cleaner"

4. **Delete cache files:**
   - wp-content/cache/ - delete contents
   - wp-content/uploads/cache/ - delete contents

5. **Clean database:**
   - Install plugin: "WP-Optimize"
   - Clean post revisions
   - Clean spam comments
   - Clean transients

6. **Check error logs:**
   - If huge error_log file:
   - Delete or truncate: > error_log

7. **Upgrade hosting plan:**
   - If legitimately out of space:
   - Contact Bluehost to upgrade

**Prevention:**
- Regularly clean old backups
- Optimize images before upload
- Limit post revisions in wp-config.php:
  ```php
  define('WP_POST_REVISIONS', 5);
  ```

---

## Email Issues

### Contact Form Not Sending Emails

**Symptoms:** Contact form submits but no email received

**Causes:** PHP mail() function blocked, wrong email address, spam folder

**Quick Fix:**

1. **Check spam folder:**
   - Look in spam/junk folder
   - Add sender to contacts

2. **Test WordPress email:**
   - WordPress Admin → Tools → Site Health
   - Info tab → Expand "Server"
   - Look for "Mail" section
   - If shows error, PHP mail() is blocked

3. **Install SMTP plugin:**
   - Plugins → Add New
   - Search "WP Mail SMTP"
   - Install and activate
   - Configure with Bluehost SMTP:
     - SMTP Host: `mail.yourdomain.com`
     - SMTP Port: `465` (SSL) or `587` (TLS)
     - Encryption: SSL
     - Username: `contact@yourdomain.com` (create in cPanel first)
     - Password: [email account password]

4. **Create email account:**
   - cPanel → Email Accounts
   - Click "Create"
   - Email: `contact@yourdomain.com`
   - Set password
   - Create

5. **Test sending:**
   - WP Mail SMTP → Settings → Email Test
   - Enter your email
   - Send test email
   - Check if received

**Prevention:**
- Use SMTP plugin from start (more reliable)
- Monitor contact form regularly
- Test monthly

---

### Not Receiving WordPress Notifications

**Symptoms:** No emails when new comment, update available, etc.

**Causes:** WordPress email not configured, wrong admin email

**Quick Fix:**

1. **Check admin email:**
   - WordPress Admin → Settings → General
   - "Administration Email Address" should be correct
   - Update if wrong
   - Check email for verification link

2. **Install SMTP plugin:**
   - See [Contact Form Not Sending Emails](#contact-form-not-sending-emails) above

3. **Check email forwarding:**
   - cPanel → Email Forwarders
   - Set up forwarding to your preferred email

**Prevention:**
- Keep admin email current
- Use SMTP plugin
- Test notifications after any email changes

---

## Still Having Issues?

If your problem isn't listed or fixes don't work:

1. **Check full documentation:**
   - PROJECT-HANDOFF-DOCUMENTATION.md
   - TRAINING-GUIDE.md

2. **Search existing issues:**
   - GitHub: https://github.com/behartless67-a11y/VPRMigration/issues

3. **Create new GitHub issue:**
   - Describe problem
   - Include error messages
   - Attach screenshots
   - Mention what you tried

4. **Contact support:**
   - **Bluehost:** 1-888-401-4678 (24/7)
   - **Project Lead:** [Contact info]

5. **Emergency backup restore:**
   - cPanel → Backup
   - Restore entire site from last working backup
   - Document what led to issue

---

**Remember:** Stay calm, read error messages carefully, and test changes locally first!

**Last Updated:** October 2024
