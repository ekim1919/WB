<?php
	
	if($USERSESS->isLoggedIn()) {
		$REDIRECTOR->redirect('index');	
	}

	if(isset($_POST['username']) && $USERSESS->isLoggedIn()) {

		$username = trim($_POST['username']);
		$password = md5($_POST['password']));


	}	
		
?>