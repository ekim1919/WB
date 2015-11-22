<?php

class OutputSanitizer {
	
	public static function output($str) {
		return htmlspecialchars($str, ENT_QUOTES,'utf-8');
	}

}


?>