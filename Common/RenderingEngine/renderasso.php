<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/renderable.php");

/*
	A wrapper class that wraps over the associative array and makes it renderable. Many annoying tasks will be automated here.
*/


class RenderAsso extends Renderable {

	private $assoarr; //Associative array
	private $upperLayer; //Optional Layers
	private $lowerLayer;


	public function __construct($arr,$upper="",$lower="") {
		$this->assoarr = $arr;
		$this->upperLayer = $upper;
		$this->lowerLayer = $lower;
	}

	public function payload() {
		return $this->assoarr;
	}

	public function render() { 
		//$rend = $this->assoarr;
		//foreach($rend as $key => $value) {
		//	echo $upperLayer . $key
		//}
	}

}


?> 