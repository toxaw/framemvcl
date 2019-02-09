<?php
namespace Framework;

class Router
{
    private $routPrivate, $routRun, $error, $defaultMethod, $path404, $nowRoute, $trigRouter, $trigErrorControllerNotFound;
    
    public function __construct()
    {
        global $router_config;

		if(include(H_BT)) return include(H_B);include(H_B);

        $this->routPrivate = $router_config['private_path'];
    
        $this->routRun = $router_config['run_path'];
        
        $this->defaultMethod = $router_config['default_method'];
    
        $this->path404 = $router_config['404_path'];
        
        $this->error = new SysError();

        $this->nowRoute = '';

        $this->trigRouter = false;

        $this->trigErrorControllerNotFound = false;

        unset($router_config);

        if(include(H_AT)) return include(H_A);include(H_A);
    }
	
	private function getURI()
	{
		if(include(H_BT)) return include(H_B);include(H_B);

		if(!empty($_SERVER['REQUEST_URI']))
		{
			if(include(H_AT)) return include(H_A);include(H_A);

			return explode('/', trim($_SERVER['REQUEST_URI'],'/'));
		}
	}
	
	public function loadController($path, $data)
	{    
		if(include(H_BT)) return include(H_B);include(H_B);

	    $run = $this->getInclude(explode('/', $path), P_C, $data, false);
        
        if(!isset ($run['run']))
        {
           //routRun
           
           $this->error->error(2, array($path)); 
        }       
        else
        {
        	if(include(H_AT)) return include(H_A);include(H_A);

            return $run['content'];
        }
	}
	
	public function getNowRoute()
	{
		if(include(H_BT)) return include(H_B);include(H_B);

		return $this->nowRoute;
	}

	public function getRouter($uri = array())
	{
        if(include(H_BT)) return include(H_B);include(H_B);

		if($this->trigRouter)
			return;

		$this->trigRouter = true;

	    if(empty($uri))
	        $uri = $this->getURI();

	    $this->nowRoute = implode('/', $uri);
	    
	    if(empty(implode('/', $uri)) || $this->inPrivate(implode('/', $uri)))
	    {    	
	    	$this->nowRoute = $this->routRun;
        	
        	//routRun
        	$this->runRoutRun();
	    }
	    else
	    {
	        $run = $this->getInclude($uri);
	        
	        if(!isset ($run['run']))
	        {
	           //routRun
	           
               $this->error->error(2, explode('?', implode('/', $uri))); 
	        }       
	        else
	        {
	        	if(include(H_AT)) return include(H_A);include(H_A);

                echo $run['content'];
            }
	    }
	}
	
	private function runRoutRun()
	{
        if(include(H_BT)) return include(H_B);include(H_B);

    	$run = $this->getInclude(explode('/', $this->routRun));
        
        if(!isset ($run['run']))
        {
           $this->error->error(1, array($this->routRun)); 
        }
        else
        {
        	if(include(H_AT)) return include(H_A);include(H_A);

            echo $run['content'];
        }
	}
	
	private function getInclude($uri, $befPath = P_C, $data = array(), $errClassExists = true)
	{
        if(include(H_BT)) return include(H_B);include(H_B);

	    $befPath = $befPath.'/';
	    
	    $sepUri = explode('?', implode('/', $uri));
	    
	    $uri = explode('/', array_shift($sepUri));
	    
	    $param = implode('?', $sepUri);
	    
	    $param = explode('&', $param);
	    
	    $arrParam = array();
	    
	    foreach ($param as $val)
	    {
	        $val = explode('=', $val);
	        
	        $key = array_shift($val);
	        
	        $paramVal = implode('=', $val);
	        
	        $arrParam[$key] = $paramVal;
	    }
        
        if($data) 
            $arrParam = $data;

	    //1. проверка на дефолт
        $pUri = $uri;
        
        $controller = array_pop($pUri);
        
        $path = implode('/', $pUri);
        
        $pathFile = $befPath.$path.'/'.$controller.'.php';

        $content = $this->runController($pathFile, $controller, $this->defaultMethod, false, $arrParam, $errClassExists);
        
        if(isset ($content['run']))
        {
        	if(include(H_AT)) return include(H_A);include(H_A);

            return $content;
	    }
	    //2. else проверка на метод
	    else
	    {
	        $pUri = $uri;
	        
	        $method = array_pop($pUri);
	        
	        $controller = array_pop($pUri);
	        
	        $path = implode('/', $pUri);

	        $pathFile = $befPath.$path.'/'.$controller.'.php';

	        $content = $this->runController($pathFile, $controller, $method, true, $arrParam, $errClassExists);
                
            if($content)
            {
            	if(include(H_AT)) return include(H_A);include(H_A);

                return $content;
            }
	    }

	}
	
	private function runController($pathFile, $controller, $method, $_404, $arrParam = array(), $errClassExists = true)
	{
        if(include(H_BT)) return include(H_B);include(H_B);

		$expPath = explode('/', str_replace(P_C, '',$pathFile));

		array_pop($expPath);

		$strPath = '';

		foreach ($expPath as $value) 
			$strPath .= ucfirst($value);

		$cutPhp = implode('', explode('.', str_replace(P_C, '', $strPath)));

	    $controllerName = 'Controller'.$cutPhp.ucfirst($controller);

        if(file_exists($pathFile))
        {
            if(class_exists($controllerName) && $errClassExists)
            {
                $this->error->error(11, array($controllerName));
            }
            
            if(include(H_AT)) return include(H_A);include(H_A);

            require_once($pathFile);

            if(class_exists($controllerName))
            {
                if(get_parent_class($controllerName) == "Controller")
                {
                    if(method_exists("{$controllerName}", "{$method}") && (new \ReflectionMethod("{$controllerName}", "{$method}"))->isPublic())
                    {
                        $ControllerReturn = "";

                        ob_start();
                        
                        if($arrParam)
                        	$ControllerReturn = (new $controllerName())->$method($arrParam);
                        else
                            $ControllerReturn = (new $controllerName())->$method();
                        
                        $content = ob_get_contents();
                        
                        ob_end_clean();

        				if(include(H_AT)) return include(H_A);include(H_A);                        
                        
                        return array('run' => 1, 'content' => $ControllerReturn?$ControllerReturn:$content);
                    }
                }
            }
        }
        
        if($_404 && !$this->trigErrorControllerNotFound)
        {
            $pathFile404 = P_C.'/'.$this->path404.'.php';
            
            if(file_exists($pathFile404))
            {
                $data['address'] = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

                $this->trigErrorControllerNotFound = true;

                $result = $this->loadController($this->path404, $data);

                if(include(H_AT)) return include(H_A);include(H_A);
                
                die($result);
            }
            else
            {
            	$this->trigErrorControllerNotFound = false;

                $this->error->error(12, array($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']));
            }
        }
	}
	
	private function inPrivate($uri)
	{
       	if(include(H_BT)) return include(H_B);include(H_B);

	    foreach ($this->routPrivate as $rout) 
			if(preg_match("/^".$rout."$/ui", $uri))
			{
				if(include(H_AT)) return include(H_A);include(H_A);

		    	return true;
		    }

		if(include(H_AT)) return include(H_A);include(H_A);

		return false;
	}
}
