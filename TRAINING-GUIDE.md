# Virginia Policy Review - New Team Member Training Guide

Welcome to the Virginia Policy Review WordPress site! This guide will walk you through everything you need to know to manage and maintain the site.

---

## Table of Contents

1. [Introduction & Overview](#introduction--overview)
2. [Getting Access](#getting-access)
3. [Understanding the Site Structure](#understanding-the-site-structure)
4. [Tutorial 1: Publishing Your First Article](#tutorial-1-publishing-your-first-article)
5. [Tutorial 2: Making Theme Changes](#tutorial-2-making-theme-changes)
6. [Tutorial 3: Adding a Podcast Episode](#tutorial-3-adding-a-podcast-episode)
7. [Tutorial 4: Managing Journal Issues](#tutorial-4-managing-journal-issues)
8. [Tutorial 5: Using the Git Workflow](#tutorial-5-using-the-git-workflow)
9. [Common Mistakes & How to Avoid Them](#common-mistakes--how-to-avoid-them)
10. [FAQ](#faq)

---

## Introduction & Overview

### What is This Site?

The Virginia Policy Review WordPress site is a custom-built platform featuring:
- **The Third Rail:** Student policy articles (blog)
- **Academical Podcast:** Policy leader interviews
- **Journal Issues:** Annual print publication archive
- **About/Staff:** Team member profiles

### Site Architecture

**Live Site:** https://keq.lpf.mybluehost.me/
- Hosted on **Bluehost** (cPanel hosting)
- Custom WordPress theme (no page builders)
- Git version control via GitHub
- MySQL database

**Local Development:** XAMPP (Apache + MySQL + PHP)
- For testing changes before going live
- Database: `vprjournal`
- URL: http://localhost/vpr/

### Your Role

As a team member, you'll likely need to:
- **Content Editors:** Publish articles, manage podcasts, update team info
- **Developers:** Update theme files, fix bugs, add features
- **Administrators:** Manage users, backups, security, hosting

---

## Getting Access

### Step 1: Collect Credentials

You'll need access to:

1. **WordPress Admin**
   - URL: https://keq.lpf.mybluehost.me/wp-admin
   - Get username/password from current administrator
   - Role: Editor (for content) or Administrator (for full access)

2. **GitHub Repository** (if making code changes)
   - URL: https://github.com/behartless67-a11y/VPRMigration
   - Ask to be added as collaborator
   - Need Git installed on your computer

3. **Bluehost cPanel** (if managing hosting)
   - URL: https://my.bluehost.com/
   - Get username/password from current administrator
   - Access to File Manager, phpMyAdmin, backups

4. **FTP Access** (optional, for direct file uploads)
   - Host: ftp.keq.lpf.mybluehost.me
   - Username: Same as cPanel
   - Password: Same as cPanel
   - Recommended client: FileZilla

### Step 2: Bookmark Important URLs

Save these in your browser:
- Live Site: https://keq.lpf.mybluehost.me/
- WordPress Admin: https://keq.lpf.mybluehost.me/wp-admin
- GitHub Repo: https://github.com/behartless67-a11y/VPRMigration
- Bluehost Login: https://my.bluehost.com/
- Deploy Script: https://keq.lpf.mybluehost.me/deploy-from-github.php

### Step 3: Test Your Access

1. Log into WordPress admin
2. Navigate to Posts → Add New (make sure you can see this)
3. Clone GitHub repository (if developer):
   ```bash
   git clone https://github.com/behartless67-a11y/VPRMigration.git
   cd VPRMigration
   git checkout master
   ```

---

## Understanding the Site Structure

### Content Types

#### 1. Posts (The Third Rail Articles)
- **Location:** WordPress Admin → Posts
- **Categories:** Domestic, International, Economics, Education, Environment, Healthcare, Social Policy, Security, Technology
- **Display:** Homepage grid (latest 8), The Third Rail page (all with search/filter)
- **Required:** Title, Content, Featured Image, Category

#### 2. Podcast Episodes
- **Location:** WordPress Admin → Podcast Episodes
- **Custom Fields:** guest_name, guest_title, anchor_url, episode_number, air_date
- **Display:** Academical page (grid with guest info)
- **Required:** Title, Content, Featured Image, Custom Fields

#### 3. Journal Issues
- **Location:** WordPress Admin → Journal Issues
- **Custom Fields:** pdf_url, publication_year, volume_number
- **Taxonomy:** Journal Year
- **Display:** Journal Issues page (list with download links)
- **Required:** Title, Content, Featured Image (cover), Custom Fields

#### 4. Team Members
- **Location:** WordPress Admin → Team Members
- **Custom Fields:** position, email, class_year
- **Display:** About Us page (staff slideshow)
- **Required:** Title (name), Featured Image (photo), Custom Fields

#### 5. Pages
- **Location:** WordPress Admin → Pages
- **Custom Templates:** Each page uses a specific PHP template file
- **Key Pages:** Home, About Us, The Third Rail, Academical, Submissions, Journal Issues, Contact

### Navigation Structure

```
Homepage (front-page.php)
├── About Us (page-about-us.php)
├── The Third Rail (page-the-third-rail.php)
│   └── Individual Article (single.php)
├── Academical (page-academical.php)
├── Submissions (page-submissions.php)
├── Journal Issues (page-journal-issues.php)
└── Contact (page-contact.php)
```

### File Organization

**On Live Server (Bluehost):**
```
/public_html/
├── wp-content/
│   └── themes/
│       └── virginia-policy-review/    ← Theme files here
├── wp-admin/                           ← WordPress core (don't edit)
├── wp-includes/                        ← WordPress core (don't edit)
└── wp-config.php                       ← Database credentials
```

**In GitHub Repository:**
```
VPRWordpress/
├── *.php                               ← Theme template files
├── style.css                           ← Main stylesheet
├── images/                             ← All site images
├── js/                                 ← JavaScript files
└── [documentation files]
```

---

## Tutorial 1: Publishing Your First Article

**Time:** 10 minutes
**Difficulty:** Beginner
**Role Required:** Editor or Administrator

### Step-by-Step Instructions

#### Step 1: Log into WordPress

1. Open browser and go to: https://keq.lpf.mybluehost.me/wp-admin
2. Enter your username and password
3. Click "Log In"

You should see the WordPress Dashboard.

#### Step 2: Create a New Post

1. In the left sidebar, click **Posts → Add New**
2. You'll see the WordPress editor (Gutenberg or Classic, depending on settings)

#### Step 3: Add Title and Content

1. **Title:** Enter your article title in the top field
   - Example: "The Future of Climate Policy in Virginia"

2. **Content:** Write or paste your article in the main editor
   - Use the formatting toolbar to add headings, bold, italics, links, etc.
   - Add images within content using the "+" button → Image block

**Pro Tip:** Write content in Google Docs first, then copy/paste into WordPress.

#### Step 4: Set Featured Image (REQUIRED)

This is the thumbnail that appears on the homepage and article listings.

1. Look at the right sidebar → **Featured Image** section
2. Click "Set featured image"
3. **Upload Image:**
   - Click "Upload files"
   - Choose image from your computer
   - Recommended size: 1200x800px (landscape orientation)
   - File should be under 500 KB for fast loading
4. Click "Set featured image"

**⚠️ Important:** Articles without featured images won't display properly on the homepage grid!

#### Step 5: Choose Category

1. Right sidebar → **Categories** section
2. Check the appropriate category:
   - Domestic (US policy)
   - International (foreign policy)
   - Economics (economic policy)
   - Education (education policy)
   - Environment (climate, sustainability)
   - Healthcare (health policy)
   - Social Policy (welfare, justice)
   - Security (national security)
   - Technology (tech policy)

**Note:** If unsure, you can check multiple categories or leave uncategorized (it will auto-categorize based on keywords).

#### Step 6: Optional - Mark as Featured

If you want this article in the homepage slideshow:

1. Scroll down in right sidebar to **Article Details** box
2. Check "Featured Article" checkbox

**Note:** Only check this for your best/most important articles (aim for 5-6 featured articles total).

#### Step 7: Add Author Bio (Optional)

1. Scroll to **Article Details** box
2. In "Author Bio" field, add 1-2 sentences about the author
3. Example: "Sarah Johnson is a second-year student at UVA studying Public Policy and Economics."

This appears at the bottom of the article page.

#### Step 8: Preview Before Publishing

1. Click **Preview** button (top right)
2. Opens in new tab showing how article will look
3. Check:
   - Title displays correctly
   - Featured image appears
   - Content is formatted properly
   - Links work
   - No typos!

#### Step 9: Publish!

1. If everything looks good, close preview tab
2. Click **Publish** button (top right, blue button)
3. Confirm by clicking "Publish" again in the popup

**Success!** Your article is now live.

#### Step 10: Verify on Live Site

1. Go to homepage: https://keq.lpf.mybluehost.me/
2. Check if your article appears in the "Latest Articles" grid
3. Go to The Third Rail page: https://keq.lpf.mybluehost.me/the-third-rail/
4. Find your article and click to view full page

### Common Issues

**Q: Featured image isn't showing on homepage**
- Make sure image is actually set (Edit post → Featured Image)
- Image should be at least 800x600px
- Try hard refresh: Ctrl + Shift + R

**Q: Article appears but has no category**
- Edit post → Categories → Select category → Update
- Or run auto-categorization script (ask admin)

**Q: Can't find my article on the site**
- Make sure status is "Published" not "Draft"
- Check Publish Date - if future date, it won't appear yet

---

## Tutorial 2: Making Theme Changes

**Time:** 30 minutes
**Difficulty:** Intermediate
**Role Required:** Developer with Git access

### Prerequisites

Before starting:
- [ ] Git installed on your computer
- [ ] GitHub collaborator access granted
- [ ] XAMPP installed (for local testing)
- [ ] Text editor (VS Code, Sublime, etc.)

### Overview of Workflow

```
1. Pull latest code from GitHub
2. Copy files to XAMPP
3. Make changes locally
4. Test at localhost
5. Copy back to project
6. Commit and push to GitHub
7. Deploy to live site
```

### Step 1: Set Up Local Environment

#### Install XAMPP (if not already installed)

1. Download from: https://www.apachefriends.org/
2. Install to default location: `C:\xampp\`
3. Open XAMPP Control Panel
4. Start **Apache** and **MySQL**

#### Clone GitHub Repository

```bash
# Open terminal/command prompt
cd C:\Users\[YourName]\Desktop

# Clone repository
git clone https://github.com/behartless67-a11y/VPRMigration.git

# Navigate to project
cd VPRMigration

# IMPORTANT: Switch to master branch
git checkout master

# Verify you're on master
git branch
# Should show: * master
```

### Step 2: Set Up WordPress Locally

#### Option A: Copy Database from Live Site

1. Log into Bluehost cPanel
2. phpMyAdmin → Select VPR database
3. Export tab → Quick export → Go
4. Save file as `vprjournal.sql`

5. Import to local MySQL:
```bash
# Open command prompt
cd C:\xampp\mysql\bin

# Import database
mysql -uroot -p232323 -e "CREATE DATABASE vprjournal;"
mysql -uroot -p232323 vprjournal < path\to\vprjournal.sql
```

6. Update URLs in local database:
```sql
-- Access phpMyAdmin: http://localhost/phpmyadmin/
-- Select vprjournal database
-- Run these queries:

UPDATE wp_options
SET option_value = 'http://localhost/vpr'
WHERE option_name = 'siteurl' OR option_name = 'home';

UPDATE wp_posts
SET post_content = REPLACE(post_content, 'https://keq.lpf.mybluehost.me', 'http://localhost/vpr');
```

#### Option B: Use Existing Local Database

If WordPress is already set up at `C:\xampp\htdocs\vpr\`, just verify it works:

1. Visit: http://localhost/vpr/
2. Should see VPR site with articles

### Step 3: Copy Theme Files to XAMPP

```bash
# From your project directory
cd C:\Users\[YourName]\Desktop\VPRMigration

# Copy all theme files
cp *.php C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\
cp *.css C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\
cp -r images C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\
cp -r js C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\
```

**Windows Alternative (if `cp` doesn't work):**
- Manually copy files from VPRMigration folder
- Paste into: `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`

### Step 4: Make Your Changes

Now edit files in the XAMPP directory:

**Location:** `C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\`

**Example: Change Homepage Title**

1. Open file: `front-page.php`
2. Find line with "Virginia Policy Review" title (~line 50)
3. Make your change
4. Save file

**Example: Update Footer Text**

1. Open file: `footer.php`
2. Find footer content section (~line 100)
3. Update text
4. Save file

**Example: Change Primary Color**

1. Open file: `style.css`
2. Find line with `--primary-color: #232D4B;` (~line 15)
3. Change to your new color (e.g., `#1a1a1a;`)
4. Save file

### Step 5: Test Locally

1. Open browser
2. Go to: http://localhost/vpr/
3. **Hard refresh:** Ctrl + Shift + R (to clear cache)
4. Check your changes appear correctly
5. Test on different pages
6. Test mobile view (F12 → Toggle device toolbar in Chrome)

**If changes don't appear:**
- Clear browser cache: Ctrl + Shift + Delete
- Restart Apache in XAMPP
- Check file was actually saved
- View page source to see if CSS is loading

### Step 6: Copy Back to Project

Once satisfied with changes:

```bash
# From XAMPP theme directory
cd C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review

# Copy back to project
cp *.php C:\Users\[YourName]\Desktop\VPRMigration\
cp *.css C:\Users\[YourName]\Desktop\VPRMigration\
cp -r images C:\Users\[YourName]\Desktop\VPRMigration\
cp -r js C:\Users\[YourName]\Desktop\VPRMigration\
```

### Step 7: Commit to Git

```bash
# Navigate to project directory
cd C:\Users\[YourName]\Desktop\VPRMigration

# Check what changed
git status

# Stage all changes
git add .

# Commit with descriptive message
git commit -m "Update homepage title and footer text"

# Push to GitHub
git push origin master
```

**Good Commit Messages:**
- ✅ "Fix navigation menu spacing on mobile"
- ✅ "Add drop shadow to article cards"
- ✅ "Update About page with new team members"
- ❌ "Changes"
- ❌ "Update"
- ❌ "Fix stuff"

### Step 8: Deploy to Live Site

1. Open browser
2. Go to: https://keq.lpf.mybluehost.me/deploy-from-github.php
3. Wait for deployment to complete (shows green success message)
4. Visit live site: https://keq.lpf.mybluehost.me/
5. Hard refresh: Ctrl + Shift + R
6. Verify changes appear correctly

**If deployment fails:**
- Check error message in deploy script
- Verify you pushed to correct branch (master)
- Check file permissions on server (cPanel → File Manager)
- Contact Bluehost support if needed

### Best Practices

1. **Always test locally first** - Never edit directly on live site
2. **Commit often** - Small, frequent commits better than large ones
3. **Write clear commit messages** - Explain what and why
4. **One feature per commit** - Don't mix unrelated changes
5. **Pull before you push** - Always `git pull` before making changes
6. **Backup before major changes** - Better safe than sorry

---

## Tutorial 3: Adding a Podcast Episode

**Time:** 15 minutes
**Difficulty:** Beginner
**Role Required:** Editor or Administrator

### What You'll Need

Before starting, gather:
- [ ] Episode title
- [ ] Guest name and title/affiliation
- [ ] Episode description (2-3 paragraphs)
- [ ] Guest photo (600x600px square recommended)
- [ ] Anchor FM link (where episode is hosted)
- [ ] Episode number
- [ ] Air date

### Step-by-Step Instructions

#### Step 1: Log into WordPress

1. Go to: https://keq.lpf.mybluehost.me/wp-admin
2. Enter username and password

#### Step 2: Create New Podcast Episode

1. Left sidebar → **Podcast Episodes → Add New**
2. You'll see the post editor (similar to adding article)

#### Step 3: Add Episode Information

1. **Title:** Format as "Episode #: Guest Name"
   - Example: "Episode 9: Interview with Senator Tim Kaine"

2. **Content:** Add episode description
   - 2-3 paragraphs about the guest and topics discussed
   - Include guest background and key talking points
   - Example format:
   ```
   In this episode, we sit down with Senator Tim Kaine to discuss...

   Senator Kaine shares insights on...

   Listen now to hear about...
   ```

#### Step 4: Set Featured Image

1. Right sidebar → **Featured Image**
2. Click "Set featured image"
3. Upload guest photo (square format preferred, 600x600px)
4. Click "Set featured image"

**Image Tips:**
- Professional headshot works best
- Square crop preferred (looks good in grid)
- Minimum 400x400px, recommended 600x600px
- Keep file size under 200 KB

#### Step 5: Add Custom Fields

Scroll down to find **Custom Fields** box. If you don't see it:
- Top right corner → Three dots → Options
- Check "Custom Fields"
- Scroll down again

Add these fields:

1. **guest_name**
   - Click "Add New"
   - Name: `guest_name`
   - Value: Full name of guest (e.g., "Tim Kaine")
   - Click "Add Custom Field"

2. **guest_title**
   - Name: `guest_title`
   - Value: Professional title/affiliation
   - Example: "U.S. Senator from Virginia"

3. **anchor_url**
   - Name: `anchor_url`
   - Value: Full URL to episode on Anchor FM
   - Example: "https://anchor.fm/virginia-policy-review/episodes/episode-9-tim-kaine"

4. **episode_number**
   - Name: `episode_number`
   - Value: Just the number (e.g., "9")

5. **air_date**
   - Name: `air_date`
   - Value: Format as YYYY-MM-DD (e.g., "2024-10-15")

**Note:** After first episode, these field names will appear in dropdown for faster entry.

#### Step 6: Publish

1. Review all information
2. Click **Publish** button (top right)
3. Confirm by clicking "Publish" again

#### Step 7: Verify on Site

1. Visit: https://keq.lpf.mybluehost.me/academical/
2. Scroll to podcast episodes section
3. Find your new episode
4. Verify:
   - Guest photo displays
   - Name and title are correct
   - Description is formatted properly
   - "Listen Now" button links to correct Anchor URL

### Example Episode Entry

**Title:** Episode 9: Interview with Dr. Melody Barnes

**Content:**
```
In this episode, we sit down with Dr. Melody Barnes, Director of the UVA Democracy Initiative and former Director of the White House Domestic Policy Council under President Obama.

Dr. Barnes discusses the challenges facing American democracy, the role of policy schools in training the next generation of leaders, and her work at the University of Virginia. We explore topics including civic engagement, policy innovation, and the intersection of academia and government.

Listen now to hear Dr. Barnes' unique perspective on policy-making and public service, drawn from her extensive experience in both the public and private sectors.
```

**Custom Fields:**
- guest_name: Melody Barnes
- guest_title: Director, UVA Democracy Initiative
- anchor_url: https://anchor.fm/virginia-policy-review/episodes/episode-9-melody-barnes
- episode_number: 9
- air_date: 2024-10-15

**Featured Image:** Professional headshot of Dr. Barnes (600x600px)

---

## Tutorial 4: Managing Journal Issues

**Time:** 10 minutes
**Difficulty:** Beginner
**Role Required:** Editor or Administrator

### What You'll Need

- [ ] Journal PDF file (uploaded to WordPress Media Library or external host)
- [ ] Journal cover image
- [ ] Volume number (e.g., XVII)
- [ ] Publication year
- [ ] Journal title/theme

### Step-by-Step Instructions

#### Step 1: Upload PDF (if not already hosted)

1. WordPress Admin → **Media → Add New**
2. Drag and drop PDF file or click "Select Files"
3. Wait for upload to complete
4. Click on uploaded PDF in Media Library
5. Copy **File URL** (e.g., https://keq.lpf.mybluehost.me/wp-content/uploads/2024/10/vprjournalvolume_xvii.pdf)

**Note:** PDF can be large (5-10 MB is normal). Be patient during upload.

#### Step 2: Create New Journal Issue

1. **Journal Issues → Add New**

#### Step 3: Add Journal Information

1. **Title:** Format as "Volume [Number] - [Theme/Season Year]"
   - Example: "Volume XVII - Policy for the Public Good"

2. **Content:** Add journal description (2-3 paragraphs)
   - Describe theme
   - Highlight featured articles
   - Acknowledge contributors
   - Example:
   ```
   The Spring 2024 edition of the Virginia Policy Review explores policy solutions for the public good...

   This volume features articles on healthcare reform, climate policy, economic inequality, and more...

   We are grateful to our contributors and editorial staff for their dedication...
   ```

#### Step 4: Set Featured Image (Journal Cover)

1. Right sidebar → **Featured Image**
2. Upload journal cover image
3. Recommended size: 800x1200px (portrait orientation)
4. Should be actual cover design
5. Click "Set featured image"

#### Step 5: Assign Journal Year

1. Right sidebar → **Journal Years** section
2. Check appropriate year (e.g., "2024")
3. If year doesn't exist, click "+ Add New Journal Year"

#### Step 6: Add Custom Fields

1. Scroll to **Custom Fields** section

2. **pdf_url**
   - Name: `pdf_url`
   - Value: Full URL to PDF (from Step 1)
   - Example: https://keq.lpf.mybluehost.me/wp-content/uploads/2024/10/vprjournalvolume_xvii.pdf

3. **publication_year**
   - Name: `publication_year`
   - Value: Year as number (e.g., "2024")

4. **volume_number**
   - Name: `volume_number`
   - Value: Volume in Roman numerals (e.g., "XVII")

#### Step 7: Publish

1. Review all information
2. Click **Publish**

#### Step 8: Verify on Site

1. Visit: https://keq.lpf.mybluehost.me/journal-issues/
2. Find your new journal
3. Click cover image
4. Verify:
   - Cover displays correctly
   - Description is readable
   - Download PDF button works
   - PDF opens correctly

---

## Tutorial 5: Using the Git Workflow

**Time:** 20 minutes
**Difficulty:** Intermediate
**Role Required:** Developer

### Understanding Git Basics

**What is Git?**
- Version control system
- Tracks changes to code over time
- Allows collaboration without conflicts
- Easy to revert mistakes

**What is GitHub?**
- Online hosting for Git repositories
- Share code with team
- View change history
- Collaborate on projects

**Repository:** https://github.com/behartless67-a11y/VPRMigration

### Important: Branch Structure

This project has TWO branches:

1. **`master` branch** ✅ **USE THIS**
   - Current, active development
   - Cornell-style layout
   - All recent features

2. **`main` branch** ❌ **DON'T USE**
   - Old, legacy code
   - Outdated layout
   - Kept for historical reference only

**Always make sure you're on `master` branch!**

### Git Workflow Diagram

```
┌─────────────┐
│   GitHub    │
│  (master)   │ ◄─── Push changes
└──────┬──────┘
       │
       │ Pull changes
       ▼
┌─────────────┐
│   Local     │
│  Project    │ ◄─── Make changes here
└──────┬──────┘
       │
       │ Copy files
       ▼
┌─────────────┐
│   XAMPP     │
│  (Testing)  │ ◄─── Test here
└─────────────┘
```

### Command Reference

#### Starting a Work Session

```bash
# Navigate to project
cd C:\Users\[YourName]\Desktop\VPRMigration

# Check current branch
git branch
# Should show: * master

# If not on master:
git checkout master

# Pull latest changes from GitHub
git pull origin master
```

#### Checking Status

```bash
# See what files changed
git status

# See specific changes in files
git diff

# See commit history
git log --oneline -10
```

#### Making Changes

```bash
# After editing files...

# See what changed
git status

# Stage specific files
git add front-page.php footer.php

# Or stage everything
git add .

# Commit with message
git commit -m "Update footer copyright year"

# Push to GitHub
git push origin master
```

#### Viewing History

```bash
# See recent commits
git log --oneline -20

# See who changed what
git blame front-page.php

# See changes in specific commit
git show [commit-hash]
```

#### Undoing Changes

```bash
# Discard changes to a file (before commit)
git checkout -- front-page.php

# Undo last commit (keep changes)
git reset --soft HEAD~1

# Undo last commit (discard changes) - CAREFUL!
git reset --hard HEAD~1

# Revert a specific commit (safe)
git revert [commit-hash]
```

### Best Practices

1. **Pull before you start working**
   ```bash
   git pull origin master
   ```

2. **Commit often with clear messages**
   ```bash
   git commit -m "Fix navigation menu on mobile devices"
   ```

3. **Don't commit sensitive files**
   - wp-config.php (has database passwords)
   - .htaccess (server-specific)
   - Backup files (.sql)

4. **Check before you push**
   ```bash
   git status
   git diff
   # Review changes, then:
   git push origin master
   ```

5. **Always work on master branch**
   ```bash
   git checkout master
   ```

### Troubleshooting Git Issues

**Problem: Merge conflict after git pull**

```bash
# Open conflicted file in text editor
# Look for markers:
<<<<<<< HEAD
Your changes
=======
Their changes
>>>>>>> origin/master

# Manually resolve conflict
# Remove markers, keep correct version
# Save file

# Stage resolved file
git add [filename]

# Complete merge
git commit -m "Resolve merge conflict in front-page.php"
```

**Problem: Accidentally committed to wrong branch**

```bash
# Switch to correct branch
git checkout master

# Cherry-pick the commit
git cherry-pick [commit-hash]

# Switch back to wrong branch
git checkout [wrong-branch]

# Delete the commit
git reset --hard HEAD~1
```

**Problem: Pushed wrong changes**

```bash
# Revert the commit (creates new commit)
git revert [commit-hash]
git push origin master

# This is safer than force-pushing
```

---

## Common Mistakes & How to Avoid Them

### Mistake 1: Editing on Wrong Branch

**Problem:** Made changes on `main` branch instead of `master`

**How to Avoid:**
```bash
# ALWAYS check branch before starting
git branch
# Should show: * master
```

**How to Fix:**
```bash
# Save changes
git stash

# Switch to correct branch
git checkout master

# Apply changes
git stash pop
```

### Mistake 2: No Featured Image on Article

**Problem:** Article doesn't show up in homepage grid

**How to Avoid:**
- Always set featured image before publishing
- Check preview to verify image shows

**How to Fix:**
1. Edit article in WordPress
2. Set featured image
3. Update article

### Mistake 3: Breaking Live Site

**Problem:** Deployed changes that broke the site

**How to Avoid:**
- Always test locally first
- Check browser console for JavaScript errors
- Test on multiple pages

**How to Fix:**
```bash
# Revert to previous commit
git revert HEAD
git push origin master

# Deploy to live site
Visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
```

### Mistake 4: Lost Local Changes

**Problem:** Made changes but XAMPP crashed or file lost

**How to Avoid:**
- Commit to Git frequently
- Keep backups of important files

**How to Fix:**
- If committed to Git: `git reflog` to find lost commit
- If not committed: Check file system restore points
- If truly lost: Must recreate from memory

### Mistake 5: Database Out of Sync

**Problem:** Local database doesn't match live site

**How to Avoid:**
- Export fresh database from live site monthly
- Don't make structural changes without documenting

**How to Fix:**
1. Export database from Bluehost phpMyAdmin
2. Import to local phpMyAdmin
3. Update URLs (see Tutorial 2, Step 2)

### Mistake 6: Forgot to Deploy

**Problem:** Pushed to GitHub but forgot to deploy

**How to Avoid:**
- Add deployment to your checklist
- Verify changes on live site immediately

**How to Fix:**
- Just run deploy script: https://keq.lpf.mybluehost.me/deploy-from-github.php

### Mistake 7: Committed Sensitive Data

**Problem:** Accidentally committed passwords or API keys

**How to Avoid:**
- Never commit wp-config.php from live server
- Use `.gitignore` file to exclude sensitive files
- Review `git diff` before committing

**How to Fix:**
1. Immediately change all passwords/keys
2. Remove from Git history:
   ```bash
   git filter-branch --force --index-filter \
   'git rm --cached --ignore-unmatch wp-config.php' \
   --prune-empty --tag-name-filter cat -- --all

   git push origin --force --all
   ```
3. Contact GitHub support to purge from their cache

### Mistake 8: Merged Wrong Branch

**Problem:** Accidentally merged `main` into `master`

**How to Avoid:**
- Only work on `master` branch
- Don't merge other branches unless intentional

**How to Fix:**
```bash
# Reset to before merge
git reset --hard HEAD~1
git push origin master --force
```

---

## FAQ

### General Questions

**Q: How often should I update WordPress?**
A: Check monthly for updates. Always backup before updating core/plugins.

**Q: Can I use a page builder like Elementor?**
A: Not recommended. Site uses custom PHP templates. Page builders may conflict.

**Q: How do I add a new page?**
A: Pages → Add New, but you may need a custom template. Ask developer.

**Q: Can I change the theme colors?**
A: Yes, edit `style.css` variables. Must be comfortable with CSS. Test locally first.

### Content Questions

**Q: How many articles should be featured?**
A: Aim for 5-6 featured articles. These appear in homepage slideshow.

**Q: What size should featured images be?**
A: Minimum 800x600px, recommended 1200x800px (landscape). Under 500 KB file size.

**Q: How do I delete an article?**
A: Edit article → Move to Trash. It can be restored from Trash later.

**Q: Can I schedule posts for future?**
A: Yes! Set Publish Date to future date. Article publishes automatically.

**Q: How do I edit the About Us page?**
A: Pages → About Us → Edit. Or ask developer to update team member profiles.

### Technical Questions

**Q: What if deploy script fails?**
A: Check error message. Common issues: Git not installed on server, file permissions, GitHub authentication.

**Q: How do I access the database?**
A: Bluehost cPanel → phpMyAdmin. Select VPR database. Be careful - can break site!

**Q: Can I edit files directly on server?**
A: Yes (cPanel → File Manager), but NOT recommended. Always edit locally and deploy via Git.

**Q: What if I break something?**
A: Stay calm! Restore from backup or revert Git commit. See Mistake #3 above.

**Q: How do I add a new category?**
A: Posts → Categories → Add New Category. Enter name, slug, description.

**Q: What's the database password?**
A: Check wp-config.php on server (cPanel → File Manager). Never share publicly.

### Git Questions

**Q: What if I get a merge conflict?**
A: See Tutorial 5 → Troubleshooting Git Issues. Or ask for help!

**Q: Can I work on multiple computers?**
A: Yes! Just `git pull` before starting work on each computer.

**Q: What if I committed the wrong thing?**
A: Use `git revert` (see Tutorial 5). Creates new commit that undoes previous one.

**Q: How far back can I go in history?**
A: Entire history is preserved. Use `git log` to view all commits.

### Hosting Questions

**Q: How much disk space do we have?**
A: Check cPanel → Disk Usage. Bluehost shared hosting typically has 50-100 GB.

**Q: What if site goes down?**
A: Check Bluehost status, then contact support: 1-888-401-4678 or live chat.

**Q: How do I make a backup?**
A: cPanel → Backup → Download Full Account Backup. Store safely!

**Q: Can I add more domains?**
A: Yes, Bluehost supports multiple domains. Contact support or check cPanel → Domains.

**Q: How do I check error logs?**
A: cPanel → Metrics → Errors. Shows recent PHP and Apache errors.

---

## Next Steps

### For Content Editors

1. ✅ Complete Tutorial 1 (publish an article)
2. ✅ Complete Tutorial 3 (add podcast episode)
3. ✅ Bookmark important URLs
4. ✅ Join editorial team meetings
5. ✅ Review style guide for article formatting

### For Developers

1. ✅ Complete Tutorial 2 (make theme changes)
2. ✅ Complete Tutorial 5 (learn Git workflow)
3. ✅ Set up local XAMPP environment
4. ✅ Read full PROJECT-HANDOFF-DOCUMENTATION.md
5. ✅ Review recent commits in GitHub

### For Administrators

1. ✅ Get all access credentials
2. ✅ Test WordPress login
3. ✅ Test Bluehost cPanel login
4. ✅ Set up backup schedule (UpdraftPlus plugin)
5. ✅ Install security plugin (Wordfence)
6. ✅ Set up monitoring (UptimeRobot)
7. ✅ Document emergency procedures

---

## Additional Resources

**Documentation:**
- PROJECT-HANDOFF-DOCUMENTATION.md - Complete technical reference
- QUICK-REFERENCE-CARD.md - One-page cheat sheet
- COMPUTER-SYNC-NOTES.md - Git workflow details
- DEPLOYMENT_GUIDE.md - Hosting setup instructions

**External Resources:**
- WordPress Codex: https://codex.wordpress.org/
- Git Documentation: https://git-scm.com/doc
- Bluehost Support: https://my.bluehost.com/help
- GitHub Guides: https://guides.github.com/

**Emergency Contacts:**
- Bluehost Support: 1-888-401-4678
- GitHub Issues: https://github.com/behartless67-a11y/VPRMigration/issues
- Project Lead: [Contact info]

---

**Welcome to the team! You've got this! 🎉**

If you have questions not answered in this guide, please:
1. Check PROJECT-HANDOFF-DOCUMENTATION.md (comprehensive details)
2. Search existing GitHub issues
3. Ask team members
4. Create new GitHub issue for technical questions

**Last Updated:** October 2024
