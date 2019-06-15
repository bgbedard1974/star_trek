<?php

namespace Core;

class Controller
{
	protected $services;
	
	public function __construct()
	{
		global $services;
		$this->services = $services;
	}
	
	protected function render($template, $data)
	{
		$twig = $this->services->getTwig();
		return $twig->render($template, $data);
	}
	
}