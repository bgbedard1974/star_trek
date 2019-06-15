<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Shows extends Repository {
	
	public function __construct($factory) {
		parent::__construct();
		$file = new FileIOReader('data/shows.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = $factory->createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
}
