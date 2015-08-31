
<?php 
	include("include.php");

	//$RENDENGINE->standardRenderFile(["Test/StandardWelcomeTest","Test/TestingStandardRender"]);
	$RENDENGINE->standardLayeredRender(["f" => "Test/StandardWelcomeTest","t" => "mimi"]);


?>
