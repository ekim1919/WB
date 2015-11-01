<?php

include($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$post_array = array('firstname','lastname','haircolor','eyecolor','height','bustsize','hipsize','waistsize','bodytype','personality');

if(isset($_POST) && array_diff($post_array, array_keys($_POST))) {
	echo "One or more variables were not set.";
} else {

$SANTIZER = new InputSanitizer($_POST);


//Will think of better sanitize flags. Will add validation steps as well.

$SANTIZER->addFilter("firstname",FILTER_SANITIZE_STRING);
$SANTIZER->addFilter("lastname",FILTER_SANITIZE_STRING);
$SANTIZER->addFilter("haircolor",FILTER_SANITIZE_STRING);
$SANTIZER->addFilter("eyecolor",FILTER_SANITIZE_STRING);
$SANTIZER->addFilter("height",FILTER_SANITIZE_NUMBER_INT);
$SANTIZER->addFilter("bustsize",FILTER_SANITIZE_NUMBER_INT);
$SANTIZER->addFilter("hipsize",FILTER_SANITIZE_NUMBER_INT);
$SANTIZER->addFilter("waistsize",FILTER_SANITIZE_NUMBER_INT);
$SANTIZER->addFilter("bodytype",FILTER_SANITIZE_STRING);
$SANTIZER->addFilter("personality",FILTER_SANITIZE_STRING);

$sant_array = $SANTIZER->filter();

//var_dump($sant_array);

$connection = $DB->connect();

(new sqlDBExecute($connection, "INSERT into CHARACTER VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10)",$sant_array))->execute();
}

?>