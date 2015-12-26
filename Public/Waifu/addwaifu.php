<?php
require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$rendlist = new RenderList(new File("Assets/Waifu/addwaifu"), new File("Behavior/Waifu/addwaifu"));
$RENDENGINE->render($rendlist,$standard=True);
?>