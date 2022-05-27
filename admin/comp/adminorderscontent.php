<?php
require_once "adminform.php";

class AdminOrdersContent extends AdminForm {

	protected $title = "Orders";
	protected $meta_desc = "Page with orders";
	protected $meta_key = "Oredrs, list of orders";

	protected function getFormData() {
		$form_data = array();
		$form_data["fields"] = array("delivery", "product_ids", "price", "name", "phone", "email", "address", "notice", "date_send", "date_pay");
		$form_data["func_add"] = "add_order";
		$form_data["func_edit"] = "edit_order";
		$form_data["title_add"] = "add_order";
		$form_data["title_edit"] = "edit_order";
		$form_data["get"] = $this->order->get($this->data["id"]);
		$form_data["form_t"] = "order_form";
		$form_data["t"] = "orders";
		$form_data["obj"] = $this->order;
		$table_data = $this->order->getTableData($this->config->pagination_count, $this->page_info["offset"]);
		for ($i = 0; $i < count($table_data); $i++) {
			$ids = explode(",", $table_data[$i]["product_ids"]);
			$products = $this->product->getAllOnIDs($ids);
			$table_data[$i]["products"] = array();
			$result = array();
			for ($j = 0; $j < count($products); $j++) {
				$result[$products[$j]["id"]] = $products[$j];
			}
			$ids_unique = array_unique($ids);
			$j = 0;
			foreach ($ids_unique as $v) {
				$table_data[$i]["products"][$j]["title"] = $result[$v]["title"];
				$table_data[$i]["products"][$j]["count"] = $this->getCountInArray($v, $ids);
				$j++;
			}
		}
		$form_data["table_data"] = $table_data;

		if ($this->data["func"] == "new") {
			$product_ids = $_SESSION["product_ids"];
		}
		elseif ($this->data["func"] == "edit") {
			$product_ids = $this->order->getProductIDs($this->data["id"]);
		}
		$product_ids = explode(",", $product_ids);
		$products = $this->product->getAllOnIDs($product_ids);
		$result = array();
		for ($j = 0; $j < count($products); $j++) {
			$result[$products[$j]["id"]] = $products[$j];
		}
		$products = array();
		$ids_unique = array_unique($product_ids);
		$j = 0;
		foreach ($ids_unique as $v) {
			$products[$j]["id"] = $result[$v]["id"];
			$products[$j]["price"] = $result[$v]["price"];
			$products[$j]["title"] = $result[$v]["title"];
			$products[$j]["count"] = $this->getCountInArray($v, $product_ids);
			$j++;
		}
		$this->template->set("products", $products);
		$this->template->set("products_all", $this->product->getAllTable());

		return $form_data;
	}
}

?>
