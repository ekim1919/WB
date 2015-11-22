<?php


class Text extends Renderable {

	private $text;

	public function __construct($text) {

		$this->text = $text;

	}

	public function payload() {
		return $this->text;
	}

	public function render() {
		echo $this->text;
	}
}



?>