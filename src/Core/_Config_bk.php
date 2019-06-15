<?php

namespace Core;

class Config {
	public function getControllers() {
		return array(
			'error' => 'Error',
			'index' => 'Index',
			'show' => 'Show',
			'character' => 'Character'
		);
	}
	
	public function getActions() {
		return array(
			'display',
		);
	}
	
	public function getRepositories() {
		return array(
			'keywords' => 'Repository\\Keywords',
			'names' => 'Repository\\Names',
			'shows' => 'Repository\\Shows',
			'characters' => 'Repository\\Characters'
		);
	}
	
	public function getFactories() {
		return array(
			'keywords' => 'Factory\\Keyword',
			'names' => 'Factory\\Name',
			'shows' => 'Factory\\Show',
			'characters' => 'Factory\\Character'
		);
	}
	
	public function getSiteInfo() {
		return array(
			'title' => 'Star Trek Database'
		);
	}
	
	public function getBasePath() {
		return '/trek_new';
	}

}