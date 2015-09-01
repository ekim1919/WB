<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Webpages/RenderingEngine/RenderingEngine.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/sqlDB.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/usersession.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Wrappers/redirectwrapper.php");

	$RENDENGINE = new RenderingEngine();
	$DB = new sqlDBConnection();
	$USERSESS = new UserSession();
	$REDIRECTOR = new RedirectWrapper();
?>
