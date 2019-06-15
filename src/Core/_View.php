<?php

namespace Core;

class View {
	private $title;
	private $pageTitle;
	private $heading;
	private $content;
	private $footer;
	private $wrap;
	private $raw;
	
	public function __construct() {
		global $services;
		$site_info = $services->getConfig()->getSiteInfo();
		$title = $site_info['title'];
		$this->setTitle($title);
		$this->setPageTitle($title);
		$this->setHeading(null);
		$this->setContent("");
		$this->setFooter("");
		$this->wrap = true;
		$this->raw = false;
	}
	
	protected function setTitle($title) {
		$this->title = $title;
	}
	
	protected function setPageTitle($title) {
		$this->pageTitle = $title;
	}
	
	protected function setHeading($heading) {
		$this->heading = $heading;
	}
	
	protected function setContent($content) {
		if ($this->raw === true) {
			$content = Html::p($content);
		}
		$this->content = $content;
	}
	
	protected function setFooter($footer) {
		if (is_object($footer)) {
			$footer = $footer->render();
		}
		$this->footer = $footer;
	}
	
	protected function build() {
		$html = "";
		if ($this->wrap === false) {
			$html .= $this->content;
		} else {
			$head = Html::title($this->title);
			$heading = "";
			if ($this->heading !== null) {
				$heading = Html::p(Html::strong($this->heading));
			}
			$body = Html::h2($this->pageTitle) . $heading . $this->content . $this->footer;
		
			$html .= Html::html(Html::head($head) . Html::body($body));
		}
		return $html;
	}
	
	public function render($data) {
		if (isset($data['title'])) {
			$this->setTitle($data['title']);
		}
		if (isset($data['page-title'])) {
			$this->setPageTitle($data['page-title']);
		}
		if (isset($data['heading'])) {
			$this->setHeading($data['heading']);
		}
		if (isset($data['content-raw'])) {
			$this->raw = true;
		}
		if (isset($data['content'])) {
			$this->setContent($data['content']);
		}
		if (isset($data['footer'])) {
			$this->setFooter($data['footer']);
		}
		if (isset($data['content-only'])) {
			$this->wrap = false;
		}
		return $this->build();
	}
}