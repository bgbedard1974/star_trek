<?php

namespace Factory;

use Core\Factory as Factory;

class Show extends Factory
{
	
	public function __construct()
	{
		$fields = array(
			'id' => 'int',
			'name' => 'str',
			'code' => 'str',
			'network' => 'str',
			'start_year' => 'int',
			'end_year' => 'int',
			'seasons' => 'int'
		);
		parent::__construct($fields, "Entity\\Show");
	}
}
