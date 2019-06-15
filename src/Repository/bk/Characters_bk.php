<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;
use Entity\Character as Character;

class Characters extends Repository {
	
	public function __construct() {
		parent::__construct();
		$file = new FileIOReader('data/characters.txt');
		$lines = $file->readLines();
		foreach ($lines as $line) {
			$entity = self::createNew($line);
			$id = $entity->get('id');
			$this->data[$id] = $entity;
		}
	}
	
	public static function createNew($str = null) {
		$character = new Character();
		if ($str !== null) {
			$fields = explode(',', $str);
			$character->set('id', $fields[0] * 1);
			$character->set('show_id', $fields[1] * 1);
			$character->set('name_id', $fields[2] * 1);
			$character->set('actor_id', $fields[3] * 1);
			$character->set('rank_id', $fields[4] * 1);
			$character->set('post_id', $fields[5] * 1);
			$character->set('species_id', $fields[6] * 1);
			$character->set('years', $fields[7] * 1);
		}
		return $character;
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
