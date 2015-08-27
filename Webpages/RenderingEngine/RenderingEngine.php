<?php

	class RenderingEngine {

		//Render the webpage with the header and footer given by $header_file_path and $footer_file_path

		public function __construct() { }

		public function render($file_name) { //Proper error Handling would be nice (Exceptions?)
			ob_start();
			include($_SERVER['DOCUMENT_ROOT'] . "/Webpages/$file_name.php");
			return ob_get_clean();
		}

		//Render the standard layout with a file in the webpage directory as a parameter
		public function standardRenderFile($file) {
			echo $this->render("Header/DesignHeader") . $this->render($file) . $this->render("Footer/DesignFooter");
		}

		//Render the standard layout just including pure text consisting of HTML and PHP statements
		public function standardRender($text) {
			echo $this->render("Header/DesignHeader") . $text . $this->render("Footer/DesignFooter");
		}

	}
?>
