<?php
namespace Framework;

class StackModel extends StackObject
{
    public function __construct()
    {
        if(include(H_BT)) return include(H_B);include(H_B);
        
        parent::__construct();

        $this->typeError['error_get_exists'] = 7;

        if(include(H_AT)) return include(H_A);include(H_A);        
    }
    
    public function init($key)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        /*преобразование ключа*/
        $regenKey = $this->regenKey($key);
        
        /*проверка на уникальность в массиве*/
        if(array_key_exists($regenKey, $this->objects))
            $this->error->error(3, array($key)); 
            
        // генерация пути подключения с проверкой
        $classPath = explode('/', $key);

        $className = 'Model';

        foreach ($classPath as $value) 
            $className .= ucfirst($value);
        
        $pathFile = P_M.'/'.$key.'.php';
        
        if(file_exists($pathFile))
        {
            if(class_exists($className))
            {
                $this->error->error(11, array($className));
            }

            if(include(H_AT)) return include(H_A);include(H_A);
                                    
            include($pathFile);
            
            if(class_exists($className))
            {
                if(get_parent_class($className) != "Model")
                    $this->error->error(6, array($key));
                    
                /*добавление объекта в стек*/
                $this->objects[$regenKey] = new $className();
            }
            else
            {
                $this->error->error(5, array($key));
            }
        }
        else
        {
            $this->error->error(4, array($key));
        }
    }
}