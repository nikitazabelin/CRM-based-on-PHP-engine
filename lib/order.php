<?php
require_once "globalclass.php";
require_once "configclass.php";
require_once "formatclass.php";
require_once "productclass.php";
require_once "orderclass.php";
require_once "discountclass.php";
require_once "systemmessageclass.php";
require_once "mailclass.php";
require_once "urlclass.php";

class Order extends GlobalClass {

	public function __construct() {
		parent::__construct("orders");
	}

	public function getAllInInterval($start, $end) {
		$query = "SELECT * FROM `".$this->table_name."` WHERE `date_order` > ".$this->config->sym_query." AND `date_order` < ".$this->config->sym_query;
		return $this->db->select($query, array($start, $end));
	}

	public function getProductIDs($id) {
		return $this->getFieldOnID($id, "product_ids");
	}

	public function getTableData($count, $offset) {
		return $this->transform($this->getAll("date_order", false, $count, $offset));
	}

	public function get($id) {
		return $this->transform(parent::get($id));
	}

	public function getPrice($id) {
		return $this->getFieldOnID($id, "price");
	}

	public function getDateOrder($id) {
		return $this->getFieldOnID($id, "date_order");
	}

	public function getDateSend($id) {
		return $this->getFieldOnID($id, "date_send");
	}

	public function getDatePay($id) {
		return $this->getFieldOnID($id, "date_pay");
	}

	public function setDatePay($id, $date_pay) {
		if (!$this->check->ts($date_pay)) return "UNKNOWN_ERROR";
		return $this->setFieldOnID($id, "date_pay", $date_pay);
	}

	protected function transformElement($order) {
		$order["link_admin_edit"] = $this->url->adminEditOrder($order["id"]);
		$order["link_admin_delete"] = $this->url->adminDeleteOrder($order["id"]);
		$order["date_order"] = $this->format->date($order["date_order"]);
		if ($order["date_send"] != 0) $order["date_send"] = $this->format->date($order["date_send"]);
		if ($order["date_pay"] != 0) $order["date_pay"] = $this->format->date($order["date_pay"]);
		return $order;
	}

	protected function checkData($data) {
		if (!$this->check->oneOrZero($data["delivery"])) return "ERROR_DELIVERY";
		if (!$this->check->ids($data["product_ids"])) return "UNKNOWN_ERROR";
		if (!$this->check->amount($data["price"])) return "ERROR_PRICE";
		if (!$this->check->name($data["name"])) return "ERROR_NAME";
		if (!$this->check->title($data["phone"])) return "ERROR_PHONE";
		if (!$this->check->email($data["email"])) return "ERROR_EMAIL";
		if ($data["delivery"] == 1) $empty = true;
		else $empty = false;
		if (!$this->check->text($data["address"], $empty)) return "ERROR_ADDRESS";
		if (!$this->check->text($data["notice"], true)) return "ERROR_NOTICE";
		if (!$this->check->ts($data["date_order"])) return "UNKNOWN_ERROR";
		if (!$this->check->ts($data["date_send"])) return "UNKNOWN_ERROR";
		if (!$this->check->ts($data["date_pay"])) return "UNKNOWN_ERROR";
		return true;
	}
}

?>
