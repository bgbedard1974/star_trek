<?php

namespace Core;

class FormattedText {
	private $alignment;
	private $case;
	
	public function __construct($alignment, $case = null) {
		$this->alignment = $alignment;
		$this->case = $case;
	}
	
	public function render($data, $width) {
		switch ($this->case) {
			case 'lower':
				$data = strtolower($data);
				break;
			case 'upper':
				$data = strtoupper($data);
				break;
		}
		switch ($this->alignment) {
			case 'left':
				$data = left($data, $width);
				break;
			case 'center':
				$data = center($data, $width);
				break;
			case 'right':
				$data = right($data, $width);
				break;
		}
		return $data;
	}
}
