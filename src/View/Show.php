<?php

namespace View;

use Core\FieldList as FieldList;
use Core\ButtonBar as ButtonBar;
use Core\View as View;

class Show extends View {

	public function render($data) {
		$show = $data['show'];
		$list = new FieldList();
		$list->setMode(FieldList::NONE);
		$list->addField('Name', $show['name']);
		$list->addField('code', $show['code']);
		$list->addField('Network', $show['network']);
		$list->addField('Seasons', $show['seasons'] . ' ' . $show['duration']);
		$content = $list->render();
		$characters = new Characters();
		$char_data = array(
			'heading' => 'CAST',
			'table-data' => $data['cast'],
			'content-only' => true
		);
		$content .= $characters->render($char_data);
		$bar = new ButtonBar();
		$bar->add(array('controller' => 'index', 'text' => 'BACK'));
		
		$data['content'] = $content;
		$data['footer'] = $bar;
		unset($data['show']);
		unset($data['cast']);
		
		return parent::render($data);
	}
}
