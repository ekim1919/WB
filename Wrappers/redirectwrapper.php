
<?php

class RedirectWrapper {

	public function redirect($file) {

		if(file_exists($file)) {
			header('Location:/Webpages/$file.php');
			exit();
		}

	}	

}

?>