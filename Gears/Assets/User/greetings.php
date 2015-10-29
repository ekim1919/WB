
<p>

<?php

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');



	echo "Hello " . escape_html($USERSESS->getUserName()). "!";
	echo '<a href=""> Add your Waifu </a>'
	
?>

</p>