<?php

namespace Core;

class NameFormatter {
	private $template;
	
	public function __construct() {
		$this->template = "%f %l";
	}
	
	public function setTemplate($species) {
		if ($species == 'Bajoran') {
			$this->template = "%l %f";
		}
		if (strpos($species, 'Borg') !== false) {
			$this->template = "%n";
		}
	}
	
	public function render($name) {
		$formatted_name = $this->template;
		$formatted_name = str_replace("%f", $name->get('first'), $formatted_name);
		$formatted_name = str_replace("%n", $name->get('nick'), $formatted_name);
		$formatted_name = str_replace("%m", $name->get('middle'), $formatted_name);
		$formatted_name = str_replace("%l", $name->get('last'), $formatted_name);
		$formatted_name = str_replace("%s", $name->get('suffix'), $formatted_name);
		return $formatted_name;
	}
}

