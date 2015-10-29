<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/RenderingEngine.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/sqlDB.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/usersession.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/redirectwrapper.php");

	$RENDENGINE = new RenderingEngine();
	$DB = new sqlDBConnection();
	$USERSESS = new UserSession();
	$REDIRECTOR = new RedirectWrapper();
?>
