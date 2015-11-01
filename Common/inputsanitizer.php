<?php

class InputSanitizer {
	


	/*
		Class responsible for Santization, Filitering, and Validation of User Input.
	*/

	private $san_array;
	private $arg_array;

	public function __construct($san_array) {

		array_filter($san_array,array($this,'trim_string')); //Automatically trim input.

		$this->san_array = $san_array;
		$this->arg_array = array();
	}


	public function addFilter($key,$filter,$flag=null,$options=null) {

		$filter_array = array('filter' => $filter);

		if($flag != null) {
			$filter_array['flag'] = $flag;
		}

		if($options != null) {
			$filter_array['options'] = $options;
		}

		$this->arg_array[$key] = $filter_array;
	}

	//Returns False on failure. Unravel removes the keys and returns the values in an array in the order of the filters placed. True by default
	public function filter($unravel=True) {

		$filtered_array = filter_var_array($this->san_array,$this->arg_array);

		$new_array = null;

		if($unravel) {
			$new_array = array();
			foreach($filtered_array as $key => $value) $new_array[] = $value; //Well-defined?
		} else {
			$new_array = $filtered_array;
		}
		return $new_array;
	} 

	private function trim_string(&$str) {
		$str = trim($str);
	}


}



?>