<?php
require_once "modules.php";

class SearchContent extends Modules {

	protected function getContent() {
		$q = $this->data["q"];
		$this->title = "חיפוש: $q";
		$this->meta_desc = "חיפוש: $q.";
		$this->meta_key = preg_replace("/\s+/i", ", ", mb_strtolower($q));

		$this->setLinkSort();
		$this->template->set("q", $q);
		$this->template->set("table_products_title", "חיפוש");
		$this->template->set("products", $this->product->search($q, $this->data["sort"], $this->data["up"]));
		return "search";
	}

}

?>
