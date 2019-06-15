<?php

namespace Entity;

use Core\Entity as Entity;

class Name extends Entity
{
	
	public function __construct()
	{
		$data = array(
			'id' => 0,
			'first' => "",
			'nick' => "",
			'middle' => "",
			'last' => "",
			'suffix' => ""
		);
		parent::__construct($data);
	}
}

