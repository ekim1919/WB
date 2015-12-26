<?php
require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$list = new RenderList(new File("Behavior/Auth/loginbehav"),new File("Assets/User/login"));
$RENDENGINE->render($list, $standard=True);

?>