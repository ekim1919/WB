<?php


/*
The Class in charge of validating images, resizing them, and saving them to the disk.
Will rethink about the performance and memory costs of such a class.
*/

require($_SERVER['DOCUMENT_ROOT'] . '/include.php');

class ImageManager {

	private $src_img; //Contains a pointer to the image.
	private $avatar_img_type;

	private $accepted_img_file_types = array( //File types of accepted images. This can change based on
		'image/jpeg' => 'jpg',                //what types we want to use. 
		'image/png' => 'png',
		'image/gif' => 'gif',
		'image/pjpeg' => 'jpg');

	private $MAX_WIDTH = 1000;
	private $MAX_HEIGHT = 1000;
	private $IMAGE_ROOT;
	private $THUMB_WIDTH = 125;
	private $THUMB_HEIGHT = 125; 


	public function __construct($src_img) {
		$this->src_img = $src_img;
		$this->IMAGE_ROOT = $_SERVER['DOCUMENT_ROOT'] . '/Images';
		$this->validateImg($this->src_img);
	}

	function make_thumb($src_img) { //Make Thumb Nail Image

		$img_width = imagesx($src_img);
		$img_height = imagesy($src_img);
		
		if(($img_width > $this->THUMB_HEIGHT) || ($img_height > $this->THUMB_WIDTH)) { //Only create thumb nail if bigger than thumb nail dimensions
		
			$ratio = ($img_width > $img_height) ? $THUMB_WIDTH / $img_width : //Find a ratio based on the ratio of the longest side and the thumbnail length
										  $THUMB_HEIGHT / $img_height;
			
			$round_width = round($img_width * $ratio);
			$round_height = round($img_height * $ratio);
			$thumb_img = imagecreatetruecolor($round_width, $round_height);
			
			imagecopyresampled($thumb_img, $src_img, 0, 0, 0, 0,
							   $round_width, $round_height, $img_width, $img_height); //Copy the source image into the thumb nail dimensions
		} else { //Else just use smaller image
			$thumb_img = $src_img;
		}
		return $thumb_img;
	}

	private function validateImg() {

		$img_info = getimagesize($this->src_img); //Getting information and checking if it is of the supported types
		$avatar_img_type = $img_info["mime"];


		$img_type = $this->accepted_img_file_types[$avatar_img_type]; //Must be changed with a configuration. 

		if(!$img_type || !$img_info[0]) {
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
		$avatar_img_path = "$this->IMAGE_ROOT/" . $img_name_on_server;

		if(!copy($this->src_img, $avatar_img_path)) { //Copy file into $image_root for storage
			$RENDENGINE->render(new Text("Serverside Error: Saving Image Failed."));
			exit;
		}	
	}

	public function __destruct() {
		if($this->src_img) imagedestroy($this->src_img);
	}


}




?>