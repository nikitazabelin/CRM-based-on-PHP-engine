<?php
require_once "modules.php";

class NotFoundContent extends Modules {

	protected $title = "404 שגיאה";
	protected $meta_desc = ".דף הזה לא נמצא";
	protected $meta_key = "דף הזה לא נמצא , לא נמצא, 404 שגיאה";

	protected function getContent() {
		header("HTTP/1.0 404 Not Found");
		return "notfound";
	}

}

?>
