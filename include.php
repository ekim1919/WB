<?php
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Webpages/RenderingEngine/RenderingEngine.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/DB/sqlDB.php");
	$RENDENGINE = new RenderingEngine();
	$DB = new sqlDBConnection();
?>