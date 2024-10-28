	//if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
//		$uri = 'https://';
//	} else {
//		$uri = 'http://';
//	}
//	$uri .= $_SERVER['HTTP_HOST'];
//	header('Location: '.$uri.'/dashboard/');
//	exit;
//?>
//Something is wrong with the XAMPP installation :-(
<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Directory listing
$dir = '.';
$files = scandir($dir);

// Display the directory listing
echo '<h1>Directory Listing</h1>';
echo '<ul>';
foreach ($files as $file) {
    // Skip the current and parent directory entries
    if ($file === '.' || $file === '..') {
        continue;
    }
    // Create a link to the file or directory
    echo '<li><a href="' . htmlspecialchars($file) . '">' . htmlspecialchars($file) . '</a></li>';
}
echo '</ul>';
?>

