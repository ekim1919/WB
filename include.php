<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/RenderingEngine.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/renderlist.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/file.php"); //figure out a autoload configuration
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/text.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/sqlDB.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/usersession.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/redirectwrapper.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/inputsanitizer.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/outputsanitizer.php");


	$RENDENGINE = new RenderingEngine();
	$DB = new sqlDBConnection();
	$USERSESS = new UserSession();
	$REDIRECTOR = new RedirectWrapper();
?>
