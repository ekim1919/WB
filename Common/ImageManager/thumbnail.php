<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Base/img.php');

class Thumbnail extends ImageManager {

	private $THUMB_IMAGE_ROOT;

	public function __construct($src_img) {

		parent::__construct($src_img);

		$this->THUMB_IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . Config::THUMB_IMAGE_ROOT;
	}

	public function createImage($name) {

		$thumb_name = $name . "T." . $this->avatar_img_type;

		$thumb_path = $this->THUMB_IMAGE_ROOT . $thumb_name;

		$this->saveImg(Config::THUMB_HEIGHT, Config::THUMB_WIDTH, $thumb_path);

		return $thumb_name;

	}
}

?>
