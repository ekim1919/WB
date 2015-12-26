<?php

	include($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	if(isset($_POST['username']) && $_POST['password']) {

		if($USERSESS->isLoggedIn()) {
			echo 'You are already logged in';
			exit(); //A dirty fix to try to fix the attempt relogging. Will have to put the login html at the top of the page at some point.
		}

		$SANTIZER = new InputSanitizer($_POST);

		$SANTIZER->addFilter("username",FILTER_SANITIZE_STRING);

		$sant_array = $SANTIZER->filter();		

		$username = $sant_array[0];
		$password = md5($_POST['password']);

		$connection = $DB->connect();

		$login_query = new sqlDBQueryResult($connection, "SELECT UserID FROM USERAUTHINFO WHERE USERNAME = $1", $params=array($username));
		$login_query->query();

		$login_result = $login_query->getRows();

		if ($login_result == null) {
			echo 'No such username was found';
		} else {

			$userid = $login_result["userid"];

			$USERSESS->logIn();
			$USERSESS->setUserFields($username,$userid);
			$REDIRECTOR->redirectFromRoot('index');
		}

	}		

	
?>
