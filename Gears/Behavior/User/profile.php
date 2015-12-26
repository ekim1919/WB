<?php
require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

if(!$USERSESS->isLoggedIn())) {
	$REDIRECTOR->redirectFromRoot('Public/Auth/login');
}

?>