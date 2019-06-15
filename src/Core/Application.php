<?php

namespace Core;

class Application
{
	private $services;
	
	public function __construct()
	{
		global $services;
		$this->services = $services;
	}
	
	public function run()
	{
		$output = "";
		$router = $this->services->getRouter();
		$controller = $this->getController($router);
		$action = $router->getAction();
		if ($action === null) {
			$action = 'index';
		}
		$action .= 'Action';
		if ($controller === null) {
			$this->services->setError(array('message' => 'Page Not Found.'));
			$controller = new \Controller\Error();
		}
		$output = $controller->{$action}();
		return $output;
	}
	
	private function getController($router)
	{
		$controller = null;
		$controllers = $this->services->getConfig()->getControllers();
		$controller_key = $router->getController();
		if ($controller_key === null) {
			$controller_key = 'index';
		}
		if (isset($controllers[$controller_key])) {
			$controller_class = $controllers[$controller_key];
			$controller = new $controller_class();
		}
		return $controller;
	}
}