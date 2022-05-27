<?php
require_once "url.php";

class URLAdmin extends URL {

	public function newElement() {
		$url = $this->deleteGET($this->getThisURL(), "func");
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."func=new");
	}

	public function page($number) {
		$url = $this->deleteGET($this->getThisURL(), "page");
		if ($number == 1) return $this->returnURL($url);
		if (strpos($url, "?")) $sym = "&";
		else $sym = "?";
		return $this->returnURL($url.$sym."page=$number");
	}

	public function auth() {
		return $this->returnURL("?view=auth");
	}

	public function products() {
		return $this->returnURL("?view=products");
	}

	public function orders() {
		return $this->returnURL("?view=orders");
	}

	public function sections() {
		return $this->returnURL("?view=sections");
	}

	public function discounts() {
		return $this->returnURL("?view=discounts");
	}

	public function statistics() {
		return $this->returnURL("?view=statistics");
	}

	public function logout() {
		return $this->returnURL("functions.php?func=logout");
	}

	protected function returnURL($url, $index = false) {
		if (!$index) $index = $this->config->address_admin;
		return parent::returnURL($url, $index);
	}
}

?>
