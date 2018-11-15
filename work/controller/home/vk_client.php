<?php 
class ControllerHomeVk_client extends Controller
{
    public function index($data = array())
    { 
        if(empty($_SESSION))
        {
            $this->tools->redirect($this->tools->getLink('login').$this->tools->getRedirectRoute(), 301);          
        }

        $this->language->init('common/common');

        $this->language->init('home/vk_client');

        $data_header['text_title'] = $this->language->common_common->get('text_title').' '.$this->language->home_vk_client->get('text_title');

        $this->data['header'] = $this->tools->loadController('common/header', $data_header);
        
        $data_menu['route_active'] = $this->tools->getNowRoute();

        $this->data['menu'] = $this->tools->loadController('common/userMenu', $data_menu);

        $this->data['footer'] = $this->tools->loadController('common/footer');
        
        $this->view('home/vk_client'); 
    }
}