
<?php

class UserSession {

	/*
	Fields:

	1) loggedinbool: a boolean to determine if a user is already logged in
	2) username: user's username
	*/

	public function __construct() {
		if(!isset($_SESSION)) {
			session_start();			
		}
	}

	public function isLoggedIn() {
		return isset($_SESSION["loggedinbool"]);
	}

	public function logIn() {
		$_SESSION["loggedinbool"] = True;
	} 

	public function setUserName($username) {
		$_SESSION["username"] = $username;
	}

	public function getUserName() {
		return $_SESSION["username"];
	}	
}

?>