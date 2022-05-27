<?php
require_once "global_class.php";
require_once "configclass.php";
require_once "formatclass.php";
require_once "productclass.php";
require_once "orderclass.php";
require_once "discountclass.php";
require_once "systemmessageclass.php";
require_once "mailclass.php";
require_once "urlclass.php";

class Product extends GlobalClass {

	public function __construct() {
		parent::__construct("products");
	}

	public function getAllData($count) {
		return $this->transform($this->getAll("date", false, $count));
	}

	public function getAllTable() {
		return $this->getAll("id");
	}

	public function getTableData($section_table, $count, $offset) {
		$l = $this->getL($count, $offset);
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`img`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`year`,
		`".$this->table_name."`.`country`,
		`".$this->table_name."`.`type`,
		`".$this->table_name."`.`kashrut`,
		`".$this->table_name."`.`description`,
		`".$this->table_name."`.`date`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		ORDER BY `date` DESC $l";
		return $this->transform($this->db->select($query));
	}

	protected function transformElement($product) {
		$product["img"] = $this->config->address.$this->config->dir_img_products.$product["img"];
		$product["link"] = $this->url->product($product["id"]);
		$product["link_cart"] = $this->url->addCart($product["id"]);
		$product["description"] = str_replace("\n", "<br />", $product["description"]);
		$product["link_delete"] = $this->url->deleteCart($product["id"]);
		$product["link_admin_edit"] = $this->url->adminEditProduct($product["id"]);
		$product["link_admin_delete"] = $this->url->adminDeleteProduct($product["id"]);
		$product["date"] = $this->format->date($product["date"]);
		return $product;
	}

	private function checkSortUp($sort, $up) {
		return ((($sort === "title") || ($sort === "price")) && (($up === "1") || ($up === "0")));
	}

	public function getAllOnSectionID($section_id, $sort, $up) {
		if (!$this->checkSortUp($sort, $up)) return $this->transform($this->getAllOnField("section_id", $section_id));
		return $this->transform($this->getAllOnField("section_id", $section_id, $sort, $up));
	}

	public function getAllSort($sort, $up, $count) {
		if (!$this->checkSortUp($sort, $up)) return $this->getAllData($count);
		$l = $this->getL($count, 0);
		$desc = "";
		if (!$up) $desc = "DESC";
		$query = "SELECT * FROM
			(SELECT * FROM `".$this->table_name."` ORDER BY `date` DESC $l) a
			ORDER BY `$sort` $desc";
		return $this->transform($this->db->select($query));
	}

	public function get($id, $section_table) {
		if (!$this->check->id($id)) return false;
		$query = "SELECT `".$this->table_name."`.`id`,
		`".$this->table_name."`.`section_id`,
		`".$this->table_name."`.`img`,
		`".$this->table_name."`.`title`,
		`".$this->table_name."`.`price`,
		`".$this->table_name."`.`year`,
		`".$this->table_name."`.`country`,
		`".$this->table_name."`.`type`,
		`".$this->table_name."`.`kashrut`,
		`".$this->table_name."`.`description`,
		`$section_table`.`title` as `section`
		FROM `".$this->table_name."`
		INNER JOIN `$section_table` ON `$section_table`.`id` = `".$this->table_name."`.`section_id`
		WHERE `".$this->table_name."`.`id` = ".$this->config->sym_query;
		return $this->transform($this->db->selectRow($query, array($id)));
	}

	public function getAllOnIDs($ids) {
		$query_ids = "";
		$params = array();
		for ($i = 0; $i < count($ids); $i++) {
			$query_ids .= $this->config->sym_query.",";
			$params[] = $ids[$i];
		}
		$query_ids = substr($query_ids, 0, -1);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `id` IN ($query_ids)";
		return $this->transform($this->db->select($query, $params));
	}

	public function getPriceOnIDs($ids) {
		$products = $this->getAllOnIDs($ids);
		$result = array();
		for ($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["id"]] = $products[$i]["price"];
		}
		$summa = 0;
		for ($i = 0; $i < count($ids); $i++) {
			$summa += $result[$ids[$i]];
		}
		return $summa;
	}

	public function getOthers($product_info, $count) {
		$l = $this->getL($count, 0);
		$query = "SELECT * FROM `".$this->table_name."` WHERE `section_id`=".$this->config->sym_query." AND `id` != ".$this->config->sym_query." ORDER BY RAND() $l";
		return $this->transform($this->db->select($query, array($product_info["section_id"], $product_info["id"])));
	}

	public function getDate($id) {
		return $this->getFieldOnID($id, "date");
	}

	public function getImg($id) {
		return $this->getFieldOnID($id, "img");
	}

	public function search($q, $sort, $up) {
		if (!$this->checkSortUp($sort, $up)) return $this->transform(parent::search($q, array("title", "country", "kashrut", "year", "description")));
		return $this->transform(parent::search($q, array("title", "country", "kashrut", "description"), $sort, $up));
	}

	protected function checkData($data) {
		if (!$this->check->id($data["section_id"])) return "UNKNOWN_ERROR";
		if (!$this->check->title($data["title"])) return "ERROR_TITLE";
		if (!$this->check->amount($data["price"])) return "ERROR_PRICE";
		if (!$this->check->year($data["year"])) return "ERROR_YEAR";
		if (!$this->check->title($data["country"])) return "ERROR_COUNTRY";
		if (!$this->check->text($data["description"])) return "ERROR_DESCRIPTION";
		if (!$this->check->title($data["img"])) return "ERROR_IMG";
		if (!$this->check->ts($data["date"])) return "UNKNOWN_ERROR";
		return true;
	}

}

?>
