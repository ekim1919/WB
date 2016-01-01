<?php

require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$rendlist = new RenderList(new File("Assets/User/editprofile"), new File("Behavior/User/editprofile"));
$RENDENGINE->render($rendlist,$standard=True);

?>