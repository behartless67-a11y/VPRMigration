<?php
/**
 * Pull latest theme changes from GitHub
 * Upload to public_html/ and visit: https://keq.lpf.mybluehost.me/deploy-from-github.php
 */

// Find the correct theme path
$possible_paths = [
    __DIR__ . '/wp-content/themes/vpr-theme',
    __DIR__ . '/wp-content/themes/virginia-policy-review',
    '/home3/keqlpfmy/public_html/wp-content/themes/vpr-theme',
    '/home3/keqlpfmy/public_html/wp-content/themes/virginia-policy-review'
];

$repo_url = 'https://github.com/behartless67-a11y/VPRMigration.git';

echo "<h1>Deploying Theme from GitHub</h1>";
echo "<p>Current directory: " . getcwd() . "</p>";
echo "<p>__DIR__: " . __DIR__ . "</p>";

// Check if git is available
exec('which git 2>&1', $output, $return);
if ($return !== 0) {
    die("<p style='color:red;'>Error: Git is not installed on this server.</p>");
}

echo "<p>✓ Git found: " . implode('', $output) . "</p>";

// Find the correct theme path
$theme_path = null;
foreach ($possible_paths as $path) {
    echo "<p>Checking: $path ... ";
    if (is_dir($path)) {
        echo "FOUND!</p>";
        $theme_path = $path;
        break;
    } else {
        echo "not found</p>";
    }
}

// Navigate to theme directory
if (!$theme_path) {
    die("<p style='color:red;'>Error: Theme directory not found. Tried: " . implode(', ', $possible_paths) . "</p>");
}

chdir($theme_path);
echo "<p>Changed to directory: " . getcwd() . "</p>";

// Check if it's a git repo
if (!is_dir('.git')) {
    echo "<p>Initializing git repository...</p>";
    exec("git init 2>&1", $output, $return);
    echo "<pre>" . implode("\n", $output) . "</pre>";

    exec("git remote add origin $repo_url 2>&1", $output, $return);
    echo "<pre>" . implode("\n", $output) . "</pre>";
}

// Fetch latest changes
echo "<p>Fetching latest changes from GitHub...</p>";
exec("git fetch origin master 2>&1", $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

// Reset to latest
echo "<p>Pulling changes...</p>";
exec("git reset --hard origin/master 2>&1", $output, $return);
echo "<pre>" . implode("\n", $output) . "</pre>";

if ($return === 0) {
    echo "<h2 style='color:green;'>✓ Deployment Successful!</h2>";
    echo "<p>Latest theme files pulled from GitHub.</p>";
    echo "<p><a href='/'>View Homepage</a> | <a href='/submissions'>View Submissions Page</a></p>";
} else {
    echo "<h2 style='color:red;'>✗ Deployment Failed</h2>";
    echo "<p>Check the output above for errors.</p>";
}

echo "<p><strong>Security Note:</strong> Delete this file after use or someone could trigger deployments.</p>";
?>
