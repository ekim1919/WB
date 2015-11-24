<?php

include($_SERVER['DOCUMENT_ROOT'] . "/include.php");

//Will add actual search function later. For now, I will simply dump the rows in the DB until Character page is done.


$post_array = array("firstname","lastname");

if(isset($_POST) && !array_diff($post_array,array_keys($_POST))) {

	$SANTIZER = new InputSanitizer($_POST);

	$SANTIZER->addFilter("firstname", FILTER_SANITIZE_STRING);
	$SANTIZER->addFilter("lastname", FILTER_SANITIZE_STRING);

	$sant_array = $SANTIZER->filter();

	$conn = $DB->connect();

	$char_query = new sqlDBQueryResult($conn, "SELECT CharacterID, FirstName, LastName FROM Character WHERE FirstName=$1 and LastName=$2;",array($sant_array[0],$sant_array[1]));
	$char_query->query();

	$result_list = new RenderList();

	$result_list->addRenderable(new Text("<div class=\"list-group\">"));

	while ($row = $char_query->getRow()) {
		$result_list->addRenderable(new Text("<a href=/Public/Waifu/waifu.php?characterid=" . $row["characterid"] . " class=\"list-group-item\">" . $row["firstname"] . " " . $row["lastname"] . "</a>"));
	}

	$result_list->addRenderable(new Text("</div>")); //Add this encapsulation functionality in render list class? or different object?

	$RENDENGINE->render($result_list);
}

?>