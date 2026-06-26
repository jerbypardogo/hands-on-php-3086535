<?php
// Use the Console / Terminal for this exercise! 
// Generate a random target number between 1 and 30.
$number = rand( 1, 30 );
// Initialize the guess variable before validation.
$guess = null;

// Keep prompting until the user enters a number in the valid range.
while ( $guess != $number ) {
    $guess = readline( 'Guess between 1 and 30: ');
}

// Compare the final guess against the randomly chosen number.
if ( $number == $guess ) {
    echo "Yes! You guessed correctly. \n\n";
} else {
    echo "Alas. Your guess is incorrect. \n\n";
}

die();