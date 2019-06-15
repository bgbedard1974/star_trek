<?php

namespace Factory;

use Core\Factory as Factory;

class Character extends Factory
{
	
	public function __construct()
	{
		$fields = array(
			'id' => 'int',
			'show_id' => 'int',
			'name_id' => 'int',
			'actor_id' => 'int',
			'rank_id' => 'int',
			'post_id' => 'int',
			'species_id' => 'int',
			'years' => 'int'
		);
		parent::__construct($fields, "Entity\\Character");
	}
	
}
