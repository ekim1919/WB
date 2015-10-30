<?php


class Text extends Renderable {

	private $text;

	public function __construct($text) {

		$this->text = $text;

	}

	public function payload() {
		return $text;
	}

	public function render() {
		echo $text;
	}
}



?>