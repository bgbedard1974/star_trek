<?php

namespace Entity;

use Core\Entity as Entity;

class Character extends Entity
{
	
	public function __construct()
	{
		$data = array(
			'id' => 0,
			'show_id' => 0,
			'name_id' => 0,
			'actor_id' => 0,
			'rank_id' => 0,
			'post_id' => 0,
			'species_id' => 0,
			'years' => 0
		);
		parent::__construct($data);
	}
}
