<?php
require_once "complexmessage.php";

class Email extends ComplexMessage {

	public function __construct() {
		parent::__construct("emails");
	}

}

?>
