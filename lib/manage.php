<?php
require_once "configclass.php";
require_once "formatclass.php";
require_once "productclass.php";
require_once "orderclass.php";
require_once "discountclass.php";
require_once "systemmessageclass.php";
require_once "mailclass.php";
require_once "urlclass.php";

class Manage {

	protected $config;
	protected $format;
	protected $product;
	protected $order;
	protected $discount;
	protected $url;

	public function __construct() {
		session_start();
		$this->config = new Config();
		$this->format = new Format();
		$this->product = new Product();
		$this->order = new Order();
		$this->discount = new Discount();
		$this->sm = new SystemMessage();
		$this->mail = new Mail();
		$this->url = new URL();
		$this->data = $this->format->xss($_REQUEST);
		$this->saveData();
	}

	private function saveData() {
		foreach ($this->data as $key => $value) $_SESSION[$key] = $value;
	}

	public function addCart($id = false) {
		if (!$id) $id = $this->data["id"];
		if (!$this->product->existsID($id)) return false;
		if ($_SESSION["cart"]) $_SESSION["cart"] .= ",$id";
		else $_SESSION["cart"] = $id;
	}

	public function deleteCart() {
		$id = $this->data["id"];
		$ids = explode(",", $_SESSION["cart"]);
		$_SESSION["cart"] = "";
		for ($i = 0; $i < count($ids); $i++) {
			if ($ids[$i] != $id) $this->addCart($ids[$i]);
		}
	}

	public function updateCart() {
		$_SESSION["cart"] = "";
		foreach ($this->data as $k => $v) {
			if (strpos($k, "count_") !== false) {
				$id = substr($k, strlen("count_"));
				for ($i = 0; $i < $v; $i++) $this->addCart($id);
			}
		}
		$_SESSION["discount"] = $this->data["discount"];
	}

	public function addOrder() {
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["product_ids"] = $_SESSION["cart"];
		$temp_data["price"] = $this->getPrice();
		$temp_data["name"] = $this->data["name"];
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$temp_data["date_order"] = $this->format->ts();
		$temp_data["date_send"] = 0;
		$temp_data["date_pay"] = 0;
		$id = $this->order->add($temp_data);
		if ($id) {
			$send_data = array();
			$send_data["products"] = $this->getProducts();
			$send_data["name"] = $temp_data["name"];
			$send_data["phone"] = $temp_data["phone"];
			$send_data["email"] = $temp_data["email"];
			$send_data["address"] = $temp_data["address"];
			$send_data["notice"] = $temp_data["notice"];
			$send_data["price"] = $temp_data["price"];
			$to = $temp_data["email"];
			$this->mail->send($temp_data["email"], $send_data, "ORDER");
			header("Location: ".$this->url->addOrder($id));
			exit;
		}
		return false;
	}

	public function successPay() {
		return $this->sm->pageMessage("SUCCESS_PAY", true);
	}

	public function failPay() {
		return $this->sm->pageMessage("FAIL_PAY", true);
	}

	public function statusPay() {
		if ($this->data["ik_payment_state"] == "success") {
			$secret_key = "y2PlvVXsD7W13tWA";
			$sign = $this->data['ik_shop_id'].':'.
					$this->data['ik_payment_amount'].':'.
					$this->data['ik_payment_id'].':'.
					$this->data['ik_paysystem_alias'].':'.
					$this->data['ik_baggage_fields'].':'.
					$this->data['ik_payment_state'].':'.
					$this->data['ik_trans_id'].':'.
					$this->data['ik_currency_exch'].':'.
					$this->data['ik_fees_payer'].':'.
					$secret_key;
			$sign = mb_strtoupper(md5($sign));
			if($this->data['ik_sign_hash'] === $sign) {
				if ($this->order->getPrice($this->data['ik_payment_id']) == $this->data["ik_payment_amount"])
					$this->order->setDatePay($this->data['ik_payment_id'], $this->format->ts());
			}
		}
	}

	private function getProducts() {
		$ids = explode(",", $_SESSION["cart"]);
		$products = $this->product->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["id"]] = $products[$i]["title"];
		}
		$products = array();
		for ($i = 0; $i < count($ids); $i++) {
			$products[$ids[$i]][0]++;
			$products[$ids[$i]][1] = $result[$ids[$i]];
		}
		$str = "";
		foreach ($products as $value) {
			$str .= $value[1]." (".$value[0]." шт.) | ";
		}
		$str = substr($str, 0, -3);
		return $str;
	}

	private function getPrice() {
		$ids = explode(",", $_SESSION["cart"]);
		$summa = $this->product->getPriceOnIDs($ids);
		$value = $this->discount->getValueOnCode($_SESSION["discount"]);
		if ($value) $summa *= (1 - $value);
		return $summa;
	}
}
?>
