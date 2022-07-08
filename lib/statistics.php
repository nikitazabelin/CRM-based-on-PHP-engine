<?php
require_once "order.php";


class Statistics {

	private $order;

	public function __construct() {
		$this->order = new Order();
	}

	public function getDataForAdmin($start, $end) {
		$result = array();
		$orders = $this->order->getAllInInterval($start, $end);
		$result["count_orders"] = count($orders);
		$result["summ_account"] = 0;
		$result["income"] = 0;
		$result["count_dvd"] = 0;
		for ($a = 0; $a < count($orders); $a++) {
			$result["summ_account"] += $orders[$a]["price"];
			if ($orders[$a]["date_pay"] != 0) $result["income"] += $orders[$a]["price"];
			$ids = explode(",", $orders[$a]["product_ids"]);
			$result["count_dvd"] += count($ids);
		}
		return $result;
	}
}

?>
