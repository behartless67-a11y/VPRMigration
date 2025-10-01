# Third Rail Blog Content Extraction Guide

## Quick Reference URLs

### Base URL
`http://www.virginiapolicyreview.org/the-third-rail`

### Complete Archive URL List (40+ months)

#### 2025 (3 months)
- March 2025: `http://www.virginiapolicyreview.org/the-third-rail/2025/3`
- February 2025: `http://www.virginiapolicyreview.org/the-third-rail/2025/2`
- January 2025: `http://www.virginiapolicyreview.org/the-third-rail/2025/1`

#### 2022 (3 months)
- April 2022: `http://www.virginiapolicyreview.org/the-third-rail/2022/4`
- March 2022: `http://www.virginiapolicyreview.org/the-third-rail/2022/3`
- February 2022: `http://www.virginiapolicyreview.org/the-third-rail/2022/2`

#### 2021 (9 months)
- December 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/12`
- November 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/11`
- October 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/10`
- June 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/6`
- May 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/5`
- April 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/4`
- March 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/3`
- February 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/2`
- January 2021: `http://www.virginiapolicyreview.org/the-third-rail/2021/1`

#### 2020 (3 months)
- December 2020: `http://www.virginiapolicyreview.org/the-third-rail/2020/12`
- November 2020: `http://www.virginiapolicyreview.org/the-third-rail/2020/11`
- October 2020: `http://www.virginiapolicyreview.org/the-third-rail/2020/10`

#### 2019 (4 months)
- May 2019: `http://www.virginiapolicyreview.org/the-third-rail/2019/5`
- March 2019: `http://www.virginiapolicyreview.org/the-third-rail/2019/3`
- February 2019: `http://www.virginiapolicyreview.org/the-third-rail/2019/2`
- January 2019: `http://www.virginiapolicyreview.org/the-third-rail/2019/1`

#### 2018 (2 months)
- October 2018: `http://www.virginiapolicyreview.org/the-third-rail/2018/10`
- September 2018: `http://www.virginiapolicyreview.org/the-third-rail/2018/9`

#### 2017 (3 months)
- March 2017: `http://www.virginiapolicyreview.org/the-third-rail/2017/3`
- February 2017: `http://www.virginiapolicyreview.org/the-third-rail/2017/2`
- January 2017: `http://www.virginiapolicyreview.org/the-third-rail/2017/1`

#### 2016 (7 months)
- November 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/11`
- October 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/10`
- September 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/9`
- August 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/8`
- April 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/4`
- March 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/3`
- February 2016: `http://www.virginiapolicyreview.org/the-third-rail/2016/2`

#### 2015 (6 months)
- December 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/12`
- November 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/11`
- October 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/10`
- September 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/9`
- March 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/3`
- February 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/2`
- January 2015: `http://www.virginiapolicyreview.org/the-third-rail/2015/1`

#### 2014 (9 months)
- December 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/12`
- November 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/11`
- October 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/10`
- September 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/9`
- August 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/8`
- July 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/7`
- April 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/4`
- March 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/3`
- February 2014: `http://www.virginiapolicyreview.org/the-third-rail/2014/2`

## Sample Article Data Structure

```json
{
  "title": "Article Title",
  "date": "MM/DD/YYYY",
  "author": {
    "name": "Author Name",
    "bio": "Full biographical information",
    "academic_info": "Degree program, background, interests"
  },
  "category": "Primary Category",
  "tags": ["keyword1", "keyword2", "keyword3"],
  "excerpt": "First paragraph or summary",
  "content": "Full article content with links preserved",
  "word_count": 850,
  "comments_count": 0,
  "original_url": "full URL to article",
  "archive_month": "Month Year",
  "extraction_date": "2025-09-25"
}
```

## Step-by-Step Extraction Process

### 1. Archive Page Crawling
For each monthly archive URL:
1. Load the page
2. Extract all article titles and dates
3. Find "Read More" links for each article
4. Note pagination if present

### 2. Individual Article Extraction
For each article:
1. Navigate to full article page
2. Extract complete content
3. Extract author name and biography
4. Note category/tags
5. Preserve internal and external links
6. Save social sharing data if needed

### 3. Data Organization
- Group articles by year and month
- Sort chronologically (newest first)
- Validate all dates and author information
- Check for duplicate content

## WordPress Import Requirements

### Required Fields:
- `post_title`: Article title
- `post_date`: Publication date (YYYY-MM-DD HH:MM:SS)
- `post_content`: Full article HTML content
- `post_excerpt`: Article summary/first paragraph
- `post_author`: Author name
- `post_category`: Category slug
- `post_tag`: Comma-separated tags
- `post_status`: publish
- `comment_status`: open/closed
- `post_name`: URL slug

### Custom Fields:
- `author_bio`: Full author biography
- `author_academic_info`: Academic background
- `original_url`: Source URL
- `word_count`: Article length
- `policy_category`: Policy area classification

## Quality Assurance Checklist

### Content Validation:
- [ ] All article titles extracted correctly
- [ ] Publication dates in consistent format
- [ ] Author names and bios complete
- [ ] Full article content preserved
- [ ] Internal/external links functional
- [ ] Images captured (if any)
- [ ] Category assignments accurate

### Technical Validation:
- [ ] No duplicate articles
- [ ] Chronological order maintained
- [ ] URL structure preserved
- [ ] WordPress import format valid
- [ ] Character encoding correct (UTF-8)
- [ ] HTML formatting clean

## Estimated Timeline

### Phase 1 (Recent Content): 3-5 days
- 2025-2022: ~15-20 articles
- High priority content

### Phase 2 (Active Period): 1-2 weeks
- 2021-2019: ~50-75 articles
- Substantial volume

### Phase 3 (Historical): 1-2 weeks
- 2018-2014: ~100+ articles
- Complete archive

**Total Estimated Time: 3-4 weeks**

## Notes and Considerations

### Technical Issues Encountered:
- SSL certificate issues with direct HTTP requests
- Site requires browser-based access for full content
- Some archive months may be empty or have limited content

### Content Patterns Observed:
- Strong international policy focus
- Academic writing style with citations
- 500-1000+ word articles
- Embedded links to external sources
- Author biographical information consistently included
- Policy school disclaimer at bottom of articles

### Migration Priority:
1. **High:** 2025-2022 content (current policy discussions)
2. **Medium:** 2021-2019 content (recent historical context)
3. **Standard:** 2018-2014 content (complete historical archive)

This guide provides the framework for systematically extracting all Third Rail blog content for WordPress migration.