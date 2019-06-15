<?php

namespace Repository;

use FileIO\FileIOReader as FileIOReader;
use Core\Repository as Repository;

class Characters extends Repository
{
	
	public function __construct($database, $factory)
	{
		parent::__construct('characters', $database, $factory);
	}
	
	public function getByShowId($id)
	{
		$sql = "SELECT id FROM characters WHERE show_id = :id";
		$parms = array(':id' => $id);
		$results = $this->database->query($sql, $parms);
		$data = array();
		foreach ($results as $row) {
			$data[] = $row['id'];
		}
		return $data;
	}
	
	public function getAllByShowId($id)
	{
		$sql = "SELECT * FROM characters WHERE show_id = :id";
		$parms = array(':id' => $id);
		$results = $this->database->query($sql, $parms);
		$data = array();
		foreach ($results as $row) {
			$data[] = $this->factory->createNew($row);
		}
		return $data;
	}
}
