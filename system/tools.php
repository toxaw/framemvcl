<?php
namespace Framework;

class Tools
{
	private $response_data;

	public function __construct()
	{
        if(include(H_BT)) return include(H_B);include(H_B);

        $this->response_data['post'] = $_POST;
        
        $this->response_data['get'] = $_GET;

        if(include(H_AT)) return include(H_A);include(H_A);
	}

	public function loadController($path, $data = array())
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $router = SRouter::router();

        if(include(H_AT)) return include(H_A);include(H_A);

        return $router->loadController($path, $data);    
    }

    public function getRedirectRoute()
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $router = SRouter::router();

        $route = $router->getNowRoute();
        
        $sepRoute = explode("?", $route);
        

        $route = '?router@route='.$sepRoute[0];

        if(count($sepRoute)==2)
        {
            $route .= '&'.$sepRoute[1];
        }

        if(include(H_AT)) return include(H_A);include(H_A);

        return $route;
    }

    public function getNowRoute()
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $router = SRouter::router();

        $route = $router->getNowRoute();
        
        $sepRoute = explode("?", $route);

        if(include(H_AT)) return include(H_A);include(H_A);

        return $sepRoute[0];        
    }

    public function getStringRoute($array = array())
    {
        if(include(H_BT)) return include(H_B);include(H_B);
       
        $str = '';

        if(isset($array['router@route']))
        {
            $str = $array['router@route'];

            unset($array['router@route']);
        }

        $i = 0;
        
        foreach ($array as $key => $value) 
        {
            $str .= ($i==0?'?':'&').$key.'='.$value;

            $i++;
        }

        if(include(H_AT)) return include(H_A);include(H_A);

        return $str;
    }

    public function redirect($url, $status)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        header('Location: ' .$url, true, $status);

        if(include(H_AT)) return include(H_A);include(H_A);

		exit();
    }
    
    public function getLink($path, $data = array())
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $path = (empty($_SERVER['HTTPS'])?'http://':'https://').$_SERVER['SERVER_NAME'].'/'.$path;
        
        $i = 0;
        
        foreach ($data as $key => $param) 
        {
            $path .= ($i==0?'?':'&').$key.'='.$param;

            $i++;
        }

        if(include(H_AT)) return include(H_A);include(H_A); 

        return $path;
    }
    
    public function getPOST($key = '')
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        if($key == '')
        {
            if(include(H_AT)) return include(H_A);include(H_A);

            return null;
        }

        if(!array_key_exists($key, $this->response_data['post']))
        {
            if(include(H_AT)) return include(H_A);include(H_A);

            return $key;
        }

        if(include(H_AT)) return include(H_A);include(H_A);

        return $this->response_data['post'][$key];
    }
    
    public function getArrayPOST()
    {
        if(include(H_BT)) return include(H_B);include(H_B);
        
        return $this->response_data['post'];
    }

    public function getGET($key = '')
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        if($key == '')
        {
            if(include(H_AT)) return include(H_A);include(H_A);

            return null;
        }

        if(!array_key_exists($key, $this->response_data['get']))
        {
            if(include(H_AT)) return include(H_A);include(H_A);

            return $key;
        }

        if(include(H_AT)) return include(H_A);include(H_A);

        return $this->response_data['get'][$key];
    }

    public function getArrayGET()
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        return $this->response_data['get'];
    }

    public function getStringGET($data = array())
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $path = '';

        $i = 0;

        foreach ($data as $key => $param) 
        {
            $path .= ($i==0?'?':'&').$key.'='.$param;

            $i++;
        }

        if(include(H_AT)) return include(H_A);include(H_A);

        return $path;
    }
}