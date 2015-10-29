<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");


	$RENDENGINE->renderFile(['Behavior/Auth/registerbehav','Assets/User/register'],$standard=True); //Bring in Register HTML from Gears

?>
