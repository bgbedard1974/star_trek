<?php

namespace Core;

class ItemList {
	const UL = 0;
	const OL = 1;
	const NONE = 2;
	private $items;
	private $mode;
	
	public function __construct($items = null) {
		$this->items = array();
		if ($items !== null) {
			$this->setItems($items);
		}
		$this->setMode(self::UL);
	}
	
	public function setItems($items) {
		$this->items = $items;
	}
	
	public function setMode($mode) {
		$this->mode = $mode;
	}
	
	public function add($item) {
		$this->items[] = $item;
	}
	
	public function render() {
		$str = "";
		foreach ($this->items as $item) {
			if ($this->mode !== self::NONE) {
				$str .= Html::li($item);
			} else {
				$str .= $item . Html::br();
			}
		}
		if ($this->mode === self::UL) {
			$str = Html::ul($str);
		}
		if ($this->mode === self::OL) {
			$str = Html::ol($str);
		}
		return $str;
	}
}
