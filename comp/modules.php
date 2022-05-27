<?php
require_once "lib/abstractmodules.php";

abstract class Modules extends AbstractModules {

	public function __construct() {
		parent::__construct();

		$this->setInfoCart();
		$this->template->set("content", $this->getContent());
		$this->template->set("action", $this->url->action());
		$this->template->set("title", $this->title);
		$this->template->set("meta_desc", $this->meta_desc);
		$this->template->set("meta_key", $this->meta_key);
		$this->template->set("index", $this->url->index());
		$this->template->set("cart_link", $this->url->cart());
		$this->template->set("link_delivery", $this->url->delivery());
		$this->template->set("link_contacts", $this->url->contacts());
		$this->template->set("link_search", $this->url->search());
		$this->template->set("items", $this->section->getAllData());
		$this->template->display("main");
	}

	private function setInfoCart() {
		if ($_SESSION["cart"]) {
			$ids = explode(",", $_SESSION["cart"]);
			$summa = $this->product->getPriceOnIDs($ids);
			$this->template->set("cart_count", count($ids));
			$this->template->set("cart_summa", $summa);
			$words = array("מוצר", "מוצרים", "מוצרים");
			$this->template->set("cart_word", $this->getWord(count($ids), $words));
		}
		else {
			$this->template->set("cart_count", 0);
			$this->template->set("cart_summ", 0);
			$this->template->set("cart_word", "מוצרים");
		}
	}

	protected function setLinkSort() {
		$this->template->set("link_price_up", $this->url->sortPriceUp());
		$this->template->set("link_price_down", $this->url->sortPriceDown());
		$this->template->set("link_title_up", $this->url->sortTitleUp());
		$this->template->set("link_title_down", $this->url->sortTitleDown());
	}

	private function getWord($number, $words) {
		$keys = array(2, 0, 1, 1, 1, 2);
		$mod = $number % 100;
		$word_key = ($mod > 7 && $mod < 20)? 2: $keys[min($mod % 10, 5)];
		return $words[$word_key];
	}

	protected function getDirTmpl() {
		return $this->config->dir_tmpl;
	}
}

?>
