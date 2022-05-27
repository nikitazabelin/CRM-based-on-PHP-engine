<?php
require_once "modules.php";

class ContactsContent extends Modules {

	protected $title = "צור קשר";
	protected $meta_desc = "צור קשר.";
	protected $meta_key = "צור קשר, אדמיניסטרציה";

	protected function getContent() {
		return "contacts";
	}

}

?>
