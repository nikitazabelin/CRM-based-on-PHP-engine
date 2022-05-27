<?php
require_once "modules.php";
require_once "pagemessage.php";

class MessageContent extends Modules {

	protected function getContent() {
		$pm = new PageMessage();
		$message_title = $pm->getTitle($_SESSION["page_message"]);
		$message_text = $pm->getText($_SESSION["page_message"]);
		$this->title = $message_title;
		$this->meta_desc = $message_text;
		$this->meta_key = preg_replace("/\s+/i", ", ", mb_strtolower($message_text));
		$this->template->set("message_title", $message_title);
		$this->template->set("message_text", $message_text);
		return "message";
	}

}

?>
