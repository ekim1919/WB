<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/include.php");

$post_array = ["about"];
$avatar_img = !empty($_FILES) ? $_FILES['files']['tmp_name'] : null;

/*
Not considering session security at the moment. This is easily hijackable.
*/

if (isset($_POST) && !array_diff($post_array,array_keys($_POST))) {

	$SANTIZER = new InputSanitizer($_POST);
	$SANTIZER->addFilter("about",FILTER_SANITIZE_STRING);
	$SANTIZER->filter();

	$connection = $DB->connect();

	/*
		We will not worry about deleting the old image for now. Should be implemented later, however.
	*/

	if($avatar_img != null) {

		require($_SERVER['DOCUMENT_ROOT'] . "/Common/ImageManager/useravatar.php");

		$img_mang = new UserAvatar($avatar_img);

		$ava_path = $img_mang->createImage($USERSESS->getUserID());

		(new sqlDBExecute($connection, "UPDATE USERINFO SET About=$1, AvatarPath=$2 WHERE UserID=$3", [$sant_arr["about"], $ava_path, $USERSESS->getUserID()] ))->execute();

	} else { /*Redundent for now*/
		(new sqlDBExecute($connection, "UPDATE USERINFO SET About=$1 WHERE UserID=$3", [$sant_arr["about"], $USERSESS->getUserID()] ))->execute();
	}
}



?>