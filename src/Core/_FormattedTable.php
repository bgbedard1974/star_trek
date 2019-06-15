<?php

namespace Core;

class FormattedTable {
	const ALIGN_CENTER = 'center';
	const ALIGN_LEFT = 'left';
	const ALIGN_RIGHT = 'right';
	private $columns;
	private $data;
	private $alignment;
	private $heading;
	
	public function __construct($heading = null, $columns = null, $data = null) {
		$this->heading = $heading;
		$this->columns = $columns;
		$this->data = $data;
		$this->alignment = self::ALIGN_LEFT;
	}
	
	public function setAlignment($alignment) {
		$this->alignment = $alignment;
	}
	
	private function getRow($row) {
		$str = "";
		$case = null;
		$tag = 'td';
		if ($row == 0) {
			$case = 'upper';
			$tag = 'th';
		}
		
		foreach ($this->columns as $column) {
			$attrs = array('valign' => 'top', 'align' => $this->alignment);
			$text = $this->data[$row][$column];
			if ($case == 'upper') {
				$text = strtoupper($text);
			}
			$str .= Html::$tag($text, $attrs);
		}
		return Html::tr($str);
	}
	
	public function render() {
		$str = "";
		if ($this->heading !== null) {
			$str .= Html::p(Html::strong($this->heading));
		}
		for ($i = 0 ; $i < count($this->data) ; $i++) {
			$row = $this->getRow($i);
			$str .= $row;
		}
		$attrs = array('width' => '100%', 'border' => '1', 'cellspacing' => '2', 'cellpadding' => '2');
		return Html::table($str, $attrs);
	}
}
