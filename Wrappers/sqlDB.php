<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/baseexception.php");

	class DBException extends BaseException {

		public function renderableMessage() {
			return "A Database Error occured of the form: " . $this->$message . "Please contact the system administrator";
		}

	}	

	class sqlDBConnection {

		/*
			Database class for communication with PostgreSQL Database
		*/

		//Maintains SQL connection with DB
		private $sqlConnection;
		private $hostname
		private $username;
		private $password;
		private $port;


		//Keeps number of available instances
		private static $instances = 0;

		public function __construct($hostname="localhost",$username="postgres",$password="",$port=5432) {
			$this->$hostname = $hostname;
			$this->$username = $username;
			$this->$password = $password;
			$this->$port = $port;	
		}

		public connect() {

			if(sqlDBConnection::$instances == 0) {

				$this->sqlConnection = pg_connect("host=$hostname port=$port user=$username") or (throw new DBException("Could not connect to PostgreSQL Database. SQL says" . pg_last_error()));  //Add password option

				sqlDBConnection::$instances = 1; //Limit instances to 1.
			}

			return &$sqlConnection; //Experimentation with References. 
		}


		public function __destruct() {

			if(isset($this->sqlConnection)) {
				pg_close($this->sqlConnection) or (throw new DBException("Failed to close to PostgreSQL Database. SQL Says:" . pg_last_error()));
				unset($this->sqlConnection);
			}

			sqlDBConnection::$instances = 0;
		}


	}

	class sqlDBQueryResult { //SQL injection protection?

		private $sqlResult;

		public function __construct($con, $statement,$params) {

			$sqlResult = pg_query_params($con,$statement,$params) or (throw new DBException("Result in pg_query lead to an error"));
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