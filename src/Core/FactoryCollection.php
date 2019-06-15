<?php

namespace Core;

class FactoryCollection extends Collection
{	
	public function __construct($services)
	{
		$data = array();
		foreach ($services->getConfig()->getFactories() as $key => $class_name) {
			$this->data[$key] = new $class_name();
		}
		$this->setData($data);
	}
}