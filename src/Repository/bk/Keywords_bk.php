<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;
use Entity\Keyword as Keyword;

class Keywords extends Repository {
	
	public function __construct() {
		parent::__construct();
		$file = new FileIOReader('data/keywords.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = self::createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
	public static function createNew($str = null) {
		$keyword = new Keyword();
		if ($str !== null) {
			$fields = explode(',', $str);
			$keyword->set('id' , $fields[0] * 1);
			$keyword->set('type' , $fields[1]);
			$keyword->set('name' , $fields[2]);
		}
		return $keyword;
	}
	
	public function getName($id) {
		$name = "";
		foreach ($this->data as $entity) {
			if ($entity->get('id') == $id) {
				$name = $entity->get('name');
				break;
			}
		}
		return $name;
	}
}
