# Computer Sync Notes - VPR WordPress Project

**CRITICAL: Git Branch Information**
- Your work is on TWO branches: `main` and `master`
- **`main` branch**: Early development work (commits up to 9:57 AM)
- **`master` branch**: ALL your Cornell-style layout work (commits from 9:45 AM onwards)

## Important: When Pulling on New Computer

**YOU MUST PULL FROM `master` BRANCH, NOT `main`!**

```bash
cd [project-directory]
git fetch --all
git checkout master
git pull origin master
```

### Why Two Branches Exist
- The `master` branch has your Cornell-style redesign
- Files are stored in the ROOT directory on master branch (not in wordpress-theme folder)
- The `main` branch has older button-style navigation

---

## File Structure on Master Branch

**Files are in ROOT directory:**
```
VPRMigration/
├── front-page.php          ← Homepage with Cornell layout & slideshow
├── page-about.php          ← About page (Cornell style)
├── page-third-rail.php     ← Third Rail (Cornell style, 402 lines)
├── page-submissions.php    ← Submissions page
├── page-academical.php     ← Academical page
├── page-contact.php        ← Contact page
├── header.php
├── footer.php
├── functions.php
├── style.css
├── images/                 ← All images
│   ├── lawn.jpg
│   ├── sudan.jpg
│   ├── currentissue.png
│   └── [other article images]
└── js/
```

**NOTE:** There's also a `wordpress-theme` folder but it has OLD files!

---

## Copying Files to XAMPP (IMPORTANT!)

When on the `master` branch, copy from ROOT directory:

```bash
# From project root on master branch
cd /c/Users/Ben/Desktop/AI_Projects/VPRMigration

# Copy all PHP files
cp *.php /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# Copy CSS
cp *.css /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/

# Copy directories
cp -r images /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
cp -r js /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
```

---

## Page Template File Reference

| Page | WordPress Slug | Template File | Description |
|------|---------------|---------------|-------------|
| Homepage | (front page) | `front-page.php` | Cornell layout with slideshow |
| About | `/about/` | `page-about.php` | Cornell style (15K file) |
| The Third Rail | `/the-third-rail/` | `page-third-rail.php` | Cornell layout (402 lines) |
| Submissions | `/submissions/` | `page-submissions.php` | Submissions form |
| Academical | `/academical/` | `page-academical.php` | Podcast episodes |
| Contact | `/contact/` | `page-contact.php` | Contact information |
| Journal Issues | `/journal-issues/` | `page-journal-issues.php` | Past journals |

### Duplicate Files to Ignore
- `page-the-third-rail.php` (69 lines) - OLD, don't use
- `page-about-us.php` - OLD version
- `index.php` - Not used (front-page.php takes priority)

---

## Cornell-Style Layout Features

**What "Cornell-style" means:**
1. **Custom header on each page** with:
   - Large serif title centered (5rem font)
   - Navigation links underneath title
   - Lawn background image with overlay
   - No default WordPress header

2. **Full-width layouts** with:
   - Max-width: 1600px containers
   - Clean serif typography (Crimson Text)
   - Floating social media icons on right

3. **Key CSS:**
```css
/* Hides default header */
.site-header {
    display: none;
}

/* Custom banner */
.cornell-banner {
    background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('images/lawn.jpg');
    background-attachment: fixed;
    padding: 4rem 0 2rem;
}
```

---

## Current Design System

### Colors
```css
--primary-color: #232D4B;    /* UVA Blue */
--accent-color: #E57200;     /* UVA Orange */
--text-primary: #232D4B;
--text-secondary: #666666;
--white: #ffffff;
--secondary-color: #f8f8f8;
```

### Typography
- **Primary Font:** Inter (sans-serif) - UI elements
- **Secondary Font:** Crimson Text (serif) - Body text, headings, navigation

### Navigation Style
- Serif font (Crimson Text)
- Clean text links (no buttons)
- Orange underline on hover
- Centered below site title

---

## Common Issues & Solutions

### Issue: "Pages don't look like what I worked on"

**Solution:**
1. Check you're on `master` branch: `git branch`
2. If not: `git checkout master`
3. Copy files from ROOT directory (not wordpress-theme folder)
4. Hard refresh browser: `Ctrl + Shift + R`

### Issue: "The Third Rail looks different"

**Problem:** There are 2 versions of the file
- `page-third-rail.php` (402 lines) ← **CORRECT - Cornell style**
- `page-the-third-rail.php` (69 lines) ← OLD version

**Solution:** Use the 402-line version

### Issue: "Navigation shows blue buttons instead of text links"

**Problem:** You're on the wrong branch (main instead of master)

**Solution:** Switch to master branch and re-copy files

### Issue: "Homepage doesn't have slideshow"

**Problem:** Missing `front-page.php` or WordPress is using static page

**Solutions:**
1. Ensure `front-page.php` is copied to theme folder
2. WordPress Admin → Settings → Reading → Set to "Your latest posts"
3. Or set Front page to a page using the Front Page template

---

## WordPress Pages Setup

**Required WordPress Pages:**

Create these in WordPress admin with exact slugs:

1. **About** (slug: `about`)
   - Template: "About Page"

2. **The Third Rail** (slug: `the-third-rail`)
   - Template: "The Third Rail Blog Page"

3. **Submissions** (slug: `submissions`)
   - Template: "Submissions Page"

4. **Academical** (slug: `academical`)
   - Template: "Academical Podcast Page"

5. **Contact** (slug: `contact`)
   - Template: "Contact Page"

6. **Journal Issues** (slug: `journal-issues`)
   - Template: "Journal Issues Page"

---

## Image Files Reference

**Article Images:**
- sudan.jpg (135K) - Sudan famine article
- syria.jpg (97K) - Syria/Assad articles
- bashar-syria.jpg (72K) - Syria politics
- undersea-cable.jpg (24K) - Infrastructure article
- kansas-transit.jpg (19K) - Transit article
- agriculture.jpg (110K)
- ai.jpg (110K)
- cybersecurity.jpg (110K)
- economics.jpg (44K)
- education.jpg (91K)
- healthcare.jpg (56K)
- justice.jpg (60K)

**Site Images:**
- lawn.jpg (3.3M) - UVA Lawn background
- currentissue.png (529K) - Journal cover
- sarah-king-executive-editor.jpg (1.8M)
- george-langhammer-managing-editor.jpg (856K)

**PDFs:**
- vprjournalvolume_xvi.pdf (9.8M) - Current journal

---

## Workflow: Making Changes

### On Computer A (where you make changes):

1. **Make your edits** in XAMPP theme folder:
   ```
   C:\xampp\htdocs\vpr\wp-content\themes\virginia-policy-review\
   ```

2. **Copy back to project:**
   ```bash
   cd /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review
   cp *.php *.css /c/Users/Ben/Desktop/AI_Projects/VPRMigration/
   cp -r images js /c/Users/Ben/Desktop/AI_Projects/VPRMigration/
   ```

3. **Commit and push:**
   ```bash
   cd /c/Users/Ben/Desktop/AI_Projects/VPRMigration
   git add .
   git commit -m "Description of changes"
   git push origin master  # Push to master branch!
   ```

### On Computer B (pulling changes):

1. **Pull latest:**
   ```bash
   cd /c/Users/Ben/Desktop/AI_Projects/VPRMigration
   git checkout master  # Make sure you're on master!
   git pull origin master
   ```

2. **Copy to XAMPP:**
   ```bash
   cp *.php *.css /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
   cp -r images js /c/xampp/htdocs/vpr/wp-content/themes/virginia-policy-review/
   ```

3. **Hard refresh browser:** `Ctrl + Shift + R`

---

## Quick Checklist When Switching Computers

- [ ] Git pull from `master` branch (not main!)
- [ ] Copy files from ROOT directory (not wordpress-theme folder)
- [ ] Copy ALL PHP files, CSS, images, and js folders
- [ ] Hard refresh browser after copying
- [ ] Check that front-page.php is copied for homepage
- [ ] Check that page-third-rail.php is the 402-line version

---

## Browser Cache Issues

If pages still don't look right after copying:

1. **Hard Refresh:** `Ctrl + Shift + R` or `Ctrl + F5`
2. **Clear Cache:** `Ctrl + Shift + Delete` → Clear cached images
3. **Incognito Mode:** `Ctrl + Shift + N` to test without cache
4. **Disable WordPress Caching:** Check for caching plugins in admin

---

## Git Commit History Reference

**Master Branch (Current Work):**
- a04a965 - Remove duplicate Submission Guidelines
- df32da7 - Style SUBMISSION GUIDELINES header
- f01b893 - Add Submissions page
- 9d2ad08 - Update with podcast episodes
- 82a67c7 - Cornell-style layout
- 27215b2 - Add sidebar thumbnails

**Main Branch (Older Work):**
- 3009f22 - Session documentation Part 2
- 4203bd4 - Major design updates
- 96a1772 - Session documentation Part 1
- 11f5f2e - Navigation improvements
- 8c7b299 - Design improvements

---

## Current Status (as of latest sync)

**✅ Working Correctly:**
- Homepage (front-page.php) - Cornell layout with slideshow
- Navigation - Serif text links with orange underline
- About page - Cornell style with lawn image overlay on policies section
- Academical page - Cornell style
- Contact page - Cornell style
- Submissions page - Cornell style

**✅ Just Fixed:**
- The Third Rail page - Now using Cornell-style layout (402-line version)

**📝 To Remember:**
- Always work on `master` branch
- Files are in ROOT directory, not wordpress-theme folder
- Use page-third-rail.php (402 lines), not page-the-third-rail.php (69 lines)

---

## Next Session Checklist

Before starting work:
1. Open XAMPP Control Panel
2. Start Apache
3. Start MySQL
4. Navigate to: http://localhost/vpr/
5. Verify you see Cornell-style layout
6. If not, run through "Quick Checklist When Switching Computers" above

---

**Last Updated:** October 1, 2025 - After syncing Cornell-style Third Rail page
**Current Branch:** master
**Status:** All pages should now match Cornell-style layout
