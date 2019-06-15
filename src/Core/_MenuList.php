<?php

namespace Core;

class MenuList extends ItemList {
	
	public function  __construct($items = null) {
		parent::__construct();
		if ($items !== null) {
			foreach ($items as $item) {
				$this->addField($item['text'], $item['url']);
			}
		}
	}
	
	public function addField($text, $url) {
		$attrs = array('href' => $url);
		$item = Html::a($text, $attrs);
		parent::add($item);
	}
}