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

		$rendList->addRenderable(new Text('<div id="waifu">
											<div class="waifuinfo"> 
											<table> 
												<tr> <th> Field </th> 
												<th> Value </th></tr>'));

		$key_arr = ["CharacterID" => "pub", //Adding permissions. "pub" stands for information relevant to the public. Protected fields are labeled as "protect."
					"First Name" => "pub",
					"Last Name" => "pub",
					"Hair Color" => "pub",
					"Eye Color" => "pub",
					"Height" => "pub",
					"Weight" => "pub",
					"Bust" => "pub",
					"Waist" => "pub",
					"Hips" => "pub",
					"Body Type" => "pub",
					"Personality" => "pub",
					"Description" => "protect",
					"AvatarPath" => "protect",
					"AvatarThumbPath" => "protect"];

		$val_arr = array_combine(array_keys($key_arr), array_values($char_stat_arr));

		foreach($val_arr as $key => $value) {
			if ($key_arr[$key] == "pub") {
				$rendList->addRenderable(new Text("<tr> <td> $key </td> <td> $value </td> </tr>"));
			}
		}

		$rendList->addRenderable(new Text("</table>"));

		$rendList->addRenderable(new Text('<h3> Description </h3> <div class="waifudescrip">' . $val_arr["Description"] . '</div> <a href="#"> Edit this page </a> </div>'));

		$rendList->addRenderable(new Text('<img src="' . Config::IMAGE_ROOT . $val_arr["AvatarPath"] . '"style=float: right; margin-left: auto;>'));

		$rendList->addRenderable(new Text("</div>"));

		$RENDENGINE->render($rendList);
	} else {
		$RENDENGINE->render(new Text("No such Character ID can be found."));		
	}
}
?>