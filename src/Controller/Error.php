<?php 

namespace Controller;

use Core\Controller as Controller;

class Error extends Controller
{
	public function indexAction()
	{
		$error = $this->services->getError();
		$data = array();
		if ($error === null) {
			$data['message'] = 'Page not found.';
		} else {
			$data['message'] = $error['message'];
		}
		
		return $this->render('error.html.twig', $data);
	}
}