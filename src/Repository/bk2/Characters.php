<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Characters extends Repository {
	
	public function __construct($factory) {
		parent::__construct();
		$file = new FileIOReader('data/characters.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = $factory->createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
	public function filterByShow($id) {
		$filtered_data = array();
		foreach ($this->data as $entity) {
			if ($entity->get('show_id') == $id) {
				$filtered_data[] = $entity;
			}
		}
		$this->data = $filtered_data;
	}
}
