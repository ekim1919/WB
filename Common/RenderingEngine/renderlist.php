<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/renderable.php");


class RenderList extends Renderable {
	
 	
	private $renderable;

	//Array of Renderables
 	public function __construct() {

 		//If no arguments are passed to the constructor, then give a clean array. Otherwise, start with given array of Renderables. Should add an Exception system at some point.
 		$this->renderable = (func_num_args() > 0) ? func_get_arg(0) : array();	 		
 	}

 	//Will be Ordered Array.
 	public function addRenderable(Renderable $ren) {
 			$render = &$this->renderable;
			$render[] = $ren;
	}


	//Simply echoes it's contents
	public function render() {
			$rend = $this->renderable;
			foreach($rend as $ren) echo $ren->payload();
	}

	public function payload() {
		return $this->renderable;
	}
}


?>