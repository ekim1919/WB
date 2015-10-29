<?php
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/baseexception.php");

	class RenderException extends BaseException {

		public function renderableMessage() {
			return "An Exception in the Rendering Engine was caught: " . $this->message;
		}
	}

	class RenderingEngine {

		//Render the webpage with the header and footer given by $header_file_path and $footer_file_path

		public function __construct() { }

		//A Gear is just a module from the Gears directory that the engine looks for when finding HTML to output

		private function render($file_name) { //Proper error Handling would be nice (Exceptions?)
			ob_start();
			include($_SERVER['DOCUMENT_ROOT'] . "/Gears/$file_name.php");
			return ob_get_clean();
		}

		//Render the standard layout with a file in the webpage directory as a parameter. If an array is passed in, include the files according to the order of the array.
		public function renderFile($file,$standard=False) {

			if(is_array($file)) {

				ob_start();
				foreach($file as $f) echo $this->render($f);
				$output = ob_get_clean();

			} else {
				$output = $this->render($file);
			}

			echo ($standard) ? $this->render("Assets/Header/DesignHeader") . $output . $this->render("Assets/Footer/DesignFooter") : 
							   $output;
		}

		//Render the standard layout just including pure text consisting of HTML and PHP statements. If array of text, just concat all of them.
		public function renderText($text,$standard=False) {

			$output = (is_array($text) ? implode("", $text) : $text);

			echo ($standard) ? $this->render("Assets/Header/DesignHeader") .  $output . $this->render("Assets/Footer/DesignFooter") :
							   $output;
		}

		//$array is an associative array where the key is either "f" or "t", standing for file and text respecitively. The Rendering Engine will process in the order of the array.
		public function layeredRender($array,$standard=False) {
			ob_start();
			foreach($array as $key => $value) {
				if($key == "f") echo $this->render($value);
				elseif($key == "t") echo $value;
				else throw new RenderException("Cannot render a layered value"); 
			}

			echo  ($standard) ? $this->render("Assets/Header/DesignHeader") . ob_get_clean() . $this->render("Assets/Footer/DesignFooter") : 
							    ob_get_clean();
		}
	  }
?>
