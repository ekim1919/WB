<?php

/*
The Class in charge of validating images, resizing them, and saving them to the disk.
Will rethink about the performance and memory costs of such a class.
*/

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

abstract class ImageManager {

	private $src_img; //Contains a pointer to the image.
	private $avatar_gd_resource;
	private $accepted_img_file_types;

	protected $avatar_img_type;

	private $gd_create_resource = array(
		'jpg' => 'imagecreatefromjpeg',
		'png' => 'imagecreatefrompng',
		'gif' => 'imagecreatefromgif');

	private $gd_release_resource = array (
		'jpg' => 'imagejpeg',
		'png' => 'imagepng',
		'gif' => 'imagegif');	

	public function __construct($src_img) {
		$this->src_img = $src_img;

		$this->accepted_img_file_types = Config::ACCEPTED_IMG_TYPES;

		$this->avatar_img_type = $this->validateImg($this->src_img);

		$this->avatar_gd_resource = $this->gd_create_resource[$this->avatar_img_type]($src_img);
	}


	//Abstract functions
	public abstract function createImage($name);

	protected function saveImg($resized_width,$resized_height,$img_path) { //Responsible for resizing the image and saving it to disk.

		$img_width = imagesx($this->avatar_gd_resource);
		$img_height = imagesy($this->avatar_gd_resource);
		
		if(($img_width > $resized_width) || ($img_height > $resized_height)) { //Only create thumb nail if bigger than thumb nail dimensions
		
			$ratio = ($img_width > $img_height) ? $resized_width / $img_width : //Find a ratio based on the ratio of the longest side and the thumbnail length
										  		  $resized_height / $img_height;
			
			$round_width = round($img_width * $ratio);
			$round_height = round($img_height * $ratio);
			$thumb_img = imagecreatetruecolor($round_width, $round_height);
			
			imagecopyresampled($thumb_img, $this->avatar_gd_resource, 0, 0, 0, 0,
							   $round_width, $round_height, $img_width, $img_height); //Copy the source image into the thumb nail dimensions
		} else { //Else just use smaller image
			$thumb_img = $this->avatar_gd_resource;
		}

		$this->gd_release_resource[$this->avatar_img_type]($thumb_img, $img_path);
	}

	protected function validateImg() {

		$img_info = getimagesize($this->src_img); //Getting information and checking if it is of the supported types
		$avatar_img_type = $img_info["mime"];

		$img_type = $this->accepted_img_file_types[$avatar_img_type]; //Must be changed with a configuration. 

		if(!$img_type) {
			$RENDENGINE->render(new Text("Image is not of supported types. Please use a Supported Image.")); //Must be fixed. Within Class. Musted be passed to separate error object.
			exit;
		}

		return $img_type;
	}

	public function __destruct() {
		if($this->avatar_gd_resource) imagedestroy($this->avatar_gd_resource);
	}

}
?>