<?php 
class ControllerCommonUserMenu extends Controller
{
    public function index($data = array())
    {   
        $this->language->init('common/common');

        $this->language->init('common/userMenu');

        $this->data['link_active'] = isset($data['route_active'])?$this->tools->getLink($data['route_active']):'';

        if(isset($_SESSION['admin']) && $_SESSION['admin']=='1')
        {
            $this->data['button_admin_panel'] = $this->language->common_userMenu->get('button_admin_panel');
        
            $this->data['link_admin_panel'] = $this->tools->getLink('admin/panel');
        }

        $this->data['text_logo'] = $this->language->common_common->get('text_title');

        $this->data['text_login'] = '';

        if(isset($_SESSION['user_id']))
        {
            $this->model->init('user/user');

            $data_query['user_id'] = $_SESSION['user_id'];

            $result = $this->model->user_user->getUserById($data_query);
            
            if(isset($result['user_id']))
            {
                $this->data['text_login'] = $result['login'];       
            }
        }

        $this->data['button_common_statistic'] = $this->language->common_userMenu->get('button_common_statistic');

        $this->data['button_vk_client'] = $this->language->common_userMenu->get('button_vk_client');

        $this->data['button_purpose'] = $this->language->common_userMenu->get('button_purpose');

        $this->data['button_logout'] = $this->language->common_userMenu->get('button_logout');

        $this->data['link_common_statistic'] = $this->tools->getLink('home/home');

        $this->data['link_vk_client'] = $this->tools->getLink('home/vk_client');
        
        $this->data['link_purpose'] = $this->tools->getLink('home/purpose');
        
        $this->data['link_logout'] = $this->tools->getLink('login/logout');

        $this->view('common/user_menu'); 
    }
}