<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/Base/renderable.php");


class RenderList extends Renderable {
	
 	
	private $renderable;
	private $position;

	//Array of Renderables
 	public function __construct($renarray) {

 		$this->renderable = $renarray;
 	}

 	public function addRenderable(Renderable $ren) {
 			$render = $this->renderables;
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