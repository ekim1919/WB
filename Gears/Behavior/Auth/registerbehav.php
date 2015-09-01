<?php
	
	require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

	if($USERSESS->isLoggedIn()) {
		$REDIRECTOR->redirect('index');	
	}

	if(isset($_POST['username']) && isset($_POST['password'])) {

		if($USERSESS->isLoggedIn()) {
			echo 'You are already logged in';
			exit(); //A dirty fix to try to fix the attempt relogging. Will have to put the login html at the top of the page at some point.
		}

		$username = trim($_POST['username']);
		$password = md5($_POST['password']);

		$connection = $DB->connect();

		$username_available_query = new sqlDBQueryResult($connection, "SELECT EXISTS(SELECT 1 FROM USERAUTHINFO WHERE USERNAME = $1);",array($username));
		$username_available_query->query();

		$exist_row = $username_available_query->getRow();

		//Username is already taken.
		if($exist_row['exists'] == 't') {
			echo 'Username is already taken. Please try again.';

		} else {

			(new sqlDBExecute($connection,"INSERT INTO USERAUTHINFO VALUES ($1,$2);", array($username,$password)))->execute();
			
		}

	}	
		
?>