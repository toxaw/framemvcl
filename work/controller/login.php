<?php
class ControllerLogin extends Controller
{
	public function index($array = array())
	{
		$this->redirectLogin($array);

		$this->language->init('user/login');

		$this->getForm($array);
	}

	public function autorization($array = array())
	{
		$this->redirectLogin($array);

		$this->model->init('user/user');

		$this->language->init('user/login');

		$data_query = $this->tools->getArrayPOST();
		
		if(!empty($data_query))
		{
			$result = $this->model->user_user->getUser($data_query);
			
			if(isset($result['user_id']))
			{
				$_SESSION['user_id'] = $result['user_id'];

				$_SESSION['admin'] = $result['admin'];

				$this->redirectLogin($array);		
			}	
		}

		$this->data['text_error'] = $this->language->user_login->get('text_error_no_login');

		$this->getForm($array);		
	}

	public function logout()
	{
		$_SESSION = array();

		$this->tools->redirect($this->tools->getLink('login'), 301);
	}

	protected function getForm($array = array())
	{
		$this->language->init('common/common');

		$data_header['text_title'] = $this->language->common_common->get('text_title').' '.$this->language->user_login->get('text_title');

		$this->data['text_title'] = $this->language->common_common->get('text_title').' '.$this->language->user_login->get('text_title');

		$this->data['text_login'] = $this->language->user_login->get('text_login');

		$this->data['text_password'] = $this->language->user_login->get('text_password');

		$this->data['button_login'] = $this->language->user_login->get('button_login');

		$this->data['link_autorization'] = $this->tools->getLink('login/autorization'.$this->tools->getStringGET($array));

		$this->data['header'] = $this->tools->loadController('common/header', $data_header);

		$this->data['footer'] = $this->tools->loadController('common/footer');

		$this->view('user/login');
	}

	protected function redirectLogin($array)
	{
		if(!empty($_SESSION))
		{
			$route = 'home/home';

			$GET = $array;
			
			if(!(isset($GET['router@route']) && $GET['router@route']!=''))
			{
				$GET['router@route'] = $route;
			}

			$redirect = $this->tools->getStringRoute($GET);

			$this->tools->redirect($this->tools->getLink($redirect), 301);			
		}
	}
}