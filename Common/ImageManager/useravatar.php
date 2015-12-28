<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Base/img.php');

class UserAvatar extends ImageManager {

	private $USER_IMAGE_ROOT;
		
	public function __construct($src_img) {

		parent::__construct($src_img);

		$this->IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . Config::USER_IMAGE_ROOT;		
	}


	public function createImage($name) {

		$avatar_name = $name . '.' . $this->avatar_img_type;

		$avatar_path = $this->USER_IMAGE_ROOT . $avatar_name;

		$this->saveImg(Config::USER_MAX_HEIGHT, Config::USER_MAX_WIDTH, $avatar_path);

		return $avatar_name;
	}

}

?>