<?php

namespace Core;

use FileIO\FileIOReader as FileIOReader;

class Repository {
	protected $data;
	
	public function __construct() {
		$this->data = array();
	}
	
	public function getAll() {
		return $this->data;
	}
	
	public function size() {
		return count($this->data);
	}
	
	public function get($id) {
		$entity = null;
		if (isset($this->data[$id])) {
			$entity = $this->data[$id];
		}
		return $entity;
	}
}
