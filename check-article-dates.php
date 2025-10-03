<?php
/**
 * Check what date information exists on old site articles
 */

set_time_limit(300);
error_reporting(E_ALL);
ini_set('display_errors', 1);

function fetch_url($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

// Test a few article URLs
$test_urls = array(
    'http://www.virginiapolicyreview.org/the-third-rail/2016/11/11/voter-id-and-the-suppression-of-the-minority-vote',
    'http://www.virginiapolicyreview.org/the-third-rail/2016/12/28/2016-presidential-election-what-happened',
    'http://www.virginiapolicyreview.org/the-third-rail/2017/1/12/inside-the-ivory-tower-after-the-election'
);

echo "<h1>Checking Article Date Formats</h1>";

foreach ($test_urls as $url) {
    echo "<h2>$url</h2>";

    $html = fetch_url($url);

    if (!$html) {
        echo "<p style='color:red;'>Failed to fetch URL</p>";
        continue;
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);

    // Try different date selectors
    echo "<h3>Looking for dates...</h3>";

    // Method 1: blog-date div
    $dates1 = $xpath->query("//div[@class='blog-date']");
    if ($dates1->length > 0) {
        echo "<p><strong>Found blog-date div:</strong><br>";
        echo htmlspecialchars($dom->saveHTML($dates1->item(0)));
        echo "</p>";
    }

    // Method 2: date-text span
    $dates2 = $xpath->query("//span[@class='date-text']");
    if ($dates2->length > 0) {
        echo "<p><strong>Found date-text span:</strong> " . htmlspecialchars($dates2->item(0)->textContent) . "</p>";
    }

    // Method 3: Any element with 'date' in class
    $dates3 = $xpath->query("//*[contains(@class, 'date')]");
    if ($dates3->length > 0) {
        echo "<p><strong>Found " . $dates3->length . " elements with 'date' in class:</strong></p><ul>";
        foreach ($dates3 as $dateEl) {
            echo "<li>" . htmlspecialchars($dateEl->getAttribute('class')) . ": " . htmlspecialchars(substr($dateEl->textContent, 0, 100)) . "</li>";
        }
        echo "</ul>";
    }

    // Method 4: Check URL for date (YYYY/MM/DD pattern)
    if (preg_match('#/(\d{4})/(\d{1,2})/(\d{1,2})/#', $url, $matches)) {
        echo "<p><strong>Date found in URL:</strong> {$matches[1]}-{$matches[2]}-{$matches[3]}</p>";
    }

    echo "<hr>";
}

echo "<h2>Conclusion</h2>";
echo "<p>The most reliable method appears to be extracting dates from the URL pattern.</p>";
?>
