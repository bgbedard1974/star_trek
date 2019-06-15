<?php

namespace Core;

class Services
{
	private $config;
	private $router;
	private $database;
	private $factories;
	private $repositories;
	private $error;
	private $twig;
	
	public function __construct()
	{
		$this->setConfig();
		$this->setRouter();
		$this->setDatabase();
		$this->factories = new FactoryCollection($this);
		$this->repositories = new RepositoryCollection($this);
		$this->setError(null);
		$this->setTwig();
	}
	
	private function setConfig()
	{
		$this->config = new Config();
	}
	
	public function getConfig()
	{
		return $this->config;
	}
	
	private function setRouter()
	{
		$this->router = new Router($this->config);
	}
	
	public function getRouter()
	{
		return $this->router;
	}
	
	private function setDatabase()
	{
		$this->database = new DB($this->config);
	}
	
	public function getDatabase()
	{
		return $this->database;
	}
	
	public function getFactory($key)
	{
		return $this->factories->get($key);
	}
	
	public function getRepository($key)
	{
		return $this->repositories->get($key);
	}
	
	public function countRepository($key)
	{
		return $this->getRepository($key)->size();
	}
	
	public function setError($error)
	{
		$this->error = $error;
	}
	
	public function getError()
	{
		return $this->error;
	}
	
	private function setTwig()
	{
		$loader = new \Twig_Loader_Filesystem('templates');
		$this->twig = new \Twig_Environment($loader);
		$site_info = $this->config->getSiteInfo();
		$this->twig->addGlobal('title', $site_info['title']);
		$this->twig->addGlobal('page_title', $site_info['title']);
		$repositories = $this->repositories->getData();
		foreach ($repositories as $key => $repository) {
			$n = $repository->size();
			$this->twig->addGlobal('max_' . $key, $n);
		}
		$menu = new LinkCollection($this);
		$this->twig->addGlobal('menu', $menu->getData());
		$function = new \Twig_SimpleFunction('name_formatter', array(new NameFormatter(), 'twigFunction'));
		$this->twig->addFunction($function);
		$function = new \Twig_SimpleFunction('name_formatter_simple', array(new NameFormatter(), 'twigFunctionSimple'));
		$this->twig->addFunction($function);
	}
	
	public function getTwig()
	{
		return $this->twig;
	}
}