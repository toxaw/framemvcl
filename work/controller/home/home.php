<?php 
class ControllerHomeHome extends Controller
{
    public function index($data = array())
    { 
        if(empty($_SESSION))
        {
            $this->tools->redirect($this->tools->getLink('login').$this->tools->getRedirectRoute(), 301);          
        }

        $this->language->init('common/common');

        $this->language->init('home/home');

        $this->model->init('home/home');

        $data_header['text_title'] = $this->language->common_common->get('text_title').' '.$this->language->home_home->get('text_title');

        $this->data['header'] = $this->tools->loadController('common/header', $data_header);

        $data_menu['route_active'] = $this->tools->getNowRoute();

        $this->data['menu'] = $this->tools->loadController('common/userMenu', $data_menu);
        
        $this->data['footer'] = $this->tools->loadController('common/footer');
        
        //$this->view('home/purpose_vk_client');

        //$this->view('home/purpose_statistic');

        //$this->view('home/purpose_form');

        //$this->view('home/purpose'); 
        
        //$this->view('home/vk_client_form'); 

        //$this->view('home/vk_client'); 
        
        $this->view('home/home'); 
    }
}