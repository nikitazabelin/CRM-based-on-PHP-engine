<?php
require_once "complexmessageclass.php";

class PageMessage extends ComplexMessage {

	public function __construct() {
		parent::__construct("page_messages");
	}

}
?>
