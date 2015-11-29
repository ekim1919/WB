
<p>

<?php

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');
	
	echo '<div class="container">';
	echo "<ul>Hello " . OutputSanitizer::output($USERSESS->getUserName()). "!</ul>";
	echo '<ul><a href="/Public/Waifu/addwaifu.php"> Add your Waifu </a></ul>';
	echo '<ul><a href="/Public/Waifu/search.php"> Search for a Waifu </a></ul>';
	echo '<ul><a href="/Public/Waifu/profile.php">Profile</a></ul>';
	echo '</div>';
?>

</p>