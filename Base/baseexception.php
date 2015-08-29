<?php
	abstract class BaseException extends Exception {

		public function __construct($message=null, $code = 0, Exception $previous=null) {
			parent::__construct($message,$code,$previous);
		}

		abstract protected function renderableMessage();
	}
?>