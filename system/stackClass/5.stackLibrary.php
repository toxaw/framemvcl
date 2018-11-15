<?php
namespace Framework;

class StackLibrary extends StackObject
{
    public function __construct($library)
    {
        if(include(H_BT)) return include(H_B);include(H_B);

        parent::__construct();
        
        $this->typeError['error_get_exists'] = 15;

        foreach ($library as $key => $obj) 
        {
            if($obj['static'])
               $this->objects[$key] = $obj['library'];
            else
        	   $this->objects[$key] = clone $obj['library'];
        }

        if(include(H_AT)) return include(H_A);include(H_A);    
    }
}