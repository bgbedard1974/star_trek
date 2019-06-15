<?php

namespace Core;

class Router {
	private $controllers;
	private $actions;
	private $controller;
	private $action;
	
	public function __construct($config, $args) {
		$this->controllers = $config->getControllers();
		$this->actions = $config->getActions();
		$this->setController($args->get('page'));
		$this->setAction($args->get('action'));
	}
	
	public function setController($page) {
		$key = 'error';
		if ($page === null) {
			$key = 'index';
		}
		if (isset($this->controllers[$page])) {
			$key = $page;
		}
		$this->controller = "Controller\\" . $this->controllers[$key];
	}
	
	public function getController() {
		return $this->controller;
	}
	
	private function setAction($action) {
		$this->action = 'display';
		if (in_array($action, $this->actions) === true) {
			$this->action = $action;
		}
	}
	
	public function getAction() {
		return $this->action;
	}
	
	public function redirect($page, $action) {
		$this->setController($page);
		$this->setAction($action);
	}
}