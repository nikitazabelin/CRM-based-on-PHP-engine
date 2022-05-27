<?php
require_once "modules.php";

class DeliveryContent extends Modules {

	protected $title = "הזמנה ומשלוח";
	protected $meta_desc = "הזמנה ומשלוח באתר";
	protected $meta_key = "הזמנה, משלוח, אתר";

	protected function getContent() {
		return "delivery";
	}

}

?>
