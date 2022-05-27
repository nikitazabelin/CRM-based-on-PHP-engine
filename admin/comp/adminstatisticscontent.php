<?php
require_once "adminmodules.php";

class AdminStatisticsContent extends AdminModules {

	protected $title = "Statistics";
	protected $meta_desc = "Account of administrator";
	protected $meta_key = "administrator, account of administrator, account of administrator web store";

	protected function getContent() {
		$start = $this->format->getTime($_GET["start"], true);
		$end = $this->format->getTime($_GET["end"], false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		$this->template->set("start", $this->format->time($start));
		$this->template->set("end", $this->format->time($end));
		return "statistics";
	}

}

?>
