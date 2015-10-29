<?php
require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$RENDENGINE->renderFile(["Behavior/Auth/loginbehav","Assets/User/login",], $standard=True);

?>