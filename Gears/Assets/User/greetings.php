
<p>

<?php

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

	echo "Hello " . OutputSanitizer::output($USERSESS->getUserName()). "!<br>";
	echo '<a href="/Public/Waifu/addwaifu.php"> Add your Waifu </a><br>';
	echo '<a href="/Public/Waifu/search.php"> Search for a Waifu </a>';
	
?>

</p>