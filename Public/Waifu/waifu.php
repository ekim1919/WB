<?php
require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$rendlist = new RenderList(new File("Assets/Waifu/waifu"), new File("Behavior/Waifu/waifu"));
$RENDENGINE->render($rendlist,$standard=True);
?>