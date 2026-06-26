<?php

function print_array($a) {
	echo '<pre>';
	var_dump( $a );
	echo '</pre>';
}

$dir = 'files';

// Scan the directory for file entries.
$files = scandir($dir);
$extensions = array();

foreach ($files as $file) {
	// Skip directories and only count actual files.
	if ( !is_dir($file) ) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		if ( ! empty($ext) ) {
			// Count each file extension occurrence.
			$extensions[$ext] = ($extensions[$ext] ?? 0) + 1;
		}
	}
}

// Display the extension counts for the scanned files.
print_array($extensions);
