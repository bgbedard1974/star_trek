<?php

namespace Core;

class Factory
{
	private $fields;
	private $entityClassName;
	
	protected function __construct($fields, $entityClassName)
	{
		$this->fields = $fields;
		$this->entityClassName = $entityClassName;
	}
		
	public function createNew($data = null)
	{
		$entity = new $this->entityClassName();
		if ($data !== null) {
			$fields = array();
			if (is_array($data)) {
				foreach ($this->fields as $key => $type) {
					$entity->set($key, $data[$key]);
				}
			} else {
				$fields = explode(',', $data);			
				$n = 0;
				foreach ($this->fields as $key => $type) {
					$value = $fields[$n];
					if ($type == 'int') {
						$value *= 1;
					}
					$entity->set($key, $value);
					$n++;
				}
			}
		}
		return $entity;
	}
}
