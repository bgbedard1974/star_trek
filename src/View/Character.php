<?php

namespace View;

use Core\FieldList as FieldList;
use Core\ButtonBar as ButtonBar;
use Core\View as View;

class Character extends View {

	public function render($data) {
		$character = $data['character'];
		$list = new FieldList();
		$list->setMode(FieldList::NONE);
		$list->addField('Name', $character['name']);
		$list->addField('Post', $character['post']);
		$list->addField('Rank', $character['rank']);
		$list->addField('Species', $character['species']);
		$list->addField('Years', $character['years']);
		$list->addField('Actor', $character['actor']);
		$content = $list->render();

		$bar = new ButtonBar();
		if ($character['id'] > 1) {
			$bar->add(array('controller' => 'character', 'id' => $character['id'] - 1, 'text' => 'PREV'));
		}
		$bar->add(array('controller' => 'show', 'id' => $character['show-id'], 'text' => 'BACK'));
		global $services;
		$max = $services->getRepository('characters')->size();
		if ($character['id'] < $max) {
			$bar->add(array('controller' => 'character', 'id' => $character['id'] + 1, 'text' => 'NEXT'));
		}
		
		$data['content'] = $content;
		$data['footer'] = $bar;
		unset($data['character']);
		
		return parent::render($data);
	}
}
