<?php

namespace Core;

class NameFormatter
{
	private $mode;
	private $name;
	private $simple;
	
	public function __construct($name = null, $species = null)
	{
		if ($name !== null) {
			$this->init($name, $species);
		}
	}
	
	private function init($name, $species)
	{
		$this->name = $name;
		$mode = 'fl';
		if ($species !== null) {
			if ($species == 'Bajoran') {
				$mode = 'lfnc';
			}
			if (strpos($species, 'Borg') !== false) {
				$mode = 'n';
			} 
		}
		$this->mode = $mode;
		$this->setSimple(false);
	}
	
	public function twigFilter($name)
	{
		$this->init($name, null);
		return $this->toString();
	}
	
	public function twigFunction($name, $species = null)
	{
		$this->init($name, $species);
		return $this->toString();
	}
	
	public function twigFunctionSimple($name, $species = null)
	{
		$this->init($name, $species);
		$this->setSimple(true);
		return $this->toString();
	}
	
	public function setSimple($value) {
		$this->simple = $value;
	}
	
	public function toString()
	{
		$name = "";
		switch ($this->mode) {
			case 'fl':
				$name = $this->firstLast();
				break;
			case 'fls':
				$name = $this->firstLast();
				break;	
			case 'lf':
				$name = $this->lastFirst(true);
				break;
			case 'lfs':
				$name = $this->lastFirst(true);
				break;
			case 'lfnc':
				$name = $this->lastFirst(false);
				break;
			case 'lfncs':
				$name = $this->lastFirst(false);
				break;	
			case 'n':
				$name = $this->name['nick'];
				break;
		}
		return $name;
	}

	private function firstLast()
	{
		$name = "";
		$name .= $this->name['first'];
		if ($this->simple === false) {
			if ($this->name['nick'] !== "") {
				$name .= ' "' . $this->name['nick'] . '"';
			}
			if ($this->name['middle'] !== "") {
				$name .= " " . $this->name['middle'];
			}
		}
		if ($this->name['last'] !== "") {
			$name .= " " . $this->name['last'];
		}
		if ($this->name['suffix'] !== "") {
			$name .= " " . $this->name['suffix'];
		}
		return $name;
	}

	private function lastFirst($show_comma)
	{
		$name = "";
		if ($this->name['last'] !== "") {
			$name .= $this->name['last'];
		} else {
			$show_comma = false;
		}
		if ($this->name['suffix'] !== "") {
			$name .= " " . $this->name['suffix'];
		}
		if ($show_comma === true) {
			$name .= ",";			
		}
		if ($this->name['first'] !== "") {
			$name .= " " . $this->name['first'];
		}
		if ($this->simple === false) {
			if ($this->name['nick'] !== "") {
				$name .= ' "' . $this->name['nick'] . '"';
			}
			if ($this->name['middle'] !== "") {
				$name .= " " . $this->name['middle'];
			}
		}
		return $name;
	}
}

