<?php
require_once "adminmodules.php";

class AdminAuthContent extends AdminModules {

	protected $title = "Singing in";
	protected $meta_desc = "Singing in administrator's account";
	protected $meta_key = "administrator, account of administrator, Singing in administrator's account";

	public function __construct() {
		parent::__construct(false);
	}

	protected function getContent() {
		if ($this->template->auth) $this->redirect($this->url_admin->index());
		if ($_SERVER["HTTP_REFERER"] != $this->url_admin->getThisURL()) {
			if ($_SERVER["HTTP_REFERER"] != $this->url_admin->action()) {
				$_SESSION["r"] = $_SERVER["HTTP_REFERER"];
			}
		}
		$this->template->set("login", $_SESSION["login"]);
		$this->template->set("r", $_SESSION["r"]);
		return "auth";
	}

}

?>
