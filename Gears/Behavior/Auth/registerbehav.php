<?php
	
	require($_SERVER['DOCUMENT_ROOT'] . '/include.php');


	if($USERSESS->isLoggedIn()) {
		$REDIRECTOR->redirectFromRoot('index');	
	}

	if(isset($_POST['username']) && isset($_POST['password'])) {

		if($USERSESS->isLoggedIn()) {
			echo 'You are already logged in';
			exit(); //A dirty fix to try to fix the attempt relogging. Will have to put the login html at the top of the page at some point.
		}

		$SANTIZER = new InputSanitizer($_POST);

		$SANTIZER->addFilter("username",FILTER_SANITIZE_STRING);

		$sant_array = $SANTIZER->filter();		

		$username = $sant_array[0];
		$password = md5($_POST['password']); //Invest better password system. 

		$connection = $DB->connect();

		$username_available_query = new sqlDBQueryResult($connection, "SELECT EXISTS(SELECT 1 FROM USERINFO WHERE USERNAME = $1);",$params=array($username));
		$username_available_query->query();

		$exist_row = $username_available_query->getRow();

		//Username is already taken.
		if($exist_row['exists'] == 't') {
			$RENDENGINE->render(new Text('Username is already taken. Please try again.'));

		} else {

			(new sqlDBExecute($connection,"INSERT INTO USERINFO VALUES (nextval('User_UserID_seq'),$1,$2);", array($username,$password)))->execute();
			$USERSESS->logIn(); //A separate successful registeration page needs to be made. This is broken for now.
			$USERSESS->setUserName($username);
			$REDIRECTOR->redirectFromRoot('index');
			
		}

	}	
		
?>