<?php

namespace Core;

class ArgumentParser {
	private $data;
	private $query;
	
	public function __construct() {
		$this->data = array();
		$this->query = $_SERVER['QUERY_STRING'];
		$this->parse();
	}
	
	private function parse() {
		if ($this->query !== "") {
			$args = explode('&', $this->query);
			foreach ($args as $arg) {
				$temp = explode('=', $arg);
				$key = $temp[0];
				$value = $temp[1];
				$this->set($key, $value); 
			}
		}
	}
	
	private function set($key, $value) {
		$this->data[$key] = $value;
	}
	
	public function get($key) {
		$value = null;
		if (isset($this->data[$key])) {
			$value = $this->data[$key];
		}
		return $value;
	}
	
	public function getQuery() {
		return $this->query;
	}
	
	public function size() {
		return count($this->data);
	}
}