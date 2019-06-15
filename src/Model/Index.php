<?php

namespace Model;

use Core\Model as Model;
use Core\PageLink as PageLink;

class Index extends Model
{
	public function __construct()
	{
		$data = array();
		global $services;
		$repository = $services->getRepository('shows'); 
		$ids = $repository->getIds();
		if (count($ids) > 0) {
			foreach ($ids as $id) {
				$entity = $repository->get($id);
				$show = $entity->getData();
				$link = new PageLink(array('controller' => 'show', 'id' => $show['id'], 'text' => $show['name']));
				$show['linked_name'] = $link->render();
				$data[] = $show;
			}
		}
		parent::__construct($data);
	}
}
