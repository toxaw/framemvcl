<?php
namespace Framework\Library;

class LibraryModuleInstaller extends Library 
{
	public function __construct()
    {
        parent::__construct();

        $callback_privatePath = function ($args)
        {
        	$args['local']['router_config']['private_path'][]='startup\/.+';

            $args['local']['router_config']['private_path'][]='startup';
        	
        	if(!file_exists(P_C.'/startup.php'))
	        {
	        	$defaultMethod = $args['local']['router_config']['default_method'];

	        	$content ="<?php\n\rclass ControllerStartup extends Controller\n\r{\n\r\tpublic function $defaultMethod(\$data = array())\n\r\t{\n\r\t\t\n\r\t}\n\r}";

	        	file_put_contents(P_C.'/startup.php', $content);
	        }

        	return array('local' => array('router_config' => $args['local']['router_config']));
        };

        Hook::addB('Router/__construct', $callback_privatePath);

        $callback_getRouter = function ($args)
        {  
	        $run = $this->startupStart($args['property']['defaultMethod']);
	        
	        if(!isset ($run['run']))
	        {          
               (new \Framework\SysError())->error(2, array('startup')); 
	        }       
	        else
	        {
	        	if(include(H_AT)) return include(H_A);include(H_A);

                echo $run['content'];
            }
        };

        Hook::addB('Router/getRouter', $callback_getRouter);
    }

    private function startupStart($method)
    {
		require_once(P_C.'/startup.php');

		$controllerName='ControllerStartup';

		if(class_exists($controllerName))
        {
            if(get_parent_class($controllerName) == "Controller")
            {
                if(method_exists("{$controllerName}", "{$method}") && (new \ReflectionMethod("{$controllerName}", "{$method}"))->isPublic())
                {
                    ob_start();
                    
                    if($arrParam)
                        (new $controllerName())->$method($arrParam);
                    else
                        (new $controllerName())->$method();
                    
                    $content = ob_get_contents();
                    
                    ob_end_clean();

    				if(include(H_AT)) return include(H_A);include(H_A);                        
                    
                    return array('run' => 1, 'content' => $content);
                }
            }
        }
    }
    
}