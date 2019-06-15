<?php

namespace Core;

class Router
{
	private $request;
	private $requestAsArray;
	
	public function __construct($config)
	{
		$request = '/' . trim($_SERVER['REQUEST_URI'], '/');
		$site_info = $config->getSiteInfo();
		$base_path = $site_info['base-path'];
		$this->request = str_replace($base_path, '', $request);
		$this->requestAsArray = explode('/', $this->request);
	}
	
	public function getRequest()
	{
		return $this->request;
	}
	
	public function getController()
	{
		$controller = null;
		if (count($this->requestAsArray) > 1) {
			$controller = $this->requestAsArray[1];
		}
		return $controller;
	}
	
	public function getId()
	{
		$id = null;
		if (count($this->requestAsArray) > 2) {
			$id = $this->requestAsArray[2];
		}
		return $id;
	}
	
	public function getAction()
	{
		$action = null;
		if (count($this->requestAsArray) > 3) {
			$action = $this->requestAsArray[3];
		}
		return $action;
	}
}