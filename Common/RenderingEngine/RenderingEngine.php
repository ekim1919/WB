<?php

	/*
	Notes: OutputSantitation incoportated into the RenderEngine?
	*/
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/baseexception.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/renderable.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/renderlist.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/Common/RenderingEngine/file.php");

	class RenderException extends BaseException {

		public function renderableMessage() {
			return "An Exception in the Rendering Engine was caught: " . $this->message;
		}
	}

	class RenderingEngine {

		//Render the webpage with the header and footer given by $header_file_path and $footer_file_path

		public function __construct() { }

		//A Gear is just a module from the Gears directory that the engine looks for when finding HTML to output


		//Will Render everything in order as pushed by addRenderable calls
		//Standard parameter is a flag to signal if the default header and footer will be rendered as well.
		public function render(Renderable $ren, $standard=False) { //Proper error Handling would be nice (Exceptions?)
			ob_start();
			$ren->render();
			echo ($standard) ? $this->addBanners(ob_get_clean()) : ob_get_clean();
		}


		private function addBanners($buffer) {
			ob_start();

			echo (new File("Assets/Header/DesignHeader"))->payload();
			echo $buffer;
			echo (new File("Assets/Footer/DesignFooter"))->payload();

			return ob_get_clean();

		}

	}


?>
