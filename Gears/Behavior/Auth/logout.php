<?php
	
	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	$USERSESS->logout();
	$REDIRECTOR->redirectFromRoot("index");
		
?>