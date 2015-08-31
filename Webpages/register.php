<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	$RENDENGINE->standardRenderFile(['Behavior/Registration/registerbehav','User/register']); //Bring in Register HTML from Gears

?>