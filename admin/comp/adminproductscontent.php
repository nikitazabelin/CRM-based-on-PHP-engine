<?php
require_once "adminform.php";

class AdminProductsContent extends AdminForm {

	protected $title = "Items";
	protected $meta_desc = "Page with items";
	protected $meta_key = "Items, list of items";

	protected function getFormData() {
		$form_data = array();
		$this->template->set("sections", $this->section->getAllData());
		$form_data["fields"] = array("section_id", "pr_title", "price", "year", "country", "type", "kashrut", "cast", "description");
		$form_data["func_add"] = "add_product";
		$form_data["func_edit"] = "edit_product";
		$form_data["title_add"] = "edding_item";
		$form_data["title_edit"] = "edit_item";
		$form_data["get"] = $this->product->get($this->data["id"], $this->section->getTableName());
		$form_data["get"]["pr_title"] = $form_data["get"]["title"];
		$form_data["form_t"] = "product_form";
		$form_data["t"] = "products";
		$form_data["obj"] = $this->product;
		$form_data["table_data"] = $this->product->getTableData($this->section->getTableName(), $this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
