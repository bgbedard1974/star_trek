<?php

namespace Model;

use Core\Model as Model;

class Character extends Model
{
	public function __construct($id)
	{
		global $services;
		$data = null;
		$entity = null;
		if (is_numeric($id)) {
			$repository = $services->getRepository('characters');
			$entity = $repository->get($id);
		} else {
			$entity = $id;
		}
		if ($entity !== null) {
			$names = $services->getRepository('names');
			$keywords = $services->getRepository('keywords');
			$data = array(
				'id' => $entity->get('id'),
				'show_id' => $entity->get('show_id'),
				'name' => $names->get($entity->get('name_id')),
				'actor' => $names->get($entity->get('actor_id')),
				'rank' => $keywords->getName($entity->get('rank_id')),
				'post' => $keywords->getName($entity->get('post_id')),
				'species' => $keywords->getName($entity->get('species_id')),
				'years' => $entity->get('years'),
			);
		}
		
		parent::__construct($data);
	}
	
	private function getName()
	{
		$name = "";
		$name_model = new Name($this->get('name'));
		$mode = 'fl';
		$species = $this->get('species');
		if ($species == 'Bajoran') {
			$mode = 'lfnc';
		}
		if (strpos($species, 'Borg') !== false) {
			$mode = 'n';
		} 
		$name = $name_model->toString($mode);
		return $name;
	}
	
	private function getActorName()
	{
		$name = "";
		$name_model = new Name($this->get('actor')); 
		$name = $name_model->toString();
		return $name;
	}
	
	public function toString()
	{
		$output = "";
		$output .= $this->getActorName();
		$output .= ' as ';
		if ($this->rank !== "") {
			$output .= $this->rank . ' ';
		}
		$output .= $this->getName();
		return $output;
	}
	
	public function getData()
	{
		$data = parent::getData();
		if ($data !== null) {
			//$data['name'] = $this->getName();
			//$data['actor'] = $this->getActorName();
			$data['name'] = $this->get('name')->getData();
			$data['actor'] = $this->get('actor')->getData();
		}
		return $data;	
	}

}
