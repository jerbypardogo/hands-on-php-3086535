<?php
	// Perform an HTTP request to determine whether the given URL is reachable.
	function check_downtime($url = null) 
	{
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$result = curl_exec($ch);
		
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($code >= 200 && $code < 300) {
			return "$url is Up!";
		} else if ($code >= 400 || $code == 0) {
			return "$url is DOWN!";
		}

		return "It looks like $url is down, but we can't be sure.";
	}

	// Save the monitored URL in a cookie for 30 days.
	function store_url($url) {
		setcookie('url', $url, time() + 60* 60 * 24 * 30);
	}

	// Get the URL from the submitted form or from the stored cookie.
	function get_url() 
	{
		if( isset( $_POST['url'] ) ) {
			store_url($_POST['url']);
			return $_POST['url'];
		} else if (isset($_COOKIE['url'])) {
			return $_COOKIE['url'];
		}

		return false;
	}

$url = get_url();
if ($url) {
	header("Refresh:" . 60*5);
	$message = check_downtime($url);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Downtime Monitor</title>
        <meta name="author" value="Joe Casabona" />
				<style>
					body {
						background: #EFEFEF;
					}
					main {
						max-width: 800px;
						padding: 20px;
						margin: 0 auto;
						background: #FFFFFF;
						font-size: 1.5rem;
					}

					div {
						margin: 35px;
					}

					input, 
					textarea {
						font-size: 1.5rem;
						padding: 10px;
						width: 95%;
						border: 1px solid #DDDDDD;
					}

					.alert {
						color: #FF0000;
						font-weight: bold;
					}
				</style>
    </head>
    <body>
        <main>
				<?php
					if( ! empty( get_url() ) ) {
						$message = check_downtime( get_url() );
						echo '<h3 class="alert">' . $message . '</h3>';
					}
				?>
				<h1>Downtime Monitor</h1>
				<p class="alert">If the monitored URL is not working, revise it to the API or site you want to check.</p>
				<form name="downtime" method="POST">
					<input type="url" name="url" placeholder="Enter the URL you want to monitor." />
					<input type="submit" name="submit" value="Submit" />
				</form>
				</main>
    </body>
</html>