<?php


	class sqlDBConnection {

		/*
			Database class for communication with PostgreSQL Database
		*/

		//Maintains SQL connection with DB
		private $sqlConnection;
		//Keeps number of available instances
		private static $instances = 0;

		public function __construct($hostname="localhost",$username="postgres",$password="",$port=5432) {
			if(sqlDBConnection::$instances == 0) {

				$this->sqlConnection = pg_connect("host=$hostname port=$port user=$username") or
				die( mysql_error() . "Number:" . mysql_errno()); //Find a better way to handle errors by redirecting users to a generic error page. Get another object to do redirects
				sqlDBConnection::$instances == 1; //Limit instances to 1.
			} 
		}


		public function __destruct() {

			if(isset($this->sqlConnection)) {
				pg_close($this->sqlConnection) or 
				die("Failed to close the DB");

				unset($this->sqlConnection);
			}

			sqlDBConnection::$instances = 0;
		}

	}

	class sqlDBQueryResult { //SQL injection protection?

		private $sqlConnection;
		private $sqlStatement;
		private $sqlResult;

		public function __construct($con, $statement) {
			$this->sqlConnection = $con;
			$this->sqlStatement = $statement;
			$sqlResult = pg_query($sqlConnection,$sqlStatement) or
			die("Result in pg_query lead to an error");
		}

		public function getRow($row_number="NULL") {
			return pg_fetch_array($sqlResult,$row_number);
		}

		public function getNumberofColumns() {
			return pg_num_fields($sqlResult);
		}

		public function getNumberofRows() {
			return pg_num_rows($sqlResults);
		}

	}

	//Makeshift execute function for DB. Will do until I find a better way to group the classes together. VERY UNSAFE.
	function sqlDBExecute($con,$statement) { 
		pg_execute($con,$statement);
	}

?>