<?php

require_once( 'class.Person.php' );
// Load the Student subclass that extends Person.
require_once( 'class.Student.php' );

$alice = new Person( 'Alice', '1987-07-12' );
// Create a Student object with name, birthdate, and address.
$bob = new Student( 'Bob', '2002-03-06', '123 Center Square, Middletown, NY 10940' );

// Output age values and the student's major.
echo $alice->get_age() . '<br/>'; 
echo $bob->get_age() . '<br/>';
echo $bob->get_major();