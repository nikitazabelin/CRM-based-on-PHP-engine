<?php
require_once "config.php";
/*generetion of links and parametrs deleting*/
class URL {

	protected $config;
	protected $amp;

	public function __construct($amp = true) {
		$this->config = new Config();
		$this->amp = $amp;
	}

	public function getView() {
		$view = $_SERVER["REQUEST_URI"];
		$view = substr($view, 1);
		if (($pos = strpos($view, "?")) !== false) {
			$view = substr($view, 0, $pos);
		}
		return $view;
	}

	public function setAMP($amp) {
		$this->amp = $amp;
	}

	public function getThisURL() {
		$uri = substr($_SERVER["REQUEST_URI"], 1);
		return $this->config->address.$uri;
	}

	protected function deleteGET($url, $param) {
		$res = $url;
		if (($p = strpos($res, "?")) !== false) {
			$paramstr = substr($res, $p + 1);
			$params = explode("&", $paramstr);
			$paramsarr = array();
			foreach ($params as $value) {
				$tmp = explode("=", $value);
				$paramsarr[$tmp[0]] = $tmp[1];
			}
			if (array_key_exists($param, $paramsarr)) {
				unset($paramsarr[$param]);
				$res = substr($res, 0, $p + 1);
				foreach ($paramsarr as $key => $value) {
					$str = $key;
					if ($value !== "") {
						$str .= "=$value";
					}
					$res .= "$str&";
				}
				$res = substr($res, 0, -1); /*deleting of ampersand*/
			}
		}
		return $res;
	}/*cleanliness of url from get-parameters*/

	public function index() {
		return $this->returnURL("");
	}

	public function addorder($id) {
		return $this->returnURL("addorder?id=$id");
	}

	public function notFound() {
		return $this->returnURL("notfound");
	}

	public function cart() {
		return $this->returnURL("cart");
	}

	public function order() {
		return $this->returnURL("order");
	}

	public function message() {
		return $this->returnURL("message");
	}

	public function delivery() {
		return $this->returnURL("delivery");
	}

	public function contacts() {
		return $this->returnURL("contacts");
	}

	public function search() {
		return $this->returnURL("search");
	}

	public function section($id) {
		return $this->returnURL("section?id=$id");
	}

	public function product($id) {
		return $this->returnURL("product?id=$id");
	}

	public function addCart($id) {
		return $this->returnURL("functions.php?func=add_cart&id=$id");
	}

	public function deleteCart($id) {
		return $this->returnURL("functions.php?func=delete_cart&id=$id");
	}

	public function sortTitleUp() {
		return $this->sortOnField("title", 1);
	}

	public function sortTitleDown() {
		return $this->sortOnField("title", 0);
	}

	public function sortPriceUp() {
		return $this->sortOnField("price", 1);
	}

	public function sortPriceDown() {
		return $this->sortOnField("price", 0);
	}

	public function action() {
		return $this->returnURL("functions.php");
	}

	public function adminEditProduct($id) {
		return $this->returnURL("?view=products&func=edit&id=$id", $this->config->address_admin);
	}

	public function adminDeleteProduct($id) {
		return $this->returnURL("functions.php?func=delete_product&id=$id", $this->config->address_admin);
	}

	public function adminEditSection($id) {
		return $this->returnURL("?view=sections&func=edit&id=$id", $this->config->address_admin);
	}

	public function adminDeleteSection($id) {
		return $this->returnURL("functions.php?func=delete_section&id=$id", $this->config->address_admin);
	}

	public function adminEditOrder($id) {
		return $this->returnURL("?view=orders&func=edit&id=$id", $this->config->address_admin);
	}

	public function adminDeleteOrder($id) {
		return $this->returnURL("functions.php?func=delete_order&id=$id", $this->config->address_admin);
	}

	public function adminEditDiscount($id) {
		return $this->returnURL("?view=discounts&func=edit&id=$id", $this->config->address_admin);
	}

	public function adminDeleteDiscount($id) {
		return $this->returnURL("functions.php?func=delete_discount&id=$id", $this->config->address_admin);
	}

	protected function sortOnField($field, $up) {
		$this_url = $this->getThisURL();
		$this_url = $this->deleteGET($this_url, "up");
		$this_url = $this->deleteGET($this_url, "sort");
		if (strpos($this_url, "?") === false) $url = $this->url."?sort=$field&up=$up";
		else $url = $this_url."&sort=$field&up=$up";
		return $this->returnURL($url);
	} /*sorting by the price and name*/

	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address;
		if ($url == "") return $index;
		if (strpos($url, $index) !== 0) $url = $index.$url;
		if ($this->amp) $url = str_replace("&", "&amp;", $url);/*for validator*/
		return $url;
	}

	public function fileExists($file) {
		$arr = explode(PATH_SEPARATOR, get_include_path());
		foreach ($arr as $val) {
			if (file_exists($val."/".$file)) return true;
		}
		return false;
	}

}

?>
