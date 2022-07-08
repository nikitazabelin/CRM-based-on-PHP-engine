<?php
require_once "config.php";


/* sending sistem massages and handling of mails*/
abstract class GlobalMessage {

	private $data;

	public function __construct($file) {
		$config = new Config();
		$this->data = parse_ini_file($config->dir_text.$file.".ini");
	}

	public function get($name) {
		return $this->data[$name];
	}
}

?>
