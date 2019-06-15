<?php

namespace Core;

class Model
{
	protected $data;
	
	public function __construct($data = null)
	{
		$this->setData($data);
	}
	
	public function set($key, $value)
	{
		$this->data[$key] = $value;
	}
	
	public function get($key)
	{
		return $this->data[$key];
	}
	
	protected function setData($data)
	{
		$this->data = $data;
	}
	
	public function getData()
	{
		return $this->data;
	}
}