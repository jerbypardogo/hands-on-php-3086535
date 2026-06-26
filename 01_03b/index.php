

<?php

// Flip returns either 'H' for heads or 'T' for tails at random.
function flip() {
	return ( 0 == rand(0,1) ) ? 'H' : 'T';
}

// Initialize counters for each coin face.
$H = 0;
$T = 0;

// Simulate 1000 coin flips and count each result.
for ($i = 0; $i < 1000; $i++) {
	$flip = flip();
	${$flip}++;
}

// Print the percentage of flips that resulted in heads and tails.
echo '<p>Heads was flipped ' . $H / 10 . '% of the time. Tails was flipped ' . $T / 10 . '% of the time.';
?>