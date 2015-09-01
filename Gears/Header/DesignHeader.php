
	<!DOCTYPE html>
		<html>
		<body>
			<link rel="stylesheet" type="text/css" href="/Webpages/css/title.css">
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

			if (!$USERSESS->isloggedin()) {
				echo '<a href="/Webpages/Auth/register.php"> Register </a>'; 
				echo '<a href="/Webpages/Auth/login.php"> Login </a> <br>';
			} else {
				echo "Welcome " . $USERSESS->getUserName();
			}

			?>