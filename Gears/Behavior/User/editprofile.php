
<form id="add-char-form" class="form-horizontal" id="register" action="/Public/User/editprofile.php" enctype="multipart/form-data" method="post">

<?php 

require($_SERVER['DOCUMENT_ROOT'] . "/include.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/config.php");

$post_array = ["about"];
$avatar_img = !empty($_FILES) ? $_FILES['files']['tmp_name'] : null;

/*
Not considering session security at the moment. This is easily hijackable.
*/

$connection = $DB->connect();

$user_query = new sqlDBQueryResult($connection, "SELECT * FROM USERINFO WHERE UserID=$1",$params=[$USERSESS->getUserID()] );

$user_query->query();

$user_fields = $user_query->getRow();


$rendlist = new RenderList(new Text('<div class="form-group">'));
$rendlist->addRenderable(new Text('<textarea rows="7" columns="20" name="about">'. $user_fields["about"]  .'</textarea>'));
$rendlist->addRenderable(new Text('<img src="' . Config::USER_IMAGE_ROOT . $user_fields["avatarpath"] . '">'));													
$rendlist->addRenderable(new Text('</div>'));						

$RENDENGINE->render($rendlist);

?>
	
	<input name="files" type="file" accept="image/*">
	<div class="form-group">
		<button type="submit" class="btn" value="Submit">Submit</button>
	</div>

</form>

<?php

if (isset($_POST) && !array_diff($post_array,array_keys($_POST))) {

	$SANTIZER = new InputSanitizer($_POST);
	$SANTIZER->addFilter("about",FILTER_SANITIZE_STRING);
	$sant_arr = $SANTIZER->filter();

	/*
		We will not worry about deleting the old image for now. Should be implemented later, however.
	*/

	$connection2 = $DB->connect();

	if($avatar_img != null) {

		require($_SERVER['DOCUMENT_ROOT'] . "/Common/ImageManager/useravatar.php");

		$img_mang = new UserAvatar($avatar_img);

		$ava_path = $img_mang->createImage($USERSESS->getUserID());

		(new sqlDBExecute($connection2, "UPDATE USERINFO SET About = $1,AvatarPath = $2 WHERE UserID = $3", array($sant_arr[0], $ava_path, $USERSESS->getUserID()) ))->execute();

	} else { /*Redundent for now*/
		(new sqlDBExecute($connection2, "UPDATE USERINFO SET About = $1 WHERE UserID = $2", array($sant_arr[0], $USERSESS->getUserID()) ))->execute();
	}
}



?> 