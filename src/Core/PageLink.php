<?php

namespace Core;

class PageLink
{
	private $controller;
	private $id;
	private $action;
	private $text;
	
	public function __construct($args)
	{
		$this->init();
		if ((isset($args['controller'])) && ($args['controller'] !== 'index')) {
			$this->controller = $args['controller'];
		}
		if (isset($args['id'])) {
			$this->id = $args['id'];
		}
		if (isset($args['action'])) {
			$this->action = $args['action'];
		}
		if (isset($args['text'])) {
			$this->text = $args['text'];
		}
	}
	
	private function init()
	{
		$this->controller = null;
		$this->id = null;
		$this->action = null;
		$this->text = null;
	}
	
	public function render()
	{
		$url = 'projects/star_trek';
		if ($this->controller !== null) {
			$url .= '/' . $this->controller;
		}
		if ($this->id !== null) {
			$url .= '/' . $this->id;
		}
		if ($this->action !== null) {
			$url .= '/' . $this->action;
		}
		return sprintf("<a href=\"%s\">%s</a>", $url, $this->text);
	}
}