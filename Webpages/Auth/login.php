<?php
require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$RENDENGINE->renderFile(["Behavior/Auth/loginbehav","User/login",], $standard=True);

?>