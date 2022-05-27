<?php
require_once "modules.php";

class ProductContent extends Modules {


	protected function getContent() {
		$product_info = $this->product->get($this->data["id"], $this->section->getTableName());
		if (!$product_info) return $this->notFound();
		$this->title = $product_info["title"];
		$this->meta_desc = "תיאור ורכישת מוצר".$product_info["title"];
		$this->meta_key = mb_strtolower(" תיאור מוצר ".$product_info["title"].", רכישת מוצר ".$product_info["title"]);

		$this->template->set("link_section", $this->url->section($product_info["section_id"]));
		$this->template->set("product", $product_info);
		$this->template->set("products", $this->product->getOthers($product_info, $this->config->count_others));
		return "product";
	}

}

?>
