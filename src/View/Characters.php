<?php

namespace View;

use Core\View as View;
use Core\FormattedTable as FormattedTable;
use Core\PageLink as PageLink;

class Characters extends View {
	
	private static function mergeData($headers, $data) {
		$merged_data = array();
		$merged_data[0] = $headers;
		$i = 1;
		foreach ($data as $item) {
			$merged_data[$i] = $item;
			$i++;
		}
		return $merged_data;
	}
	
	private static function createLinks($data) {
		$temp_data = array();
		foreach ($data as $row) {
			$id = $row['id'];
			$name = $row['name'];
			$link = new PageLink(array('controller' => 'character', 'id' => $id, 'text' => $name));
			$linked_name = $link->render();
			$row['name'] = $linked_name;
			$temp_data[] = $row;
		}
		return $temp_data;
	}
	
	public function render($data) {
		$data['table-data'] = self::createLinks($data['table-data']);
		$columns = array('name', 'rank', 'post', 'species', 'actor', 'years');
		$headers = array('name' => 'Name', 'rank' => 'Rank', 'post' => 'Post', 'species' => 'Species', 'actor' => 'Actor', 'years' => 'Years');
		$table_data = Characters::mergeData($headers, $data['table-data']);
		$heading = $data['heading'];
		$table = new FormattedTable($heading, $columns, $table_data);
		
		$data['content'] = $table->render();
		unset($data['table-data']);
		unset($data['heading']);
		
		return parent::render($data);
	}
}
