<?php
require_once "modules.php";

class Content extends Modules {

	protected $title = "חנות משקאות";
	protected $meta_desc = "חנות משקאותץ";
	protected $meta_key = "חנות משקאותת, יין";

	protected function getContent() {
		$this->setLinkSort();
		$sort = $this->data["sort"];
		$up = $this->data["up"];
		$this->template->set("table_products_title", "מומלצים");
		$this->template->set("products", $this->product->getAllSort($sort, $up, $this->config->count_on_page));
		return "index";
	}

}

?>
