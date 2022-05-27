<?php
require_once "globalmessage.php";

class Message extends GlobalMessage {

	public function __construct() {
		parent::__construct("messages");
	}
}
?>
