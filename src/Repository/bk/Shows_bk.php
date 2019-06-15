<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;
use Entity\Show as Show;

class Shows extends Repository {
	
	public function __construct() {
		parent::__construct();
		$file = new FileIOReader('data/shows.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = self::createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
	public static function createNew($str = null) {
		$show = new Show();
		if ($str !== null) {
			$fields = explode(',', $str);
			$show->set('id', $fields[0] * 1);
			$show->set('name', $fields[1]);
			$show->set('code', $fields[2]);
			$show->set('network', $fields[3]);
			$show->set('start_year', $fields[4] * 1);
			$show->set('end_year', $fields[5] * 1);
			$show->set('seasons', $fields[6] * 1);
		}
		return $show;
	}
}
