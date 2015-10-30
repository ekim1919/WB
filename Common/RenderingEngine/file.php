<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/renderable.php");

class File extends Renderable {


	private $pathname;

	public function __construct($pathname) {

		$this->pathname = $pathname;
	}

	public function payload() {
		ob_start();
		include($_SERVER['DOCUMENT_ROOT'] . "/Gears/". $this->pathname .".php");
		return ob_get_clean();
	}

	public function render() {
		include($_SERVER['DOCUMENT_ROOT'] . "/Gears/". $this->pathname .".php");
	}
}


?>