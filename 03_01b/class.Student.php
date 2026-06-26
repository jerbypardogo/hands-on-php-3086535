<?php

require_once( 'class.Person.php' );

// Student extends Person with additional school-related properties.
class Student extends Person {
  private $gpa;
	private $major;
	private $address;

	// Initialize the student and call the parent constructor.
	public function __construct($name, $dob, $address, $major = 'Undecided') {
		parent::__construct($name, $dob);
		$this->major = $major;
		$this->address = $address;
    $this->gpa = null;
	}

  	public function get_address() {
		return $this->address;
	}

	public function get_major() {
		return $this->major;
	}

	public function get_gpa() {
		return $this->gpa;
	}

  public function set_address( $address ) {
		$this->address = $address;
	}

	public function set_major( $major ) {
		$this->set_major = $major;
	}

	public function set_gpa( $gpa ) {
		$this->gpa = $gpa;
	}

  // Calculate GPA from total grades and credits.
  public function calculate_gpa( $grades, $credits ) {
    $this->set_gpa( $grades / $credits );
    return $this->gpa;
  }

}