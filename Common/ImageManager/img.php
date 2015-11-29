<?php


/*
The Class in charge of validating images, resizing them, and saving them to the disk.
Will rethink about the performance and memory costs of such a class.
*/

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

class ImageManager {

	private $src_img; //Contains a pointer to the image.
	private $avatar_img_type;
	private $avatar_gd_resource;

	private $accepted_img_file_types;

	private $gd_create_resource = array(
		'jpg' => 'imagecreatefromjpeg',
		'png' => 'imagecreatefrompng',
		'gif' => 'imagecreatefromgif');

	private $gd_release_resource = array (
		'jpg' => 'imagejpeg',
		'png' => 'imagepng',
		'gif' => 'imagegif');	


	private $IMAGE_ROOT;
	private $MAX_WIDTH;
	private $MAX_HEIGHT;

	private $THUMB_IMAGE_ROOT;
	private $THUMB_WIDTH ;
	private $THUMB_HEIGHT; 


	public function __construct($src_img) {
		$this->src_img = $src_img;

		$this->IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . Config::IMAGE_ROOT;
		$this->THUMB_IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . Config::THUMB_IMAGE_ROOT;

		$this->MAX_WIDTH = Config::MAX_WIDTH;		
		$this->MAX_HEIGHT = Config::MAX_WIDTH;

		$this->THUMB_HEIGHT = Config::THUMB_HEIGHT;
		$this->THUMB_WIDTH = Config::THUMB_WIDTH;


		$this->accepted_img_file_types = Config::ACCEPTED_IMG_TYPES;

		$this->validateImg($this->src_img);

		$this->avatar_gd_resource = $this->gd_create_resource[$this->avatar_img_type]($src_img);
	}


	public function makeThumbNail($name) { //Make Thumb Nail Image and save it at Thumbnail Image Root

		$img_width = imagesx($this->avatar_gd_resource);
		$img_height = imagesy($this->avatar_gd_resource);
		
		if(($img_width > $this->THUMB_HEIGHT) || ($img_height > $this->THUMB_WIDTH)) { //Only create thumb nail if bigger than thumb nail dimensions
		
			$ratio = ($img_width > $img_height) ? $this->THUMB_WIDTH / $img_width : //Find a ratio based on the ratio of the longest side and the thumbnail length
										  		  $this->THUMB_HEIGHT / $img_height;
			
			$round_width = round($img_width * $ratio);
			$round_height = round($img_height * $ratio);
			$thumb_img = imagecreatetruecolor($round_width, $round_height);
			
			imagecopyresampled($thumb_img, $this->avatar_gd_resource, 0, 0, 0, 0,
							   $round_width, $round_height, $img_width, $img_height); //Copy the source image into the thumb nail dimensions
		} else { //Else just use smaller image
			$thumb_img = $this->avatar_gd_resource;
		}

		$thumb_name = $name . "T." . $this->avatar_img_type; //Construct Extension
			
		$thumb_path = $this->THUMB_IMAGE_ROOT . $thumb_name;

		$this->gd_release_resource[$this->avatar_img_type]($thumb_img, $thumb_path);

		return $thumb_name;
	}

	private function validateImg() {

		$img_info = getimagesize($this->src_img); //Getting information and checking if it is of the supported types
		$avatar_img_type = $img_info["mime"];

		

		$img_type = $this->accepted_img_file_types[$avatar_img_type]; //Must be changed with a configuration. 

		if(!$img_type) {
			$RENDENGINE->render(new Text("Image is not of supported types. Please use a Supported Image.")); //Must be fixed. Within Class. Musted be passed to separate error object.
			exit;
		}

		$this->avatar_img_type = $img_type;
	
		list($width, $height, $type, $attr) = $img_info;

		if($width > $this->MAX_WIDTH || $height > $this->MAX_HEIGHT) {
			$RENDENGINE->render(new Text("Your picture's dimensions are too large. Your image must be $max_width by $max_height"));
			exit;
		}		

	}

	public function saveImgonServer($name) { //Will have to accomodate both user and character. A redesign is needed.

		$img_name_on_server = $name . '.' . $this->avatar_img_type;
		$avatar_img_path = "$this->IMAGE_ROOT" . $img_name_on_server;

		if(!move_uploaded_file($this->src_img, $avatar_img_path)) { //Copy file into $image_root for storage
			$RENDENGINE->render(new Text("Serverside Error: Saving Image Failed."));
			exit;
		}

		return $img_name_on_server;	
	}

	public function __destruct() {
		if($this->avatar_gd_resource) imagedestroy($this->avatar_gd_resource);
	}

}
?>