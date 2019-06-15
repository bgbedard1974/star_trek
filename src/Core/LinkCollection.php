<?php

namespace Core;

class LinkCollection extends Collection
{	
	public function __construct($services)
	{
		$data = array();
		$site_info = $services->getConfig()->getSiteInfo();
		$menu_string = $site_info['menu'];
		$strings = explode(',', $menu_string);
		foreach ($strings as $string) {
			$parts = explode(';', $string);
			$this->data[] = array('text' => $parts[0], 'url' => $parts[1]);
		}
		$this->setData($data);
	}
}