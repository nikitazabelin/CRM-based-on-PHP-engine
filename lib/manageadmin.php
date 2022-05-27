<?php
require_once "manage.php";
require_once "urladmin.php";
require_once "auth.php";
require_once "sections.php";

class ManageAdmin extends Manage {

	private $url_admin;
	private $section;

	public function __construct() {
		parent::__construct();
		$this->url_admin = new URLAdmin();
		$this->section = new Section();
	}

	public function auth() {
		$auth = new Auth();
		$_SESSION["login"] = $this->data["login"];
		$_SESSION["password"] = $this->format->hash($this->data["password"]);
		if ($auth->checkAdmin($_SESSION["login"], $_SESSION["password"])) return $this->data["r"];
		else return $this->sm->message("ERROR_AUTH");
	}

	public function logout() {
		unset($_SESSION["login"]);
		unset($_SESSION["password"]);
	}

	public function addProduct() {
		$temp_data = $this->dataProduct();
		$temp_data["date"] = $this->format->ts();
		$img = $this->loadImage();
		if (!$img) return false;
		$temp_data["img"] = $img;
		if ($this->product->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_PRODUCT");
			return $this->url_admin->products();
		}
		else return false;
	}

	public function editProduct() {
		$temp_data = $this->dataProduct();
		$temp_data["date"] = $this->product->getDate($this->data["id"]);
		$img = $_FILES["img"];
		$old_img = $this->product->getImg($this->data["id"]);
		if (!$img["name"]) $temp_data["img"] = $old_img;
		else {
			unlink("../".$this->config->dir_img_products.$old_img);
			$img = $this->loadImage();
			if (!$img) return false;
			$temp_data["img"] = $img;
		}
		if ($this->product->edit($this->data["id"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_PRODUCT");
			return $this->url_admin->products();
		}
		else return false;
	}

	public function deleteProduct() {
		$img = $this->product->getImg($this->data["id"]);
		unlink("../".$this->config->dir_img_products.$img);
		if ($this->product->delete($this->data["id"])) return $this->sm->message("SUCCESS_DELETE_PRODUCT");
		else return $this->sm->unknownError();
	}

	private function loadImage() {
		$img = $_FILES["img"];
		if (!$img["name"]) return $this->sm->message("ERROR_IMG");
		if (!$this->isSecure($img)) return false;
		$uploadfile = "../".$this->config->dir_img_products.$img["name"];
		if (file_exists($uploadfile)) return $this->sm->message("ERROR_EXISTS_IMG");
		if (move_uploaded_file($img["tmp_name"], $uploadfile)) return $img["name"];
		else return $this->sm->unknownError();
	}

	private function isSecure($img) {
		$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
		foreach ($blacklist as $item)
			if (preg_match("/$item\$/i", $img["name"])) return false;
		$type = $img["type"];
		$size = $img["size"];
		if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) return $this->sm->message("ERROR_TYPE_IMG");
		if ($size > $this->config->max_size_img) return $this->sm->message("ERROR_SIZE_IMG");
		return true;
	}

	public function dataProduct() {
		$temp_data = array();
		$temp_data["section_id"] = $this->data["section_id"];
		$temp_data["title"] = $this->data["pr_title"];
		$temp_data["price"] = $this->data["price"];
		$temp_data["year"] = $this->data["year"];
		$temp_data["country"] = $this->data["country"];
		$temp_data["director"] = $this->data["director"];
		$temp_data["cast"] = $this->data["cast"];
		$temp_data["play"] = $this->data["play"];
		$temp_data["description"] = $this->data["description"];
		return $temp_data;
	}

	public function addSection() {
		$temp_data = array();
		$temp_data["title"] = $this->data["sec_title"];
		if ($this->section->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_SECTION");
			return $this->url_admin->sections();
		}
		else return false;
	}

	public function editSection() {
		$temp_data = array();
		$temp_data["title"] = $this->data["sec_title"];
		if ($this->section->edit($this->data["id"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_SECTION");
			return $this->url_admin->sections();
		}
		else return false;
	}

	public function deleteSection() {
		if ($this->section->delete($this->data["id"])) return $this->sm->message("SUCCESS_DELETE_SECTION");
		else return $this->sm->unknownError();
	}

	public function addOrder() {
		$temp_data = $this->dataOrder();
		$temp_data["date_order"] = $this->format->ts();
		if ($this->data["is_send"] != 0) $temp_data["date_send"] = $this->format->ts();
		else $temp_data["date_send"] = 0;
		if ($this->data["is_pay"] != 0) $temp_data["date_pay"] = $this->format->ts();
		else $temp_data["date_pay"] = 0;
		if ($this->order->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_ORDER");
			return $this->url_admin->orders();
		}
		else return false;
	}

	public function editOrder() {
		$temp_data = $this->dataOrder();
		$temp_data["date_order"] = $this->order->getDateOrder($this->data["id"]);
		$date_send = $this->order->getDateOrder($this->data["id"]);
		$date_pay = $this->order->getDatePay($this->data["id"]);
		if (($this->data["is_send"]) && ($date_send == 0)) $temp_data["date_send"] = $this->format->ts();
		else $temp_data["date_send"] = $date_send;
		if (($this->data["is_pay"]) && ($date_pay == 0)) $temp_data["date_pay"] = $this->format->ts();
		else $temp_data["date_pay"] = $date_pay;
		if ($this->order->edit($this->data["id"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_ORDER");
			return $this->url_admin->orders();
		}
		else return false;
	}

	public function deleteOrder() {
		if ($this->order->delete($this->data["id"])) return $this->sm->message("SUCCESS_DELETE_ORDER");
		else return $this->sm->unknownError();
	}

	private function dataOrder() {
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["price"] = $this->data["price"];
		$temp_data["name"] = $this->data["name"];
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$i = 0;
		$temp_data["product_ids"] = "";
		while (true) {
			$id = $this->data["products_$i"];
			if ($id) {
				for ($j = 0; $j < $this->data["count_$i"]; $j++) {
					$product_ids .= "$id,";
				}
			}
			else break;
			$i++;
		}
		if ($product_ids) $temp_data["product_ids"] = substr($product_ids, 0, -1);
		$_SESSION["product_ids"] = $temp_data["product_ids"];
		return $temp_data;
	}

	public function addDiscount() {
		$temp_data = $this->dataDiscount();
		if ($this->discount->add($temp_data)) {
			$this->sm->message("SUCCESS_ADD_DISCOUNT");
			return $this->url_admin->discounts();
		}
		else return false;
	}

	public function editDiscount() {
		$temp_data = $this->dataDiscount();
		if ($this->discount->edit($this->data["id"], $temp_data)) {
			$this->sm->message("SUCCESS_EDIT_DISCOUNT");
			return $this->url_admin->discounts();
		}
		else return false;
	}

	public function deleteDiscount() {
		if ($this->discount->delete($this->data["id"])) return $this->sm->message("SUCCESS_DELETE_DISCOUNT");
		else return $this->sm->unknownError();
	}

	private function dataDiscount() {
		$temp_data = array();
		$temp_data["code"] = $this->data["code"];
		$temp_data["value"] = $this->data["value"];
		if ($this->discount->getOnCode($this->data["code"])) $this->sm->message("ERROR_DISCOUNT_EXISTS");
		return $temp_data;
	}

}

?>
