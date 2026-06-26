<?php 
	function get_visitors() {
		return file_get_contents('visits.txt');
	}

	// Increment the visitor count and persist it to the visits file.
    function log_visit() {
        $visits = get_visitors();
        $visits++;
        file_put_contents('visits.txt', $visits);
    }

	// Only log a visit once per user in a 30-day window using a cookie.
    if (! isset($_COOKIE['visited'])) {
        setcookie('visited', true, time() + (86400 * 30));
        log_visit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to My Website</title>
        <meta name="author" value="Joe Casabona" />
    </head>
    <body>
        <h1>Welcome to My Website</h1>
				<p>There have been <b><?php echo get_visitors(); ?></b> visitors so far.</p>
    </body>
</html>