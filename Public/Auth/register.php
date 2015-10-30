<?php
	require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

	$list = new RenderList([new File('Behavior/Auth/registerbehav'),new File('Assets/User/register')]);
	$RENDENGINE->render($list,$standard=True); //Bring in Register HTML from Gears

?>

