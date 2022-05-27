<?php
require_once "modules.php";

class AddOrderContent extends Modules {

	protected $title = "ההזמנה מקובלת";
	protected $meta_desc = "ההזמנה מקובלת.";
	protected $meta_key = "ההזמנה מקובלת";/*add more tags*/

	protected function getContent() {
		$this->template->set("id", $this->data["id"]);
		$this->template->set("price", $this->order->getPrice($this->data["id"]));
		return "addorder";
	}

}

?>
