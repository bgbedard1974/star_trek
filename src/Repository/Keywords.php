<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Keywords extends Repository
{
	
	public function __construct($database, $factory)
	{
		parent::__construct('keywords', $database, $factory);
	}
		
	public function getName($id)
	{
		$name = "";
		if ($id > 0) {
			$sql = "SELECT name FROM keywords WHERE id = :id";
			$parms = array(':id' => $id);
			$results = $this->database->query($sql, $parms);		
			$name = $results[0]['name'];
		}
		return $name;
	}
}
