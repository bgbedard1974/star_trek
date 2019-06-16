<?php

namespace Core;

use FileIO\FileIOReader as FileIOReader;

class Repository
{
	private $table;
	protected $factory;
	protected $database;
	
	public function __construct($table, $database, $factory)
	{
		$this->table = $table;
		$this->factory = $factory;
		$this->database = $database;
	}
	
	public function getAll()
	{
		$sql = sprintf("SELECT * FROM %s", $this->table);
		$results = $this->database->query($sql);
		$data = array();
		foreach ($results as $row) {
			$data[] = $this->factory->createNew($row);
		}
		return $data;
	}
	
	public function getIds()
	{
		$sql = sprintf("SELECT id FROM %s", $this->table);
		$results = $this->database->query($sql);
		$data = array();
		foreach ($results as $row) {
			$data[] = $row['id'];
		}
		return $data;
	}
	
	public function size()
	{
		$sql = sprintf("SELECT COUNT(*) AS 'rows' FROM %s", $this->table);
		$results = $this->database->query($sql);
		return $results[0]['rows'];
	}
	
	public function get($id)
	{
		$entity = null;
		if (($id > 0) && ($id <= $this->size())) {
			$sql = sprintf("SELECT * FROM %s WHERE id = :id", $this->table);
			$parms = array(':id' => $id);
			$row = $this->database->query($sql, $parms);
			$entity = $this->factory->createNew($row[0]);
		}
		return $entity;
	}
}
