# Virginia Policy Review - Deployment Guide

## Current Status

**Local Development:** ✅ Complete
- WordPress installed at: `C:\xampp\htdocs\vpr`
- Theme located at: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review`
- Git repository: https://github.com/behartless67-a11y/VPRMigration
- Database: `vprjournal` (MySQL, username: root, password: 232323)

**Theme Features:**
- Cornell-style magazine layout
- Faded UVA lawn background on all pages
- Navigation with active page highlighting
- Featured articles with thumbnails
- Responsive design (1600px max width)
- All pages: Home, About Us, The Third Rail, Academical, Journal Issues, Contact

**Collaborators:**
- Added as WordPress Editors
- Have GitHub access to the repository

---

## Next Steps: Automatic Deployment to Hosting

### Prerequisites
1. ✅ Hosting account (Bluehost, SiteGround, DigitalOcean, etc.)
2. ✅ SSH access enabled on hosting account
3. ✅ Domain name (optional - can use temporary hosting URL first)
4. ✅ GitHub repository: https://github.com/behartless67-a11y/VPRMigration

---

## Step-by-Step Deployment Process

### Phase 1: Set Up Hosting & WordPress

1. **Access Hosting cPanel**
   - Log into your hosting provider's cPanel

2. **Create MySQL Database**
   ```
   Database Name: vprjournal (or your choice)
   Database User: [create username]
   Database Password: [create strong password]
   Grant ALL PRIVILEGES to user
   ```

3. **Export Local Database**
   ```bash
   C:/xampp/mysql/bin/mysqldump -uroot -p232323 vprjournal > vprjournal_backup.sql
   ```

4. **Upload WordPress Files**
   - Option A: Upload via FTP (faster)
     - Use FileZilla or similar
     - Upload all files from `C:\xampp\htdocs\vpr\` to `public_html` (or subdirectory)

   - Option B: Use File Manager in cPanel
     - Zip local WordPress folder
     - Upload and extract in cPanel File Manager

5. **Import Database on Hosting**
   - cPanel → phpMyAdmin
   - Select your database
   - Import tab → Choose `vprjournal_backup.sql`
   - Click Go

6. **Update wp-config.php on Server**
   ```php
   define('DB_NAME', 'your_hosting_database_name');
   define('DB_USER', 'your_hosting_database_user');
   define('DB_PASSWORD', 'your_hosting_database_password');
   define('DB_HOST', 'localhost');
   ```

7. **Update Site URLs in Database**
   In phpMyAdmin, run:
   ```sql
   UPDATE wp_options SET option_value = 'https://yoursite.com' WHERE option_name = 'siteurl';
   UPDATE wp_options SET option_value = 'https://yoursite.com' WHERE option_name = 'home';
   ```

8. **Test Site**
   - Visit your hosting URL
   - Log into WordPress admin: `yoursite.com/wp-admin`

---

### Phase 2: Set Up Automatic Git Deployment

#### Method 1: SSH + Git Pull (Recommended)

1. **Enable SSH Access**
   - In cPanel → Terminal or SSH Access
   - Generate SSH key pair if needed

2. **SSH into Your Server**
   ```bash
   ssh username@yourdomain.com
   ```

3. **Navigate to Theme Directory**
   ```bash
   cd public_html/wp-content/themes/virginia-policy-review
   ```

4. **Initialize Git (if not already)**
   ```bash
   git init
   git remote add origin https://github.com/behartless67-a11y/VPRMigration.git
   git fetch origin
   git checkout master
   ```

5. **Create Deploy Script**
   Create file: `~/deploy-vpr.sh`
   ```bash
   #!/bin/bash
   cd ~/public_html/wp-content/themes/virginia-policy-review
   git pull origin master
   echo "Deployment complete: $(date)"
   ```

6. **Make Script Executable**
   ```bash
   chmod +x ~/deploy-vpr.sh
   ```

7. **Manual Deployment**
   Whenever you push to GitHub, SSH in and run:
   ```bash
   ~/deploy-vpr.sh
   ```

#### Method 2: GitHub Webhook (Automatic)

1. **Create Deploy Script**
   In `public_html/deploy.php`:
   ```php
   <?php
   $secret = 'your_secret_key_here'; // Change this!

   if ($_GET['secret'] !== $secret) {
       die('Invalid secret');
   }

   $output = shell_exec('cd wp-content/themes/virginia-policy-review && git pull origin master 2>&1');
   echo "<pre>$output</pre>";
   ```

2. **Set Up GitHub Webhook**
   - Go to: https://github.com/behartless67-a11y/VPRMigration/settings/hooks
   - Add webhook
   - Payload URL: `https://yoursite.com/deploy.php?secret=your_secret_key_here`
   - Content type: `application/json`
   - Events: Just the push event
   - Active: ✅

3. **Test**
   - Make a change locally
   - `git push`
   - GitHub automatically triggers deployment!

#### Method 3: FTP Deployment (Not Recommended - Manual)

If SSH isn't available:
1. Keep working in `C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review`
2. Push to GitHub: `git push`
3. Use FTP client to upload changed files to server
4. More manual, but works

---

## Workflow After Deployment

### For You (Developer):
1. Make theme changes locally in `C:/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review`
2. Test locally at `http://localhost/vpr`
3. Commit: `git add . && git commit -m "description"`
4. Push: `git push`
5. If Method 1: SSH in and run `~/deploy-vpr.sh`
6. If Method 2: Automatic deployment happens!

### For Colleagues (Content Editors):
1. Log into WordPress admin: `yoursite.com/wp-admin`
2. Create/edit posts and pages
3. Upload images
4. No need to touch code or Git

---

## DNS Configuration (When Ready)

**Current:** Using hosting provider's temporary URL

**When you're ready to use your domain:**

1. **At Domain Registrar (where you bought domain):**
   - Update nameservers to hosting provider's nameservers, OR
   - Update A record to point to hosting IP address

2. **At Hosting Provider:**
   - Add domain in cPanel → Domains
   - Ensure WordPress is in correct directory

3. **Update WordPress URLs:**
   ```sql
   UPDATE wp_options SET option_value = 'https://yourdomain.com' WHERE option_name = 'siteurl';
   UPDATE wp_options SET option_value = 'https://yourdomain.com' WHERE option_name = 'home';
   ```

4. **Wait for DNS propagation:** 24-48 hours

---

## Backup Strategy

### Automated Backups (Set Up After Deployment):

1. **Database Backups:**
   - cPanel → Backup → Schedule automated backups
   - Or use plugin: UpdraftPlus, BackupBuddy

2. **File Backups:**
   - Git already backs up theme files
   - For uploads folder: cPanel backups or plugin

3. **Frequency:**
   - Database: Daily
   - Files: Weekly
   - Before major updates

---

## Troubleshooting

### If Site Shows Errors After Deployment:
1. Check `wp-config.php` database credentials
2. Check file permissions (755 for directories, 644 for files)
3. Clear browser cache
4. Check error logs in cPanel

### If Git Pull Fails:
1. Check file permissions: `chmod -R 755 ~/public_html/wp-content/themes/virginia-policy-review`
2. Ensure git is installed on server: `git --version`
3. Check remote: `git remote -v`

### If Webhook Doesn't Trigger:
1. Check webhook secret matches
2. Ensure deploy.php is accessible
3. Check GitHub webhook delivery logs

---

## Security Notes

1. **Change default admin username** (not "admin")
2. **Use strong passwords** for all accounts
3. **Keep WordPress, themes, and plugins updated**
4. **Use HTTPS/SSL certificate** (usually free with hosting)
5. **Don't commit wp-config.php** with real credentials to Git
6. **Limit failed login attempts** (plugin: Limit Login Attempts Reloaded)
7. **Regular backups** as mentioned above

---

## File Structure

```
yoursite.com/
├── wp-admin/
├── wp-content/
│   ├── themes/
│   │   └── virginia-policy-review/  ← Git repository here
│   │       ├── front-page.php
│   │       ├── page-about-us.php
│   │       ├── page-third-rail.php
│   │       ├── page-academical.php
│   │       ├── page-journal-issues.php
│   │       ├── page-contact.php
│   │       ├── header.php
│   │       ├── footer.php
│   │       ├── functions.php
│   │       ├── style.css
│   │       └── images/
│   ├── plugins/
│   └── uploads/
├── wp-includes/
├── wp-config.php  ← Update database credentials here
└── deploy.php  ← Optional webhook script
```

---

## Contact Info

**GitHub Repository:** https://github.com/behartless67-a11y/VPRMigration

**Hosting Providers (Recommendations):**
- Bluehost: Good for beginners, WordPress optimized
- SiteGround: Great performance, excellent support
- DigitalOcean: More technical, full control
- WP Engine: Premium WordPress hosting

---

## Quick Reference Commands

```bash
# SSH into server
ssh username@yourdomain.com

# Navigate to theme
cd public_html/wp-content/themes/virginia-policy-review

# Pull latest changes
git pull origin master

# Check git status
git status

# View git log
git log --oneline -5

# Export database locally
C:/xampp/mysql/bin/mysqldump -uroot -p232323 vprjournal > backup.sql

# Push local changes
git add .
git commit -m "description"
git push
```

---

## Next Session Checklist

When you return to set up hosting:

- [ ] Hosting account created
- [ ] SSH access confirmed
- [ ] Database created on hosting
- [ ] Local database exported
- [ ] WordPress files uploaded
- [ ] Database imported
- [ ] wp-config.php updated
- [ ] Site URLs updated in database
- [ ] Site loads successfully
- [ ] WordPress admin accessible
- [ ] Git repository cloned on server
- [ ] Deploy script created
- [ ] Test git pull deployment
- [ ] Optional: GitHub webhook configured
- [ ] Colleagues can log in as Editors
- [ ] SSL/HTTPS enabled
- [ ] Backups configured

---

**Last Updated:** 2025-10-01
**Status:** Ready for deployment to hosting provider
