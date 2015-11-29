<?php

include($_SERVER['DOCUMENT_ROOT'] . "/include.php");
include_once($_SERVER['DOCUMENT_ROOT'] ."/config.php");


//Will add actual search function later. For now, I will simply dump the rows in the DB until Character page is done.


$post_array = array("firstname","lastname");

if(isset($_POST) && !array_diff($post_array,array_keys($_POST))) {

	$SANTIZER = new InputSanitizer($_POST);

	$SANTIZER->addFilter("firstname", FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("lastname", FILTER_SANITIZE_STRING);

	$sant_array = $SANTIZER->filter();

	$conn = $DB->connect();

	$char_query = new sqlDBQueryResult($conn, "SELECT CharacterID, FirstName, LastName, AvatarThumbPath FROM Character WHERE FirstName=$1 and LastName=$2;",array($sant_array[0],$sant_array[1]));
	$char_query->query();

	$result_list = new RenderList();

	$media_head = '<div class="media">';

	$result_list->addRenderable(new Text($media_head)); //Turn this into a file. More convenient.

	while ($row = $char_query->getRow()) {
		$media_rend = new RenderList([new Text('<a class="media-left" href="/Public/Waifu/waifu.php?characterid=' . $row["characterid"] . '">'),
									  new Text('<img class="media-object" src="' . Config::THUMB_IMAGE_ROOT . $row["avatarthumbpath"] . '"></a>'),
									  new Text('<div class="media-body">' . $row["firstname"] . $row["lastname"])]);
		$result_list->addRenderable($media_rend);
	}

	$result_list->addRenderable(new Text("</div></div>")); //Add this encapsulation functionality in render list class? or different object?

	$RENDENGINE->render($result_list);
}

?>