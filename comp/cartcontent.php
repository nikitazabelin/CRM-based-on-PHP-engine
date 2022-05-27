<?php
require_once "modules.php";

class CartContent extends Modules {

	protected $title = "סל";
	protected $meta_desc = "תכולת הסל.";
	protected $meta_key = "סל, תכולת הסל";

	protected function getContent() {
		$cart = array();
		$summa = 0;
		if ($_SESSION["cart"]) {
			$ids = explode(",", $_SESSION["cart"]);
			$products = $this->product->getAllOnIDs($ids);
			$result = array();
			for ($i = 0; $i < count($products); $i++) {
				$result[$products[$i]["id"]] = $products[$i];
			}
			$ids_unique = array_unique($ids);
			$i = 0;
			foreach ($ids_unique as $v) {
				$cart[$i]["id"] = $result[$v]["id"];
				$cart[$i]["title"] = $result[$v]["title"];
				$cart[$i]["img"] = $result[$v]["img"];
				$cart[$i]["price"] = $result[$v]["price"];
				$cart[$i]["count"] = $this->getCountInArray($v, $ids);
				$cart[$i]["summ"] = $cart[$i]["count"] * $cart[$i]["price"];
				$cart[$i]["link_delete"] = $result[$v]["link_delete"];
				$summ += $cart[$i]["summ"];
				$i++;
			}
			$value = $this->discount->getValueOnCode($_SESSION["discount"]);
			if ($value) {
				$summa *= (1 - $value);
				$this->template->set("discount", $_SESSION["discount"]);
			}
		}
		$this->template->set("summ", $summ);
		$this->template->set("cart", $cart);
		$this->template->set("link_order", $this->url->order());

		return "cart";
	}

}

?>
