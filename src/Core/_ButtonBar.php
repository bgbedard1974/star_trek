<?php

namespace Core;

class ButtonBar {
	private $data;
	
	public function __construct() {
		$this->data = array();
	}
	
	public function add($item) {
		$this->data[] = new PageLink($item);
	}
	
	public function render() {
		$output = "";
		$i = 0;
		foreach ($this->data as $item) {
			if ($i > 0) {
				$output .= '&nbsp;&nbsp;&nbsp;';
			}
			$output .= sprintf("[%s]", $item->render());
			$i++;
		}
		return Html::p($output);
	}
}