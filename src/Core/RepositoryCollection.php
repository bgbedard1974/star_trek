<?php

namespace Core;

class RepositoryCollection extends Collection
{
	public function __construct($services)
	{
		$data = array();
		foreach ($services->getConfig()->getRepositories() as $key => $class_name) {
			$data[$key] = new $class_name($services->getDatabase(), $services->getFactory($key));
		}
		$this->setData($data);
	}
}
