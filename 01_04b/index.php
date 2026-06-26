<?php
class MyConnect {
	private $db_name;
	private $username;
	private $password;
	private $host;

	// Hold the singleton connection instance.
	private static $connection;
	
	// Make the constructor private so instances can only be created through open_connection().
	private function __construct($name, $username, $password) {
		$this->db_name = $name;
		$this->username = $username;
		$this->password = $password;
		$this->host = 'localhost';	
	}
	
	// Return the existing connection or create it once if needed.
	public static function open_connection($name, $username, $password) {
		if ( !isset( self::$connection ) ) {
			self::$connection = new MyConnect( $name, $username, $password );
		}

		return self::$connection;
	}

	public function get_info( $query ) {
		//STUB
	}
	
	public function set_info( $query ) {
		//STUB
	}

	public function get_db_name() {
		return $this->db_name;
	}
}

// Open a single shared connection to the database.
$db = MyConnect::open_connection( 'people', 'joe', 'hello_there' );
echo $db->get_db_name() . '<br />';

// Reuse the same connection instance even with a second call.
$db2 = MyConnect::open_connection( 'place', 'joe', 'hello_there' );
echo $db->get_db_name();
