<?php

namespace Model;

use Core\Model as Model;

class Error extends Model
{
	public function __construct($options)
	{
		$heading = 'Error';
		if (isset($options['heading'])) {
			$heading = $options['heading'];
		}
		$message = $options['message'];
	
		$data = array(
			'heading' => $heading,
			'message' => $message
		);
		
		parent::__construct($data);
	}
}
