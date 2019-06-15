<?php

namespace Model;

use Core\Model as Model;

class Show extends Model
{
	public function __construct($id)
	{
		global $services;
		$data = null;
		$repository = $services->getRepository('shows');
		$entity = $repository->get($id);
		$characters = new Characters($id);
		if ($entity !== null) {
			$data = array(
				'show' => $entity->getData(),
				'cast' => $characters->getData()
			);
		} 
		parent::__construct($data);
	}
}
