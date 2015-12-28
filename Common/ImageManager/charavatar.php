
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Base/img.php');

class CharacterAvatar extends ImageManager {

	private $IMAGE_ROOT;
		
	public function __construct($src_img) {

		parent::__construct($src_img);

		$this->IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . Config::IMAGE_ROOT;		
	}


	public function createImage($name) {

		$avatar_name = $name . '.' . $this->avatar_img_type;

		$avatar_path = $this->IMAGE_ROOT . $avatar_name;

		$this->saveImg(Config::MAX_HEIGHT, Config::MAX_WIDTH, $avatar_path);

		return $avatar_name;
	}
}

?>
