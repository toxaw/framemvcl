<?php
class ControllerCommon404_not_found extends Controller
{
    public function index($data)
    {
        $this->data['content_before'] = 'Page to ';
        
        $this->data['content_mid'] = $data['address'];
        
        $this->data['content_after'] = ' not found 404';
        
        $this->view('common/404_not_found');
    }
}