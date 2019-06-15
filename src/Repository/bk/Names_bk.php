<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;
use Entity\Name as Name;

class Names extends Repository {
	
	public function __construct() {
		parent::__construct();
		$file = new FileIOReader('data/names.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = self::createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
	public static function createNew($str = null) {
		$name = new Name();
		if ($str !== null) {
			$fields = explode(',', $str);
			$name->set('id', $fields[0] * 1);
			$name->set('first', $fields[1]);
			$name->set('nick', $fields[2]);
			$name->set('middle', $fields[3]);
			$name->set('last', $fields[4]);
			$name->set('suffix', $fields[5]);
		}
		return $name;
	}
}
