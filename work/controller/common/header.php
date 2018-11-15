<?php
class ControllerCommonHeader extends Controller
{
    public function index($data = array())
    {
    	$this->language->init('common/common');

    	$this->data = $data;
    	
    	if(!isset($this->data['text_title']))
    	{
    		$this->data['text_title'] = $this->language->common_common->get('text_title');
    	}

        $this->view('common/header');
    }
}