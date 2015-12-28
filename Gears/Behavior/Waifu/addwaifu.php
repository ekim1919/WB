<?php

require($_SERVER['DOCUMENT_ROOT'] . "/include.php");
require($_SERVER['DOCUMENT_ROOT'] . "/Common/ImageManager/charavatar.php");
require($_SERVER['DOCUMENT_ROOT'] . "/Common/ImageManager/thumbnail.php");

$post_array = ['firstname','lastname','haircolor','eyecolor','height','weight','bustsize','hipsize','waistsize','bodytype','personality','description'];
$avatar_img = !empty($_FILES) ? $_FILES['files']['tmp_name'] : null;

if(isset($_POST) && !array_diff($post_array, array_keys($_POST)) && !empty($_FILES) && ($_FILES["files"]["error"] == UPLOAD_ERR_OK)) {

	if(in_array("", array_values($_POST))) {
		$RENDENGINE->render(new Text("Sorry. One of more of the fields were not filled out!"));
		exit;
	}


	$SANTIZER = new InputSanitizer($_POST);


	//Will think of better sanitize flags. Will add validation steps as well. Remember to santize avatar as well.


	$SANTIZER->addFilter("firstname",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("lastname",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("haircolor",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("eyecolor",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("height",FILTER_SANITIZE_NUMBER_INT);
	$SANTIZER->addFilter("weight",FILTER_SANITIZE_NUMBER_INT);
	$SANTIZER->addFilter("bustsize",FILTER_SANITIZE_NUMBER_INT);
	$SANTIZER->addFilter("hipsize",FILTER_SANITIZE_NUMBER_INT);
	$SANTIZER->addFilter("waistsize",FILTER_SANITIZE_NUMBER_INT);
	$SANTIZER->addFilter("bodytype",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("personality",FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("description",FILTER_SANITIZE_STRING);	

	$sant_array = $SANTIZER->filter(); 

	$connection = $DB->connect();

	/*Error handling?*/

	$char_ava = new CharacterAvatar($avatar_img);
	$thumb = new ThumbNail($avatar_img);

	$avatar_name = md5(implode("",$sant_array)); //Hash all values. Assuming values will be "unique enough"

	$avatar_path = $char_ava->createImage($avatar_name); 
	$thumb_path = $thumb->createImage($avatar_name); //Make the character thumbnail as well.

	$sant_array[] = $avatar_path;
	$sant_array[] = $thumb_path;

	(new sqlDBExecute($connection, "INSERT into CHARACTER VALUES(nextval('Character_CharacterID_seq'),$1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14)",$sant_array))->execute();
}

?>