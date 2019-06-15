<?php 

namespace Controller;

use Core\Controller as Controller;
use Model\Character as Model;

class Character extends Controller
{	
	public function indexAction()
	{
		$router = $this->services->getRouter();
		$id = $router->getId();
		$model = new Model($id);
		$template = 'character.html.twig';
		$data = array();
		$model_data = $model->getData();
		if ($model_data !== null) {
			$data = $model_data;
			$shows = $this->services->getRepository('shows');
			$show = $shows->get($model_data['show_id']);
			$data['show_name'] = $show->get('name');
		} else {
			$template = 'error.html.twig';
			$data['message'] = 'Character not found.';
		}
		return $this->render($template, $data);
	}
}