<?php

namespace Entity;

use Core\Entity as Entity;

class Keyword extends Entity
{
	
	public function __construct()
	{
		$data = array(
			'id' => 0,
			'type' => "",
			'name' => ""
		);
		parent::__construct($data);
	}

}

