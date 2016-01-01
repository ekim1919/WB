<div id="nav">
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/include.php');
	
	$rendlist = new RenderList(new Text('<span><a href="/Public/Waifu/addwaifu.php"> Add your Waifu </a></span>'),
							   new Text('<span><a href="/Public/Waifu/search.php"> Search for a Waifu </a></span>'),
							   new Text('<span><a href="/Public/User/profile.php">Profile</a></span>'));
	$RENDENGINE->render($rendlist);
?>
</div>
