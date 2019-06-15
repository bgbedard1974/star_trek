<?php

namespace Entity;

use Core\Entity as Entity;

class Show extends Entity
{
	
	public function __construct()
	{
		$data = array(
			'id' => 0,
			'name' => "",
			'code' => "",
			'network' => "",
			'start_year' => 0,
			'end_year' => 0,
			'seasons' => 0
		);
		parent::__construct($data);
	}
}
