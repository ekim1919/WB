<?php

	include($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	if(isset($_POST['username']) && $_POST['password']) {

		if($USERSESS->isLoggedIn()) {
			echo 'You are already logged in';
			exit(); //A dirty fix to try to fix the attempt relogging. Will have to put the login html at the top of the page at some point.
		}

		$username = trim($_POST['username']);
		$password = md5($_POST['password']);

		$connection = $DB->connect();

		$login_query = new sqlDBQueryResult($connection, "SELECT 1 FROM USERAUTHINFO WHERE USERNAME = $1", array($username));
		$login_query->query();

		if($login_query->getNumRows() == 0) {
			echo 'No such username was found';
		} else {
			$USERSESS->logIn();
			$USERSESS->setUserName($username);
			$REDIRECTOR->redirectFromRoot('index');
		}

	}		

	
?>
