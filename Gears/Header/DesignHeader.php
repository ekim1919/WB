
	<!DOCTYPE html>
		<html>
		<body>
			<link rel="stylesheet" type="text/css" href="/Public/css/title.css">
			<h1> 
				Waifu Battle
			</h1>

			<p>
			<design class="design_border">
				A Databank for your Waifus
			</design>
			</p>

			<?php

			include($_SERVER['DOCUMENT_ROOT'] . "/include.php");


			if (!$USERSESS->isLoggedIn()) {
				echo '<a href="/Public/Auth/register.php"> Register </a>'; 
				echo '<a href="/Public/Auth/login.php"> Login </a> <br>';
			} else {
				echo "Welcome " . $USERSESS->getUserName();
				echo '<br> <a href="/Public/Auth/logout.php"> Logout </a>';   		     }

			?>
