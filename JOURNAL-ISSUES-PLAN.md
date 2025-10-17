# Journal Issues PDF Storage & Display Plan

## Overview
Plan for storing and displaying journal issue PDFs on the Virginia Policy Review website.

---

## Storage Strategy

### Upload Method
- **Bulk upload** via WordPress Media Library (drag-and-drop multiple files)
- **Alternative:** FTP upload directly to `/wp-content/uploads/journal-issues/`
- **Organization:** By year/season (e.g., `2024-spring.pdf`, `2024-fall.pdf`)

### Storage Location
- WordPress Media Library (default)
- File path: `/wp-content/uploads/journal-issues/`
- Benefits:
  - Built into WordPress
  - Automatically backed up with site
  - Easy to manage
  - Works with existing custom post type

---

## Display Approach: Magazine-Style Grid (Option 1)

### Layout Design
```
[Cover Image]          [Cover Image]          [Cover Image]
Spring 2024           Fall 2023              Spring 2023
"Summary excerpt..."  "Summary excerpt..."   "Summary excerpt..."
[Download PDF]        [Download PDF]         [Download PDF]
```

### Features
- **Visual grid layout** - Clean, modern magazine aesthetic
- **Cover images** - Each issue displays custom cover image
- **Excerpts/Summaries** - Brief description extracted from PDFs
- **Download buttons** - Clear call-to-action for PDF download
- **Responsive design** - Works on mobile, tablet, desktop

---

## Technical Implementation

### Custom Post Type Structure
Using existing `journal_issue` custom post type with additional fields:

#### Required Fields:
1. **PDF File** - URL to uploaded PDF
2. **Cover Image** - Custom thumbnail/cover for each issue
3. **Summary/Excerpt** - 2-3 sentence description (extracted from PDF)
4. **Publication Date** - Season/Year (e.g., "Spring 2024")
5. **Volume/Issue Number** (optional)

#### Optional Fields (to decide later):
- Featured articles list
- Table of contents
- Author names
- Article categories/themes

### Data Extraction (To Implement Later)
**When PDFs are ready, extract:**
- Cover image (first page of PDF)
- Summary text (from introduction/editorial)
- Table of contents
- Article titles and authors
- Metadata (publish date, volume, etc.)

### Bulk Upload Script (To Build)
- Upload all PDFs at once
- Auto-create journal_issue posts for each PDF
- Extract and populate metadata
- Generate cover images from PDF first page
- Add summaries (extracted or manual)

---

## Display Page Layout

### Journal Issues Page Structure
1. **Page Header**
   - Title: "Journal Issues"
   - Subtitle: "Current and archived publications of the Virginia Policy Review"

2. **Magazine Grid**
   - 3-column layout (desktop)
   - 2-column (tablet)
   - 1-column (mobile)
   - Card-based design with:
     - Cover image (featured prominently)
     - Issue title (Season + Year)
     - Summary excerpt (2-3 sentences)
     - Download PDF button
     - Optional: View details link

3. **Filtering/Sorting** (optional future feature)
   - By year
   - By topic/theme
   - By season

---

## Next Steps (When PDFs Are Ready)

### Phase 1: Preparation
1. **Receive PDFs** from team
2. **Review PDF structure** to determine what data to extract:
   - Cover page format
   - Summary location (editorial, intro, etc.)
   - Table of contents structure
   - Metadata consistency

### Phase 2: Bulk Upload
1. **Create bulk upload script**
   - Upload all PDFs to media library
   - Auto-create journal_issue posts
   - Extract metadata from PDFs

2. **Extract data from each PDF:**
   - Cover image (page 1 screenshot)
   - Summary text (from designated section)
   - Article titles and authors (from TOC)
   - Publication date/volume info

### Phase 3: Display Implementation
1. **Build magazine-style grid** on Journal Issues page
2. **Style cards** with cover images and excerpts
3. **Add download functionality**
4. **Test responsive design**
5. **Review and refine** with team feedback

---

## Future Considerations

### Potential Enhancements:
- **PDF preview/embedding** - View in browser before download
- **Search functionality** - Find issues by keyword, author, topic
- **Featured issue** - Highlight latest/current issue at top
- **Article-level browsing** - Click through to individual articles within issues
- **Analytics** - Track downloads and popular issues
- **Email delivery** - Send new issues to subscribers

### Questions to Answer Later:
1. How many total issues to upload?
2. Are summaries already written, or extract from PDFs?
3. Do PDFs have consistent formatting?
4. Cover images: Use PDF first page or custom designs?
5. Any featured articles to highlight from each issue?
6. Need article-level detail pages, or just issue-level?

---

## Technical Notes

### File Size Considerations
- PDFs can be large files (5-20MB typical for journals)
- May need CDN or optimized hosting for fast downloads
- Consider compression for web delivery

### WordPress Media Library Limits
- Default PHP upload limit: Check server settings
- May need to increase `upload_max_filesize` and `post_max_size`
- Bluehost default is usually 64MB (should be sufficient)

### Backup Strategy
- PDFs stored in `/wp-content/uploads/` are included in WordPress backups
- Ensure backup solution handles large files
- Consider separate archive storage for original high-res PDFs

---

## Implementation Timeline

**When PDFs are received:**
1. Review PDF structure and content (1 hour)
2. Build bulk upload script (2-3 hours)
3. Upload and process all PDFs (1-2 hours)
4. Build magazine grid display (2-3 hours)
5. Extract/write summaries (varies by method)
6. Test and refine (1-2 hours)

**Total estimate:** 1-2 days of development once PDFs are ready

---

## Contact Points

**Before uploading PDFs, confirm:**
- [ ] PDFs are ready and formatted consistently
- [ ] Cover images available (or will extract from PDFs)
- [ ] Summaries written (or will extract from PDFs)
- [ ] Metadata available (publication dates, volumes, etc.)
- [ ] Any specific display requirements or preferences

---

*Last Updated: October 17, 2025*
*Status: Planning phase - awaiting PDFs*
