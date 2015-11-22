<?php

	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");
	
	$RENDENGINE->render(new File('Behavior/Auth/logout'));
?>