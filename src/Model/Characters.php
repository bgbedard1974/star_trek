<?php

namespace Model;

use Core\Model as Model;

class Characters extends Model
{
	
	public function __construct($show_id = null)
	{
		global $services;
		$repository = $services->getRepository('characters');
		$data = array();
		if ($show_id !== null) {
			$entities = $repository->getByShowId($show_id);
		} else {
			$entities = $repository->getAll();
		}
		foreach ($entities as $entity) {
			$character = new Character($entity);
			$data[] = $character->getData();
		}
		
		parent::__construct($data);
	}
}
