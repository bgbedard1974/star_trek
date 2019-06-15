<?php

namespace View;

use Core\View as View;

class Error extends View {
	
	public function render($data) {
		$data['content'] = $data['message'];
		$data['content-raw'] = true;
		unset($data['message']);
		
		return parent::render($data);
	}
}