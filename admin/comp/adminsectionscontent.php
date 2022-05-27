<?php
require_once "adminform.php";

class AdminSectionsContent extends AdminForm {

	protected $title = "Sections";
	protected $meta_desc = "Page with sections";
	protected $meta_key = "sections, list of sections";

	protected function getFormData() {
		$form_data = array();
		$form_data["fields"] = array("sec_title");
		$form_data["func_add"] = "add_section";
		$form_data["func_edit"] = "edit_section";
		$form_data["title_add"] = "adding of section ";
		$form_data["title_edit"] = "edit_sections";
		$form_data["get"] = $this->section->get($this->data["id"]);
		$form_data["get"]["sec_title"] = $form_data["get"]["title"];
		$form_data["form_t"] = "section_form";
		$form_data["t"] = "sections";
		$form_data["obj"] = $this->section;
		$form_data["table_data"] = $this->section->getTableData($this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
