<?php
namespace Framework;

class StackObject
{
    protected $objects, $error, $typeError;
    
    public function __construct()
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $this->objects = array();
        
        $this->error = new SysError();
        
        $this->typeError['error_get_exists'] = 0;

        if(include(H_AT)) return include(H_A);include(H_A);
    }
    
    public function __get($key)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        /*преобразование ключа*/
        $regenKey = $this->regenKey($key);
        
        /*проверка на уникальность в массиве*/
        if(!array_key_exists($regenKey, $this->objects))
            $this->error->error($this->typeError['error_get_exists'], array($key));
        
        if(include(H_AT)) return include(H_A);include(H_A);

        return $this->objects[$key];    
    }
    
    protected function regenKey($key)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        $key = explode('/', $key);
        
        $regen = implode('_', $key);

        if(include(H_AT)) return include(H_A);include(H_A);      
        
        return $regen;
    }
}