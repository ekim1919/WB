
	<!DOCTYPE html>
		<html>

		<head>

			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap.css">
			<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="/Public/dropzone/dropzone.css">
			<script src="/Public/dropzone/dropzone.js"></script>
		</head>

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
				echo '<a href="/Public/Auth/register.php" class="btn btn-large btn-primary"> Register </a>'; 
				echo '<a href="/Public/Auth/login.php" class="btn btn-large btn-primary"> Login </a> <br>';
			} else {
				echo OutputSanitizer::output($USERSESS->getUserName()) . "-&#27096;";
				echo '<br> <a href="/Public/Auth/logout.php"> Logout </a>';

				$RENDENGINE->render(new File("Assets/User/greetings"));   		     
			}

			?>
