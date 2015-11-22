<?php


require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

if(isset($_GET['characterid'])) {


	$SANTIZER = new InputSanitizer($_GET);

	$SANTIZER->addFilter("characterid",FILTER_SANITIZE_NUMBER_INT); //Add Validation

	$sant_arr = $SANTIZER->filter();

	//var_dump($sant_arr);

	$connection = $DB->connect();

	$character_query = new sqlDBQueryResult($connection, "SELECT * FROM CHARACTER WHERE characterid = $1 LIMIT 1",$params=$sant_arr);
	$character_query->query();

	$char_stat_arr = $character_query->getRow();

	if($char_stat_arr == null) {
		$RENDENGINE->render(new Text("NO WAIFU DESU!!!! Nonexistent Character!"));
	} else {
		$rendList = new RenderList();

		$rendList->addRenderable(new Text("<div id=\"stats\">"));

		//var_dump($char_stat_arr);

		$key_arr = ["CharacterID","First Name", "Last Name","Hair Color","Eye Color","Height","Weight","Bust","Waist","Hips","Body Type","Personality"];
		$val_arr = array_combine($key_arr, array_values($char_stat_arr));

		foreach($val_arr as $key => $value) {
			$rendList->addRenderable(new Text("<ul> $key: $value </ul>"));
		}

		//Picture Adding. Will change when I change the naming scheme of the pictures to a better scheme. 

		$rendList->addRenderable(new Text("<img class=\"character\" src=\"\Images\\" .$val_arr["First Name"] . $val_arr["Last Name"] . ".jpg" . "\" style=\"float: right; margin-left: auto;\">"));


		$rendList->addRenderable(new Text("</div>"));

		$RENDENGINE->render($rendList);
	}
}
?>