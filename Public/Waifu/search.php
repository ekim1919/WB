<?php
require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

$rendlist = new RenderList(new File("Assets/Waifu/search"), new File("Behavior/Waifu/search"));
$RENDENGINE->render($rendlist,$standard=True);
?>