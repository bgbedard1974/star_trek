<?php

namespace Core;

class Collection
{
	protected $data;
	
	public function __construct($data = null)
	{
		$this->data = array();
		if ($data !== null) {
			$this->setData($data);
		}
	}
	
	protected function setData($data)
	{
		foreach ($data as $key => $value) {
			$this->data[$key] = $value;
		}
	}
	
	public function get($key)
	{
		$value = null;
		if (isset($this->data[$key])) {
			$value = $this->data[$key];
		}
		return $value;
	}
	
	public function getData()
	{
		return $this->data;
	}
}