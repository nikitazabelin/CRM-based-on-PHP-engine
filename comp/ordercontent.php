<?php
require_once "modules.php";

class OrderContent extends Modules {

	protected $title = "ביצוע הזמנה";
	protected $meta_desc = "ביצוע הזמנת רכש";
	protected $meta_key = "ביצוע הזמנת אלכוהול, ביצוע הזמנה, הזמנת";

	protected function getContent() {
		$this->template->set("message", $this->message());
		$this->template->set("name", $_SESSION["name"]);
		$this->template->set("phone", $_SESSION["phone"]);
		$this->template->set("email", $_SESSION["email"]);
		$this->template->set("delivery", $_SESSION["delivery"]);
		$this->template->set("address", $_SESSION["address"]);
		$this->template->set("notice", $_SESSION["notice"]);
		return "order";
	}

}

?>
