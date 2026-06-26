<?php
function print_array($a) {
	echo '<pre>';
	var_dump( $a );
	echo '</pre>';
}

// Compare two file names by extension first, then by base filename.
function compare_files($a, $b) {
	$a = pathinfo($a);
	$b = pathinfo($b);

	// If the extensions match, sort by filename.
	if (strcmp($a['extension'], $b['extension']) == 0) {
		return strcmp($a['filename'], $b['filename']);
	}

	// Otherwise sort by extension.
	strcmp($a['extension'], $b['extension']);
}

$dir = 'files';
$files = scandir($dir);

// Sort the file list using the custom compare function.
usort($files, 'compare_files');
print_array($files);