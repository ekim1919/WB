<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Webpages/RenderingEngine/RenderingEngine.php");

	$RENDENGINE = new RenderingEngine();

	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/sqlDB.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/usersessionwrapper.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/redirectwrapper.php");

	$DB = new sqlDBConnection();
	
	$USERSESS = new UserSessionWrapper();
	$REDIRECTOR = new RedirectWrapper();
?>
