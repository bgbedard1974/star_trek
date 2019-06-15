<?php 

namespace Controller;

use Core\Controller as Controller;
use Model\Show as Model;

class Show extends Controller
{
	public function indexAction()
	{
		$router = $this->services->getRouter();
		$id = $router->getId();
		$model = new Model($id);
		$model_data = $model->getData();
		$template = 'show.html.twig';
		$data = array();
		if ($model_data !== null) {
			$data = $model_data;
		} else {
			$template = 'error.html.twig';
			$data['message'] = 'Show not found.';
		}
		return $this->render($template, $data);
	}
}