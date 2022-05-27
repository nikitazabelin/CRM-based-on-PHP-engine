<?php
require_once "adminmodules.php";

class AdminContent extends AdminModules {

	protected $title = "Administrator account";
	protected $meta_desc = "account of administrator";
	protected $meta_key = "account of administrator, Administrator account, CRM";

	protected function getContent() {
		$start = $this->format->getTime("", true);
		$end = $this->format->getTime("", false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		return "index";
	}

}

?>
