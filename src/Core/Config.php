<?php

namespace Core;

use FileIO\FileIOReader as FileIOReader;

class Config
{
	private $siteInfo;
	private $dbInfo;
	private $factories;
	private $repositories;
	private $controllers;
	
	public function __construct()
	{
		$file = new FileIOReader('data/config.txt');
		$data = $file->readLines();
		$this->siteInfo = self::extractData($data, '#Site Info');
		$this->dbInfo = self::extractData($data, '#Database');
		$this->factories = self::extractData($data, '#Factories');
		$this->repositories = self::extractData($data, '#Repositories');
		$this->controllers = self::extractData($data, '#Controllers');
	}
	
	private static function extractData($data, $section)
	{
		$start = -1;
		$end = -1;
		$lines = array();
		for ($i = 0 ; $i < count($data) ; $i++) {
			$line = $data[$i];
			if ($line == $section) {
				$start = $i + 1;
			}
			if ($line == '') {
				$end = $i - 1;
				if ($start >= 0) {
					break;
				}
			}
			if (($i == count($data) - 1) && ($start >= 0)) {
				$end = $i;
			}
		}
		$length = ($end - $start) + 1;
		$lines = array_splice($data, $start, $length);
		return self::makeArray($lines);
	}
	
	private static function makeArray($lines)
	{
		$data = array();
		foreach ($lines as $line) {
			$temp = explode('|', $line);
			$key = $temp[0];
			$value = $temp[1];
			$data[$key] = $value;
		}
		return $data;
	}
	
	public function getSiteInfo()
	{
		return $this->siteInfo;
	}
	
	public function getDbInfo()
	{
		return $this->dbInfo;
	}
	
	public function getFactories()
	{
		return $this->factories;
	}
	
	public function getRepositories()
	{
		return $this->repositories;
	}
	
	public function getControllers()
	{
		return $this->controllers;
	}
}