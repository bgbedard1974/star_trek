<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Keywords extends Repository {
	
	public function __construct($factory) {
		parent::__construct();
		$file = new FileIOReader('data/keywords.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = $factory->createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
		
	public function getName($id) {
		$name = "";
		if (isset($this->data[$id])) {
			$entity = $this->data[$id];
			$name = $entity->get('name');
		}
		return $name;
	}
}
