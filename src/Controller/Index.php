<?php 

namespace Controller;

use Core\Controller as Controller;
use Model\Index as Model;

class Index extends Controller
{
	public function indexAction()
	{
		$model = new Model();
		$template = 'index.html.twig';
		$model_data = $model->getData();
		$data = array();
		if (count($model_data) > 0) {
			$data['shows'] = $model_data;
		} else {
			$template = 'error.html.twig';
			$data['message'] = 'No Shows Found.';
		}
		
		$characters = $this->services->getRepository('characters');
		$names = $this->services->getRepository('names');
		$character = $characters->get(1);
		$name = $names->get($character->get('name_id'));
		$data['name'] = $name->getData();
		
		return $this->render($template, $data);
	}
}