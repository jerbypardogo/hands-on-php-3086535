<?php

function print_array($a) {
	echo '<pre>';
	var_dump( $a );
	echo '</pre>';
}


 // Sanitize form input values before processing.
 function sanitize_form() {
	// Debug output for the raw POST data.
	print_array($_POST);
	foreach ($_POST as $name => $value) {
		switch ($name) {
			case 'email':
				// Sanitize email input specifically.
				$value = filter_var($value, FILTER_SANITIZE_EMAIL);
				break;
			case 'message':
				// Escape HTML and add slashes to preserve message input safely.
				$value = filter_var(htmlspecialchars($value), FILTER_SANITIZE_ADD_SLASHES);
				break;
			default:
				// Remove unsupported characters for other text inputs.
				$value = filter_var(preg_replace('/[^a-zA-Z0-9\s]/', '', $value), FILTER_SANITIZE_ADD_SLASHES);
		}
		$_POST[$name] = $value;
	}
	return true;
 }

 // Run form sanitization when the form is submitted.
 if ( isset($_POST['submit']) ) {
	 sanitize_form();
	 print_array($_POST);
 }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Validate my Form</title>
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
						font-size: 1.25rem;
						padding: 5px;
						width: 95%;
						border: 1px solid #DDDDDD;
					}
				</style>
    </head>
    <body>
			<main>
 				<h1>Contact Me</h1>
				<form name="contact" method="POST" id="contact">
					<div>
						<label for="name">Your Name*:</label><br/>
						<input type="text" name="name" required />
					</div>
					<div>
						<label for="email">Your Email*:</label><br/>
						<input type="email" name="email" required />
					</div>
					<div>
						<label for="message">Your Message*:</label><br/>
						<textarea name="message" required></textarea>
					</div>
					<div><input type="submit" name="submit" value="Contact Me" /></div>
				</form>
				</main>
    </body>
</html>