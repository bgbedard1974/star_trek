<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Names extends Repository
{
	
	public function __construct($database, $factory)
	{
		parent::__construct('names', $database, $factory);
	}
	
}
