
<?php

class UserSession {

	/*
	Fields:

	1) LOGGEDIN: a boolean to determine if a user is already logged in
	2) USERNAME: user's username
	3) IPADDRESS: IP address of User.
	4) USERAGENT: User Agent of User
	*/

	public function __construct($name = "User_Session", $lifetime = 0, $path = '/', $domain = null, $secure = null) {

		if(!isset($_SESSION)) {

			session_name($name);

			$domain = isset($domain) ? $domain : isset($_SERVER['SERVER_NAME']);

			$https = isset($secure) ? $secure : isset($_SERVER['HTTPS']);

			//session_set_cookie_params($lifetime, $path, $domain, $secure, true);
                        //Domain setting was causing trouble. Will remedy this later.
			session_start();

			if(!$this->checkSecurity()) { 

				$_SESSION = array(); //Remove Old Session Data to prevent possbile hijacking
				$_SESSION['IPADDRESS'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['USERAGENT'] = $_SERVER['HTTP_USER_AGENT'];
				
			}			
	}

  }

	private function checkSecurity() {

		#Checking for basic hijacking attacks. We have to make sure the IP and User Agent are the same as the original user.

		return (isset($_SESSION['IPADDRESS']) && isset($_SESSION['USERAGENT'])) &&
				($_SESSION['IPADDRESS'] == $_SERVER['REMOTE_ADDR']) &&
				($_SESSION['USERAGENT'] == $_SERVER['HTTP_USER_AGENT']);

	}

	public function isLoggedIn() {
		return isset($_SESSION["LOGGEDIN"]);
	}

	public function logIn() {
		$_SESSION["LOGGEDIN"] = True;
	} 

	public function setUserFields($username,$userid) {
		$_SESSION["USERNAME"] = $username;
		$_SESSION["USERID"] = $userid;
 	}

	public function getUserName() {
		return $_SESSION["USERNAME"];
	}

	public function getUserID() {
		return $_SESSION["USERID"];
	}

	public function logout() {
		session_destroy();
	}	
}

?>
