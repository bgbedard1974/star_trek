<?php 

namespace Controller;

use Core\Controller as Controller;
use Model\Characters as Model;

class Characters extends Controller
{
	public function indexAction()
	{
		$model = new Model();
		$model_data = $model->getData();
		$template = 'characters.html.twig';
		$data = array();
		if ($model_data !== null) {
			$data['characters'] = $model_data;
		} else {
			$template = 'error.html.twig';
			$data['message'] = 'Show not found.';
		}
		return $this->render($template, $data);
	}
}