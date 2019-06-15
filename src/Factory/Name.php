<?php

namespace Factory;

use Core\Factory as Factory;

class Name extends Factory
{
	
	public function __construct()
	{
		$fields = array(
			'id' => 'int',
			'first' => 'str',
			'nick' => 'str',
			'middle' => 'str',
			'last' => 'str',
			'suffix' => 'str'
		);
		parent::__construct($fields, "Entity\\Name");
	}
	
}
