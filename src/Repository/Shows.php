<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Shows extends Repository
{
	
	public function __construct($database, $factory)
	{
		parent::__construct('shows', $database, $factory);
	}
}
