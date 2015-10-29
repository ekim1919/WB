
<?php

class RedirectWrapper {

	public function redirectFromWebpage($file) {

			header("Location: /Public/$file.php");
			exit;

	}	

	public function redirectFromRoot($file) {

			header("Location: /$file.php");
			exit;
	}

}

?>
