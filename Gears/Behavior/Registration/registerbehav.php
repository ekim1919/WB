<?php
	
	require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

	if($USERSESS->isLoggedIn()) {
		$REDIRECTOR->redirect('index');	
	}

	if(isset($_POST['username']) && !$USERSESS->isLoggedIn()) {

		$username = trim($_POST['username']);
		$password = md5($_POST['password']);

		$connection = $DB->connect();

		(new sqlDBExecute($connection,"INSERT INTO USERAUTHINFO VALUES ($1,$2);", array($username,$password)))->execute();


		$RENDENGINE->renderText("Registration Successful");

	}	
		
?>