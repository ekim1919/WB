
	<!DOCTYPE html>
		<html>
		<body>
			<link rel="stylesheet" type="text/css" href="/Public/css/title.css">
			<h1> 
				<a href= "/index.php"> Waifu Battle </a>
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
				echo OutputSanitizer::output($USERSESS->getUserName()) . "-&#27096;";
				echo '<br> <a href="/Public/Auth/logout.php"> Logout </a>';

				$RENDENGINE->render(new File("Assets/User/greetings"));   		     
			}

			?>
