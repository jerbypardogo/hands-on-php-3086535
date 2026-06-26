<!DOCTYPE html>
<html>
	<head>
		<title>Validate Form</title>
		<meta name="author" value="Joe Casabona" />
	</head>
	<body>
		<main>
			<?php 
				if ( isset( $_POST['submit'] ) ) {
					// Grab the submitted number from the POST request.
					$number = $_POST['number'];
					// Validate that the input is a positive integer.
					if ( is_int( $number ) && $number > 0 && $number == round( $number ) ) {
						// If validation passes, show a success message.
						echo '<p>Thank you for submitting a positive integer.</p>';
					} else {
						// Otherwise ask the user to submit a valid positive integer.
						echo '<p>Please submit a positive integer.</p>';
					}
				}
			?>
			<form name="submit_number" method="POST">
				<div>
					<label for="name">Submit a Positive Integer:</label>
					<input type="text" name="number" />
				</div>
				<div><input type="submit" name="submit" value="Submit Number" /></div>
			</form>	
		</main>
	</body>
</html>