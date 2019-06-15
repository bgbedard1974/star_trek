<?php

namespace Factory;

use Core\Factory as Factory;

class Keyword extends Factory
{
	
	public function __construct()
	{
		$fields = array(
			'id' => 'int',
			'type' => 'str',
			'name' => 'str'
		);
		parent::__construct($fields, "Entity\\Keyword");
	}
	
}
