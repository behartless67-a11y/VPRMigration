# VPR WordPress - Quick Reference Card

**🌐 Live Site:** https://keq.lpf.mybluehost.me/
**🔐 Admin:** https://keq.lpf.mybluehost.me/wp-admin
**📦 GitHub:** https://github.com/behartless67-a11y/VPRMigration

---

## 📝 Common Tasks (90% of what you'll do)

### 1. Add a New Article to The Third Rail

**In WordPress Admin:**

1. Go to **Posts → Add New**
2. Enter title and content
3. **Set Featured Image** (required for homepage display):
   - Right sidebar → Featured Image → Set featured image
   - Upload or select image (recommended: 800x600px minimum)
4. **Choose Category**:
   - Domestic, International, Economics, Education, Environment, Healthcare, Social Policy, Security, or Technology
5. **Optional:** Check "Featured Article" box (appears in homepage slideshow)
6. Click **Publish**

**URL:** https://keq.lpf.mybluehost.me/wp-admin/post-new.php

---

### 2. Deploy Code Changes to Live Site

**After making theme changes:**

```bash
# 1. In your local project directory
git add .
git commit -m "Brief description of what changed"
git push origin master

# 2. Open browser and visit:
https://keq.lpf.mybluehost.me/deploy-from-github.php

# 3. Wait for "Deployment successful" message

# 4. Hard refresh live site (Ctrl + Shift + R)
```

**⚠️ ALWAYS test locally first!** http://localhost/vpr/

---

### 3. Add a Podcast Episode

**In WordPress Admin:**

1. Go to **Podcast Episodes → Add New**
2. Enter episode title (e.g., "Episode 9: Interview with...")
3. Add description in content area
4. **Set Featured Image** (guest photo or episode thumbnail)
5. **Add Custom Fields**:
   - `guest_name`: Full name
   - `guest_title`: Professional title/affiliation
   - `anchor_url`: Link to episode on Anchor FM
   - `episode_number`: 9 (or next number)
   - `air_date`: YYYY-MM-DD
6. Click **Publish**

**URL:** https://keq.lpf.mybluehost.me/wp-admin/post-new.php?post_type=podcast_episode

---

### 4. Update Journal Issues Page

**In WordPress Admin:**

1. Go to **Journal Issues → Add New**
2. Enter volume title (e.g., "Volume XVII - Spring 2025")
3. Add journal description
4. **Set Featured Image** (journal cover image)
5. **Add Custom Fields**:
   - `pdf_url`: Link to downloadable PDF
   - `publication_year`: 2025
   - `volume_number`: XVII
6. **Assign Year Taxonomy** (sidebar)
7. Click **Publish**

**URL:** https://keq.lpf.mybluehost.me/wp-admin/post-new.php?post_type=journal_issue

---

## 🛠️ Troubleshooting Quick Fixes

### Page Looks Broken / CSS Not Loading

```
1. Hard refresh: Ctrl + Shift + R (Windows) or Cmd + Shift + R (Mac)
2. Clear browser cache: Ctrl + Shift + Delete
3. Try incognito/private browsing mode
4. Check error logs in cPanel → Metrics → Errors
```

### 404 Error on Articles/Pages

```
Fix permalinks:
1. Go to: https://keq.lpf.mybluehost.me/wp-admin/options-permalink.php
2. Click "Save Changes" (don't change anything)
3. This regenerates .htaccess file
```

### Featured Image Not Showing

```
1. Edit the article
2. Right sidebar → Featured Image
3. Make sure an image is actually selected
4. Image should be at least 800x600px
```

### Search Not Working on Third Rail Page

```
1. Visit: https://keq.lpf.mybluehost.me/flush-rewrite-rules.php
2. This resets URL routing
3. Or fix permalinks (see above)
```

---

## 🔐 Access Information

### Bluehost cPanel
- **URL:** https://my.bluehost.com/
- **Username:** [Ask project lead]
- **Access:** File Manager, phpMyAdmin, Error Logs, Backups

### WordPress Admin
- **URL:** https://keq.lpf.mybluehost.me/wp-admin
- **Username:** [Ask project lead]
- **Role:** Administrator or Editor

### FTP Access (for file uploads)
- **Host:** ftp.keq.lpf.mybluehost.me
- **Port:** 21 (FTP) or 22 (SFTP - recommended)
- **Client:** FileZilla, WinSCP, or Cyberduck

### GitHub Repository
- **URL:** https://github.com/behartless67-a11y/VPRMigration
- **Branch:** `master` (main development branch)
- **Access:** Request collaborator access

---

## 📂 File Locations

### On Bluehost Server
```
Theme Files:
/home/[username]/public_html/wp-content/themes/virginia-policy-review/

Images:
/home/[username]/public_html/wp-content/uploads/

Database Credentials:
/home/[username]/public_html/wp-config.php

Error Log:
/home/[username]/public_html/wp-content/debug.log
```

### Local Development (XAMPP)
```
WordPress Install:
C:/xampp/htdocs/vpr/

Theme Files:
C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

Database:
Access via: http://localhost/phpmyadmin/
Database Name: vprjournal
```

### Git Repository
```
Project Directory:
C:/Users/[YourName]/OneDrive - University of Virginia/Desktop/AI_Working/VPRWordpress/

Theme Files (root):
*.php, *.css, images/, js/
```

---

## 🚀 Local Development Workflow

### Starting Your Work Session

```bash
# 1. Start XAMPP
- Open XAMPP Control Panel
- Start Apache
- Start MySQL

# 2. Pull latest changes
cd [project-directory]
git checkout master
git pull origin master

# 3. Copy to XAMPP
cp *.php *.css C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r images js C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# 4. Open browser
http://localhost/vpr/
```

### Making Changes

```bash
# 1. Edit files in XAMPP directory
C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# 2. Test locally
http://localhost/vpr/

# 3. Copy back to project
cd C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp *.php *.css [project-directory]/
cp -r images js [project-directory]/

# 4. Commit and push
cd [project-directory]
git add .
git commit -m "Description of changes"
git push origin master

# 5. Deploy to live site
Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
```

---

## 🆘 Emergency Contacts

### Technical Issues
- **Bluehost Support:** 1-888-401-4678 or live chat at https://my.bluehost.com/
- **GitHub Issues:** https://github.com/behartless67-a11y/VPRMigration/issues
- **Project Lead:** [Contact info]

### Site Down?
1. Check Bluehost status: https://my.bluehost.com/
2. Check cPanel → Metrics → Errors
3. Contact Bluehost support immediately
4. Check if WordPress needs updating: wp-admin → Updates

### Database Issues?
1. Log into cPanel
2. phpMyAdmin → Select database
3. Check if tables exist: wp_posts, wp_options, etc.
4. Restore from backup if needed: cPanel → Backup

---

## 📊 Important URLs Bookmark These!

| Purpose | URL |
|---------|-----|
| **Live Site** | https://keq.lpf.mybluehost.me/ |
| **WordPress Admin** | https://keq.lpf.mybluehost.me/wp-admin |
| **Add New Article** | https://keq.lpf.mybluehost.me/wp-admin/post-new.php |
| **All Articles** | https://keq.lpf.mybluehost.me/wp-admin/edit.php |
| **Add Podcast** | https://keq.lpf.mybluehost.me/wp-admin/post-new.php?post_type=podcast_episode |
| **Deploy Script** | https://keq.lpf.mybluehost.me/deploy-from-github.php |
| **Fix Permalinks** | https://keq.lpf.mybluehost.me/wp-admin/options-permalink.php |
| **Bluehost Login** | https://my.bluehost.com/ |
| **GitHub Repo** | https://github.com/behartless67-a11y/VPRMigration |
| **Local Site** | http://localhost/vpr/ |
| **Local phpMyAdmin** | http://localhost/phpmyadmin/ |

---

## 📅 Regular Maintenance Schedule

### Weekly
- [ ] Check for new article submissions
- [ ] Publish approved articles
- [ ] Review WordPress updates available

### Monthly
- [ ] Update WordPress core (if available)
- [ ] Update plugins
- [ ] Run database optimization: WP-Optimize plugin
- [ ] Check error logs: cPanel → Metrics → Errors
- [ ] Test site speed: https://gtmetrix.com/

### Quarterly
- [ ] Full site backup: cPanel → Backup
- [ ] Security scan: Wordfence plugin
- [ ] Review and archive old articles
- [ ] Update team member profiles on About page

---

## 💡 Pro Tips

1. **Always test locally first** before deploying to live site
2. **Commit often** with descriptive messages (easier to track changes)
3. **Use hard refresh** (Ctrl+Shift+R) when CSS doesn't update
4. **Check "Featured Article"** box for homepage slideshow articles
5. **Set featured images** - required for proper display in grids
6. **Categories auto-assign** but you can manually override
7. **Git branch is `master`** not `main` (important!)
8. **Keep backups** before major changes

---

## 🎨 Design Guidelines

### Colors (UVA Branding)
- **Primary Blue:** #232D4B (headers, text, footer)
- **Accent Orange:** #E57200 (links, highlights, Virginia text)
- **Gray Background:** #f8f8f8 (alternate sections)

### Image Sizes
- **Featured Images:** 1200x800px minimum (landscape)
- **Journal Covers:** 800x1200px (portrait)
- **Staff Photos:** 600x600px (square)
- **Article Thumbnails:** 800x600px (landscape)

### Typography
- **Headlines:** Crimson Text (serif)
- **Body Text:** Crimson Text (serif)
- **UI Elements:** Inter (sans-serif)

---

## 🔒 Security Best Practices

1. **Never commit passwords** to GitHub
2. **Use strong passwords** (16+ characters, mixed case, numbers, symbols)
3. **Log out** when done with WordPress admin
4. **Update regularly** (WordPress, plugins, themes)
5. **Backup before updates** (just in case)
6. **Delete unused plugins/themes**
7. **Limit login attempts** (Wordfence plugin)

---

**📖 Full Documentation:** See PROJECT-HANDOFF-DOCUMENTATION.md for complete details

**Last Updated:** October 2024
**Questions?** Check documentation or create GitHub issue
