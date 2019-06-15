<?php

namespace View;

use Core\MenuList as Menu;
use Core\View as View;

class Index extends View {
	
	public function render($data) {
		$items = array();
		foreach ($data['shows'] as $show) {
			$text = $show['name'] . ' ' . $show['duration'];
			//$url = 'index.php?page=show&id=' . $show['id'];
			$url = '/trek_new/show/' . $show['id'];
			$items[] = array('text' => $text, 'url' => $url);
		}
		$menu = new Menu($items);
		
		$data['heading'] = 'Shows';
		$data['content'] = $menu->render();
		unset($data['shows']);
		
		return parent::render($data);
	}
} 