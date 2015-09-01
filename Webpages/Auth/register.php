<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	$RENDENGINE->renderFile(['Behavior/Registration/registerbehav','User/register'],$standard=True); //Bring in Register HTML from Gears

?>