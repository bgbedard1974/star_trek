<?php

namespace Model;

use Core\Model as Model;

class Name extends Model
{
	
	public function __construct($entity)
	{
		$data = array(
			'id' => $entity->get('id'),
			'first' => $entity->get('first'),
			'nick' => $entity->get('nick'),
			'middle' => $entity->get('middle'),
			'last' => $entity->get('last'),
			'suffix' => $entity->get('suffix'),
		);
		parent::__construct($data);
	}
	
	public function toString($mode = 'fl', $simple = false)
	{
		$name = "";
		switch ($mode) {
			case 'fl':
				$name = $this->firstLast($simple);
				break;
			case 'lf':
				$name = $this->lastFirst(true, $simple);
				break;
			case 'lfnc':
				$name = $this->lastFirst(false, $simple);
				break;
			case 'n':
				$name = $this->get('nick');
				break;
		}
		return $name;
	}

	private function firstLast($simple = false)
	{
		$name = "";
		$name .= $this->get('first');
		if ($simple === false) {
			if ($this->get('nick') !== "") {
				$name .= ' "' . $this->get('nick') . '"';
			}
			if ($this->get('middle') !== "") {
				$name .= " " . $this->get('middle');
			}
		}
		if ($this->get('last') !== "") {
			$name .= " " . $this->get('last');
		}
		if ($this->get('suffix') !== "") {
			$name .= " " . $this->get('suffix');
		}
		return $name;
	}

	private function lastFirst($show_comma = true, $simple = false)
	{
		$name = "";
		if ($this->get('last') !== "") {
			$name .= $this->get('last');
		} else {
			$show_comma = false;
		}
		if ($this->get('suffix') !== "") {
			$name .= " " . $this->get('suffix');
		}
		if ($show_comma === true) {
			$name .= ",";			
		}
		if ($this->get('first') !== "") {
			$name .= " " . $this->get('first');
		}
		if ($simple === false) {
			if ($this->get('nick') !== "") {
				$name .= ' "' . $this->get('nick') . '"';
			}
			if ($this->get('middle') !== "") {
				$name .= " " . $this->get('middle');
			}
		}
		return $name;
	}
}

