<?php
echo 'Create your list of choices: ' . "\n\n";

// Collect user choices until the stop marker '0' is entered.
$choices = array();

do {
  $choices[] = readline('Add a choice? (Type 0 to stop): ');
} while ('0' !== end($choices));

// Remove the terminating marker from the choices list.
array_pop($choices);

// Pick a random choice from the remaining options.
echo 'And the deicsion is: ' . $choices[array_rand($choices)];