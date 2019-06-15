<?php

namespace Core;

class FieldList extends ItemList {
	public function  __construct($items = null) {
		parent::__construct();
		if ($items !== null) {
			foreach ($items as $item) {
				$this->addField($item['label'], $item['value']);
			}
		}
	}
	
	public function addField($label, $value) {
		$item = Html::strong(strtoupper($label)) . ': ' . $value;
		parent::add($item);
	}
}