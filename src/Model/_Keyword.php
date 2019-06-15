<?php

namespace Model;

use Core\Model as Model;

class Keyword extends Model {
	private $id;
	private $type;
	private $name;
	
	public function __construct() {
		$data = array(
			'id' => 0,
			'type' => "",
			'name' => ""
		);
		parent::__construct($data);
	}

}

