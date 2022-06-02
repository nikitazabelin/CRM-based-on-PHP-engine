<?php
require_once "config.php";
require_once "url.php";
require_once "format.php";
require_once "template.php";
require_once "section.php";
require_once "product.php";
require_once "discount.php";
require_once "order.php";
require_once "message.php";
abstract class AbstractModules {
	protected $config;
	protected $data;
	protected $url;
	protected $format;
	protected $section;
	protected $product;
	protected $discount;
	protected $order;
	protected $message;
	public function __construct() {
		session_start();
		$this->config = new Config();
		$this->url = new URL();
		$this->format = new Format();
		$this->data = $this->format->xss($_REQUEST);
		$this->template = new Template($this->getDirTmpl());
		$this->section = new Section();
		$this->product = new Product();
		$this->discount = new Discount();
		$this->order = new Order();
		$this->message = new Message();
	}

	abstract protected function getContent();

	protected function notFound() {
		$this->redirect($this->url->notFound());
	}

	protected function message() {
		if (!$_SESSION["message"]) return "";
		$text = $this->message->get($_SESSION["message"]);
		unset($_SESSION["message"]);
		return $text;
	}

	protected function redirect($link) {
		header("Location: $link");
		exit;
	}

	abstract protected function getDirTmpl();

	protected function getCountInArray($v, $array) {
		$count = 0;
		for ($i = 0; $i < count($array); $i++) {
			if ($array[$i] == $v) $count++;
		}
		return $count;
	}

}

?>
