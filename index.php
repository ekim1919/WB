
<?php 
	include("include.php");

	//$RENDENGINE->standardRenderFile(["Test/StandardWelcomeTest","Test/TestingStandardRender"]);
	$RENDENGINE->layeredRender(["f" => "Assets/Test/StandardWelcomeTest", "t" => "Another Text Layer."], $standard=True);


//phpinfo();

?>
