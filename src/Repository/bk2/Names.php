<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Names extends Repository {
	
	public function __construct($factory) {
		parent::__construct();
		$file = new FileIOReader('data/names.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = $factory->createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
}
