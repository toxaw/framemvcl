<?php
foreach ($class_includer_config['load_directories'] as $directory) 
{
    $result = array();
    
    $result = scandir($directory);
    
    foreach($result as $fileName)
    {
        if($result=='.' || $result=='..') continue;

    	if(is_file($directory.'/'.$fileName))
        	require_once($directory.'/'.$fileName);

        unset($fileName);
    }

    unset($directory);
}
 if(isset($result))
 	unset($result);

	unset($class_includer_config);
