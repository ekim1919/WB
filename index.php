
<?php 
	include("include.php");

	//$RENDENGINE->standardRenderFile(["Test/StandardWelcomeTest","Test/TestingStandardRender"]);
	$list = new RenderList([new File("Assets/Test/StandardWelcomeTest"), new File("Assets/Test/TestingStandardRender")]);
	$RENDENGINE->render($list,$standard=True);  


//phpinfo();

?>
