<?php

namespace Core;

class DB
{
	private $connection;
	private $database;
	
	public function __construct($config)
	{
		$this->database = $config->getDbInfo();
	}
	
	private function connect()
	{
		$dsn = 'mysql:host=' . $this->database['hostname'] . ';dbname=' . $this->database['name'] . ';charset=utf8mb4';
		$this->connection = new \PDO($dsn, $this->database['user'], $this->database['password']);
		$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$this->connection->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
	}
	
	public function query($query, $params = null)
	{
		$this->connect();
		$statement = null;
		try {
			if ($params == null) {
				$statement = $this->connection->query($query);
			} else {
				$statement = $this->connection->prepare($query); 
				$statement->execute($params);
			}
		} catch(Exception $e) {
			print('Exception -> ');
			var_dump($e->getMessage());
		}
		
		return $statement->fetchAll(\PDO::FETCH_ASSOC); 
	}
	
	public function execute($query, $params = null)
	{
		$this->connect();
		$statement = null;
		try {
			if ($params == null) {
				$statement = $this->connection->exec($query);
			} else {
				$statement = $this->connection->prepare($query); 
				$statement->execute($params);
			}		
		} catch(Exception $e) {
			print('Exception -> ');
			var_dump($e->getMessage());
		}
		
		return $statement; 
	}
}