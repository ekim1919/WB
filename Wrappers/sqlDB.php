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
		private $dbHostname;
		private $dbUsername;
		private $dbPassword;
		private $dbPort;


		//Keeps number of available instances
		private static $instances = 0;

		public function __construct($hostname="localhost",$username="postgres",$password=NULL,$port=5432) {
			$this->dbHostname = $hostname;
			$this->dbUsername = $username;
			$this->dbPassword = $password;
			$this->dbPort = $port;	
		}

		public function connect() {

			if(sqlDBConnection::$instances == 0) {

			$this->sqlConnection = pg_connect("host=$this->dbHostname port=$this->dbPort user=$this->dbUsername"); 

			if(!($this->sqlConnection)) {

				unset($this->sqlConnection); //For the __destruct call later on.
				throw new DBException("Could not connect to PostgreSQL Database. SQL says" . pg_last_error());  //Add password option
			}

				sqlDBConnection::$instances = 1; //Limit instances to 1.
			}

			return $this->sqlConnection; //Experimentation with References. 
		}


		public function __destruct() {

			if(isset($this->sqlConnection)) {
				$result = pg_close($this->sqlConnection); 

				if(!$result) throw new DBException("Failed to close to PostgreSQL Database. SQL Says:" . pg_last_error());

				unset($this->sqlConnection);
			}

			sqlDBConnection::$instances = 0;
		}


	}

	class sqlDBQueryResult { //SQL injection protection?

		private $sqlResult;
		private $con;
		private $statement;
		private $params;

		public function __construct($con, $statement,$params) {

			$this->con = $con;
			$this->statement = $statement;
			$this->params = $params;
		}

		public function query() {
			$this->sqlResult = pg_query_params($this->con,
											   $this->statement,
											   $this->params);
			if(!($this->sqlResult)) {
				unset($this->sqlResult);
				throw new DBException("Result in pg_query lead to an error");	
			}
			
		}

		public function getRow($row_number=NULL) {
			return (isset($sqlResult)) ? pg_fetch_array($sqlResult,$row_number) : NULL;
		}

		public function getNumberofColumns() {
			return (isset($sqlResult)) ? pg_num_fields($sqlResult) : NULL;
		}

		public function getNumberofRows() {
			return (isset($sqlResult)) ? pg_num_rows($sqlResults) : NULL;
		}

	}

	class sqlDBExecute {

		private $statement;
		private $con;
		private $defaultParams;

		public function __construct($con, $statement, $params) { //Should I deallocate the statement afterwards?
			$this->con = $con;
			$this->statement = pg_prepare($con, "Executable", $statement);
			$this->defaultParams = $params; //Default params
		}

		public function execute($params=NULL) {
			if(is_null($params)) { 

				$result = pg_execute($this->con,
					   			 	 "Executable",
					   			 	 $this->defaultParams);
			} else {

				$result = pg_execute($this->$con,
					   			 	 "Executable",
					   			 	 $params);
			}

			if (!$result) throw new DBException("Execution of statement: ( $params ) has failed"); 
		}

	}

?>